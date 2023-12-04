<?php
// Configuración de la conexión a la base de datos (actualiza con tus propios detalles)
include("session.php");
include("connection.php");
$id = $_SESSION['id'];

//Obtener datos de la solicitud AJAX
$id_comment = $_POST['id_comment'];
$id_user = $id;
$tipo = $_POST['tipo']; // 1 si es "Like", 0 si es "Dislike"

// Verificar si ya existe una valoración del usuario para ese comentario
$sql_verificar = "SELECT * FROM valoraciones1 WHERE id_comments = '$id_comment' AND id_user = '$id_user'";
$result_verificar = $conn->query($sql_verificar);

if ($result_verificar->num_rows > 0) {
    // Si ya existe una valoración, verificar si la valoración es diferente
    $row_verificar = $result_verificar->fetch_assoc();
    $tipo_existente = $row_verificar['tipo'];

    if ($tipo_existente != $tipo) {
        // Si la valoración es diferente, actualizarla
        $id_valoracion_existente = $row_verificar['id'];
        $sql_actualizar = "UPDATE valoraciones1 SET tipo = '$tipo' WHERE id = '$id_valoracion_existente'";
        if ($conn->query($sql_actualizar) === TRUE) {
            // Ajustar las valoraciones positivas y negativas en la tabla 'comments'
            if ($tipo_existente == 1) {
                // Cambiando de positiva a negativa
                $sql_ajustar_positivas = "UPDATE comments SET valoracionesPos = valoracionesPos - 1, valoracionesNeg = valoracionesNeg + 1 WHERE id = '$id_comment'";
            } elseif ($tipo_existente == 0) {
                // Cambiando de negativa a positiva
                $sql_ajustar_positivas = "UPDATE comments SET valoracionesPos = valoracionesPos + 1, valoracionesNeg = valoracionesNeg - 1 WHERE id = '$id_comment'";
            }

            if ($conn->query($sql_ajustar_positivas) === TRUE) {
                echo json_encode(array('status' => 'success', 'message' => 'Valoración actualizada correctamente'));
            } else {
                echo json_encode(array('status' => 'error', 'message' => 'Error al ajustar las valoraciones positivas y negativas: ' . $conn->error));
            }
        } else {
            echo json_encode(array('status' => 'error', 'message' => 'Error al actualizar la valoración existente: ' . $conn->error));
        }
    } else {
        // Si la valoración es la misma, no hacer nada
        echo json_encode(array('status' => 'success', 'message' => 'Ya existe una valoración del usuario para este comentario'));
    }
} else {
    // Si no existe una valoración, insertar una nueva
    $sql_insertar = "INSERT INTO valoraciones1 (id_comments, id_user, tipo) 
                    VALUES ('$id_comment', '$id_user', '$tipo')";

    // Actualizar la tabla 'comments' con la cantidad de "Likes" o "Dislikes"
    if ($conn->query($sql_insertar) === TRUE) {
        if ($tipo == 1) {
            $sql_actualizar_comments = "UPDATE comments SET valoracionesPos = valoracionesPos + 1 WHERE id = '$id_comment'";
        } else {
            $sql_actualizar_comments = "UPDATE comments SET valoracionesNeg = valoracionesNeg + 1 WHERE id = '$id_comment'";
        }

        if ($conn->query($sql_actualizar_comments) === TRUE) {
            echo json_encode(array('status' => 'success', 'message' => 'Valoración registrada correctamente'));
        } else {
            echo json_encode(array('status' => 'error', 'message' => 'Error al actualizar la tabla de comentarios: ' . $conn->error));
        }
    } else {
        echo json_encode(array('status' => 'error', 'message' => 'Error al insertar la valoración: ' . $conn->error));
    }
}

// Cerrar la conexión
$conn->close();
?>
