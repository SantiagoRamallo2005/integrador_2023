<?php
include("connection.php");

$idUser = $_POST['idUser'];

$check_sql = "SELECT * FROM `users` WHERE id = '$idUser'";
$check_result = mysqli_query($conn, $check_sql);
$check_row = mysqli_fetch_array($check_result);
$check_num = $check_row['adminValue'];

if ($check_num == 0) {
        $admin_upd = "UPDATE `users` SET adminValue = 1 WHERE id = '$idUser'";

        if ($conn->query($admin_upd)) {
            echo json_encode(["status" => "exito"]);
        } else {
            echo json_encode(["status" => "errorUp1"]);
        }
} else if ($check_num == 1) {
        $admin_upd = "UPDATE `users` SET adminValue = 0 WHERE id = '$idUser'";

        if ($conn->query($admin_upd)) {
            echo json_encode(["status" => "exito"]);
        } else {
            echo json_encode(["status" => "errorUp2"]);
        }
} else {
    echo json_encode(["status" => "errorCheck"]);
};

// Cerrar la conexión
$conn->close();
?>
