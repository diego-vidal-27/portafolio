<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['contact_id'])) {
    $contact_id = $_POST['contact_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    $servername = "localhost";
    $username = "id22185463_root"; 
    $password = "123456Sistemas/"; 
    $database = "id22185463_bd_contactos";
    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $sql = "UPDATE contactos SET nombre=?, email=?, telefono=?, mensaje=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $name, $email, $phone, $message, $contact_id);

    if ($stmt->execute()) {
        header("Location: display_contacts.php");
        exit;
    } else {
        echo "Error al actualizar los datos del contacto: " . $stmt->error;
    }

    $conn->close();
} else {
    header("Location: display_contacts.php");
    exit;
}
?>
