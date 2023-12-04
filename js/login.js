$(document).ready(function() {
    // Manejar el envío del formulario de inicio de sesión con AJAX
    $("#loginForm").submit(function(event) {
        event.preventDefault(); // Evitar que se envíe el formulario de la manera convencional
        
        // Obtener los valores de los campos del formulario de inicio de sesión
        var loginMail = $("#loginMail").val();
        var loginPassword = $("#loginPassword").val();

        // Realizar la solicitud AJAX
        $.ajax({
            type: "POST",
            url: "mod_login.php", // Archivo PHP que maneja el inicio de sesión
            data: {
                loginMail: loginMail,
                loginPassword: loginPassword
            },
            success: function(data) {
                if (data == 'exito') {
                    console.log(data);
                    window.location = "logged.php";
                } else {
                    console.log(data);
                }
            },
            error: function(error) {
                console.log(error);
            }
        });
    });
});