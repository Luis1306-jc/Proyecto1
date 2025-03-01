<?php
$servername = "localhost";
$username = "root";
$password = "mysql123";
$dbname = "prueba";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$sql = "SELECT * FROM users WHERE username='$username'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo "Username already exists";
} else {
    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
    if ($conn->query($sql) === TRUE) {
        echo "Registration successful";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>
