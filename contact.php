<?php
$servername = "localhost";
$username = "id22185463_root"; // Tu nombre de usuario de MySQL
$password = "123456Sistemas/"; // Tu contraseña de MySQL
$database = "id22185463_bd_contactos"; // El nombre de tu base de datos

$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];

$sql = "INSERT INTO contactos (nombre, email, telefono, mensaje) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

$stmt->bind_param("ssss", $name, $email, $phone, $message);

if ($stmt->execute()) {
    echo "<script>alert('Mensaje enviado correctamente');</script>";
    echo "<script>window.history.go(-1);</script>";
    
} else {
    echo "Error al enviar el mensaje: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
