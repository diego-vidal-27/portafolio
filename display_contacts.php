<?php
$servername = "localhost";
$username = "id22185463_root"; 
$password = "123456Sistemas/"; 
$database = "id22185463_bd_contactos";


$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "SELECT * FROM contactos";
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Contactos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        h1 {
            color: #333;
            text-align: center;
            margin-top: 50px;
        }
        table {
            width: 80%;
            margin: 0 auto;
            border-collapse: collapse;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #007bff;
            color: #fff;
        }
        tr:hover {
            background-color: #f2f2f2;
        }
        td {
            color: #555;
        }
        .btn {
            display: inline-block;
            padding: 6px 12px;
            margin-bottom: 0;
            font-size: 14px;
            font-weight: 400;
            line-height: 1.42857143;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            cursor: pointer;
            border: 1px solid transparent;
            border-radius: 4px;
            background-color: #007bff;
            color: #fff;
            border-color: #007bff;
        }
        .btn:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .exit-btn {
            display: block;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>Lista de Contactos</h1>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Correo Electrónico</th>
                <th>Número de Teléfono</th>
                <th>Mensaje</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['nombre'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['telefono'] . "</td>";
                    echo "<td>" . $row['mensaje'] . "</td>";
                    echo "<td><a href='modify_contact.php?id=" . $row['id'] . "' class='btn'>Modificar</a> <a href='delete_contact.php?id=" . $row['id'] . "' class='btn'>Eliminar</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No hay contactos</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <a href="contact.html" class="exit-btn">Volver a la página de contacto</a>
</body>
</html>
