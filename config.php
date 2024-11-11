<?php
$servername = "";
$username = "user";
$password = "User123.";
$dbname = "PROYECTO";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>