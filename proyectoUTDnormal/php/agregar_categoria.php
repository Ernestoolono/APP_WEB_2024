<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: ../index.php");
    exit();
}

// Conexión a la base de datos
include_once('conexion.php');

// Agregar categoría si se envía el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['descripcion'])) {
    $descripcion = $conexion->real_escape_string(trim($_POST['descripcion']));
    if (!empty($descripcion)) {
        $sql_insert = "INSERT INTO categorias (descripcion) VALUES ('$descripcion')";
        if ($conexion->query($sql_insert)) {
            $mensaje = "Categoría agregada con éxito.";
        } else {
            $mensaje = "Error al agregar la categoría: " . $conexion->error;
        }
    } else {
        $mensaje = "La descripción no puede estar vacía.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorías | PHP Proyecto UTD</title>
    <link rel="stylesheet" href="../css/estilos.css" type="text/css">
    <link rel="stylesheet" href="../css/categorias2.css" type="text/css">
</head>
<body>
<header>
    <div id="logotipo">
        <img src="../img/logophp.png" alt="Imagen PHP" title="PHP">
        <h1>PHP Proyecto Web</h1>
    </div>
</header>
<nav>
    <ul>
        <li><a href="/PROYECTOUTDNORMAL/index.php" >Inicio</a></li>
        <li><a href="/PROYECTOUTDNORMAL/php/mision.php">Mision</a></li>
        <li><a href="/PROYECTOUTDNORMAL/php/vision.php">Vision</a></li>
        <li><a href="/PROYECTOUTDNORMAL/php/acercade.php">Acerca de</a></li>
        <li><a href="/PROYECTOUTDNORMAL/php/agregar_articulos.php">Agregar Articulos</a></li>
        <li><a href="/PROYECTOUTDNORMAL/php/mostrar_articulos.php">Articulos</a></li>
        <li><a href="/PROYECTOUTDNORMAL/php/agregar_categoria.php">Agregar Categoría</a></li>
        <li><a href="/PROYECTOUTDNORMAL/php/mostrar_categorias.php">Categorias</a></li>
        <li><a href="/PROYECTOUTDNORMAL/php/cerrar_sesion.php">Cerrar sesión</a></li>
    </ul>
</nav>
<section id="content">
    <div class="box">
        <h1>Agregar Categorías</h1>
        <hr>

        <!-- Mensaje de estado -->
        <?php if (isset($mensaje)): ?>
            <p><?= htmlspecialchars($mensaje) ?></p>
        <?php endif; ?>

        <!-- Formulario para agregar categorías -->
        <form method="POST" action="">
            <label for="descripcion">Nombre de Categoria:</label>
            <input type="text" id="descripcion" name="descripcion" required>
            <button type="submit">Agregar Categoría</button>
        </form>

        <!-- No se muestra el listado de categorías -->
    </div>
</section>
<footer>
    <p>Curso de Django con Ernestoline &copy; 2024 | Visitado el: <?= date('d/m/Y') ?></p>
</footer>
</body>
</html>
