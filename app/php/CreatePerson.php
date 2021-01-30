<?php

require_once "Person.php";

$person = new Person();

$person->Name = filter_input(INPUT_POST, "Name");
$person->CPF = filter_input(INPUT_POST, "CPF");
$person->Email = filter_input(INPUT_POST, "Email");
$person->Phone = filter_input(INPUT_POST, "Phone");
$person->Zipcode = filter_input(INPUT_POST, "Zipcode");
$person->Address = filter_input(INPUT_POST, "Address");
$person->Number = filter_input(INPUT_POST, "Number");
$person->Complement = filter_input(INPUT_POST, "Complement");
$person->City = filter_input(INPUT_POST, "City");
$person->State = filter_input(INPUT_POST, "State");

try {
    $person->create();
} catch (\Exception $e) {
    http_response_code(500);
}
