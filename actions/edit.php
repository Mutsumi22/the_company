<?php
include '../classes/User.php';
$user = new User;
session_start();


$id = $_SESSION['user_id']; // optional
$first_name = $_POST['first_name']; //need 以下同様
$last_name = $_POST['last_name'];
$username = $_POST['username'];

$user->updateUser($id,$first_name, $last_name, $username);