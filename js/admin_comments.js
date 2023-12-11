$(document).ready(function (){
  $(".btn-com").click(function () {
      var idComm = $(this).attr("id");
  

      $.ajax({
          type: "POST",
          url: "mod_adminComments.php",
          data: {
            idComm: idComm,
          },
          dataType: 'json',
          success: function (response) {
            if (response.status === 'exito') {
                Swal.fire({
                    icon: 'success',
                    title: 'Éxito',
                    text: 'Comentario eliminado'
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
            //alert("Error al eliminar comentario.");
          },
        });
  });
});