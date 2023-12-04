<?php
// Configuración de la conexión a la base de datos (actualiza con tus propios detalles)
include("connection.php");

$idUser = $_POST['idUser'];

// Cambiar el estado de adminValue
$sql_admin = "UPDATE users SET adminValue = 1 WHERE id = '$idUser'";
$result_admin = $conn->query($sql_admin);

if ($result_admin === TRUE) {
    echo json_encode(array('status' => 'success', 'message' => 'Estado de adminValue cambiado correctamente.'));
} else {
    echo json_encode(array('status' => 'error', 'message' => 'Error al cambiar el estado de adminValue: ' . $conn->error));
}

// Cerrar la conexión
$conn->close();
?>
