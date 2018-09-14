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
</head>
<body onload="noVolver()">
<div><img src="../img/amormania-logo.png" style="width: 25%"></div>
    <div>
        <form method="post" action="../back/login.php" enctype="multipart/form-data" id="login">
            <table>
                <tr>
                    <th>
                        <label>Correo</label>
                    </th>
                    <th>
                        <input type="email" placeholder="Correo" id="usuario" name="usuario" required>
                    </th>
                </tr>
                <tr>
                    <th>
                        <label>Contraseña</label>
                    </th>
                    <th>
                        <input type="password" placeholder="Contraseña" id="pass" name="pass" required>
                    </th>
                </tr>
            </table>
            <label for="ver">Ver Contraseña</label>
            <input type="checkbox" id="ver"><br>
            <input type="submit" value="Ingresar"><br><br>
            <a href="olvide.php" style="text-decoration: none">Olvide mi contraseña</a><br>
            <a href="registro.php" style="text-decoration: none">Aun no tengo cuenta</a>
        </form>
    </div>
</body>
</html>