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
<?php
include '../back/conexion.php';

if (!isset($_SESSION['username'])){
    header("Location: ../public/index.php");
}
?>
<body>
<div style="position: relative">
    <nav id="menu" class="left show">
        <ul>
            <li><a href="#"><i class="fa fa-home"></i><?php echo $_SESSION['username']?></a></li>
            <li><a href="" class="active"><i class="fa fa-home"></i>Inicio</a></li>
            <li><a href=""><i class="fa fa-laptop"></i>Muro</a></li>
            <li><a href=""><i class="fa fa-laptop"></i>Buzon</a></li>
            <li><a href="../back/cerrar.php"><i class="fa fa-phone"></i>Salir<img src="../img/cerrar.png" style="width: 15px"></a></li>
        </ul>
    </nav></div>
<div style="margin-left: 300px">
    <label>Prueba</label><br>
    <a href="../back/cerrar.php"><img src="../img/cerrar.png" style="width: 25%"></a>
</div>
</body>
</html>