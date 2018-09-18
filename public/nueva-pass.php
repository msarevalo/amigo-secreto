<!DOCTYPE html>
<html>
<head>
    <title>Celmedia | Amigo Secreto</title>
    <meta charset="UTF-8">
    <!-- Estilos -->
    <link href="../css/estilos.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cairo:300,400,700" rel="stylesheet">
    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../js/index.js" type="application/javascript"></script>
    <link rel="shortcut icon" type="image/x-icon" href="../img/favico.png">
</head>
<body onload="noVolver()" style="background-color: #1A1A1A; font-family: 'Cairo', sans-serif;">
<?php
include ('../back/conexion.php');

if (isset($_GET['id'])){
    $_SESSION['restablece'] = $_GET['id'];
}

?>
<div style="margin-left: 35%; margin-top: 8%; background-color: #f1f1f1; width: 400px; border-radius: 10px;
box-shadow: 0 0 15px #ececec;">
    <form method="post" action="../back/npass.php" enctype="multipart/form-data" id="restrablece" style="margin-left: 10%">
        <label for="pass" class="titulos">Contraseña</label>
        <input type="password" placeholder="Contraseña" id="pass" name="pass" required class="entradas"><br><br>
        <label for="rpass" class="titulos">Repetir Contraseña</label>
        <input type="password" placeholder="Contraseña" id="rpass" name="rpass" required class="entradas"><br><br>
        <input type="submit" value="Restablecer" id="boton-login" style="margin-left: 30%"><br><br>
    </form>
</div>
</body>
</html>