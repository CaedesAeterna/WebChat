<?php
session_start();
require_once 'config.php';
require_once 'db.php';

$user_name = $db->escape_string($_POST['user_name']);

$list_all_message_sql = "select m.message, m.sender,  m.receiver, m.time 
from messages m 
where (m.receiver is null) or (m.sender = '$user_name' or m.receiver = '$user_name') ";

if (!$result = $db->query($list_all_message_sql)) {
    die($db->error);
}

$array = array();

while ($row = $result->fetch_assoc()) {
    $array[] = $row;
}


//var_dump($array);

die(json_encode($array));