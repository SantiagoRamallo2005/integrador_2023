<?php
include("connection.php");

$idComm = $_POST['idComm'];



    $sql = "DELETE FROM `comments` WHERE id = '$idComm'";
    
    if ($conn->query($sql) === TRUE) {
        echo json_encode(["status" => "exito"]);
    } else {
        echo json_encode(["status" => "error"]);
    }
// Cerrar la conexión
$conn->close();
?>
