<?php
header('Content-Type: application/json');

// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "usuarios");

// Verificar conexión
if ($conexion->connect_error) {
    die(json_encode(["success" => false, "title" => "Error", "message" => "Error de conexión a la base de datos"]));
}

// Obtener datos del formulario
$correo = $_POST['correo_php'];
$contraseña = $_POST['contraseña_php'];

// Evitar inyección SQL con sentencias preparadas
$stmt = $conexion->prepare("SELECT * FROM cuentas WHERE correo = ? AND contraseña = ?");
$stmt->bind_param("si", $correo, $contraseña);
$stmt->execute();
$resultado = $stmt->get_result();

// Verificar si las credenciales son correctas
if ($resultado->num_rows > 0) {
    echo json_encode(["success" => true, "title" => "Acceso concedido", "message" => "Bienvenido!"]);
} else {
    echo json_encode(["success" => false, "title" => "Error de inicio de sesión", "message" => "Correo o contraseña incorrectos"]);
}

// Cerrar conexión
$stmt->close();
$conexion->close();
?>
