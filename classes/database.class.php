<?php

require_once("config.class.php");

class Database
{
    // INITIATING DATABASE CONNECTION

    public $connection;

    public function __construct()
    {
        $this->open_db_connection();
    }

    public function open_db_connection()
    {
        $this->connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    }

    public function query($sql)
    {
        $result = $this->connection->query($sql);

        return $result;
    }

    public function escape_string($string)
    {
        return $this->connection->real_escape_string($string);
    }

    public function insert_id()
    {
        return $this->connection->insert_id;
    }
}

$database = new Database();
