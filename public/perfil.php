<!DOCTYPE html>
<html>
<head>
    <title>Celmedia | Amigo Secreto</title>
    <meta charset="UTF-8">
    <!-- Estilos -->
    <link href="../css/estilos.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cairo:300,400,700" rel="stylesheet">
    <!-- Scripts -->
    <link rel="shortcut icon" type="image/x-icon" href="../img/favico.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../js/index.js" type="application/javascript"></script>
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
    <img src="../img/banner.gif" style="margin-left: 88%; margin-top: 7.5%; z-index: 9; position: fixed; height: 90%;" class="left show">
</header>

<div>
</div>
<div style="position: relative;">
    <nav id="menu" class="left show">
        <ul>
            <!--<li style="margin-bottom: 5px; margin-left: 30px"><img src="../img/perfil.png" style="width: 16px"><?php //echo "<label class='titulos'>" . $_SESSION['username'] . "</label>"?></li>-->
            <li><a href="perfil.php" class="active"><i class="fa fa-laptop"></i>Mi Perfil</a></li>
            <li><a href="home.php"><i class="fa fa-home"></i>Inicio</a></li>
            <li><a href="muro-regalos.php"><i class="fa fa-laptop"></i>Muro de los regalos</a></li>
            <li><a href=""><i class="fa fa-laptop"></i>Buzon</a></li>
            <li><a href="../back/cerrar.php"><i class="fa fa-phone"></i>Salir<img src="../img/cerrar.png" style="width: 15px"></a></li>
        </ul>
    </nav></div>
<div id="texto">
    <?php
    $consulta = mysqli_query($con, "SELECT asignacion.personaje FROM asignacion WHERE asignacion.usuario = " . $_SESSION['id']);
    $respuesta = mysqli_fetch_all($consulta);

    $regalo = mysqli_query($con, "SELECT * FROM `regalos` WHERE `idPersonaje` = " . $respuesta[0][0]);
    $resregalo = mysqli_fetch_all($regalo);

    $personaje =mysqli_query($con, "SELECT asignacion.personaje, personajes.ruta, personajes.imagen FROM asignacion INNER JOIN personajes ON asignacion.personaje = personajes.idPersonaje AND asignacion.usuario = " . $_SESSION['id']);
    $img = mysqli_fetch_all($personaje);
    //echo $img[0][1];

    if ($resregalo){
        echo "
    <header id='public'>Edtia tu regalo</header>
    <form method=\"post\" action=\"../back/regaloedit.php\" id=\"publicar\">
        <textarea required maxlength=\"600\" rows=\"5\" cols=\"85\" placeholder=\"¿Quieres un viaje, un carro, una casa? ¡Escribe aquí qué es lo que quieres!\" id=\"edicion\" name=\"edicion\" onpaste=\"contarcaracteres();\" onkeyup=\"contarcaracteres2();\">" . $resregalo[0][2] . "</textarea><br>
        <label id=\"res\" style=\"color: #bbbbbb; margin-left: 85%\">0 / 600</label><br>
        <button style=\"margin-left: 80%\" id=\"boton\">Editar</button><br><br>
    </form>";
    }else{
        echo "
    <header id='public'>Cuéntale al mundo que quieres de regalo</header>
    <form method=\"post\" action=\"../back/regalo.php\" id=\"publicar\">
        <textarea required maxlength=\"600\" rows=\"5\" cols=\"85\" placeholder=\"¿Quieres un viaje, un carro, una casa? ¡Escribe aquí qué es lo que quieres!\" id=\"publicacion\" name=\"publicacion\" onpaste=\"contarcaracteres();\" onkeyup=\"contarcaracteres();\"></textarea><br>
        <label id=\"res\" style=\"color: #bbbbbb; margin-left: 85%\">0 / 600</label><br>
        <button style=\"margin-left: 80%\" id=\"boton\">Publicar</button><br><br>
    </form>";
    }
    ?>
</div>
<div id="texto1">
<header id='public'>Cambia la foto de tu personaje</header>
<form method="post" action="../back/fotoPefil.php" id="fotoperfil" enctype="multipart/form-data">
    <label class="file" title="" id="archi">
        <input id="fotografia" name="fotografia" type="file" onchange="this.parentNode.setAttribute('title', this.value.replace(/^.*[\\/]/, ''))" required/>
    </label>
    <?php
    echo "<img id='foto' src='http://52.15.245.23" . $img[0][1] . $img[0][2] . "'></img>";
    ?>
    <br>
    <button style="margin-left: 80%" id="boton">Editar</button><br><br>
</form>

    </div>