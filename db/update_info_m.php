<?php

$conn = new mysqli("localhost", "root", "1234", "sss_csti");

$folio = $_POST["folio"];
$estado = strtoupper($_POST["estado"]);
$finalizado_por = strtoupper($_POST["finalizado_por"]);

date_default_timezone_set("America/Hermosillo");
$date = date("Y-m-d h:i:s");

$sql = "update mantenimientos_pc set estado='".$estado."', finalizado_por='".$finalizado_por."', fecha_entregado='".$date."' where folio=".$folio;
$conn->query($sql);

echo "1";

?>
