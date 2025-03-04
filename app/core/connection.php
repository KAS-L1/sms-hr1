<?php

require_once __DIR__ . '/../../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../..');
$dotenv->load();

/**
 * DATABASE CONNECTION SETUP
**/

return [
    "DB_HOST" => $_ENV['DB_HOST'],
    "DB_USER" => $_ENV['DB_USER'],
    "DB_PASS" => $_ENV['DB_PASS'],
    "DB_NAME" => $_ENV['DB_NAME']
];