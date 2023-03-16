<!DOCTYPE html>
<?php $conn = new mysqli("localhost", "root", "1234", "sss_csti"); ?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="icon" href="images/csti.ico">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <title>Login - Soporte CSTI</title>
</head>

<body>
    <nav><img src="images/banner.png" /></nav>
    <main>
        <div class="centrar">
            <table id="info">
                <tr>
                    <th colspan="2">
                        <h3>Inicio de sesion</h3>
                        <hr class="separador">
                    </th>
                </tr>
                <tr>
                    <th id="row-left">
                        Usuario:
                    </th>
                    <th id="row-right">
                        <input type="text" class="inputLogin" id="user" name="user" />
                    </th>
                    
                </tr>
                <tr>
                    <th id="row-left">
                        Contraseña:
                    </th>
                    <th id="row-right">
                        <input type="password" class="inputLogin" id="password" name="password" /><input type="checkbox" class="show-pass" id="show" /><label class="label-show">Mostrar</label>
                    </th>
                </tr>
                <tr>
                    <th colspan="2">
                        <input type="button" id="btn_submit" class="boton" value="Aceptar" disabled>
                    </th>

                </tr>
            </table>
        </div>
    </main>

    <footer><img src="images/footer.png" /></footer>
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/login.js"></script>
</body>

</html>