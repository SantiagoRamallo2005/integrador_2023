<?php
include("connection.php");

// Obtener comentarios de tipo "opinion" y visibilidad "publica"
// Obtener comentarios de tipo "opinion" y visibilidad "publica"
$sql = "SELECT c.*, u.nombreVisible AS nombre_usuario FROM comments c
        JOIN users u ON c.id_user = u.id
        WHERE c.tipo = 'queja' AND c.visibilidad = 'publica'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Crear una lista de comentarios
    $comentarios = '<ul class="list-group">';
    while ($row = $result->fetch_assoc()) {
        $comentarios .= '<li class="list-group-item">';
        $comentarios .= '<strong>' . $row['nombre_usuario'] . '</strong> <br>';
        $comentarios .= '<span class="text-muted small">' . date("F j, Y, g:i a", strtotime($row['fechaHora'])) . '</span>';
        $comentarios .= '<p>' . $row['contenido'] . '</p>';
        $comentarios .= '<button type="button" class="btn btn-success" data-toggle="modal" data-target="#Modal" data-id-comment="' . $row['id'] . '">Like</button><span class="">' . $row['valoracionesPos'] . '</span>';
        $comentarios .= '<button type="button" class="btn btn-danger ml-5" data-toggle="modal" data-target="#Modal" data-id-comment="' . $row['id'] . '">Dislike</button><span class="">' . $row['valoracionesNeg'] . '</span>';
        $comentarios .= '</li>';
    }
    $comentarios .= '</ul>';

    echo $comentarios;
} else {
    echo "No hay comentarios públicos disponibles.";
}

?>