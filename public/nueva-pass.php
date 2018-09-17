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
<?php
include ('../back/conexion.php');

if (isset($_GET['id'])){
    $_SESSION['restablece'] = $_GET['id'];
}

?>
<div>
    <form method="post" action="../back/npass" enctype="multipart/form-data" id="restrablece">
        <label for="pass">Contraseña</label>
        <input type="password" placeholder="Contraseña" id="pass" name="pass" required><br><br>
        <label for="rpass">Repetir Contraseña</label>
        <input type="password" placeholder="Contraseña" id="rpass" name="rpass" required><br><br>
        <input type="submit" value="Restablecer">
    </form>
</div>
</body>
</html>