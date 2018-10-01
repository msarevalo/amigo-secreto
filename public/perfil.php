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

$asignacion = mysqli_query($con, "SELECT * FROM `asignacion` ");
$resas = mysqli_fetch_all($asignacion);
?>
<body style="background-color: #f1f1f1; font-family: 'Cairo', sans-serif;">
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
            <li><a href="perfil" class="active"><i class="fa fa-laptop"></i>Mi Perfil</a></li>
            <li><a href="home"><i class="fa fa-home"></i>Muro Público</a></li>
            <li><a href="muro-regalos"><i class="fa fa-laptop"></i>Muro de los regalos</a></li>
            <li><a href="../back/cerrar.php"><i class="fa fa-phone"></i>Salir<img src="../img/cerrar.png" style="width: 15px"></a></li>
        </ul>
    </nav></div>

<div id="texto1">
<header id='public'>Cambia como la gente ve a tu personaje</header>
<form method="post" action="../back/fotoPefil.php" id="fotoperfil" enctype="multipart/form-data">
    <?php
    if (sizeof($resas) != 0) {
        ?>
        <label class="file" title="" id="archi">
            <input id="fotografia" name="fotografia" type="file"
                   onchange="this.parentNode.setAttribute('title', this.value.replace(/^.*[\\/]/, ''))"/>
        </label>
        <?php
        //print_r($img);
        if ($img) {
            echo "<img id='foto' src='http://52.15.245.23" . $img[0][1] . $img[0][2] . "'></img>";
        }
        ?>
        <br><label class="titulos" for="color" style="margin-left: 40%; padding-top: 10px">Elige tu color</label>
        <?php
        if (sizeof($resas) != 0) {
            echo "<input type='color' name='color' id='color' value='" . $img[0][3] . "'></input>
    <br>
    <button style=\"margin-left: 80%\" id=\"boton\">Guardar</button><br><br>";
    }
    }else{
        echo "<label style='margin-left: 30%'>Espera el sorteo para editar a tu personaje</label>";
    }
    ?>
</form>

    </div>