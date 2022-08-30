
function showModal(message, title = "¡Aviso!") {
  $("#titulo-modal").html(title);
  $("#p-msg").html(message);
  $("#btn-close").css("display", "none");
  $("#myModal").modal("show");
}


function validacionPin() {
  $(document).ready(function () {
    var pin = $("#pin").val();
    if (pin.length == 4) {
      var url = $("#validacionPin").attr("action");
      $("#validacionPin").attr("action", sourceURLHandler(url));
      $("#validacionPin").submit();
    } else {
      $("#titulo-modal").html("¡Aviso!");
      $("#p-msg").html("Ingresa el código de 4 dígitos.");
      $("#btn-close").css("display", "none");
      $("#myModal").modal("show");
    }
  });
}
