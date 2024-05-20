<?php
$servername = "localhost";
$username = "id22185463_root"; 
$password = "123456Sistemas/"; 
$database = "id22185463_bd_contactos"; 

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
    echo "Mensaje enviado correctamente";
} else {
    echo "Error al enviar el mensaje: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
