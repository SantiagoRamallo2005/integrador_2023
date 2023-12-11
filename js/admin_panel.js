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