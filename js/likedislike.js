$(document).ready(function() {
    // Evento al hacer clic en el botón "Like"
    $("#comentarioOpinion").on("click", ".btn-like", function() {
        valorarComentario($(this).data("id-comment"), 1);
    });

    // Evento al hacer clic en el botón "Dislike"
    $("#comentarioOpinion").on("click", ".btn-dislike", function() {
        valorarComentario($(this).data("id-comment"), 0);
    });

    $("#comentarioSugerencia").on("click", ".btn-like", function() {
        valorarComentario($(this).data("id-comment"), 1);
    });

    // Evento al hacer clic en el botón "Dislike"
    $("#comentarioSugerencia").on("click", ".btn-dislike", function() {
        valorarComentario($(this).data("id-comment"), 0);
    });

    $("#comentarioQueja").on("click", ".btn-like", function() {
        valorarComentario($(this).data("id-comment"), 1);
    });

    // Evento al hacer clic en el botón "Dislike"
    $("#comentarioQueja").on("click", ".btn-dislike", function() {
        valorarComentario($(this).data("id-comment"), 0);
    });

    function valorarComentario(id_comment, tipo) {
        // Realizar la solicitud AJAX para valorar el comentario
        $.ajax({
            type: "POST",
            url: "mod_valoraciones.php", // Archivo PHP que maneja la valoración del comentario
            data: {
                id_comment: id_comment,
                id_user: 1, // Reemplaza con la lógica para obtener el ID del usuario actual
                tipo: tipo
            },
            dataType: 'json',
            success: function(response) {
                // Mostrar mensaje de éxito o error con SweetAlert
                if (response.status === 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Éxito',
                        text: response.message
                    }).then((result) => {
                        /* Read more about isConfirmed, isDenied below */
                        if (result.isConfirmed) {
                            location.reload();
                        } 
                      });

                    // Recargar los comentarios después de la valoración
                    cargarComentariosPublicos();
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: response.message
                    });
                }
            },
            error: function(error) {
                console.log(error);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Hubo un error al procesar la solicitud'
                });
            }
        });
    }
});
