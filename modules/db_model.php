<?php 

require_once($_SERVER['DOCUMENT_ROOT'].'/wp-config.php');
function db_connection(){
    $localhost	= DB_HOST;
    $user		= DB_USER;
    $pw			= DB_PASSWORD;
    $database	= DB_NAME;
    $db = new mysqli($localhost, $user, $pw, $database);
    if($db){
        return $db;
    }else{
        die("Connection failed: " . $conn->connect_error);
    }
}