<?php
// Datos de conexión a la base de datos
$servername = "localhost";
$username = "id22185463_root"; // Tu nombre de usuario de MySQL
$password = "123456Sistemas/"; // Tu contraseña de MySQL
$database = "id22185463_bd_contactos"; // El nombre de tu base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Recibir los datos del formulario y validarlos
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];

// Preparar la sentencia SQL con una sentencia preparada
$sql = "INSERT INTO contactos (nombre, email, telefono, mensaje) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

// Vincular parámetros y ejecutar la sentencia
$stmt->bind_param("ssss", $name, $email, $phone, $message);

if ($stmt->execute()) {
    echo "Mensaje enviado correctamente";
} else {
    echo "Error al enviar el mensaje: " . $stmt->error;
}

// Cerrar la conexión y liberar recursos
$stmt->close();
$conn->close();
?>
