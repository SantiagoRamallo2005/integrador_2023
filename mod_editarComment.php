<?php
include("session.php");
include("connection.php");
$id = $_SESSION['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_comment = $_POST['id_comment'];
    $contenido = $_POST['contenido'];

    // Verificar si el usuario actual es el autor del comentario
    $sql_verificar_usuario = "SELECT id_user FROM comments WHERE id = '$id_comment'";
    $result_verificar_usuario = $conn->query($sql_verificar_usuario);

    if ($result_verificar_usuario->num_rows > 0) {
        $row_verificar_usuario = $result_verificar_usuario->fetch_assoc();
        $id_user_comentario = $row_verificar_usuario['id_user'];

        if ($id_user_comentario == $id) {
            // Si el usuario actual es el autor del comentario, actualizar el comentario
            $sql_actualizar_comentario = "UPDATE comments SET contenido = '$contenido', fechaHora = NOW() WHERE id = '$id_comment'";
            if ($conn->query($sql_actualizar_comentario) === TRUE) {
                echo json_encode(array('status' => 'success', 'message' => 'Comentario editado correctamente'));
            } else {
                echo json_encode(array('status' => 'error', 'message' => 'Error al editar el comentario: ' . $conn->error));
            }
        } else {
            echo json_encode(array('status' => 'error', 'message' => 'No tienes permiso para editar este comentario'));
        }
    } else {
        echo json_encode(array('status' => 'error', 'message' => 'Comentario no encontrado'));
    }
} else {
    echo json_encode(array('status' => 'error', 'message' => 'Método no permitido'));
}

?>
