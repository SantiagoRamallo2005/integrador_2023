<?php
// Configuración de la conexión a la base de datos (actualiza con tus propios detalles)
include("session.php");
include("connection.php");
$id = $_SESSION['id'];

// Obtener datos del formulario
$id_user = $id; // Asume que 'user_id' es el identificador del usuario logeado
$tipo = $_POST['tipo'];
$visibilidad = $_POST['visibilidad'];
$contenido = $_POST['contenido'];
$fechaHora = date("Y-m-d H:i:s"); // Fecha y hora actual
$valoracionesPos = 0;
$valoracionesNeg = 0;

// Insertar comentario en la tabla 'comments'
$sql = "INSERT INTO comments (id_user, tipo, visibilidad, contenido, fechaHora, valoracionesPos, valoracionesNeg) 
        VALUES ('$id_user', '$tipo', '$visibilidad', '$contenido', '$fechaHora', '$valoracionesPos', '$valoracionesNeg')";

if ($conn->query($sql) === TRUE) {
    echo json_encode(array('status' => 'success', 'message' => 'Comentario agregado correctamente'));
} else {
    echo json_encode(array('status' => 'error', 'message' => 'Error al agregar el comentario: ' . $conn->error));
}

// Cerrar la conexión
$conn->close();
?>