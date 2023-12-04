<?php
include("connection.php");
 
$filtroNombre = $_POST['filtroNombre'];

// Construir la consulta SQL con el filtro
$sql = "SELECT * FROM users";
if (!empty($filtroNombre)) {
    $sql .= " WHERE nombreVisible LIKE '%$filtroNombre%'";
}

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $usuarios = array();
    while ($row = $result->fetch_assoc()) {
        $usuarios[] = $row;
    }
    echo json_encode($usuarios);
} else {
    echo json_encode(array('status' => 'success', 'message' => 'No hay usuarios disponibles.'));
}

// Cerrar la conexión
$conn->close();
?>
