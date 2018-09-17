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
    <script src="../js/index.js" type="application/javascript"></script>.
    <link rel="shortcut icon" type="image/x-icon" href="../img/favico.png">
</head>
<?php
include ('../back/conexion.php');

if (!isset($_SESSION['username'])){
    header("Location: ../public/index.php");
}
?>
<body style="background-color: #f1f1f1">
<header id="header" class="left show">
    <img src="../img/LOGO_blanco.png" style="width: 270px; margin-top: 20px">
    <label style="margin-left: 50%; font-size: 40px; margin-top: -5px">Mi Perfil</label>
</header>
<div style="position: relative;">
    <nav id="menu" class="left show">
        <ul>
            <!--<li style="margin-bottom: 5px; margin-left: 30px"><img src="../img/perfil.png" style="width: 16px"><?php //echo "<label class='titulos'>" . $_SESSION['username'] . "</label>"?></li>-->
            <li><a href="perfil.php" class="active"><i class="fa fa-laptop"></i>Mi Perfil</a></li>
            <li><a href="home.php"><i class="fa fa-home"></i>Inicio</a></li>
            <li><a href=""><i class="fa fa-laptop"></i>Muro de los regalos</a></li>
            <li><a href=""><i class="fa fa-laptop"></i>Buzon</a></li>
            <li><a href="../back/cerrar.php"><i class="fa fa-phone"></i>Salir<img src="../img/cerrar.png" style="width: 15px"></a></li>
        </ul>
    </nav></div>