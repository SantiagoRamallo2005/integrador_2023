<?php
include_once('connection.php');

session_start();

if (!isset($_SESSION['id'])) {
    header("Location: index.php");
}

$user_id = $_SESSION['id'];

$user_sql = "SELECT * FROM `users` WHERE id = '$user_id'";
$user_result = mysqli_query($conn, $user_sql);

$user_row = mysqli_fetch_row($user_result);



?>