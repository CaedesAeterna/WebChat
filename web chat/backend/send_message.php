<?php
session_start();


require_once 'config.php';
require_once 'db.php';

$message = $db->escape_string($_POST['message']);

//$user_name = $_SESSION['user_name'];
$user_name = $db->escape_string($_POST['user_name']);

$exploded_message = explode(" ", $message);

$prefix = $exploded_message[0];




if ($prefix == "/w") {

    $receiver = $exploded_message[1];

    $message_text = implode(" ", array_slice($exploded_message, 2));

    $insert_sql = "insert into messages(message, sender, receiver) values('$message_text', '$user_name', '$receiver')";

} elseif ($prefix == "/s") {

    $insert_sql = "insert into messages(message, sender) values('$user_name', '$user_name')";

} else {

    $insert_sql = "insert into messages(message, sender) values('$message', '$user_name')";


}


if (!$db->query($insert_sql)) {
    die($db->error);
}


$array = array();
$array['message'] = $message;

die(json_encode($array));


