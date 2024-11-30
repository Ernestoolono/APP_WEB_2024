<?php
session_start();
            if (isset($_SESSION['user'])) {
                
            } else {
                header("Location: ../index.php");
                exit();
            }
            ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Inicio|PHP Proyecto UTD
    </title>
    <link rel="stylesheet" href="../css/estilos.css" type="text/css">
</head>
<body>
    <header>
        <div id="logotipo">
            <img src="../img/logophp.png" alt="Imagen Django" title="Django">
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
           <h1>Vision</h1>
           <hr>
           <p>Se enfoca en formar a sus estudiantes en diversas áreas como la ingeniería, el diseño digital, la mecatrónica, y los negocios internacionales. Además, la universidad tiene un fuerte compromiso con la calidad educativa y la innovación, buscando que sus egresados estén preparados para enfrentar los retos del mundo laboral con una sólida base en competencias técnicas y profesionales. Dentro de sus servicios, ofrece programas de licenciatura e ingeniería, así como una serie de apoyos para los estudiantes, como becas, seguros y un sistema de tutorías. También se destaca por su oferta educativa en energías renovables, mantenimiento industrial y tecnologías de la información. Para más información sobre su misión, visión y oferta educativa, puedes visitar su sitio web o revisar los documentos relacionados con su normativa y procedimientos académicos.</p>
       </div>
    </section>
    <footer>
    <p>Curso de Django con Ernestoline &copy; 2024 | Visitado el: 01/10/24</p>
    </footer>
</body>
</html>