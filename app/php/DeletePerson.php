<?php

include "Person.php";

$person = new Person();
$person->PersonID = filter_input(INPUT_POST, "PersonID");

try {
    echo $person->delete();
} catch (\PDOException $e) {
    http_response_code(500);
}

