<?php
session_start();
require_once 'config.php';
require_once 'db.php';


$clear_messages_sql = "delete from messages";

if (!$db->query($clear_messages_sql)) {
    die($db->error);
} else {
    echo "success";
}



