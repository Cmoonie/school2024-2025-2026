<?php

class Connection
{
    public $servername = "localhost";
    public $username = "root";
    public $password = "Gloria";
    public $database = "profileapp";

    public function __construct()
    {
        try {
            return $conn = new PDO("mysql:host=$this->servername;dbname=$this->database",
                $this->username,
                $this->password);
            // set the PDO error mode to exception
            //$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Connected successfully";
            //return $conn;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

}