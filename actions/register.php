<?php

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$username = $_POST['username'];
$password = $_POST['password'];

include '../classes/User.php';
$user  = new User();

$user->register($first_name, $last_name, $username, $password);