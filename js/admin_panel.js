document.addEventListener("DOMContentLoaded", function () {
  // Inicializar la tabla con todos los usuarios
  var tablaUsuarios = document.getElementById("tablaUsuarios");


  // Evento al hacer clic en el botón "Ban"
  tablaUsuarios.addEventListener("click", function (event) {
    if (event.target.classList.contains("btn-ban")) {
      var idUser = event.target.dataset.idUser;
      console.log(idUser);
      // Realizar la solicitud AJAX para agregar el ban
      $.ajax({
        type: "POST",
        url: "banear_usuario.php", // Archivo PHP que maneja el ban
        data: {
          idUser: idUser,
        },
        dataType: "json",
        success: function (response) {
          alert(response.message);
        },
        error: function () {
          alert("Error al banear usuario.");
        },
      });
      console.log("Banear usuario con ID: " + idUser);
    }
  });

  // Evento al hacer clic en el botón "Admin"
  tablaUsuarios.addEventListener("click", function (event) {
    if (event.target.classList.contains("btn-admin")) {
      var idUser = event.target.dataset.idUser;
      $.ajax({
        type: "POST",
        url: "cambiar_admin.php", // Archivo PHP que maneja el cambio de adminValue
        data: {
          idUser: idUser,
        },
        dataType: "json",
        success: function (response) {
          alert(response.message);
          cargarTablaUsuarios();
        },
        error: function () {
          alert("Error al cambiar el estado de adminValue.");
        },
      });
      console.log(
        "Cambiar estado de adminValue para usuario con ID: " + idUser
      );
    }
  });
});
