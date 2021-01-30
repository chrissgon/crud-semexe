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

    public function get(){
        $stmt = $this->conn->prepare("SELECT * FROM Persons WHERE PersonID=:id");
        $stmt->bindParam(":id", $this->PersonID);
        $stmt->execute();

        $persons = $stmt->fetch(PDO::FETCH_OBJ);

        return $persons;
    }

    public function getAll()
    {
        $persons = $this->conn->query("SELECT * FROM Persons")->fetchAll(PDO::FETCH_OBJ);

        $result = new stdClass;
        $result->persons = $persons;
        $result->records = count($persons);

        return $result;
    }

    public function filter()
    {
        $sql =
            "SELECT * FROM Persons 
            WHERE ( 
                Name LIKE :filter OR
                CPF LIKE :filter OR
                Email LIKE :filter OR
                Phone LIKE :filter
            )";

        $stmt = $this->conn->prepare($sql);

        $stmt->bindValue(":filter", "%$this->Filter%");
        $stmt->execute();

        $persons = $stmt->fetchAll(PDO::FETCH_OBJ);

        return $persons;
    }

    public function create()
    {
        $this->prepareValues();

        $sql =
            "INSERT INTO Persons
            VALUES(
                NULL, 
                :name, 
                :cpf, 
                :email, 
                :phone, 
                :zipcode, 
                :address, 
                :number, 
                :complement, 
                :city, 
                :state
            )";

        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(":name", $this->Name);
        $stmt->bindParam(":cpf", $this->CPF,);
        $stmt->bindParam(":email", $this->Email,);
        $stmt->bindParam(":phone", $this->Phone);
        $stmt->bindParam(":zipcode", $this->Zipcode);
        $stmt->bindParam(":address", $this->Address);
        $stmt->bindParam(":number", $this->Number);
        $stmt->bindParam(":complement", $this->Complement);
        $stmt->bindParam(":city", $this->City);
        $stmt->bindParam(":state", $this->State);

        $stmt->execute();
    }

    public function update()
    {
        $this->prepareValues();

        $sql =
            "UPDATE Persons
            SET Name=:name,
            CPF=:cpf,
            Email=:email,
            Phone=:phone,
            Zipcode=:zipcode,
            Address=:address,
            Number=:number,
            Complement=:complement,
            City=:city,
            State=:state

            WHERE PersonID = :id
            ";

        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(":id", $this->PersonID);
        $stmt->bindParam(":name", $this->Name);
        $stmt->bindParam(":cpf", $this->CPF,);
        $stmt->bindParam(":email", $this->Email,);
        $stmt->bindParam(":phone", $this->Phone);
        $stmt->bindParam(":zipcode", $this->Zipcode);
        $stmt->bindParam(":address", $this->Address);
        $stmt->bindParam(":number", $this->Number);
        $stmt->bindParam(":complement", $this->Complement);
        $stmt->bindParam(":city", $this->City);
        $stmt->bindParam(":state", $this->State);

        $stmt->execute();
    }

    public function delete(){
        $stmt = $this->conn->prepare("DELETE FROM Persons WHERE PersonID = :id");
        
        $stmt->bindParam(":id", $this->PersonID);

        $stmt->execute();
    }

    private function prepareValues()
    {
        $chars = [".", "-", "(", ")", " "];

        $this->CPF = str_replace($chars, "", $this->CPF);
        $this->Phone = str_replace($chars, "", $this->Phone);
        $this->Zipcode = str_replace($chars, "", $this->Zipcode);
    }
}
