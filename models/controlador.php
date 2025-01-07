<?php
session_start();
include_once "conexion.php";

$conexionObj = new Conexion();
$conexion = $conexionObj->conectar();

$usuario = $_POST["usuario"];
$clave = $_POST["password"];

$sql = "SELECT * FROM usuario WHERE usuario = ? AND clave = ?";
$stmt = $conexion->prepare($sql);

if (!$stmt) {
    die("Error en la consulta: " . $conexion->error);
}
$stmt->bind_param("ss", $usuario, $clave);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $_SESSION['usuario'] = $usuario; 
    header("Location: ./../index.php");  
} else {
   
    $_SESSION['error'] = "Usuario o contraseña incorrectos. Intente nuevamente.";
    header("Location: ../views/interfaces/login.php"); 
}
?>

