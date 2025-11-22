<?php
require_once 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['imagenes']) && !empty($_POST['imagenes'])) {
        $selected = $_POST['imagenes'];

        if (isset($_POST['eliminar'])) {
            foreach ($selected as $id) {
                $conn->query("DELETE FROM imagenes WHERE id=" . intval($id));
            }
        } elseif (isset($_POST['aplicar'])) {
            $conn->query("UPDATE imagenes SET activa=0");
            if (count($selected) > 0) {
                $ids = implode(',', array_map('intval', $selected));
                $conn->query("UPDATE imagenes SET activa=1 WHERE id IN ($ids)");
            }
        }
    } else {
    
        echo "<script>alert('No se elijio ninguna imagen.'); window.location.href = 'edicion.php';</script>";
        exit;
    }
    header("Location: edicion.php");
    exit;
}

$conn->close();
?>
