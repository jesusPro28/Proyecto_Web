<?php
// Datos de conexión
$host = "grupoahost.com";       
$db   = "u941347256_Equipo1";  
$user = "u941347256_Equipo1";      
$pass = "280821wJ$";     

// Conexión a la base de datos
$conn = new mysqli($host, $user, $pass, $db);

// Verificar si hay error de conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>
