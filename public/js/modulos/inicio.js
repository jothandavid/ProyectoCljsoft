const RUTA_URL = "http://localhost/ProyectoCljsoft/";
var enviar = function () {
  $("#frmlogin").on("submit", function (e) {
    e.preventDefault();
    var datos = new FormData($("#frmlogin")[0]);
    $.ajax({
      url: RUTA_URL + "Home/ValidarIngreso",
      method: "POST",
      data: datos,
      processData: false,
      contentType: false,
    })
      .done(function (data) {
        if (data == "false") {
          alert("el usuario o la clave NO coinciden!");
        } else {
          window.location.href = RUTA_URL + "Admin";
        }
      })
      .fail(function (data) {
        alert("operacion fallida !");
      });
  });
};


$(document).ready(function () {
  enviar();
});
