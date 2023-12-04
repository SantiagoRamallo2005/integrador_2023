<?php
// Configuración de la conexión a la base de datos (actualiza con tus propios detalles)
include("connection.php");

$idUser = $_POST['idUser'];

// Obtener la ID del admin (ajusta esto según tu aplicación, por ejemplo, desde una sesión)
$idAdmin = "1";

// Agregar el ban
$sql_ban = "INSERT INTO bans (id_user, id_admin) VALUES ('$idUser', '$idAdmin')";
$result_ban = $conn->query($sql_ban);

if ($result_ban === TRUE) {
    echo json_encode(array('status' => 'success', 'message' => 'Usuario baneado correctamente.'));
} else {
    echo json_encode(array('status' => 'error', 'message' => 'Error al banear usuario: ' . $conn->error));
}

// Cerrar la conexión
$conn->close();
?>
