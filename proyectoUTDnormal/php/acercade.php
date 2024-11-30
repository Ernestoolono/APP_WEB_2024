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
            <h1>Acerca de Nosotros</h1>
            <hr>
            <p>Somos un equipo dedicado al desarrollo de software de alta calidad, con el objetivo de ofrecer soluciones tecnológicas innovadoras que satisfagan las necesidades de nuestros clientes. Nos apasiona crear aplicaciones web funcionales y eficientes, que optimicen procesos y mejoren la experiencia de los usuarios. Con un enfoque en el trabajo colaborativo y el uso de tecnologías avanzadas, nos comprometemos a entregar proyectos que no solo cumplan con las expectativas, sino que también superen los desafíos que plantea el mundo digital actual.</p>
       </div>
    </section>
    <footer>
    <p>Curso de Django con Ernestoline &copy; 2024 | Visitado el: 01/10/24</p>
    </footer>
</html>