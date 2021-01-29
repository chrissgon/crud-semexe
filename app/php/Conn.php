<?php

function getConnection()
{
    try {
        $conn = new PDO('mysql:host=localhost;dbname=semexe', "root", "");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (\PDOException $e) {
        echo $e->getMessage();
    }

    return $conn;
}
