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


  $("#btnUsuarios").click(function () {
    window.location.href = "users.php";
  });

  $("#btnMantenimiento").click(function(){
    window.location.href="mantenimiento.php";
  });

  $("#btnSoftInst").click(function(){
    window.location.href="index.php";
  });

  $("#btnRegistro").click(function () {
    window.location.href = "signin.php";
  });

  $("#btnLogout").click(function () {
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

 

  $("#btn_guardar").click(function () {

    if ($("#nombre").val() == "") { $("#nombre").css("border", "2px solid red"); status_name = 0; }
    if ($("#ap_paterno").val() == "") { $("#ap_paterno").css("border", "2px solid red"); status_ap_paterno = 0; }
    if ($("#ap_materno").val() == "") { $("#ap_materno").css("border", "2px solid red"); status_ap_materno = 0; }
    if ($("#modelo").val() == "") { $("#modelo").css("border", "2px solid red"); status_modelo = 0; }
    if ($("#pass").val() == "") { $("#pass").css("border", "2px solid red"); status_pass = 0; }
    /*if($("#software").val()=="") { $("#software").css("border","2px solid red"); status_software = 0; }
    if($("#problema").val()=="") { $("#problema").css("border","2px solid red"); status_problema = 0; }*/
    if ($("#cel").val() == "") { $("#cel").css("border", "2px solid red"); status_cel = 0; }
    if ($("#recibido_por").val() == "") { $("#recibido_por").css("border", "2px solid red"); status_recibido_por = 0; }

    if ($("#nombre").val() != "") { $("#nombre").css("border", "2px solid green"); status_name = 1; }
    if ($("#ap_paterno").val() != "") { $("#ap_paterno").css("border", "2px solid green"); status_ap_paterno = 1; }
    if ($("#ap_materno").val() != "") { $("#ap_materno").css("border", "2px solid green"); status_ap_materno = 1; }
    if ($("#modelo").val() != "") { $("#modelo").css("border", "2px solid green"); status_modelo = 1; }
    if ($("#pass").val() != "") { $("#pass").css("border", "2px solid green"); status_pass = 1; }
    /*if($("#software").val()!="") { $("#software").css("border","2px solid green"); status_software = 1; }
    if($("#problema").val()!="") { $("#problema").css("border","2px solid green"); status_problema = 1; }*/
    if ($("#cel").val() != "") { $("#cel").css("border", "2px solid green"); status_cel = 1; }
    if ($("#recibido_por").val() != "") { $("#recibido_por").css("border", "2px solid green"); status_recibido_por = 1; }

    radio = $("input[name=cargador]:checked").val();

    if (status_name == 1 && status_ap_paterno == 1 && status_ap_materno == 1 && status_modelo == 1 && status_pass == 1 && status_recibido_por == 1 && status_cel == 1) {
      $.post("db/insertar_datos_new.php", { nombre: $("#nombre").val(), ap_paterno: $("#ap_paterno").val(), ap_materno: $("#ap_materno").val(), modelo: $("#modelo").val(), pass: $("#pass").val(), radios: radio, software: $("#software").val(), problema: $("#problema").val(), recibido_por: $("#recibido_por").val(), cel: $("#cel").val() }, function (data) {
        switch (data) {
          case "1": $("#msg").text("Error en la conexión a BD!"); break;
          case "2": $("#msg").text("Datos guardados correctamente!"); break;
          case "3": $("#msg").text("Error al guardar datos!"); break;
        }
        console.log(data);
        setTimeout(function () {
          $("#msg").fadeOut(1500);
        }, 3000);

        $("#form-datos")[0].reset();
        $("#nombre, #ap_paterno, #ap_materno, #modelo, #pass, #recibido_por,#cel").css("border", "");
        $("#divright").load("index.php" + " #divright");
      });
    } //end if
  });

  // mantenimiento
  $("#btn_guardar_m").click(function () {

    if ($("#nombre").val() == "") { $("#nombre").css("border", "2px solid red"); status_name = 0; }
    if ($("#ap_paterno").val() == "") { $("#ap_paterno").css("border", "2px solid red"); status_ap_paterno = 0; }
    if ($("#ap_materno").val() == "") { $("#ap_materno").css("border", "2px solid red"); status_ap_materno = 0; }
    if ($("#modelo").val() == "") { $("#modelo").css("border", "2px solid red"); status_modelo = 0; }
    if ($("#pass").val() == "") { $("#pass").css("border", "2px solid red"); status_pass = 0; }
    /*if($("#software").val()=="") { $("#software").css("border","2px solid red"); status_software = 0; }*/
    if($("#descripcion").val()=="") { $("#descripcion").css("border","2px solid red"); status_problema = 0; }
    if ($("#cel").val() == "") { $("#cel").css("border", "2px solid red"); status_cel = 0; }
    if ($("#recibido_por").val() == "") { $("#recibido_por").css("border", "2px solid red"); status_recibido_por = 0; }

    if ($("#nombre").val() != "") { $("#nombre").css("border", "2px solid green"); status_name = 1; }
    if ($("#ap_paterno").val() != "") { $("#ap_paterno").css("border", "2px solid green"); status_ap_paterno = 1; }
    if ($("#ap_materno").val() != "") { $("#ap_materno").css("border", "2px solid green"); status_ap_materno = 1; }
    if ($("#modelo").val() != "") { $("#modelo").css("border", "2px solid green"); status_modelo = 1; }
    if ($("#pass").val() != "") { $("#pass").css("border", "2px solid green"); status_pass = 1; }
    /*if($("#software").val()!="") { $("#software").css("border","2px solid green"); status_software = 1; }
    if($("#problema").val()!="") { $("#problema").css("border","2px solid green"); status_problema = 1; }*/
    if($("#descripcion").val()!="") { $("#descripcion").css("border","2px solid green"); status_problema = 1; }
    if ($("#cel").val() != "") { $("#cel").css("border", "2px solid green"); status_cel = 1; }
    if ($("#recibido_por").val() != "") { $("#recibido_por").css("border", "2px solid green"); status_recibido_por = 1; }

    radio = $("input[name=cargador]:checked").val();
    
    if (status_name == 1 && status_ap_paterno == 1 && status_ap_materno == 1 && status_modelo == 1 && status_pass == 1 && status_recibido_por == 1 && status_cel == 1 && status_problema==1) {
      $.post("db/insertar_datos_new_M.php", { nombre: $("#nombre").val(), ap_paterno: $("#ap_paterno").val(), ap_materno: $("#ap_materno").val(), modelo: $("#modelo").val(), pass: $("#pass").val(), radios: radio, descripcion: $("#descripcion").val(), recibido_por: $("#recibido_por").val(), cel: $("#cel").val() }, function (data) {
        switch (data) {
          case "1": $("#msg").text("Error en la conexión a BD!"); break;
          case "2": $("#msg").text("Datos guardados correctamente!"); break;
          case "3": $("#msg").text("Error al guardar datos!"); break;
        }
        console.log(data);
        setTimeout(function () {
          $("#msg").fadeOut(1500);
        }, 3000);

        $("#form-datos")[0].reset();
        $("#nombre, #ap_paterno, #ap_materno, #modelo, #pass, #recibido_por,#cel,#descripcion").css("border", "");
        $("#divright").load("mantenimiento.php" + " #divright");
      });
    } //end if*/
  });


});

function timerIncrement() {
  idleTime = idleTime + 1;
  if (idleTime > 4) {
    $.post("db/logout.php");
    window.location.href = "login.php";
  }
}