<?php
session_start();


require_once 'config.php';
require_once 'db.php';

$raw_user_name = $_POST['user_name'];

//var_dump($_POST);
//echo $raw_user_name;

$user_name = $db->escape_string($raw_user_name);

//echo $user_name;

//$_SESSION['user_name'] = $user_name;

header("Location: ../frontend/chat.html?user_name=" . $user_name);

