var n1=0,n2=0;
$(document).ready(function () {

    function check() {
        if (n1===1 && n2===1){
            $("#btn_submit").prop('disabled',false);
        } else {
            $("#btn_submit").prop('disabled',true);
        }
    }

    $("#user").keyup(function(){
        usuario = $("#user").val();
        if (!usuario){
            n1=0;
            check();
            console.log(n1);
        } else {
            n1=1;
            check();
            console.log(n1);
        }
    });

    $("#password").keyup(function(){
        pass = $("#password").val();
        if (!pass){
            n2=0;
            check();
            
        } else {
            n2=1;
            check();
            
        }
    });

    var n=0;

    $("#show").click(function () {
        if (n == 0) {
          n = 1;
          $("#password").removeAttr("type", "password");
          $("#password").prop("type", "text");
        } else {
          n = 0;
          $("#password").removeAttr("type", "text");
          $("#password").prop("type", "password");
        }
      });

    $("#password").keydown(function (e) {
        if (e.which == 13) {
            /*  ...  */
            e.preventDefault();
            verificar();
        }
    });

    $("#btn_submit").click(function () {
        verificar();
    });
});
function verificar() {
    usuario = $("#user").val();
    contraseña = $("#password").val();
    if (usuario === '' || contraseña === '') {
        alert("Ingrese un usuario y contraseña validos");
    } else {
        $.post("db/select_user.php", {
            usuario: $("#user").val(),
            contraseña: $("#password").val()
        }, function (data) {
            if (data === 'Usuario y/o contraseña incorrectos') {
                alert(data);
                //console.log(data);
            } else {
                window.location.href = "index.php";
                //console.log(data);
            }

        });
    }
}