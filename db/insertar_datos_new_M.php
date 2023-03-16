<?php

$conn = new mysqli("localhost","root","1234","sss_csti");

$nombre = strtoupper($_POST["nombre"]);
$ap_paterno = strtoupper($_POST["ap_paterno"]);
$ap_materno = strtoupper($_POST["ap_materno"]);
$modelo = strtoupper($_POST["modelo"]);
$pass = $_POST["pass"];
$radios = strtoupper($_POST["radios"]);
$descripcion = strtoupper($_POST["descripcion"]);
$recibido_por = strtoupper($_POST["recibido_por"]);
$cel = $_POST["cel"];

date_default_timezone_set("America/Hermosillo");
$date = date("Y-m-d h:i:s");

$error = "1";

if($conn->connect_errno) {
  $error = "1";
} else {
  $sql1 = "insert into mantenimientos_pc(nombre,ap_paterno,ap_materno,modelo,pass,cargador,descripcion,recibido_por,fecha_recibido,telefono) values('".$nombre."','".$ap_paterno."','".$ap_materno."','".$modelo."','".$pass."','".$radios."','".$descripcion."','".$recibido_por."','".$date."',".$cel.")";

  if($conn->query($sql1) === TRUE) {
    $error = "2";
  } else {
    $error = "3";
  }
}

echo $error;

?>
