<?php
if(isset($_GET['id']) && !empty($_GET['id'])) {
    $contact_id = $_GET['id'];

    $servername = "localhost";
    $username = "id22185463_root"; 
    $password = "123456Sistemas/"; 
    $database = "id22185463_bd_contactos"; 

   
    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $sql = "DELETE FROM contactos WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $contact_id);

    if ($stmt->execute()) {
        header("Location: display_contacts.php");
        exit;
    } else {
        echo "Error al eliminar el contacto: " . $stmt->error;
    }

    // Cerrar la conexión
    $conn->close();
} else {
    // Si no se proporciona un ID de contacto en la URL, redirigir al usuario de vuelta a la página de visualización de contactos
    header("Location: display_contacts.php");
    exit;
}
?>
