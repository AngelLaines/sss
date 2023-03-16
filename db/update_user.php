<?php 
$conn = new mysqli("localhost","root","1234","sss_csti");
$error="1";

$nombre = strtoupper($_POST["nombre"]);
$apellido = strtoupper($_POST["apellido"]);
$contraseña = $_POST["contraseña"];
$tipo = $_POST["tipo"];
$idUsuario = $_POST["idUsuario"];

if($conn->connect_errno) {
    $error = "1";
  } else {
    $sql1 = "update usuario set nombre='".$nombre."',apellido='".$apellido."',contraseña='".$contraseña."',tipo='".$tipo."' where idUsuario=".$idUsuario;
  
    if($conn->query($sql1) === TRUE) {
      $error = "2";
    } else {
      $error = "3";
    }
  }
  
  echo $error;

?>