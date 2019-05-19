<?php
session_start();
$server = 'localhost';
$username = 'root';
$password = 'root';
$database = 'warung_app';

$mysqli = new mysqli();
$mysqli->connect($server, $username, $password, $database);
unset($_SESSION['menu_active']);
global $mysqli;
?>