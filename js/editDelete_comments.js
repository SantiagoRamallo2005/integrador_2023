$(document).ready(function() {
    // Evento al hacer clic en el botón "Editar"
    $("#comentarios").on("click", ".btn-editar", function() {
        var id_comment = $(this).data("id-comment");

        // Obtener el contenido actual del comentario y mostrarlo en el modal
        var contenidoActual = $("#comentariosPublicos").find("[data-id='" + id_comment + "']").find("p").text();
        $("#contenidoEditar").val(contenidoActual);

        // Evento de envío del formulario de edición
        $("#formEditarComentario").submit(function(e) {
            e.preventDefault();
            
            // Realizar la solicitud AJAX para editar el comentario
            $.ajax({
                type: "POST",
                url: "mod_editarComment.php", // Archivo PHP que maneja la edición del comentario
                data: {
                    id_comment: id_comment,
                    contenido: $("#contenidoEditar").val()
                },
                dataType: 'json',
                success: function(response) {
                    // Mostrar mensaje de éxito o error con SweetAlert
                    if (response.status === 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Éxito',
                            text: response.message
                        });

                        // Cerrar el modal después de editar
                        $('#modalEditar').modal('hide');
                        
                        // Recargar los comentarios después de la edición
                        cargarComentariosPublicos();
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: response.message
                        });
                    }
                },
                error: function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Error al realizar la solicitud AJAX para editar el comentario'
                    });
                }
            });
        });
    });

    // Evento al hacer clic en el botón "Borrar"
    $("#comentarios").on("click", ".btn-borrar", function() {
        var id_comment = $(this).data("id-comment");

        // Confirmar antes de borrar el comentario
        Swal.fire({
            title: '¿Estás seguro?',
            text: 'Esta acción eliminará el comentario y sus valoraciones asociadas.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, borrar'
        }).then((result) => {
            if (result.isConfirmed) {
                // Realizar la solicitud AJAX para borrar el comentario
                $.ajax({
                    type: "POST",
                    url: "mod_borrarComment.php", // Archivo PHP que maneja el borrado del comentario
                    data: {
                        id_comment: id_comment
                    },
                    dataType: 'json',
                    success: function(response) {
                        // Mostrar mensaje de éxito o error con SweetAlert
                        if (response.status === 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Éxito',
                                text: response.message
                            });

                            // Recargar los comentarios después del borrado
                            cargarComentariosPublicos();
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: response.message
                            });
                        }
                    },
                    error: function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Error al realizar la solicitud AJAX para borrar el comentario'
                        });
                    }
                });
            }
        });
    });

    // ... (código posterior)
});
