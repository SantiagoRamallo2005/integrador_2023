<?php
include("sessionAdmin.php");
include("connection.php");
$id = $_SESSION['id'];
$sql = "SELECT * FROM users WHERE id = '$id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>


<?php
include("sessionAdmin.php");
include("connection.php");
$id = $_SESSION['id'];
$sql = "SELECT * FROM users WHERE id = '$id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap-glyphicons.css" rel="stylesheet">
    <link rel="stylesheet" href="css/templatemo-style.css">
    <link rel="stylesheet" href="css/templatemo-style.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Administracion</title>
</head>

<body>
    <div class="w3-sidebar w3-bar-block containerA" style="width: 15%;" id="mySidebar">
    <div class="w3-sidebar w3-bar-block containerA" style="width: 15%;" id="mySidebar">

        <div role="group" aria-label="Basic example" style="margin-top: 25%;">
            <a class="link-offset-2 link-underline link-underline-opacity-0 text-light" href="dashboard.php">
                <div class="w3-bar-item w3-button">Users</div>
            </a>
            <a class="link-offset-2 link-underline link-underline-opacity-0 text-light" href="admin_opiniones.php">
                <div class="w3-bar-item w3-button">Lista de opiniones</div>
            </a>
            <a class="link-offset-2 link-underline link-underline-opacity-0 text-light" href="admin_sugerencias.php">
                <div class="w3-bar-item w3-button">Lista de sugerencias</div>
            </a>
            <a class="link-offset-2 link-underline link-underline-opacity-0 text-light" href="admin_quejas.php">
                <div class="w3-bar-item w3-button">Lista de quejas</div>
            </a>
            <a class="link-offset-2 link-underline link-underline-opacity-0 text-light" href="dashboard.php">
                <div class="w3-bar-item w3-button">Users</div>
            </a>
            <a class="link-offset-2 link-underline link-underline-opacity-0 text-light" href="admin_opiniones.php">
                <div class="w3-bar-item w3-button">Lista de opiniones</div>
            </a>
            <a class="link-offset-2 link-underline link-underline-opacity-0 text-light" href="admin_sugerencias.php">
                <div class="w3-bar-item w3-button">Lista de sugerencias</div>
            </a>
            <a class="link-offset-2 link-underline link-underline-opacity-0 text-light" href="admin_quejas.php">
                <div class="w3-bar-item w3-button">Lista de quejas</div>
            </a>
        </div>
    </div>

    <nav class="navbar navbar-expand-sm navbar-light navbarA">
        <h2 style="color: white;
    margin-left: 17.5%">Administracion</h2>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul style="margin-left: 80%;" class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <button type="button" href="logout.php" class="btn btn-outline-light mr-md-3 mb-2 mb-md-0"><a href="logout.php">Cerrar sesion</a></button>
                </li>
            </ul>
        </div>
    </nav>

    <br>

    <div class="container mt-5" style="margin-left: 16%;">
        <div class="mb-3">
            <label for="filtroNombre">Filtrar por NombreVisible:</label>
            <input type="text" class="form-control" id="filtroNombre">
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>NombreVisible</th>
                    <th>Mail</th>
                    <th>Admin</th>
                    <th>Acciones</th>
                    <th></th>
                </tr>
            </thead>
            <tbody id="tablaUsuarios">
                <?php

                // Consulta SQL para obtener todos los usuarios
                $sql = "SELECT * FROM users";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Mostrar los usuarios en la tabla
                    while ($row = $result->fetch_assoc()) {
                        $condicion = $row['condicion'];
                        $admin = $row['adminValue'];
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['nombre'] . "</td>";
                        echo "<td>" . $row['nombreVisible'] . "</td>";
                        echo "<td>" . $row['mail'] . "</td>";
                        echo "<td>" . ($row['adminValue'] == 1 ? 'Sí' : 'No') . "</td>";
                        echo "<td>";
                        if ($condicion == 0) {
                            echo '<button class="btn btn-danger btn-ban" id="' . $row['id'] . '">Ban</button>';
                        } else if ($condicion == 1) {
                            echo '<button class="btn btn-secondary btn-ban" id="' . $row['id'] . '">Rehabilitar</button>';
                        };
                        echo "</td>";
                        echo "<td>";
                        if ($admin == 0) {
                            echo '<button class="btn btn-success btn-admin" id="' . $row['id'] . '">Admin</button>';
                        } else if ($admin == 1) {
                            echo '<button class="btn btn-secondary btn-admin" id="' . $row['id'] . '">Quitar</button>';
                        };
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "0 resultados";
                }
                ?>
            </tbody>
        </table>
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="js/admin_panel.js"></script>

<script src="js/admin_panel.js"></script>

</html>