<?php
require_once 'conexion.php';

if (isset($_POST['submit'])) {
    $descripcion = $_POST['descripcion'];
    $imagen = $_FILES['imagen']['tmp_name'];
    $imgContent = file_get_contents($imagen);

    $stmt = $conn->prepare("INSERT INTO imagenes (descripcion, imagen) VALUES (?, ?)");
    $null = NULL;
    $stmt->bind_param("sb", $descripcion, $null);
    $stmt->send_long_data(1, $imgContent);

    if ($stmt->execute()) {
        echo "<script>alert('Imagen agregada correctamente.'); window.location.href = 'addImagen.html';</script>";
    } else {
        $errorMsg = addslashes($conn->error);
        echo "<script>alert('Error al subir imagen: $errorMsg'); window.location.href = 'addImagen.html';</script>";
    }
    $stmt->close();
}

$conn->close();
?>
