<?php 
$conn = new mysqli("localhost","root","1234","sss_csti");
$error="1";


$idUsuario = $_POST["idUsuario"];

if($conn->connect_errno) {
    $error = "1";
  } else {
    $sql1 = "delete from usuario where idUsuario=".$idUsuario;
  
    if($conn->query($sql1) === TRUE) {
      $error = "2";
    } else {
      $error = "3";
    }
  }
  
  echo $error;

?>