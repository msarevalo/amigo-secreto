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
            <li><a href="admin"><i class="fa fa-home"></i>Inicio</a></li>
            <li><a href="personajes-admin"><i class="fa fa-laptop"></i>Personajes</a></li>
            <li><a href="usuarios-admin"><i class="fa fa-laptop"></i>Usuarios</a></li>
            <li><a href="asginar-personaje"><i class="fa fa-laptop"></i>Asignacion de Personajes</a></li>
            <li><a href="asignar-amigo"><i class="fa fa-laptop"></i>Aleatorio</a></li>
            <li><a href="correo-informativo" class="active"><i class="fa fa-laptop"></i>Correo informativo</a></li>
            <li><a href="../back/cerrar"><i class="fa fa-phone"></i>Salir<img src="../img/cerrar.png" style="width: 15px"></a></li>
        </ul>
    </nav></div>
<div style="margin-left: 350px">
    <form action="../back/importar.php" enctype="multipart/form-data" method="post" id="crear" style="padding: 30px">
        <!--<input id="archivo" accept=".csv" name="archivo" type="file" required/><br><br><br>-->
        <label class="file" title="">
            <input id="archivo" accept=".csv" name="archivo" type="file" onchange="this.parentNode.setAttribute('title', this.value.replace(/^.*[\\/]/, ''))" required/>
        </label><br><br><br>
        <input name="enviar" type="submit" value="Importar" id="boton-login"/><br>
    </form>
</div>