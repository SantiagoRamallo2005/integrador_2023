$(document).ready(function() {
    // Manejar el envío del formulario con AJAX
    $("#commentForm").submit(function(event) {
        event.preventDefault(); // Evitar que se envíe el formulario de la manera convencional

        // Obtener los valores del formulario
        var tipo = $("#tipo").val();
        var visibilidad = $("#visibilidad").val();
        var contenido = $("#opinion").val();

        // Realizar la solicitud AJAX
        $.ajax({
            type: "POST",
            url: "mod_comment.php", // Archivo PHP que maneja la inserción del comentario
            data: {
                tipo: tipo,
                visibilidad: visibilidad,
                contenido: contenido
            },
            dataType: 'json', // Esperar una respuesta en formato JSON
            success: function(response) {
                // Manejar la respuesta del servidor
                if (response.status === 'success') {
                    // Mostrar mensaje de éxito con SweetAlert
                    Swal.fire({
                        icon: 'success',
                        title: 'Éxito',
                        text: response.message
                    });
                    location.reload();
                } else {
                    // Mostrar mensaje de error con SweetAlert
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: response.message
                    });
                }
            },
            error: function(error) {
                console.log(error);
                // Mostrar mensaje de error con SweetAlert
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Hubo un error al procesar la solicitud'
                });
            }
        });
    });
});