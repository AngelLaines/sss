<?php

$conn = new mysqli("localhost", "root", "1234", "sss_csti");
$user = $_POST["user"];
$pass = $_POST['pass'];
$type = $_POST["type"];
$name = strtoupper($_POST["name"]);
$lastname = strtoupper($_POST["lastname"]);
$error = "1";
$sql = "select * from usuario where usuario='" . $user . "'";
$res = $conn->query($sql);
$rows = mysqli_fetch_array($res);
if ($rows === null) {
    if ($conn->connect_errno) {
        $error = "1";
    } else {
        $sql1 = "insert into usuario(usuario,contraseña,tipo,nombre,apellido) values('" . $user . "','"
            . $pass . "','" . $type . "','" . $name . "','" . $lastname . "')";
        if ($conn->query($sql1) === TRUE) {
            $error = "2";
        } else {
            $error = "3";
        }
    }

    echo $error;
} else {
    $error = "4";
    echo $error;
}
