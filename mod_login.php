<?php
// Iniciar la sesión
session_start();

include("connection.php");

// Obtener los valores del formulario de inicio de sesión
$loginMail = $_POST['loginMail'];
$loginPassword = $_POST['loginPassword'];

// Buscar el usuario en la base de datos
$sql = "SELECT mail, nombreVisible, contrasena FROM users WHERE mail = '$loginMail'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Usuario encontrado
    $row = $result->fetch_assoc();
    $hashedPassword = $row['contrasena'];

    // Verificar la contraseña
    if (password_verify($loginPassword, $hashedPassword)) {
        // Iniciar sesión y establecer variables de sesión
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $row['username'];
        $_SESSION['mail'] = $row['mail'];

        header("Location: logged.php");
        echo "Inicio de sesión exitoso";
    } else {
        echo "La contraseña no es válida";
    }
} else {
    echo "Usuario no encontrado";
}

// Cerrar la conexión
$conn->close();
?>
