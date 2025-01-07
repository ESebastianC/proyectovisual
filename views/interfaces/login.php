<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <link rel="stylesheet" href="../../css/login.css">
</head>

<body>
    <form action="../../models/controlador.php" method="post">
        <h2>Iniciar Sesión</h2>

        <!-- Mostrar el mensaje de error si existe -->
        <?php
        session_start();
        if (isset($_SESSION['error'])) {
            echo "<p style='color: red;'>" . $_SESSION['error'] . "</p>";
            unset($_SESSION['error']); // Eliminar el mensaje de error después de mostrarlo
        }
        ?>

        <label for="usuario">Usuario</label>
        <input type="text" name="usuario" id="usuario" required> <br>
        <label for="password">Contraseña</label>
        <input type="password" name="password" id="password" required> <br><br>
        <button type="submit">Ingresar</button>
    </form>
</body>

</html>
