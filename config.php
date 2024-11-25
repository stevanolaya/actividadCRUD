<?php
$servername = "localhost";
$username = "root"; // Cambiar por tu usuario de la base de datos
$password = ""; // Cambiar por tu contraseña
$dbname = "movies_db"; // Nombre de la base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
