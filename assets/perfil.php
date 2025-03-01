<?php
// Inicia la sesión
session_start();

// Verifica si el usuario está autenticado
if (!isset($_SESSION['username'])) {
    // Si no está autenticado, redirige a login.html
    header("Location: login.html");
    exit();
}

// Obtén el nombre de usuario de la sesión
$username = $_SESSION['username'];

// Conexión a la base de datos
$servername = "localhost";
$usernameDB = "root";
$passwordDB = "mysql123";
$dbname = "prueba";

$conn = new mysqli($servername, $usernameDB, $passwordDB, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Consultar el correo electrónico del usuario
$sql = "SELECT email FROM users WHERE username='$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Obtén el correo electrónico del resultado de la consulta
    $row = $result->fetch_assoc();
    $email = $row['email'];
} else {
    // Si no se encuentra el correo electrónico, muestra un mensaje de error
    $email = "Email not found";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
    <h1>User Profile</h1>
    <p>Username: <?php echo $username; ?></p>
    <p>Email: <?php echo $email; ?></p>
    <a href="session.php">Go to session</a>
</body>
</html>
