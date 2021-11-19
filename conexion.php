<?php

$server = 'localhost';
$username = 'root';
$password = '';
$database = 'akitronix';
$db = mysqli_connect($server, $username, $password, $database);
// Comprobacion de conexión satisfactoria o no
try {
    $con = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch (PDOException $e) {
    die('Conexion fallida: ' . $e->getMessage());
}

// Codificación de caracteres a uft8
mysqli_query($db, "SET NAMES 'utf8");
