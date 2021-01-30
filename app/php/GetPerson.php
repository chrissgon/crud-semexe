<?php

include "Person.php";

$person = new Person();
$person->PersonID = filter_input(INPUT_GET, "PersonID");

try {
    echo json_encode($person->get());
} catch (\PDOException $e) {
    http_response_code(500);
}
