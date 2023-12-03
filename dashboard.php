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
    <title>Administracion policia</title>
</head>

<body>
<div class="w3-sidebar w3-bar-block containerA" style="width: 15%;" id="mySidebar">

        <div role="group" aria-label="Basic example" style="margin-top: 25%;">
            <a class="link-offset-2 link-underline link-underline-opacity-0 text-light" href="ingresar_alumno.php"><div class="w3-bar-item w3-button">Carga de datos de alumnos</div></a>
            <a class="link-offset-2 link-underline link-underline-opacity-0 text-light" href="dashboard.php"><div class="w3-bar-item w3-button">Lista de alumnos</div></a>
            <a class="link-offset-2 link-underline link-underline-opacity-0 text-light" href="lista_armas.php"><div class="w3-bar-item w3-button">Lista de armas</div></a>
            <a class="link-offset-2 link-underline link-underline-opacity-0 text-light" href="lista_profesores.php"><div class="w3-bar-item w3-button">Lista de profesores</div></a>
            <a class="link-offset-2 link-underline link-underline-opacity-0 text-light" href="carga_prof.php"><div class="w3-bar-item w3-button">Carga de profesores</div></a>
            <a class="link-offset-2 link-underline link-underline-opacity-0 text-light" href="lista_aulas.php"><div class="w3-bar-item w3-button">Lista de aulas</div></a>
            <a class="link-offset-2 link-underline link-underline-opacity-0 text-light" href="lista_materias.php"><div class="w3-bar-item w3-button">Lista de materias</div></a>
            <a class="link-offset-2 link-underline link-underline-opacity-0 text-light" href="materia_notas.php"><div class="w3-bar-item w3-button">Cargar Notas</div></a>
            <a class="link-offset-2 link-underline link-underline-opacity-0 text-light" href="asignacion_form.php"><div class="w3-bar-item w3-button">Asignacion de aulas</div></a>


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

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</html>