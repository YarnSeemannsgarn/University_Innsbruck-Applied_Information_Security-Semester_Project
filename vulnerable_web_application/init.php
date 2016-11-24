<?php
header("X-XSS-Protection: 0");	
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ERROR | E_WARNING | E_PARSE);
session_start();
$PDO = new PDO('sqlite:db/database.sqlite');
$PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

?>
