<?php
// Inicia la sesión
session_start();

// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "mysql123";
$dbname = "prueba";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Recibir datos del formulario
$usernameOrEmail = $_POST['username'];
$password = $_POST['password'];

// Consultar si el usuario existe
$sql = "SELECT * FROM users WHERE username='$usernameOrEmail' OR email='$usernameOrEmail'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Usuario encontrado, verificar la contraseña
    $row = $result->fetch_assoc();
    if ($row['password'] == $password) {
        // Contraseña correcta, guarda el nombre de usuario en la sesión
        $_SESSION['username'] = $row['username'];
        // Devuelve un mensaje de éxito
        echo "Login successful";
    } else {
        // Contraseña incorrecta, mostrar mensaje de error
        echo "Invalid password";
    }
} else {
    // Usuario no encontrado, mostrar mensaje de error
    echo "Invalid username or email";
}

$conn->close();
?>
