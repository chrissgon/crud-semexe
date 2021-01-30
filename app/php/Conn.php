<?php

function getConnection()
{
    try {
        $conn = new PDO('mysql:host=localhost;dbname=semexe', "root", "");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->exec("set names utf8");
    } catch (\PDOException $e) {
        echo $e->getMessage();
    }

    return $conn;
}
