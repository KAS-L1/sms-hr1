<?php

Class JWT
{
    private $secret;

    public function __construct(string $secret)
    {
        $this->secret = $secret;
    }

    public function createToken(array $payload, int $expirySeconds = null): string
    {
        // Create header
        $header = json_encode([
            'typ' => 'JWT',
            'alg' => 'HS256'
        ]);

        // Add expiration to payload
        if ($expirySeconds !== null) {
            $payload['exp'] = time() + $expirySeconds;
        }

        $payload = json_encode($payload);

        // Base64Url encode header and payload
        $base64UrlHeader = $this->base64UrlEncode($header);
        $base64UrlPayload = $this->base64UrlEncode($payload);

        // Create signature
        $signature = hash_hmac(
            'sha256',
            $base64UrlHeader . "." . $base64UrlPayload,
            $this->secret,
            true
        );
        $base64UrlSignature = $this->base64UrlEncode($signature);

        // Create JWT
        return $base64UrlHeader . "." . $base64UrlPayload . "." . $base64UrlSignature;
    }

    public function verifyToken(string $token): ?array
    {
        // Split token into parts
        $parts = explode('.', $token);
        if (count($parts) !== 3) {
            return null;
        }

        [$base64UrlHeader, $base64UrlPayload, $base64UrlSignature] = $parts;

        // Verify signature
        $signature = hash_hmac(
            'sha256',
            $base64UrlHeader . "." . $base64UrlPayload,
            $this->secret,
            true
        );

        $decodedSignature = $this->base64UrlDecode($base64UrlSignature);
        if (!hash_equals($signature, $decodedSignature)) {
            return null;
        }

        // Decode payload
        $payload = json_decode($this->base64UrlDecode($base64UrlPayload), true);

        // Check expiration
        if (isset($payload['exp']) && $payload['exp'] < time()) {
            return null;
        }

        return $payload;
    }

    private function base64UrlEncode(string $data): string
    {
        $base64 = base64_encode($data);
        return str_replace(['+', '/', '='], ['-', '_', ''], $base64);
    }

    private function base64UrlDecode(string $data): string
    {
        $base64 = str_replace(['-', '_'], ['+', '/'], $data);
        $paddedLength = strlen($base64) + (4 - strlen($base64) % 4) % 4;
        $base64 = str_pad($base64, $paddedLength, '=', STR_PAD_RIGHT);
        return base64_decode($base64);
    }
}
