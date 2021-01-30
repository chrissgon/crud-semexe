<?php

include "Person.php";

$person = new Person();
$person->Filter = filter_input(INPUT_GET, "Filter");


try {
    echo json_encode(["persons" => $person->filter()]);
} catch (\PDOException $e) {
    http_response_code(500);
}