<?php

use PDO;
use PDOException;

class Database
{
    # Database Properties
    private $_host = "localhost";
    private $_dbName = "courier";
    private $_username = "root";
    private $_password = "root";
    public $conn;
    

    /**
     * This Gets the database connection.
     *
     * @return string   This returns the Connection
     */
    public function getConnection()
    {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->_host . ";dbname=" . $this->_dbName, $this->_username, $this->_password);
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }

}
