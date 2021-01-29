<?php

require_once "Conn.php";

class Person
{
    private $conn;

    public function __construct()
    {
        $this->conn = getConnection();
    }

    public function __set($atrib, $value)
    {
        $this->$atrib = $value;
        return $this;
    }

    public function __get($atrib)
    {
        return $this->$atrib;
    }

    public function getAll()
    {
        $persons = $this->conn->query("select * from Person")->fetchAll(PDO::FETCH_OBJ);

        $result = new stdClass;
        $result->persons = $persons;
        $result->records = count($persons);

        return $result;
    }
}
