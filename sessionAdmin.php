<?php
include_once('connection.php');

session_start();

if (!isset($_SESSION['id'])) {
    header("Location: index.php");
}


$id = $_SESSION['id'];
$sql = "SELECT * FROM users WHERE id = '$id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if($row['adminValue'] !== "1"){
    header("Location: logged.php");
}
?>