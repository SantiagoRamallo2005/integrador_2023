$(document).ready(function() {
    // Cargar comentarios públicos al cargar la página
    cargarComentariosPublicos();

    function cargarComentariosPublicos() {
        // Realizar la solicitud AJAX para obtener comentarios públicos
        $.ajax({
            type: "GET",
            url: "mod_comments_opinion.php", // Archivo PHP que obtiene comentarios públicos
            dataType: 'html',
            success: function(response) {
                // Mostrar comentarios en la sección correspondiente
                $("#comentarioOpinion").html(response);
            },
            error: function(error) {
                console.log(error);
            }
        });
        $.ajax({
            type: "GET",
            url: "mod_comments_sugerencia.php", // Archivo PHP que obtiene comentarios públicos
            dataType: 'html',
            success: function(response) {
                // Mostrar comentarios en la sección correspondiente
                $("#comentarioSugerencia").html(response);
            },
            error: function(error) {
                console.log(error);
            }
        });
        $.ajax({
            type: "GET",
            url: "mod_comments_queja.php", // Archivo PHP que obtiene comentarios públicos
            dataType: 'html',
            success: function(response) {
                // Mostrar comentarios en la sección correspondiente
                $("#comentarioQueja").html(response);
            },
            error: function(error) {
                console.log(error);
            }
        });
    }
});
