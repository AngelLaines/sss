var idleTime = 0;

$(document).ready(function () {

  var idleInterval = setInterval(timerIncrement, 60000);

  $(this).mousemove(function (e) {
      idleTime = 0;
  });
  $(this).keypress(function (e) {
      idleTime = 0;
  });

////////////////////

  var conteo = 0;
  $("#btn_regresar").click(function(){
    window.location.href="users.php";
  });

  $("#btnEliminarUsuario").click(function(){
    if( confirm("Está seguro que desea eliminar el usuario?")===true){
      $.post("db/delete_user.php",{idUsuario:$("#hidden_id").val()},function(data){
        switch (data) {
          case "1": alert("Error en la conexiion con la Base de Datos!"); break;
          case "2": alert("Datos eliminados correctamente!"); break;
          case "3": alert("Error al eliminar los datos!"); break;
        }
        window.location.href="users.php";
      });
    }
  });

  $("#btn_guardar_info").click(function(){
    if ($("#pass").val()===""  || $("#uName").val()==="" || $("#uLaName").val()===""){
      alert("Faltan datos de usuario!");
    } else if ($("#pass").val()!==""  && $("#uName").val()!=="" && $("#uLaName").val()!=="") {
      $.post("db/update_user.php",{nombre: $("#uName").val(), apellido: $("#uLaName").val(), contraseña: $("#pass").val(), tipo: $("#select_tipo").val(),idUsuario:$("#hidden_id").val() }, function(data){
        
        switch (data) {
          
          case "1": alert("Error en la conexiion con la Base de Datos!"); break;
          case "2": alert("Datos guardados correctamente!"); break;
          case "3": alert("Error al guardar los datos!"); break;
        }
      })
    }

  });

  $("#btnInicio").click(function(){
    window.location.href = "index.php";
  })

  $("#btnRegistro").click(function(){
    window.location.href = "signin.php";
  });

  $("#btnLogout").click(function(){
    $.post("db/logout.php");
    window.location.href = "login.php";
  });

  $("#show").click(function () {
    if (conteo == 0) {
      conteo = 1;
      $("#pass").removeAttr("type", "password");
      $("#pass").prop("type", "text");
    } else {
      conteo = 0;
      $("#pass").removeAttr("type", "text");
      $("#pass").prop("type", "password");
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