<!doctype html>
<?php
        

session_start();

if (isset($_SESSION['usuario'])) {
  $visible = 'button';
  //echo $_SESSION['usuario'];
} else {
  header("Location:login.php");
} //end if-else

  $conn = new mysqli("localhost", "root", "1234", "sss_csti");
  $folio = $_GET["folio"];

  $sql = "select * from mantenimientos_pc where folio=".$folio;
  $res = $conn->query($sql);

  while($rows = mysqli_fetch_array($res)) {
    $nombre = $rows[1];
    $ap_paterno = $rows[2];
    $ap_materno = $rows[3];
    $modelo = $rows[5];
    $pass = $rows[6];
    $cargador = $rows[7];
    $descripcion = $rows[8];
    $recibido_por = $rows[10];
    $estado = $rows[9];
    $finalizado_por = $rows[11];
    $fecha_recepcion = $rows[12];
    $fecha_entrega = $rows[13];
    $cel = $rows[4];
  }
  if($finalizado_por==null){
    $finalizado_por=$_SESSION['usuario'];
  }


  $checked1 = ""; $checked2 = "";
  if($cargador === "SI") { $checked1 = "checked"; }
  else { $checked2 = "checked"; }

  $selected1 = ""; $selected2 = ""; $disabled = "readonly";
  if($estado === "EN PROCESO") { $selected1 = "selected"; }
  else { $selected2 = "selected"; $disabled = "disabled"; }
?>

<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Informacion Folio <?php echo $_GET["folio"];?> - Soporte CSTI</title>
    <link rel="icon" href="images/csti.ico">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/info.css">
  </head>

  <body>
    <nav><img src="images/banner.png" /></nav>
    <main>
    <div id='top'>
      <div class="left">
        <?php
        $tipo = '';
        if ($_SESSION['tipoUsuario'] == 'Administrador') {
          $tipo = 'button';
        } else {
          $tipo = 'hidden';
        }
        ?>
        <input type='<?php echo $visible ?>' id='btnSoftInst' class="boton over" name='btnSoftInst' value='Instalacion SW' />
        <input type='<?php echo $visible ?>' id='btnLogout' class="boton over" name='btnLogout' value='Logout' />
        <input type='<?php echo $tipo ?>' id='btnRegistro' class="boton over" value='Registro'  />
        <input type='<?php echo $tipo ?>' id='btnUsuarios' class="boton over" value='Usuarios'  />
      </div>
      <div class="right">
        <font face='Arial' size='2px'>Usuario actual: <?php echo $_SESSION['usuario'];?></font>
      </div>
    </div>
      <section id="top"></section>
      <section>
      <div id="div_center">
        <table id="info">
          <tr>
            <th colspan="2"><h2 class="titulos">Información de la persona</h2></th>
            <th>
            </th>
          </tr>
          <tr>
            <th colspan="2">Folio: <?php echo $folio; ?></th>
            <th ></th>
          </tr>
          <tr>
            <th colspan="2"><?php echo $nombre." ".$ap_paterno." ".$ap_materno; ?></th>
            <th ></th>
          </tr>
          <tr>
            <th colspan="2"><hr/><h2 class="titulos">Información de la computadora</h2></th>
            <th></th>
          </tr>
          <tr>
            <th colspan="2">Modelo: <?php echo $modelo; ?></th>
            <th></th>
          </tr>
          <tr>
            <th id="r-left">Contraseña:</th>
            <th id="r-right"><input id="pass" class="pass" type="password" name="pass" value="<?php echo $pass; ?>" disabled /> <input type="checkbox" id="show" class="btn-radio-char"/><label class="chk">Mostrar</label></th>
          </tr>
          <tr>
            <th id="r-left">Cargador:</th>
            <th id="r-right"><input type="radio" name="cargador" value="si" <?php echo $checked1; ?> disabled /> Sí <input type="radio" name="cargador" value="no" <?php echo $checked2; ?> disabled /> No</th>
          </tr>
          <tr>
            <th colspan="2"><hr/><h2 class="titulos">Instalación de software</h2></th>
            <th></th>
          </tr>
          <tr>
            <th colspan="2">Descripcion:<br/><textarea rows="4" cols="30" disabled style="resize:none"><?php echo $descripcion; ?></textarea></th>
            <th ></th>
          </tr>
          
          <tr>
            <th colspan="2">Número de telefono:<br/><textarea rows="1" cols="30" disabled style="resize:none"><?php echo $cel; ?></textarea></th>
            <th ></th>
          </tr>
          <tr>
            <th colspan="2"><hr/><h2 class="titulos">Estado de la computadora</h2></th>
            <th></th>
          </tr>
          <tr>
            <th colspan="2">Recibido por: <?php echo $recibido_por; ?></th>
            <th ></th>
          </tr>
          <tr>
            <th id="r-left">Estado:</th>
            <th id="r-right">
              <select id="select_estado" <?php echo $disabled; ?>>
                <option <?php echo $selected1; ?>>EN PROCESO</option>
                <option <?php echo $selected2; ?>>FINALIZADO</option>
              </select>
            </th>
          </tr>
          <tr>
            <th id="r-left">Finalizado por:</th>
            <th id="r-right"><input id="finalizado_por" class="inputs" type="text" name="finalizado_por" value="<?php echo $finalizado_por; ?>" <?php echo $disabled; ?> /></th>
          </tr>
          <tr>
            <th colspan="2"><input id="btn_guardar_info" class="boton" type="button" name="btn_guardar_info" value="Guardar" <?php echo $disabled; ?> /> <input id="btn_regresar" class="boton" type="button" name="btn_regresar" value="Regresar" /> <input type="hidden" name="hidden_id" id="hidden_id" value="<?php echo $folio; ?>" /></th>
            <th></th>
          </tr>
          <tr>
            <th id="l-fecha">Fecha de recepcion:<br/> <?php echo $fecha_recepcion; ?></th>
            <th id="r-fecha">Fecha de entrega:<br/> <?php echo $fecha_entrega; ?></th>
          </tr>
        </table>
      </div>
    </section>
    </main>
    <footer><img src="images/footer.png" /></footer>

    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/info_m.js"></script>
  </body>
</html>
