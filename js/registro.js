var idleTime = 0;
var n1 = 0, n2 = 0, n3 = 0, n4 = 0, n5 = 0;
$(document).ready(function () {

    function verificar() {
        if (n1 === 1 && n2 === 1 && n3 === 1 && n4 === 1 && n5 === 1) {
            $("#signin").prop('disabled', false);
        } else {
            $("#signin").prop('disabled', true);
        }
    }

    function checkClear() {
        if (n1 === 1 || n2 === 1 || n3 === 1 || n4 === 1 || n5 === 1) {
            $("#cleartxt").prop('disabled', false);
        } else {
            $("#cleartxt").prop('disabled', true);
        }
    }

    $("#user").keyup(function () {
        usuario = $("#user").val();
        if (!usuario) {
            n1 = 0;
            verificar();
            checkClear();
        } else {
            n1 = 1;
            verificar();
            checkClear();
        }
    });

    $("#password").keyup(function () {
        pass = $("#password").val();
        if (!pass) {
            n2 = 0;
            verificar();
            checkClear();
        } else {
            n2 = 1;
            verificar();
            checkClear();
        }
    });

    $("#conf_pass").keyup(function () {
        conf_pass = $("#conf_pass").val();
        if (!conf_pass) {
            n3 = 0;
            verificar();
            checkClear();
        } else {
            n3 = 1;
            verificar();
            checkClear();
        }
    });

    $("#name").keyup(function () {
        nname = $("#name").val();
        if (!nname) {
            n4 = 0;
            verificar();
            checkClear();
        } else {
            n4 = 1;
            verificar();
            checkClear();
        }
    });

    $("#lastname").keyup(function () {
        lastname = $("#lastname").val();
        if (!lastname) {
            n5 = 0;
            verificar();
            checkClear();
        } else {
            n5 = 1;
            verificar();
            checkClear();
        }
    });

    $("#cleartxt").click(function () {
        $("#user,#password,#conf_pass,#name,#lastname").val('');
        n1 = 0, n2 = 0, n3 = 0, n4 = 0, n5 = 0;
        verificar();
        $("#cleartxt").prop('disabled', true);
        $("#showPass").prop("checked", false);
        $("#showconfPass").prop("checked", false);
        $("#password").removeAttr("type", "text");
        $("#password").prop("type", "password");
        $("#conf_pass").removeAttr("type", "text");
        $("#conf_pass").prop("type", "password");
        npass = 0;
        nconfpass = 0;
    });

    var npass = 0;
    $("#showPass").click(function () {
        if (npass == 0) {
            npass = 1;
            $("#password").removeAttr("type", "password");
            $("#password").prop("type", "text");
        } else {
            npass = 0;
            $("#password").removeAttr("type", "text");
            $("#password").prop("type", "password");
        }
    });

    var nconfpass = 0;
    $("#showconfPass").click(function () {
        if (nconfpass == 0) {
            nconfpass = 1;
            $("#conf_pass").removeAttr("type", "password");
            $("#conf_pass").prop("type", "text");
        } else {
            nconfpass = 0;
            $("#conf_pass").removeAttr("type", "text");
            $("#conf_pass").prop("type", "password");
        }
    });

    //////////////

    var idleInterval = setInterval(timerIncrement, 60000);

    $(this).mousemove(function (e) {
        idleTime = 0;
    });
    $(this).keypress(function (e) {
        idleTime = 0;
    });

    ///////////////

    $("#return").click(function () {
        //alert('hola');
        window.location.href = "index.php";
    });
    $("#signin").click(function () {
        usuario = $("#user").val();
        contraseña = $("#password").val();
        confContraseña = $("#conf_pass").val();
        tipo = $("#tipo").val();
        nombre = $("#name").val();
        apellido = $("#lastname").val();
        console.log(usuario + ' ' + contraseña + ' ' + confContraseña + ' ' + tipo + ' ' + nombre + ' ' + apellido);
        if (usuario === '' || contraseña === '' || confContraseña === '' || tipo === '' || nombre === '' || apellido === '') {
            alert("Ingrese todos los datos solicitados");
        } else {
            if (contraseña === confContraseña) {
                $.post("db/insert_new_user.php", {
                    user: usuario,
                    pass: contraseña,
                    type: tipo,
                    name: nombre,
                    lastname: apellido
                }, function (data) {
                    switch (data) {
                        case "1": alert("Error en la conexión a BD!"); break;
                        case "2": alert("Usuario registrado correctamente!"); break;
                        case "3": alert("Error al guardar datos!"); break;
                        case "4": alert("El usuario ya existe!"); break;
                    }
                    $("#user,#password,#conf_pass,#name,#lastname").val('');
                    $("#cleartxt").prop('disabled', true);
                    $("#signin").prop('disabled', true);
                });
            } else {
                alert('Las contraseñas no coinciden');
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

