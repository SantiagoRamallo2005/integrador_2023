<?php
include("session.php");
include("connection.php");
$id = $_SESSION['id'];
$sql = "SELECT * FROM users WHERE id = '$id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$id = $_SESSION['id'];
$sql = "SELECT * FROM users WHERE id = '$id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Journey HTML CSS Template</title>
    <!-- 
Journey Template 
http://www.templatemo.com/tm-511-journey
-->
    <!-- load stylesheets -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700"> <!-- Google web font "Open Sans" -->
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css"> <!-- Font Awesome -->
    <link rel="stylesheet" href="css/bootstrap.min.css"> <!-- Bootstrap style -->
    <link rel="stylesheet" type="text/css" href="css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css" />
    <link rel="stylesheet" href="css/templatemo-style.css"> <!-- Templatemo style -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
              <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
              <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
          <![endif]-->
</head>

<body>
    <div class="tm-main-content" id="top">
        <div class="tm-top-bar-bg"></div>
        <div class="tm-top-bar" id="tm-top-bar">
            <div class="container">
                <div class="row">
                    <nav class="navbar navbar-expand-lg narbar-light">
                        <a class="navbar-brand mr-auto" href="#">
                            <img src="img/logo.png" alt="Site logo">
                        </a>
                        <button type="button" id="nav-toggle" class="navbar-toggler collapsed" data-toggle="collapse" data-target="#mainNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div id="mainNav" class="collapse navbar-collapse tm-bg-white">
                            <div class="navbar-nav ml-auto d-flex">
                                <div class="nav-item">
                                    <a class="nav-link active" href="#top">Home <span class="sr-only">(current)</span></a>
                                </div>
                                <div class="nav-item">
                                    <a class="nav-link" href="#tm-section-1">Otras opiniones</a>
                                </div>

                                <div class="ms-auto nav-item">
                                    <div class="nav-link">
                                    <div class="nav-link">
                                        <?php
                                        echo $row['nombreVisible'];
                                        echo $row['nombreVisible'];
                                        ?>
                                    </div>
                                </div>
                                <div class="ms-auto nav-item">
                                    <form class="nav-link" action="logout.php" method="post">
                                        <button type="submit" >Cerrar Sesión</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- .tm-top-bar -->
        <br>
        <br>
        <div class="tm-page-wrap mx-auto">
            <section class="tm-banner">
                <div class="tm-container-outer tm-banner-bg">
                    <div class="container">

                        <div class="row tm-banner-row tm-banner-row-header">
                            <div class="col-xs-12">
                                <div class="tm-banner-header">
                                    <h1 class="text-uppercase tm-banner-title">Empecemos!</h1>
                                    <img src="img/dots-3.png" alt="Dots">
                                    <p class="tm-banner-subtitle">Tus opiniones nos importan</p>
                                    <a href="javascript:void(0)" class="tm-down-arrow-link"><i class="fa fa-2x fa-angle-down tm-down-arrow"></i></a>
                                </div>
                            </div> <!-- col-xs-12 -->
                        </div> <!-- row -->
                        <div class="row tm-banner-row" id="tm-section-search">

                            <form id="commentForm" class="tm-search-form tm-section-pad-2">
                            <form id="commentForm" class="tm-search-form tm-section-pad-2">
                                <div class="form-row tm-search-form-row">
                                    <div class="form-group tm-form-group tm-form-group-pad tm-form-group-1">
                                        <label for="inputCity">Escribe tu opinion</label>
                                        <textarea name="destination" type="text" class="form-control" id="opinion" placeholder="Escribe tu comentario"></textarea>
                                        <textarea name="destination" type="text" class="form-control" id="opinion" placeholder="Escribe tu comentario"></textarea>
                                    </div>
                                    <div class="form-group tm-form-group tm-form-group-1">
                                        <div class="form-group tm-form-group tm-form-group-pad tm-form-group-2">
                                            <label for="inputRoom">Tipo de comentario</label>
                                            <select name="room" class="form-control tm-select" id="tipo">
                                            <select name="room" class="form-control tm-select" id="tipo">
                                                <option value="Opinion" selected>Opinion</option>
                                                <option value="Queja">Queja</option>
                                                <option value="Sugerencia">Sugerencia</option>
                                            </select>
                                        </div>
                                        <div class="form-group tm-form-group tm-form-group-pad tm-form-group-2">
                                            <label for="inputAdult">¿Tu opinion sera publica?</label>
                                            <select name="adult" class="form-control tm-select" id="visibilidad">
                                            <select name="adult" class="form-control tm-select" id="visibilidad">
                                                <option value="Publica" selected>Publica</option>
                                                <option value="Privada">Privada</option>
                                            </select>
                                        </div>
                                    </div>
                                </div> <!-- form-row -->
                                <div class="form-row tm-search-form-row">

                                    <div class="form-group tm-form-group tm-form-group-pad tm-form-group-3" style="width: 0%;">
                                        <div name="check-in" type="text" class="form-control" id="inputCheckIn" placeholder="Check In"></div>
                                    </div>
                                    <div class="form-group tm-form-group tm-form-group-pad tm-form-group-3" style="width: 0%;">

                                        <div name="check-out" type="text" class="form-control" id="inputCheckOut" placeholder="Check Out"></div>
                                    </div>
                                    <div class="form-group tm-form-group tm-form-group-pad tm-form-group-custom">
                                        <label for="btnSubmit">&nbsp;</label>
                                        <button type="submit" class="btn btn-primary tm-btn tm-btn-search text-uppercase" id="btnSubmit" href="logout.php">Publicar</button>
                                        <button type="submit" class="btn btn-primary tm-btn tm-btn-search text-uppercase" id="btnSubmit" href="logout.php">Publicar</button>
                                    </div>
                                </div>
                            </form>

                        </div> <!-- row -->
                        <div class="tm-banner-overlay"></div>
                    </div> <!-- .container -->
                </div> <!-- .tm-container-outer -->
            </section>
        </div>
        <br><br><br><br>
        <div class="tm-page-wrap mx-auto">
            <div class="tm-container-outer" id="tm-section-1">
                <ul class="nav nav-pills tm-tabs-links">
                    <li class="tm-tab-link-li">
                        <a href="#1a" data-toggle="tab" class="tm-tab-link">
                            <img src="img/opinion.png" alt="Image" class="img-fluid">
                            Opiniones
                        </a>
                    </li>
                    <li class="tm-tab-link-li">
                        <a href="#2a" data-toggle="tab" class="tm-tab-link">
                            <img src="img/sugerencia.png" alt="Image" class="img-fluid">
                            Sugerencias
                        </a>
                    </li>
                    <li class="tm-tab-link-li">
                        <a href="#3a" data-toggle="tab" class="tm-tab-link">
                            <img src="img/queja.png" alt="Image" class="img-fluid">
                            Quejas
                        </a>
                    </li>

                </ul>
                <div class="tab-content clearfix" id="comentarios">
                <div class="tab-content clearfix" id="comentarios">

                    <!-- Tab 1 -->
                    <div class="tab-pane fade" id="1a">
                        <div class="tm-recommended-place-wrap" id="comentarioOpinion">
                        <div class="tm-recommended-place-wrap" id="comentarioOpinion">

                        </div>
                    </div> <!-- tab-pane -->

                    <!-- Tab 2 -->
                    <div class="tab-pane fade" id="2a">
                        <div class="tm-recommended-place-wrap" id="comentarioSugerencia">
                        <div class="tm-recommended-place-wrap" id="comentarioSugerencia">

                        </div>
                    </div> <!-- tab-pane -->

                    <!-- Tab 3 -->
                    <div class="tab-pane fade" id="3a">
                        <div class="tm-recommended-place-wrap" id="comentarioQueja">
                        <div class="tm-recommended-place-wrap" id="comentarioQueja">

                        </div>
                    </div> <!-- tab-pane -->

                </div>
            </div>

            <!-- Modal de Edición -->
            <div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="modalEditarLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalEditarLabel">Editar Comentario</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="formEditarComentario">
                                <div class="form-group">
                                    <label for="contenidoEditar">Nuevo Contenido:</label>
                                    <textarea class="form-control" id="contenidoEditar" name="contenidoEditar" rows="4" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal de Edición -->
            <div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="modalEditarLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalEditarLabel">Editar Comentario</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="formEditarComentario">
                                <div class="form-group">
                                    <label for="contenidoEditar">Nuevo Contenido:</label>
                                    <textarea class="form-control" id="contenidoEditar" name="contenidoEditar" rows="4" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <footer class="tm-container-outer">
                <p class="mb-0">Copyright © <span class="tm-current-year">2018</span> Your Company

                    . Designed by <a rel="nofollow" href="http://www.google.com/+templatemo" target="_parent">Template Mo</a></p>
            </footer>
        </div>
    </div> <!-- .main-content -->

    <!-- load JS files -->
    <script src="js/jquery-1.11.3.min.js"></script> <!-- jQuery (https://jquery.com/download/) -->
    <script src="js/popper.min.js"></script> <!-- https://popper.js.org/ -->
    <script src="js/bootstrap.min.js"></script> <!-- https://getbootstrap.com/ -->
    <script src="js/datepicker.min.js"></script> <!-- https://github.com/qodesmith/datepicker -->
    <script src="js/jquery.singlePageNav.min.js"></script> <!-- Single Page Nav (https://github.com/ChrisWojcik/single-page-nav) -->
    <script src="slick/slick.min.js"></script> <!-- http://kenwheeler.github.io/slick/ -->
    <script src="js/jquery.scrollTo.min.js"></script> <!-- https://github.com/flesler/jquery.scrollTo -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        /* DOM is ready
        ------------------------------------------------*/
        $(function() {

            // Change top navbar on scroll
            $(window).on("scroll", function() {
                if ($(window).scrollTop() > 100) {
                    $(".tm-top-bar").addClass("active");
                } else {
                    $(".tm-top-bar").removeClass("active");
                }
            });

            // Smooth scroll to search form
            $('.tm-down-arrow-link').click(function() {
                $.scrollTo('#tm-section-search', 300, {
                    easing: 'linear'
                });
            });

            // Date Picker in Search form
            var pickerCheckIn = datepicker('#inputCheckIn');
            var pickerCheckOut = datepicker('#inputCheckOut');

            // Update nav links on scroll
            $('#tm-top-bar').singlePageNav({
                currentClass: 'active',
                offset: 60
            });

            // Close navbar after clicked
            $('.nav-link').click(function() {
                $('#mainNav').removeClass('show');
            });

            // Slick Carousel
            $('.tm-slideshow').slick({
                infinite: true,
                arrows: true,
                slidesToShow: 1,
                slidesToScroll: 1
            });

            $('.tm-current-year').text(new Date().getFullYear()); // Update year in copyright           
        });
    </script>
    <script src="js/registro.js"></script>
    <script src="js/login.js"></script>
    <script src="js/comment.js"></script>
    <script src="js/show_comments.js"></script>
    <script src="js/likedislike.js"></script>
    <script src="js/editDelete_comments.js"></script>
    <script src="js/comment.js"></script>
    <script src="js/show_comments.js"></script>
    <script src="js/likedislike.js"></script>
    <script src="js/editDelete_comments.js"></script>
</body>

</html>