<?php
include("connection.php");
include("sessionAdmin.php");

$idUser = $_POST['idUser'];
//$idAdmin = $id;

// Agregar el ban
$check_sql = "SELECT * FROM `users` WHERE id = '$idUser'";
$check_result = mysqli_query($conn, $check_sql);
$check_row = mysqli_fetch_array($check_result);
$check_num = $check_row['condicion'];

if ($check_num == 0) {
    $ban_sql = "INSERT INTO bans (id_user, id_admin) VALUES ($idUser, $id)";
    
    if ($conn->query($ban_sql) === TRUE) {
        $ban_upd = "UPDATE `users` SET condicion = 1 WHERE id = '$idUser'";

        if ($conn->query($ban_upd)) {
            echo json_encode(["status" => "ban"]);
        } else {
            echo json_encode(["status" => "errorUp"]);
        }
    } else {
        echo json_encode(["status" => "errorIns"]);
    }
} else if ($check_num == 1) {
    $ban_sql = "DELETE FROM bans WHERE id_user = '$idUser'";
    
    if ($conn->query($ban_sql) === TRUE) {
        $ban_upd = "UPDATE `users` SET condicion = 0 WHERE id = '$idUser'";

        if ($conn->query($ban_upd)) {

            echo json_encode(["status" => "reah"]);
        } else {
            echo json_encode(["status" => "errorUp"]);
        }
    } else {
        echo json_encode(["status" => "errorDel"]);
    }
} else {
    echo json_encode(["status" => "errorCheck"]);
};

// Cerrar la conexión
$conn->close();
?>
