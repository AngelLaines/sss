<?php
$conn = new mysqli("localhost", "root", "1234", "sss_csti");
session_start();

    $usuario = $_POST['usuario'];
    $pass = $_POST['contraseña'];
    $sql = "select * from usuario where usuario = binary'" . $usuario . "' and contraseña = binary'".$pass."'";
    $res = $conn->query($sql);
    $rows = mysqli_fetch_array($res);
    if ($rows===null){
        echo "Usuario y/o contraseña incorrectos";
    } else {
        $_SESSION['usuario']=$rows[4].' '.$rows[5];
        $_SESSION['tipoUsuario'] = $rows[3];
        echo $_SESSION['usuario'];
    }

exit();
