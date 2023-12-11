<?php
include("session.php");
include("connection.php");
$id = $_SESSION['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_comment = $_POST['id_comment'];

    // Verificar si el usuario actual es el autor del comentario
    $sql_verificar_usuario = "SELECT id_user FROM comments WHERE id = '$id_comment'";
    $result_verificar_usuario = $conn->query($sql_verificar_usuario);

    if ($result_verificar_usuario->num_rows > 0) {
        $row_verificar_usuario = $result_verificar_usuario->fetch_assoc();
        $id_user_comentario = $row_verificar_usuario['id_user'];

        if ($id_user_comentario == $id) {
            // Si el usuario actual es el autor del comentario, borrar el comentario y sus valoraciones
            $sql_borrar_valoraciones = "DELETE FROM valoraciones1 WHERE id_comments = '$id_comment'";
            $sql_borrar_comentario = "DELETE FROM comments WHERE id = '$id_comment'";

            if ($conn->query($sql_borrar_valoraciones) === TRUE && $conn->query($sql_borrar_comentario) === TRUE) {
                echo json_encode(array('status' => 'success', 'message' => 'Comentario y valoraciones asociadas borrados correctamente'));
            } else {
                echo json_encode(array('status' => 'error', 'message' => 'Error al borrar el comentario: ' . $conn->error));
            }
        } else {
            echo json_encode(array('status' => 'error', 'message' => 'No tienes permiso para borrar este comentario'));
        }
    } else {
        echo json_encode(array('status' => 'error', 'message' => 'Comentario no encontrado'));
    }
} else {
    echo json_encode(array('status' => 'error', 'message' => 'Método no permitido'));
}

?>
