<!DOCTYPE html>
<html>
<head>
    <title>Celmedia | Amigo Secreto</title>
    <meta charset="UTF-8">
    <!-- Estilos -->
    <link href="../css/estilos.css" rel="stylesheet">
    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../js/index.js" type="application/javascript"></script>
    <link rel="shortcut icon" type="image/x-icon" href="../img/favico.png">
</head>
<body onload="noVolver()" style="background-color: #1A1A1A">
<div style="margin-left: 35%; margin-top: 8%; background-color: #f1f1f1; width: 400px; border-radius: 10px;
box-shadow: 0 0 15px #ececec;">
<div><img src="../img/amormania-logo.png" style="width: 90%; margin-left: 5%; margin-top: 8%"></div>
    <div style="margin-left: 10%">
        <form method="post" action="../back/login.php" enctype="multipart/form-data" id="login">
            <table>
                <tr>
                    <th>
                        <label class="titulos">Correo</label>
                    </th>
                    <th>
                        <input type="email" placeholder="Correo" id="usuario" name="usuario" required class="entradas">
                    </th>
                </tr>
                <tr>
                    <th>
                        <label class="titulos">Contraseña</label>
                    </th>
                    <th>
                        <input type="password" placeholder="Contraseña" id="pass" name="pass" required class="entradas">
                    </th>
                </tr>
            </table>
            <label for="ver" class="titulos" style="margin-left: 25%">Ver Contraseña</label>
            <input type="checkbox" id="ver"><br>
            <input type="submit" value="Ingresar" id="boton-login" style="margin-left: 30%"><br><br>
            <a href="olvide" style="text-decoration: none; margin-left: 22%" class="titulos">Olvide mi contraseña</a><br>
            <a href="registro" style="text-decoration: none; margin-left: 22%" class="titulos">Aun no tengo cuenta</a>
        </form>
    </div>
</div>
</body>
</html>