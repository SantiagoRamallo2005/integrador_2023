<?php
// Iniciar la sesión
session_start();

include("connection.php");

// Obtener los valores del formulario de inicio de sesión
$loginMail = mysqli_real_escape_string($conn, $_POST['loginMail']);
$loginPassword = mysqli_real_escape_string($conn, $_POST['loginPassword']);

// Buscar el usuario en la base de datos
$sql = "SELECT * FROM users WHERE mail = '$loginMail'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Usuario encontrado
    $row = $result->fetch_assoc();
    $hashedPassword = $row['contrasena'];

    // Verificar la contraseña
    if (password_verify($loginPassword, $hashedPassword)) {
        // Iniciar sesión y establecer variables de sesión
        echo 'exito';
        $_SESSION['id'] = $row['id'];
        
    } else {
        echo "passError";
    }
} else {
    echo "inexistente";
}

// Cerrar la conexión
$conn->close();
?>

