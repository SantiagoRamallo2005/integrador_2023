<?php
include("connection.php");

// Obtener los valores del formulario de registro
$fullName = $_POST['fullName'];
$registerUsername = $_POST['registerUsername'];
$registerEmail = $_POST['registerEmail'];
$registerPassword = $_POST['registerPassword'];
$admin = 0;

$sql_check = "SELECT * FROM users WHERE mail = '$registerEmail'";
$result_check = $conn->query($sql_check);

if ($result_check->num_rows > 0) {
    echo json_encode(["status" => "repetido", "message" => $conn->error]);
} else {
    // Encriptar la contraseña (deberías utilizar métodos más seguros en un entorno de producción)
    $hashedPassword = password_hash($registerPassword, PASSWORD_DEFAULT);

    // Insertar datos en la tabla 'users'
    $sql = "INSERT INTO users (nombre, nombreVisible, mail, contrasena, adminValue) VALUES ('$fullName', '$registerUsername', '$registerEmail', '$hashedPassword', '$admin')";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(["status" => "success"]);
    } else {
        echo json_encode(["status" => "error", "message" => $conn->error]);
    }
}
// Cerrar la conexión
$conn->close();
