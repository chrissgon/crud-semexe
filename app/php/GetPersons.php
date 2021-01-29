<?php

require_once "Person.php";

$person = new Person();

echo json_encode($person->getAll());