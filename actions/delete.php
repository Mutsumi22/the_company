<?php
include '../classes/User.php';
session_start();

$user = new User();

$user->deleteUser($_SESSION['user_id']);

