<?php
session_start(); // Asegúrate de que la sesión esté iniciada

// Verificar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $descripcion = trim($_POST['descripcion']); // Descripción
    $pu = $_POST['pu']; // Precio unitario
    $cantidad = $_POST['cantidad']; // Cantidad
    $id_categoria = $_POST['id_categoria']; // ID de categoría
    $imagen = $_POST['imagen']; // Imagen seleccionada
    $id_persona = $_SESSION['user_id']; // Este campo proviene de la sesión del usuario

    // Incluir archivo de conexión a la base de datos
    include_once("conexion.php");

    // Consulta para insertar el artículo
    $sql = "INSERT INTO articulos (descripcion, pu, cantidad, id_categoria, imagen) 
            VALUES (?, ?, ?, ?, ?)";

    // Preparar la consulta
    if ($stmt = mysqli_prepare($conexion, $sql)) {
        // Vincular los parámetros
        mysqli_stmt_bind_param($stmt, "sdiis", $descripcion, $pu, $cantidad, $id_categoria, $imagen);

        // Ejecutar la consulta
        if (mysqli_stmt_execute($stmt)) {
            echo "<script>alert('¡Artículo agregado correctamente!'); window.location.href='mostrar_articulos.php';</script>";
        } else {
            echo "<script>alert('Error al agregar el artículo');</script>";
        }

        // Cerrar la declaración
        mysqli_stmt_close($stmt);
    } else {
        echo "<script>alert('Error en la consulta a la base de datos');</script>";
    }

    // Cerrar la conexión
    mysqli_close($conexion);
}

// Ruta correcta para acceder a la carpeta 'imagenes' fuera de la carpeta 'php'
$imagenes_dir = __DIR__ . '/../imagenes/'; // Subimos un nivel y accedemos a la carpeta 'imagenes'

// Verificar si la carpeta existe
if (!is_dir($imagenes_dir)) {
    die("La carpeta de imágenes no existe.");
}

// Obtener los archivos en la carpeta
$imagenes = array_diff(scandir($imagenes_dir), array('..', '.')); // Filtrar los directorios '.' y '..'

// Verificar si hay imágenes disponibles
if (empty($imagenes)) {
    echo "No hay imágenes disponibles.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Artículo</title>
    <link rel="stylesheet" href="../css/styles.css" type="text/css">
</head>
<body>
    <header>
        <div id="logotipo">
            <img src="../img/logophp.png" alt="Imagen PHP" title="PHP">
            <h1>PPHP Proyecto UTD</h1>
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
        <div class="form-container">
            <h2>Agregar Nuevo Artículo</h2>
            <form method="POST" action="agregar_articulos.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <input type="text" id="descripcion" name="descripcion" placeholder="Descripción" required>
                </div>
                <div class="form-group">
                    <label for="pu">Precio Unitario (PU)</label>
                    <input type="number" step="0.01" id="pu" name="pu" placeholder="Precio Unitario" required>
                </div>
                <div class="form-group">
                    <label for="cantidad">Cantidad</label>
                    <input type="number" id="cantidad" name="cantidad" placeholder="Cantidad" required>
                </div>
                <div class="form-group">
                    <label for="id_categoria">Categoría</label>
                    <select name="id_categoria" id="id_categoria" required>
                        <option value="">Seleccionar categoría</option>
                        <?php
                        // Consulta para obtener las categorías
                        include_once("conexion.php");
                        $sql = "SELECT id, nombre_categoria FROM categorias";
                        $result = mysqli_query($conexion, $sql);
                        while ($row = mysqli_fetch_assoc($result)):
                        ?>
                            <option value="<?= $row['id'] ?>"><?= $row['nombre_categoria'] ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="imagen">Imagen</label>
                    <select name="imagen" id="imagen" required>
                        <option value="">Seleccionar imagen</option>
                        <?php foreach ($imagenes as $imagen): ?>
                            <option value="<?= $imagen ?>"><?= $imagen ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit">Agregar Artículo</button>
            </form>
        </div>
    </section>
    <footer>
        <p>Curso de Django con Ernestoline &copy; 2024 | Visitado el: 01/10/24</p>
    </footer>
</body>
</html>
