<?php

$db = new mysqli($host, $dbuser, $dbpass, $dbname);

if (!$db) {
    die("Connection failed: " . $db->connect_error);

}






