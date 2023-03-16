var idleTime = 0;

$(document).ready(function () {

  var idleInterval = setInterval(timerIncrement, 60000);

  $(this).mousemove(function (e) {
      idleTime = 0;
  });
  $(this).keypress(function (e) {
      idleTime = 0;
  });

  $("#btnUsuarios").click(function(){
    window.location.href = "users.php";
  })

  $("#btnRegistro").click(function(){
    window.location.href = "signin.php";
  });

  $("#btnLogout").click(function(){
    $.post("db/logout.php");
    window.location.href = "login.php";
  });

  ///

  $("#btn_regresar").click(function() {
    window.location.href = "mantenimiento.php";
  });
  $("#btn_guardar_info").click(function() {
    estado = $("#select_estado").val();
    
    if(estado === "FINALIZADO") {
      
      if($("#finalizado_por").val() === "") {
        $("#finalizado_por").css("border","2px solid red");
      } else {
        $.post("db/update_info_m.php", { folio: $("#hidden_id").val(), estado: "FINALIZADO", finalizado_por: $("#finalizado_por").val() }, function(data) {
          if(data === "1") {
            window.location.href = "mantenimiento.php";
          }
        });
      }
    }
  });
});

function timerIncrement() {
  idleTime = idleTime + 1;
  if (idleTime > 4) {
    $.post("db/logout.php");
    window.location.href = "login.php";
  }
}
