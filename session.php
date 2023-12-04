<?php
include_once('connection.php');

session_start();

if (!isset($_SESSION['id'])) {
    header("Location: index.php");
}
?>