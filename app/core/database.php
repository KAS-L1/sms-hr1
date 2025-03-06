<?php

/**
 * DATABASE CLASS AND SQL FUNCTIONS
 **/

class Database
{
	public $DB;
    private $DB_HOST;
    private $DB_USER;
    private $DB_PASSWORD;
    private $DB_NAME;

	// INITIATE CONNECTION 	
    function __construct()
    {   
        try {
            
            // Require the connection file
            $connection = require __DIR__ . '/connection.php';

            // Ensure the connection file returns an array
            if (!is_array($connection)) {
                throw new Exception("Database configuration error: connection.php must return an array.");
            }

            $this->DB_HOST = $connection['DB_HOST'] ?? 'localhost';
            $this->DB_USER = $connection['DB_USER'] ?? 'root';
            $this->DB_PASSWORD = $connection['DB_PASS'] ?? '';
            $this->DB_NAME = $connection['DB_NAME'] ?? '';

            $this->DB_CONNECTION();

        } catch (Exception $e) {
            die('
                <!DOCTYPE html>
                <html lang="en">
                    <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>App Error</title>
                    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
                    </head>
                    <body class="min-vh-100 d-flex align-items-center">
                    <div class="container text-center">
                        <div class="row justify-content-center">
                        <div class="col-md-6">
                            <p class="lead">Jose PHP Framework 🚀</p>
                            <p class="mb-1 small">Something went wrong unexpected error occurred.</p>
                            <code>'.$e->getMessage().'</code>
                        </div>
                        </div>
                    </div>
                    </body>
                </html>
            ');
        }
        
    }

	// CONNECTION INSTANCE
	public function DB_CONNECTION()
	{
        
        $this->DB = new mysqli($this->DB_HOST, $this->DB_USER, $this->DB_PASSWORD, $this->DB_NAME);
        if (!$this->DB) {
            throw new Exception($this->DB->connect_error);
        }
       
	}

	// CLOSE CONNECTION
	public function CLOSE()
	{
		$this->DB->close();
	}

	// ESCAPE SPECIAL CHARACTER ANTI SQL INJECTION
	public function ESCAPE($data)
	{
		return $this->DB->real_escape_string($data);
	}

	// CUSTOM QUERY
	public function SQL($query)
	{
		return $this->DB->query($query);
	}

	// SELECT FIELD
	public function SELECT($table, $fields = '*', $options = '')
	{
        try {
            $query = "SELECT {$fields} FROM {$table} {$options} ";
            $result = $this->DB->query($query);
            if (!$result) {
                throw new Exception("Cannot execute SELECT command: " . $this->DB->error);
            }
            $data = $result->fetch_all(MYSQLI_ASSOC);
            return $data;
        }catch (Exception $e) {
            pre($e->getMessage());
        }
	}

	// SELECT MULTITPLE ROW WHERE CONDITION
	public function SELECT_WHERE($table, $fields, $where, $options = '')
	{
        try {
            $condition = "";
            foreach ($where as $key => $value) {
                $condition .= $key . " = '" . $value . "' AND ";
            }
            $condition = substr($condition, 0, -5);
            $query = "SELECT {$fields} FROM {$table} WHERE {$condition} {$options}";
            $result = $this->DB->query($query) or throw new Exception("Cannot execute SELECT_WHERE command: " . $this->DB->error);
            $data = $result->fetch_all(MYSQLI_ASSOC);
            return $data;
        }catch (Exception $e) {
            pre($e->getMessage());
        }
	}

	// SELECT SINGLE ROW
	public function SELECT_ONE($table, $fields = '*', $options = null)
	{   
        try{
            $query = "SELECT {$fields} FROM {$table} {$options} LIMIT 1";
            $result = $this->DB->query($query);
            $data = $result->fetch_assoc();
            return $data;
        }catch (Exception $e) {
            pre($e->getMessage());
        }
	}

	// SELECT SINGLE ROW WHERE CONDITION
	public function SELECT_ONE_WHERE($table, $fields, $where, $options = null)
	{
        try {
            $condition = "";
            foreach ($where as $key => $value) {
                $condition .= $key . " = '" . $value . "' AND ";
            }
            $condition = substr($condition, 0, -5);
            $query = "SELECT {$fields} FROM {$table} WHERE {$condition} {$options} LIMIT 1";
            $result = $this->DB->query($query) or throw new Exception("Cannot execute SELECT_ONE_WHERE command: " . $this->DB->error);
            $data = $result->fetch_assoc();
            return $data;
        }catch (Exception $e) {
            pre($e->getMessage());
        }
	}

	// INSERT DATA
	public function INSERT($table, $data)
	{
        try {
            $field_key = implode(",", array_keys($data));
            $field_value = implode("','", array_values($data));
            $query = "INSERT INTO {$table} ({$field_key}) VALUES('{$field_value}')";
            if ($this->DB->query($query)) {
                return array("success" => true, "message" => "Data inserted successfully");
            } else {
                return array("success" => false, "message" => 'Failed to insert data in ' . $table . ' table: ' . $this->DB->error);
            }
        }catch (Exception $e) {
            pre($e->getMessage());
        }
	}

	// UPDATE DATA
	public function UPDATE($table, $data, $where)
	{   
        try{
            $statement = "";
            $condition = "";
            foreach ($data as $key => $value) {
                $statement .= $key . " = '" . $value . "', ";
            }
            $statement = substr($statement, 0, -2);
            foreach ($where as $key => $value) {
                $condition .= $key . " = '" . $value . "' AND ";
            }
            $condition = substr($condition, 0, -5);
            $query = "UPDATE {$table} SET {$statement} WHERE {$condition} ";
            if ($this->DB->query($query)) {
                return array("success" => true, "message" => "Data updated successfully");
            } else {
                return array("success" => false, "message" => 'Failed to update data in ' . $table . ' table: ' . $this->DB->error);
            }
        }catch (Exception $e) {
            pre($e->getMessage());
        }
	}

	// DELETE DATA
	public function DELETE($table, $where)
	{   
        try{
            $condition = "";
            foreach ($where as $key => $value) {
                $condition .= $key . " = '" . $value . "' AND ";
            }
            $condition = substr($condition, 0, -5);
            $query = "DELETE FROM {$table} WHERE {$condition} ";
            if ($this->DB->query($query)) {
                return array("success" => true, "message" => "Data deleted successfully");
            } else {
                return array("success" => false, "message" => 'Failed to delete data in ' . $table . ' table: ' . $this->DB->error);
            }
        }catch (Exception $e) {
            pre($e->getMessage());
        }
	}

}
