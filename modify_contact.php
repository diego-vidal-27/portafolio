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

    $sql = "SELECT * FROM contactos WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $contact_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0) {
        $contact = $result->fetch_assoc();
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Modificar Contacto</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    background-color: #f8f9fa;
                    margin: 0;
                    padding: 0;
                }
                h1 {
                    text-align: center;
                    margin-top: 50px;
                }
                form {
                    max-width: 600px;
                    margin: 0 auto;
                    background-color: #fff;
                    padding: 20px;
                    border-radius: 8px;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                }
                label {
                    display: block;
                    margin-bottom: 5px;
                }
                input[type="text"],
                input[type="email"],
                input[type="tel"],
                textarea {
                    width: 100%;
                    padding: 10px;
                    margin-bottom: 15px;
                    border: 1px solid #ccc;
                    border-radius: 4px;
                    box-sizing: border-box;
                }
                input[type="submit"] {
                    background-color: #007bff;
                    color: #fff;
                    padding: 10px 20px;
                    border: none;
                    border-radius: 4px;
                    cursor: pointer;
                }
                input[type="submit"]:hover {
                    background-color: #0056b3;
                }
            </style>
        </head>
        <body>
            <h1>Modificar Contacto</h1>
            <form action="process_modify.php" method="post">
                <input type="hidden" name="contact_id" value="<?php echo $contact['id']; ?>">
                <label for="name">Nombre:</label>
                <input type="text" name="name" id="name" value="<?php echo $contact['nombre']; ?>"><br>
                <label for="email">Correo Electrónico:</label>
                <input type="email" name="email" id="email" value="<?php echo $contact['email']; ?>"><br>
                <label for="phone">Número de Teléfono:</label>
                <input type="tel" name="phone" id="phone" value="<?php echo $contact['telefono']; ?>"><br>
                <label for="message">Mensaje:</label><br>
                <textarea name="message" id="message" rows="4" cols="50"><?php echo $contact['mensaje']; ?></textarea><br>
                <input type="submit" value="Guardar Cambios">
            </form>
        </body>
        </html>
        <?php
    } else {
        echo "No se encontró un contacto con el ID proporcionado.";
    }

    $conn->close();
} else {
    header("Location: display_contacts.php");
    exit;
}
?>
