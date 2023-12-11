$(document).ready(function () {
  // Manejar el envío del formulario de registro con AJAX
  $("#registerForm").submit(function (event) {
    //console.log("AAA");
    event.preventDefault(); // Evitar que se envíe el formulario de la manera convencional

    // Obtener los valores de los campos del formulario de registro
    var fullName = $("#fullName").val();
    var registerUsername = $("#registerUsername").val();
    var registerEmail = $("#registerEmail").val();
    var registerPassword = $("#registerPassword").val();
    var confirmPassword = $("#confirmPassword").val();

    // Validar que las contraseñas coincidan
    if (registerPassword !== confirmPassword) {
        Swal.fire({
            icon: "error",
            title: "Contraseñas desiguales",
            text: "Las contraseñas no coinciden",
            confirmButtonText: "Aceptar",
          });
      return;
    }

    var formData = {
        fullName: fullName,
        registerUsername: registerUsername,
        registerEmail: registerEmail,
        registerPassword: registerPassword,
    };
    // Realizar la solicitud AJAX
    $.ajax({
      type: "POST",
      url: "mod_registro.php", // Archivo PHP que maneja el registro
      data: formData,
      dataType: "json",
      success: function (response) {
        if (response.status === "success") {
          // Mostrar SweetAlert2 en caso de éxito
          Swal.fire({
            icon: "success",
            title: "¡Éxito!",
            text: "Los datos de contacto se han guardado correctamente.",
            confirmButtonText: "Aceptar",
          }).then((result) => {
            if (result.isConfirmed) {
              // Limpiar el formulario
              $("#registerForm")[0].reset();
            }
          });
        } else if (response.status === "repetido") {
          // Mostrar SweetAlert2 en caso de error
          Swal.fire({
            icon: "error",
            title: "Ese mail ya esta registrado",
            text: "Recuerde su contraseña o utilice otro",
          });
          $("#registerForm")[0].reset();
        } else if (response.status === "vacio") {
          // Mostrar SweetAlert2 en caso de error
          Swal.fire({
            icon: "error",
            title: "Faltan datos",
            text: "Recuerde rellenar todo el formulario",
          });
          $("#registerForm")[0].reset();
        }else {
          Swal.fire({
            icon: "error",
            title: "Error",
            text: "Hubo un error al guardar los datos.",
          });
          $("#registerForm")[0].reset();
        }
      },
      error: function (error) {
        console.log("Error al enviar los datos:", error);
        // Puedes manejar el error de acuerdo a tus necesidades
      },
    });
  });
});
