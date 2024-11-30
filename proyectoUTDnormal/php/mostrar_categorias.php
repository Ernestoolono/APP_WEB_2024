<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: ../index.php");
    exit();
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
        <h1>Categorías</h1>
        <hr>
        <div class="categories-container">
            <?php
            include_once('conexion.php');

            // Consulta SQL
            $sql = "SELECT nombre_categoria FROM categorias";
            $result = $conexion->query($sql);

            if ($result && $result->num_rows > 0) {
                while ($fila = $result->fetch_assoc()) {
                    echo '<div class="category-item">';
                    echo '<h2>' . htmlspecialchars($fila['nombre_categoria']) . '</h2>';

                    echo '</div>';
                }
            } else {
                echo '<p>No hay categorías disponibles.</p>';
            }
            ?>
        </div>
    </div>
</section>
<footer>
    <p>Curso de Django con Ernestoline &copy; 2024 | Visitado el: <?= date('d/m/Y') ?></p>
</footer>
</body>
</html>
