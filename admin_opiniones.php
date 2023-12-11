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
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Administracion</title>
</head>

<body>
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
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Usuario</th>
                    <th>Visibilidad</th>
                    <th>Contenido</th>
                    <th>Fecha</th>
                    <th>
                        <button id="pos" type="button" class="btn btn-outline-dark">Positivas  ↨</button>
                    </th> 
                    <th>
                        <button id="neg" type="button" class="btn btn-outline-dark">Negativas  ↨</button>
                    </th>
                    <th></th>
                </tr>
            </thead>
            <tbody id="tablaUsuarios">
                <?php

                // Consulta SQL para obtener todos los usuarios
                $sql = "SELECT c.*, u.nombreVisible AS nombre_usuario FROM comments c
                JOIN users u ON c.id_user = u.id
                WHERE c.tipo = 'opinion'";
                $result = $conn->query($sql);

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td data-column='id'>" . $row['id'] . "</td>";
                    echo "<td data-column='nombre_usuario'>" . $row['nombre_usuario'] . "</td>";
                    echo "<td data-column='visibilidad'>" . $row['visibilidad'] . "</td>";
                    echo "<td data-column='contenido'>" . $row['contenido'] . "</td>";
                    echo "<td data-column='fechaHora'>" . $row['fechaHora'] . "</td>";
                    echo "<td data-column='valoracionesPos'>" . $row['valoracionesPos'] . "</td>";
                    echo "<td data-column='valoracionesNeg'>" . $row['valoracionesNeg'] . "</td>";
                    echo '<td><button class="btn btn-danger btn-com" id="' . $row['id'] . '">Eliminar</button></td>';
                    echo "</tr>";
                }

                ?>
            </tbody>
        </table>
    </div>

</body>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const btnPos = document.getElementById("pos");
        const btnNeg = document.getElementById("neg");

        btnPos.addEventListener("click", function () {
            sortTable("valoracionesPos");
        });

        btnNeg.addEventListener("click", function () {
            sortTable("valoracionesNeg");
        });

        function sortTable(columnName) {
            const table = document.getElementById("tablaUsuarios");
            const rows = Array.from(table.getElementsByTagName("tr"));

            rows.sort(function (a, b) {
                const aValue = parseInt(a.querySelector("td[data-column='" + columnName + "']").innerText);
                const bValue = parseInt(b.querySelector("td[data-column='" + columnName + "']").innerText);

                return bValue - aValue;
            });

            rows.forEach(function (row) {
                table.appendChild(row);
            });
        }
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="js/admin_comments.js"></script>

</html>