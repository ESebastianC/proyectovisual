<!DOCTYPE html>
<html>

<head>
    <title>Grupo 2</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
    <header>
        <img src="imagenes/banner.png" width="40%" height="150px"></img>
        <!-- Botón de inicio de sesión -->
        <div style="float: right; margin-right: 10px;">
            <?php 
                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }
                if (isset($_SESSION['usuario'])) { 
            ?>
                <a href="./views/interfaces/logout.php" class="boton-sesion">Cerrar sesión</a>
            <?php 
                } else { 
            ?>
                <a href="./views/interfaces/login.php" class="boton-sesion">Iniciar sesión</a>
            <?php 
                } 
            ?>
        </div>
    </header>

    <nav>
        <ul>
            <li><a href="index.php?action=inicio">Inicio</a></li>
            <li><a href="index.php?action=nosotros">Nosotros</a></li>
            <li><a href="index.php?action=servicios">Servicios</a></li>
            <li><a href="index.php?action=contactanos">Contactanos</a></li>
        </ul>
    </nav>

    <section>
        <?php
        require_once "controllers/controller.php";
        require_once "models/model.php";
        $mvc = new MvcController();
        $mvc->enlacesPaginasController();
        ?>
    </section>

    <section>
        <footer>
            Derechos Reservados @cuarto Software
        </footer>
    </section>
</body>

</html>
