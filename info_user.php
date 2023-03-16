<!doctype html>
<?php
        

session_start();

if (isset($_SESSION['usuario'])) {
  $visible = 'button';
  //echo $_SESSION['usuario'];
} else {
  header("Location:login.php");
} //end if-else

  $conn = new mysqli("localhost","root","1234","sss_csti");
  $idusuario = $_GET["usuario"];

  $sql = "select * from usuario where idUsuario=".$idusuario;
  $res = $conn->query($sql);

  while($rows = mysqli_fetch_array($res)) {
    $usuario = $rows[1];
    $contraseña = $rows[2];
    $tipo = $rows[3];
    $nombre = $rows[4];
    $apellido = $rows[5];
  }
  $disabled="";
  if ($tipo==='Alumno'){$selected1="selected";$selected2="";}else if($tipo==='Administrador'){$selected2="selected";$selected1="";$disabled="disabled";}

?>

<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Informacion Usuario <?php echo $idusuario?> - Soporte CSTI</title>
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
        <input type='<?php echo $visible ?>' id='btnLogout' class="boton over" name='btnLogout' value='Logout' />
        <input type='<?php echo $tipo ?>' id='btnRegistro' class="boton over" value='Registro'  />
        <input type='<?php echo $tipo ?>' id='btnInicio' class="boton over" value='Inicio'  />
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
            <th colspan="2">ID Usuario: <?php echo $idusuario; ?></th>
            <th ></th>
          </tr>
          <tr>
            <th colspan="2"><?php echo $nombre." ".$apellido; ?></th>
            <th ></th>
          </tr>
          <tr>
            <th colspan="2"><hr/><h2 class="titulos">Información del usuario</h2></th>
            <th></th>
          </tr>
          <tr>
            <th colspan="2">Usuario: <?php echo $usuario; ?></th>
            <th></th>
          </tr>
          <tr>
            <th id="r-left">Contraseña:</th>
            <th id="r-right"><input id="pass" class="pass" type="password" name="pass" value="<?php echo $contraseña; ?>"  /> <input type="checkbox" id="show" class="btn-radio-char"/><label class="chk">Mostrar</label></th>
          </tr>
          
          <tr>
            <th colspan="2"><hr/><h2 class="titulos">Informacion personal</h2></th>
            <th></th>
          </tr>
          <tr>
            <th colspan="2">Nombre:<br/><input id="uName" type="text" rows="3" cols="30" style="resize:none" value=<?php echo $nombre; ?>></th>
            <th ></th>
          </tr>
          <tr>
            <th colspan="2">Apellido:<br/><input id="uLaName" type="text" rows="3" cols="30" style="resize:none" value=<?php echo $apellido; ?>></th>
            <th ></th>
          </tr>
          
          
          <tr>
            <th id="r-left">Tipo:</th>
            <th id="r-right">
              <select id="select_tipo" <?php echo $disabled; ?>>
                <option <?php echo $selected1; ?>>Alumno</option>
                <option <?php echo $selected2; ?>>Administrador</option>
              </select>
            </th>
          </tr>
          
          <tr>
            <th colspan="2"><input id="btnEliminarUsuario" class="boton" type="button" name="btnEliminarUsuario" value="Eliminar usuario" <?php echo $disabled; ?>/><input id="btn_guardar_info" class="boton" type="button" name="btn_guardar_info" value="Guardar datos" /> <input id="btn_regresar" class="boton" type="button" name="btn_regresar" value="Regresar" /> <input type="hidden" name="hidden_id" id="hidden_id" value="<?php echo $idusuario; ?>" /></th>
            <th></th>
          </tr>
          
        </table>
      </div>
    </section>
    </main>
    <footer><img src="images/footer.png" /></footer>

    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/users.js"></script>
  </body>
</html>
