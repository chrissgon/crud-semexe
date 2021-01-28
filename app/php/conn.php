<?php


try {
    $conn = new PDO('mysql:host=localhost;dbname=semexe', "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // var_dump("aa");
} catch (\PDOException $e) {
    echo $e->getMessage();
}
