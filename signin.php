<!doctype html>

<?php
  $conn = new mysqli("localhost","root","1234","sss_csti");
?>
<?php
        session_start();
        if (isset($_SESSION['usuario'])) {
          $visible = 'button';
          //echo $_SESSION['usuario'];
        } else {
          header("Location:login.php");
        } //end if-else
        ?>
<html>
  <head lang="es">
    <meta charset="utf-8">
    <title>Registro - Soporte CSTI</title>
    <link rel="icon" href="images/csti.ico">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/registro.css">
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
        <input type='<?php echo $tipo ?>' id='btnUsuarios' class="boton over" value='Usuarios'  />
      </div>
      <div class="right">
        <font face='Arial' size='2px'>Usuario actual: <?php echo $_SESSION['usuario'];?></font>
      </div>
    </div>
      <section>
      <div id="div_center">
        <table id="info">
          <tr>
            <th align="center" colspan="2"><h2>Registro de usuario</h2></th>
          </tr>
          <tr>
            <th colspan="2">
              <hr class="separador"/>
            </th>
          </tr>
          <tr>
            <th id="r-left">Usuario: </th>
            <th id="r-right"><input type='text' id="user"></th>
          </tr>
          <tr>
            <th id="r-left">Contraseña: </th>
            <th id="r-right"><input type='password' id="password"><input type="checkbox" class="show-pass" id="showPass" /><label class="label-show">Mostrar</label></th>
          </tr>
          <tr>
            <th id="r-left">Confirmar contraseña: </th>
            <th id="r-right"><input type='password' id="conf_pass"><input type="checkbox" class="show-pass" id="showconfPass" /><label class="label-show">Mostrar</label></th>
          </tr>
          <tr>
            <th id="r-left">Tipo:</th>
            <th id="r-right">
              <select id="tipo" placeholder=''>
                <option >Alumno</option>
                <option >Administrador</option>
              </select>
            </th>
          </tr>
          <tr>
            <th colspan="2">
              <hr class="separador"/>
            </th>
          </tr>
          <tr>
            <th id="r-left">Nombre: </th>
            <th id="r-right"><input type='text' id="name"></th>
          </tr>
          <tr>
            <th id="r-left">Apellido: </th>
            <th id="r-right"><input type='text' id="lastname"></th>
          </tr>
          <tr>
            <th colspan="2">
            <input type="button" class="boton" id="return" value="Regresar">
            <input type="button" class="boton" id="signin" value="Registrar" disabled>
            <input type="button" class="boton" id="cleartxt" value="Borrar" disabled>
          </th>
          </tr>
         
        </table>
      </div>
    </section>
    </main>
    <footer><img src="images/footer.png" /></footer>

    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/registro.js"></script>
    <script src="js/info.js"></script>
  </body>
</html>