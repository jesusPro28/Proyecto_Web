<?php
require_once 'conexion.php';
$result = $conn->query("SELECT id, descripcion, imagen_blob, activa FROM imagenes");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Registro de Asistencia del personal</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <nav>
            <img src="img/805-original.webp" alt="logo" width="50dp">
            <div class="logo">UTHH</div>
            <div class="nav-links">
                <a href="index.html">Inicio</a>
                <a href="#directorio.html">Directorio</a>
                <a href="#academicos.html">Contacto</a>
                <a href="#servicios">Servicios</a>
            </div>
        </nav>
        
    </header>
    <main>
        <form method="POST" action="eliminar_aplicar.php">
    <table border="1" cellpadding="10">
        <tr>
            <th>Seleccionar</th>
            <th>Descripción</th>
            <th>Imagen</th>
            <th>Activa</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()):
            $imgData = base64_encode($row['imagen_blob']);
        ?>
        <tr>
            <td><input type="checkbox" name="imagenes[]" value="<?php echo $row['id']; ?>"></td>
            <!-- No mostramos columna de ID -->
            <td><?php echo htmlspecialchars($row['descripcion']); ?></td>
            <td><img src="data:image/jpeg;base64,<?php echo $imgData; ?>" width="100"></td>
            <td><?php echo $row['activa'] ? "Sí" : "No"; ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
    <br>
    <input type="submit" name="eliminar" value="Eliminar">
    <input type="submit" name="aplicar" value="Aplicar">
</form>
    </main>
    <footer class="footer">
        <div class="footer-content">
            <div class="footer-section">
                <h4>Contacto</h4>
                <p>Email: contacto@uthh.edu.mx</p>
                <p>Tel: (771) 123 4567</p>
            </div>
            <div class="footer-section">
                <h4>Ubicación</h4>
                <p>Carretera Chalahuiyapa-Huejutla, Hidalgo</p>
            </div>
            <div class="footer-section">
                <h4>Redes Sociales</h4>
                <p>
                    <a href="#"><img src="img/face.png" width="30px" alt="Facebook"></a>
                    <a href="#"><img src="img/insta.png" width="30px" alt="Instagram"></a>
                </p>
            </div>
        </div>
        <div class="footer-bottom">
            &copy; 2025 Universidad Tecnológica | Todos los derechos reservados
        </div>
    </footer>
</body>
</html>