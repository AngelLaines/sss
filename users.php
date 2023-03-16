<!doctype html>

<?php $conn = new mysqli("localhost", "root", "1234", "sss_csti"); ?>

<html>

<head lang="es">
  <meta charset="utf-8">
  <title>Soporte CSTI</title>
  <link rel="icon" href="images/csti.ico">
  <link rel="stylesheet" type="text/css" href="css/users.css">
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
        <input type='<?php echo $visible ?>' id='btnLogout' class="boton over" name='btnLogout' value='Logout' />
        <input type='<?php echo $tipo ?>' id='btnRegistro' class="boton over" value='Registro'  />
        <input type='<?php echo $tipo ?>' id='btnInicio' class="boton over" value='Inicio'  />
      </div>
      <div class="right">
        <font face='Arial' size='2px'>Usuario actual: <?php echo $_SESSION['usuario'];?></font>
      </div>
    </div>
    
    <section id="center">
      <div id="divcenter">
        
        <table id="showed_data">
          <tr>
            <th colspan="6">Información general</th>
          </tr>
          <tr>
            <th>ID Usuario</th>
            <th>Usuario</th>
            <th>Tipo</th>
            <th>Nombre por</th>
            <th>Apellido</th>
          </tr>
          <?php
          $sql = "select * from usuario";
          $res = $conn->query($sql);
          if ($res->num_rows === 0) {
            echo "<tr><th colspan='7'>No hay datos en la tabla!</th></tr>";
          } else {

            while ($rows = mysqli_fetch_array($res)) {
              echo "<tr>";
              echo "<th>" . $rows[0] . "</th>";
              echo "<th>" . $rows[1] . "</th>";
              echo "<th>" . $rows[3] . "</th>";
              echo "<th>" . $rows[4] . "</th>";
              echo "<th>" . $rows[5] . "</th>";
              echo "<th><a href='info_user.php?usuario=" . $rows[0] . "'>Ver más</a></th>";
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
  <script src="js/users.js"></script>
</body>

</html>