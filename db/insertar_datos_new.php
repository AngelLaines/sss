<?php

$conn = new mysqli("localhost","root","1234","sss_csti");

$nombre = strtoupper($_POST["nombre"]);
$ap_paterno = strtoupper($_POST["ap_paterno"]);
$ap_materno = strtoupper($_POST["ap_materno"]);
$modelo = strtoupper($_POST["modelo"]);
$pass = $_POST["pass"];
$radios = strtoupper($_POST["radios"]);
$software = strtoupper($_POST["software"]);
$problema = strtoupper($_POST["problema"]);
$recibido_por = strtoupper($_POST["recibido_por"]);
$cel = $_POST["cel"];

date_default_timezone_set("America/Hermosillo");
$date = date("Y-m-d h:i:s");

$error = "1";

if($conn->connect_errno) {
  $error = "1";
} else {
  $sql1 = "insert into info_persona(nombre,ap_paterno,ap_materno,modelo,pass,cargador,software,problema,recibido_por,fecha_recepcion,numero_tel) values('".$nombre."','".$ap_paterno."','".$ap_materno."','".$modelo."','".$pass."','".$radios."','".$software."','".$problema."','".$recibido_por."','".$date."',".$cel.")";

  if($conn->query($sql1) === TRUE) {
    $error = "2";
  } else {
    $error = "3";
  }
}

echo $error;

?>
