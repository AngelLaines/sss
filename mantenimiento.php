<!doctype html>

<?php $conn = new mysqli("localhost", "root", "1234", "sss_csti"); ?>

<html>

<head lang="es">
  <meta charset="utf-8">
  <title>Soporte CSTI</title>
  <link rel="icon" href="images/csti.ico">
  <link rel="stylesheet" type="text/css" href="css/main.css">
</head>

<body>
  <nav><img src="images/banner.png" /></nav>
  <main>
    <div id='top'>
      <div class="left">
        <?php
        session_start();
        if (isset($_SESSION['usuario'])) {
          $visible = 'button';
          //echo $_SESSION['usuario'];
        } else {
          header("Location:login.php");
        } //end if-else
        ?>
        
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
        <font face='Arial' size='2px'>Usuario actual: <?php echo $_SESSION['usuario'];?> </font>
      </div>
    </div>
    <section id="left">
      <form id="form-datos">
        <table id="datos">
          <tr>
            <th colspan="2">
              <h2 class="titulos">Información de la persona</h2>
            </th>
            <th></th>
          </tr>
          <tr>
            <th id="row-left">Nombre:</th>
            <th id="row-right"><input id="nombre" class="inputs" type="text" name="nombre" /></th>
          </tr>
          <tr>
            <th id="row-left">Apellido Paterno:</th>
            <th id="row_right"><input id="ap_paterno" class="inputs" type="text" name="ap_paterno" /></th>
          </tr>
          <tr>
            <th id="row-left">Apellido Materno:</th>
            <th id="row_right"><input id="ap_materno" class="inputs" type="text" name="ap_materno" /></th>
          </tr>
          <tr>
            <th colspan="2">
            <hr/>
              <h2 class="titulos">Información de la computadora</h2>
            </th>
            <th></th>
          </tr>
          <tr>
            <th id="row-left">Modelo:</th>
            <th id="row-right"><input id="modelo" class="inputs" type="text" name="modelo" /></th>
          </tr>
          <tr>
            <th id="row-left">Contraseña:</th>
            <th id="row-right"><input id="pass" class="pass" type="password" name="pass" /> <input type="checkbox" class="btn-radio-char" id="show" /><label>Mostrar</label></th>
          </tr>
          <tr>
            <th id="row-left">Cargador:</th>
            <th id="row-right"><input type="radio" class="btn-radio-char" name="cargador" value="si" checked /><label class="radios"> Sí </label><input type="radio" class="btn-radio-char" name="cargador" value="no" /><label class="radios">No</label></th>
          </tr>
          <tr>
            <th colspan="2">
            <hr/>
              <h2 class="titulos">Mantenimiento</h2>
            </th>
            <th></th>
          </tr>
          
          <tr>
            <th id="row-left">Descripcion:</th>
            <th id="row-right"><textarea id="descripcion" class="inputs" name="descripcion" rows="4" style="resize:none"></textarea></th>
          </tr>
          <tr>
            <th id="row-left">Número de telefono:</th>
            <th id="row-right"><input id="cel" class="inputs" type="number" name="cel"/></th>
          </tr>
          <tr>
            <th colspan="2">
            <hr/>
              <h2 class="titulos">Estado de la computadora</h2>
            </th>
            <th></th>
          </tr>
          <tr>
            <th id="row-left">Recibido por:</th>

            <th id="row-right"><input id="recibido_por" class="inputs" type="text" name="recibido_por" value="<?php echo $_SESSION['usuario'] ?>" readonly /></th>
          </tr>
          <tr>
            <th colspan="2"><input id="btn_guardar_m" type="button" class="boton" name="btn_guardar_m" value="Guardar" /></th>
            <th></th>
          </tr>
          <tr>
            <th colspan="2"><label id="msg"></label></th>
            <th></th>
          </tr>
        </table>
      </form>
    </section>
    <section id="right">
      <div id="divright">
        <table id="showed_data">
          <tr>
            <th colspan="7">Información general</th>
          </tr>
          <tr>
            <th>Folio</th>
            <th>Nombre</th>
            <th>Modelo</th>
            <th>Recibido por</th>
            <th>Fecha</th>
            <th>Estado</th>
            <th>Más</th>
          </tr>
          <?php
          $sql = "select * from mantenimientos_pc order by estado='EN PROCESO' DESC, fecha_recibido DESC limit 15";
          $ress = $conn->query($sql);
          if ($ress->num_rows === 0) {
            echo "<tr><th colspan='7'>No hay datos en la tabla!</th></tr>";
          } else {

            while ($rows = mysqli_fetch_array($ress)) {
              echo "<tr>";
              echo "<th>" . $rows[0] . "</th>";
              echo "<th>" . $rows[1] . ", " . $rows[2] . "</th>";
              echo "<th>" . $rows[5] . "</th>";
              echo "<th>" . $rows[10] . "</th>";
              echo "<th>" . $rows[12] . "</th>";
              echo "<th>" . $rows[9] . "</th>";
              echo "<th><a href='mas_info_m.php?folio=" . $rows[0] . "'>Ver más</a></th>";
              echo "</tr>";
            }
          } //end if-else
          ?>

        </table>
      </div>
    </section>
  </main>
  <footer><img src="images/footer.png" /></footer>
  <script src="js/jquery-3.1.1.min.js"></script>
  <script src="js/custom.js"></script>
</body>

</html>