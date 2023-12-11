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
                                    <a class="nav-link" href="#" data-toggle="modal" data-target="#Modal">Login / Registro</a>
                                </div>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- .tm-top-bar -->
        <!-- Modal -->
        <div class="modal fade" id="Modal" tabindex="100" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 1041 !important;">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Inicio de Sesión / Registro</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Pestañas para cambiar entre formularios -->
                        <ul class="nav nav-tabs" id="myTabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="login-tab" data-toggle="tab" href="#login" role="tab" aria-controls="login" aria-selected="true">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="register-tab" data-toggle="tab" href="#register" role="tab" aria-controls="register" aria-selected="false">Registro</a>
                            </li>
                        </ul>
                        <!-- Contenido de las pestañas -->
                        <div class="tab-content" id="myTabsContent">
                            <!-- Formulario de Login -->
                            <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
                                <form id="loginForm">
                                    <!-- Formulario de inicio de sesión -->
                                    <div class="form-group">
                                        <label for="loginUsername">E-Mail</label>
                                        <input type="email" class="form-control" id="loginMail" placeholder="Ingresa tu usuario">
                                    </div>
                                    <div class="form-group">
                                        <label for="loginPassword">Contraseña</label>
                                        <input type="password" class="form-control" id="loginPassword" placeholder="Ingresa tu contraseña">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                                </form>
                            </div>
                            <!-- Formulario de Registro -->
                            <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                                <form id="registerForm">
                                    <!-- Formulario de registro -->
                                    <div class="form-group">
                                        <label for="fullName">Nombre completo</label>
                                        <input type="text" class="form-control" id="fullName" placeholder="Ingresa tu nombre completo">
                                    </div>
                                    <div class="form-group">
                                        <label for="registerUsername">Nombre de Usuario</label>
                                        <input type="text" class="form-control" id="registerUsername" placeholder="Ingresa tu nombre de usuario">
                                    </div>
                                    <div class="form-group">
                                        <label for="registerEmail">Correo Electrónico</label>
                                        <input type="email" class="form-control" id="registerEmail" placeholder="Ingresa tu correo electrónico">
                                    </div>
                                    <div class="form-group">
                                        <label for="registerPassword">Contraseña</label>
                                        <input type="password" class="form-control" id="registerPassword" placeholder="Ingresa tu contraseña">
                                    </div>
                                    <div class="form-group">
                                        <label for="confirmPassword">Confirmar Contraseña</label>
                                        <input type="password" class="form-control" id="confirmPassword" placeholder="Confirma tu contraseña">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Registrarse</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br><br>
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

                            <form action="index.html" method="get" class="tm-search-form tm-section-pad-2">
                                <div class="form-row tm-search-form-row">
                                    <div class="form-group tm-form-group tm-form-group-pad tm-form-group-1">
                                        <label for="inputCity">Escribe tu opinion</label>
                                        <textarea name="destination" type="text" class="form-control" id="inputCity" placeholder="Escribe tu comentario"></textarea>
                                    </div>
                                    <div class="form-group tm-form-group tm-form-group-1">
                                        <div class="form-group tm-form-group tm-form-group-pad tm-form-group-2">
                                            <label for="inputRoom">Tipo de comentario</label>
                                            <select name="room" class="form-control tm-select" id="inputRoom">
                                                <option value="Opinion" selected>Opinion</option>
                                                <option value="Queja">Queja</option>
                                                <option value="Sugerencia">Sugerencia</option>
                                            </select>
                                        </div>
                                        <div class="form-group tm-form-group tm-form-group-pad tm-form-group-2">
                                            <label for="inputAdult">¿Tu opinion sera publica?</label>
                                            <select name="adult" class="form-control tm-select" id="inputAdult">
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
                                        <button type="button" class="btn btn-primary tm-btn tm-btn-search text-uppercase" data-toggle="modal" data-target="#Modal" id="btnSubmit">Publicar</button>
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

                <!-- Tab 1 -->
                <div class="tab-pane fade" id="1a">
                    <div class="tm-recommended-place-wrap" id="comentarioOpinion">

                    </div>
                </div> <!-- tab-pane -->

                <!-- Tab 2 -->
                <div class="tab-pane fade" id="2a">
                    <div class="tm-recommended-place-wrap" id="comentarioSugerencia">

                    </div>
                </div> <!-- tab-pane -->

                <!-- Tab 3 -->
                <div class="tab-pane fade" id="3a">
                    <div class="tm-recommended-place-wrap" id="comentarioQueja">

                    </div>
                </div> <!-- tab-pane -->

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
    <script src="js/show_commentsIndex.js"></script>

</body>

</html>