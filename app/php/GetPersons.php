<?php

require_once "Person.php";

$person = new Person();

try {
    echo json_encode($person->getAll());
} catch (\PDOException $e) {
    http_response_code(500);
}
