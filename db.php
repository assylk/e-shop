<?php
/* Database connection settings */
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'cart';
$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);
?>