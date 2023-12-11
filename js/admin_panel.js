$(document).ready(function (){
    $(".btn-ban").click(function () {
        var idUser = $(this).attr("id");

        //console.log(idUser);

        $.ajax({
            type: "POST",
            url: "banear_usuario.php", // Archivo PHP que maneja el ban
            data: {
              idUser: idUser
            },
            dataType: 'json',
            success: function (response) {
                if (response.status === 'ban') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Éxito',
                        text: 'Usuario banneado'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                        } 
                      });
                } else if (response.status === 'reah') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Éxito',
                        text: 'Usuario rehabilitado'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                        } 
                      });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: response.status
                    });
                }
            },
            error: function () {
              alert("Error al banear o habilitar usuario.");
            },
          });
    });
    $(".btn-admin").click(function () {
        var idUser = $(this).attr("id");

        console.log(idUser);

        $.ajax({
            type: "POST",
            url: "cambiar_admin.php", // Archivo PHP que maneja administracion
            data: {
              idUser: idUser
            },
            dataType: 'json',
            success: function (response) {
              if (response.status === 'exito') {
                  Swal.fire({
                      icon: 'success',
                      title: 'Éxito',
                      text: 'Privilegios actualizados'
                  }).then((result) => {
                      if (result.isConfirmed) {
                          location.reload();
                      } 
                    });
              }  else {
                  Swal.fire({
                      icon: 'error',
                      title: 'Error',
                      text: response.status
                  });
              }
          },
            error: function () {
              //alert("Error al actualizar privilegios.");
            },
          });
    });
});
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
