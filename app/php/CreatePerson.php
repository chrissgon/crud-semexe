<?php

require_once "Person.php";

$person = new Person();

var_dump(filter_input(INPUT_POST, "Name"));
