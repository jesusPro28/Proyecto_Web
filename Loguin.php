<?php
include("conexion.php");
header('Content-Type: text/html; charset=UTF-8');

// Verifica si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tipo = $_POST['tipo'];
    $password = $_POST['password'];

    if ($tipo == "Administrador") {
        $query = "SELECT * FROM administrador WHERE PASSWORD = '$password'";
        $resultado = mysqli_query($conexion, $query);

        if (mysqli_num_rows($resultado) > 0) {
            header("Location: admin.php");
            exit();
        } else {
            echo "<script>alert('Contraseña incorrecta para Administrador'); window.history.back();</script>";
        }

    } elseif ($tipo == "Director") {
        $query = "SELECT * FROM director WHERE PASSWORD = '$password'";
        $resultado = mysqli_query($conexion, $query);

        if (mysqli_num_rows($resultado) > 0) {
            header("Location: director.php");
            exit();
        } else {
            echo "<script>alert('Contraseña incorrecta para Director'); window.history.back();</script>";
        }

    } elseif ($tipo == "Empleado") {
        $query = "SELECT * FROM empleado WHERE `NUM-TRABAJADOR` = '$password'";
        $resultado = mysqli_query($conexion, $query);

        if (mysqli_num_rows($resultado) > 0) {
            header("Location: empleado.php");
            exit();
        } else {
            echo "<script>alert('No existe el trabajador o número incorrecto'); window.history.back();</script>";
        }

    } else {
        echo "<script>alert('Selecciona un tipo de usuario válido'); window.history.back();</script>";
    }
}
?>
