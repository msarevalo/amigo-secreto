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
    <label style="margin-left: 50%; font-size: 40px; margin-top: -5px">Muro Público</label>
    <img src="../img/banner.gif" style="margin-left: 88%; margin-top: 7.5%; z-index: 9; position: fixed; height: 90%;" class="left show">
</header>

<div>
</div>
<div style="position: relative;">
    <nav id="menu" class="left show">
        <ul>
            <!--<li style="margin-bottom: 5px; margin-left: 30px"><img src="../img/perfil.png" style="width: 16px"><?php //echo "<label class='titulos'>" . $_SESSION['username'] . "</label>"?></li>-->
            <li><a href="perfil"><i class="fa fa-laptop"></i>Mi Perfil</a></li>
            <li><a href="home" class="active"><i class="fa fa-home"></i>Muro Público</a></li>
            <li><a href="muro-regalos"><i class="fa fa-laptop"></i>Muro de los regalos</a></li>
            <li><a href="../back/cerrar.php"><i class="fa fa-phone"></i>Salir<img src="../img/cerrar.png" style="width: 15px"></a></li>
        </ul>
    </nav></div>

    <div id="texto">
        <header id='public'>Escribe en el Muro</header>
        <form method="post" action="../back/publicar.php" id="publicar" name="publicar">
            <textarea required maxlength="600" rows="5" cols="85" placeholder="Publica tu mensaje aquí...Todos van a leer tu mensaje jajajaja (risa malévola)" id="publicacion" name="publicacion" onpaste="contarcaracteres();" onkeyup="contarcaracteres();"></textarea><br>
            <img src="../img/emoji.png" style="width: 20px; margin-left: 79%; cursor: pointer" id="notificationLink">
            <label id="res" style="color: #bbbbbb;">0 / 600</label>

            <div id="notificationContainer">
                <center><div id="notificationTitle">Emojis</div></center>
                <div id="notificationsBody" class="notifications">
                    <table id="expresiones" name="expresiones">
                        <tr>
                            <td><img src="../img/emojis/Expresiones/1f601.png" onclick="document.publicar.publicacion.value+='&#x1F601'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/Expresiones/1f602.png" onclick="document.publicar.publicacion.value+='&#x1F602'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/Expresiones/1f603.png" onclick="document.publicar.publicacion.value+='&#x1F603'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/Expresiones/1f604.png" onclick="document.publicar.publicacion.value+='&#x1F604'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/Expresiones/1f605.png" onclick="document.publicar.publicacion.value+='&#x1F605'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/Expresiones/1f606.png" onclick="document.publicar.publicacion.value+='&#x1F606'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/Expresiones/1f609.png" onclick="document.publicar.publicacion.value+='&#x1F609'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/Expresiones/1f60a.png" onclick="document.publicar.publicacion.value+='&#x1F60A'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/Expresiones/1f60b.png" onclick="document.publicar.publicacion.value+='&#x1F60B'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/Expresiones/1f60c.png" onclick="document.publicar.publicacion.value+='&#x1F60C'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/Expresiones/1f60d.png" onclick="document.publicar.publicacion.value+='&#x1F60D'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/Expresiones/1f60f.png" onclick="document.publicar.publicacion.value+='&#x1F60F'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/Expresiones/1f612.png" onclick="document.publicar.publicacion.value+='&#x1F612'" style="width: 25px; cursor: pointer"></td>
                        </tr>
                        <tr>
                            <td><img src="../img/emojis/Expresiones/1f613.png" onclick="document.publicar.publicacion.value+='&#x1F613'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/Expresiones/1f614.png" onclick="document.publicar.publicacion.value+='&#x1F614'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/Expresiones/1f616.png" onclick="document.publicar.publicacion.value+='&#x1F616'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/Expresiones/1f618.png" onclick="document.publicar.publicacion.value+='&#x1F618'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/Expresiones/1f61a.png" onclick="document.publicar.publicacion.value+='&#x1F61A'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/Expresiones/1f61c.png" onclick="document.publicar.publicacion.value+='&#x1F61C'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/Expresiones/1f61d.png" onclick="document.publicar.publicacion.value+='&#x1F61D'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/Expresiones/1f61e.png" onclick="document.publicar.publicacion.value+='&#x1F61E'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/Expresiones/1f620.png" onclick="document.publicar.publicacion.value+='&#x1F620'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/Expresiones/1f621.png" onclick="document.publicar.publicacion.value+='&#x1F621'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/Expresiones/1f622.png" onclick="document.publicar.publicacion.value+='&#x1F622'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/Expresiones/1f623.png" onclick="document.publicar.publicacion.value+='&#x1F623'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/Expresiones/1f624.png" onclick="document.publicar.publicacion.value+='&#x1F624'" style="width: 25px; cursor: pointer"></td>
                        </tr>
                        <tr>
                            <td><img src="../img/emojis/Expresiones/1f625.png" onclick="document.publicar.publicacion.value+='&#x1F625'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/Expresiones/1f628.png" onclick="document.publicar.publicacion.value+='&#x1F628'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/Expresiones/1f629.png" onclick="document.publicar.publicacion.value+='&#x1F629'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/Expresiones/1f62a.png" onclick="document.publicar.publicacion.value+='&#x1F62A'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/Expresiones/1f62b.png" onclick="document.publicar.publicacion.value+='&#x1F62B'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/Expresiones/1f62d.png" onclick="document.publicar.publicacion.value+='&#x1F62D'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/Expresiones/1f630.png" onclick="document.publicar.publicacion.value+='&#x1F630'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/Expresiones/1f631.png" onclick="document.publicar.publicacion.value+='&#x1F631'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/Expresiones/1f632.png" onclick="document.publicar.publicacion.value+='&#x1F632'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/Expresiones/1f633.png" onclick="document.publicar.publicacion.value+='&#x1F633'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/Expresiones/1f635.png" onclick="document.publicar.publicacion.value+='&#x1F635'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/Expresiones/1f637.png" onclick="document.publicar.publicacion.value+='&#x1F637'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/Expresiones/1f638.png" onclick="document.publicar.publicacion.value+='&#x1F638'" style="width: 25px; cursor: pointer"></td>
                        </tr>
                        <tr>
                            <td><img src="../img/emojis/Expresiones/1f639.png" onclick="document.publicar.publicacion.value+='&#x1F639'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/Expresiones/1f63a.png" onclick="document.publicar.publicacion.value+='&#x1F63A'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/Expresiones/1f63b.png" onclick="document.publicar.publicacion.value+='&#x1F63B'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/Expresiones/1f63c.png" onclick="document.publicar.publicacion.value+='&#x1F63C'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/Expresiones/1f63d.png" onclick="document.publicar.publicacion.value+='&#x1F63D'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/Expresiones/1f63e.png" onclick="document.publicar.publicacion.value+='&#x1F63E'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/Expresiones/1f63f.png" onclick="document.publicar.publicacion.value+='&#x1F63F'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/Expresiones/1f640.png" onclick="document.publicar.publicacion.value+='&#x1F640'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/Expresiones/1f645.png" onclick="document.publicar.publicacion.value+='&#x1F645'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/Expresiones/1f646.png" onclick="document.publicar.publicacion.value+='&#x1F646'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/Expresiones/1f647.png" onclick="document.publicar.publicacion.value+='&#x1F647'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/Expresiones/1f648.png" onclick="document.publicar.publicacion.value+='&#x1F648'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/Expresiones/1f649.png" onclick="document.publicar.publicacion.value+='&#x1F649'" style="width: 25px; cursor: pointer"></td>
                        </tr>
                        <tr>
                            <td><img src="../img/emojis/Expresiones/1f64a.png" onclick="document.publicar.publicacion.value+='&#x1F64A'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/Expresiones/1f64b.png" onclick="document.publicar.publicacion.value+='&#x1F64B'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/Expresiones/1f64c.png" onclick="document.publicar.publicacion.value+='&#x1F64C'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/Expresiones/1f64d.png" onclick="document.publicar.publicacion.value+='&#x1F64D'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/Expresiones/1f64f.png" onclick="document.publicar.publicacion.value+='&#x1F64F'" style="width: 25px; cursor: pointer"></td>
                        </tr>
                    </table>
                    <table id="iconos" name="iconos" style="display: none">
                        <tr>
                            <td><img src="../img/emojis/iconos/2702.png" onclick="document.publicar.publicacion.value+='&#x2702'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/iconos/2705.png" onclick="document.publicar.publicacion.value+='&#x2705'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/iconos/2708.png" onclick="document.publicar.publicacion.value+='&#x2708'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/iconos/2709.png" onclick="document.publicar.publicacion.value+='&#x2709'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/iconos/270b.png" onclick="document.publicar.publicacion.value+='&#x270B'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/iconos/270c.png" onclick="document.publicar.publicacion.value+='&#x270C'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/iconos/270f.png" onclick="document.publicar.publicacion.value+='&#x270F'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/iconos/2714.png" onclick="document.publicar.publicacion.value+='&#x2714'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/iconos/2716.png" onclick="document.publicar.publicacion.value+='&#x2716'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/iconos/2728.png" onclick="document.publicar.publicacion.value+='&#x2728'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/iconos/2733.png" onclick="document.publicar.publicacion.value+='&#x2733'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/iconos/2734.png" onclick="document.publicar.publicacion.value+='&#x2734'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/iconos/2744.png" onclick="document.publicar.publicacion.value+='&#x2744'" style="width: 25px; cursor: pointer"></td>
                        </tr>
                        <tr>
                            <td><img src="../img/emojis/iconos/2747.png" onclick="document.publicar.publicacion.value+='&#x2747'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/iconos/274c.png" onclick="document.publicar.publicacion.value+='&#x274C'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/iconos/274e.png" onclick="document.publicar.publicacion.value+='&#x274E'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/iconos/2753.png" onclick="document.publicar.publicacion.value+='&#x2753'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/iconos/2754.png" onclick="document.publicar.publicacion.value+='&#x2754'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/iconos/2755.png" onclick="document.publicar.publicacion.value+='&#x2755'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/iconos/2757.png" onclick="document.publicar.publicacion.value+='&#x2757'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/iconos/2764.png" onclick="document.publicar.publicacion.value+='&#x2764'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/iconos/2795.png" onclick="document.publicar.publicacion.value+='&#x2795'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/iconos/2796.png" onclick="document.publicar.publicacion.value+='&#x2796'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/iconos/2797.png" onclick="document.publicar.publicacion.value+='&#x2797'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/iconos/27a1.png" onclick="document.publicar.publicacion.value+='&#x27A1'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/iconos/27b0.png" onclick="document.publicar.publicacion.value+='&#x27B0'" style="width: 25px; cursor: pointer"></td>
                        </tr>
                    </table>
                    <table id="transportes" name="transportes" style="display: none;">
                        <tr>
                            <td><img src="../img/emojis/transportes/1f680.png" onclick="document.publicar.publicacion.value+='&#x1F680'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/transportes/1f683.png" onclick="document.publicar.publicacion.value+='&#x1F683'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/transportes/1f684.png" onclick="document.publicar.publicacion.value+='&#x1F684'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/transportes/1f685.png" onclick="document.publicar.publicacion.value+='&#x1F685'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/transportes/1f687.png" onclick="document.publicar.publicacion.value+='&#x1F687'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/transportes/1f689.png" onclick="document.publicar.publicacion.value+='&#x1F689'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/transportes/1f68c.png" onclick="document.publicar.publicacion.value+='&#x1F68C'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/transportes/1f68f.png" onclick="document.publicar.publicacion.value+='&#x1F68F'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/transportes/1f691.png" onclick="document.publicar.publicacion.value+='&#x1F691'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/transportes/1f692.png" onclick="document.publicar.publicacion.value+='&#x1F692'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/transportes/1f693.png" onclick="document.publicar.publicacion.value+='&#x1F693'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/transportes/1f695.png" onclick="document.publicar.publicacion.value+='&#x1F695'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/transportes/1f697.png" onclick="document.publicar.publicacion.value+='&#x1F697'" style="width: 25px; cursor: pointer"></td>
                        </tr>
                        <tr>
                            <td><img src="../img/emojis/transportes/1f699.png" onclick="document.publicar.publicacion.value+='&#x1F699'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/transportes/1f69a.png" onclick="document.publicar.publicacion.value+='&#x1F69A'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/transportes/1f6a2.png" onclick="document.publicar.publicacion.value+='&#x1F6A2'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/transportes/1f6a4.png" onclick="document.publicar.publicacion.value+='&#x1F6A4'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/transportes/1f6a5.png" onclick="document.publicar.publicacion.value+='&#x1F6A5'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/transportes/1f6a7.png" onclick="document.publicar.publicacion.value+='&#x1F6A7'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/transportes/1f6a8.png" onclick="document.publicar.publicacion.value+='&#x1F6A8'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/transportes/1f6a9.png" onclick="document.publicar.publicacion.value+='&#x1F6A9'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/transportes/1f6aa.png" onclick="document.publicar.publicacion.value+='&#x1F6AA'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/transportes/1f6ab.png" onclick="document.publicar.publicacion.value+='&#x1F6AB'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/transportes/1f6ac.png" onclick="document.publicar.publicacion.value+='&#x1F6AC'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/transportes/1f6ad.png" onclick="document.publicar.publicacion.value+='&#x1F6AD'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/transportes/1f6b2.png" onclick="document.publicar.publicacion.value+='&#x1F6B2'" style="width: 25px; cursor: pointer"></td>
                        </tr>
                        <tr>
                            <td><img src="../img/emojis/transportes/1f6b6.png" onclick="document.publicar.publicacion.value+='&#x1F6B6'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/transportes/1f6b9.png" onclick="document.publicar.publicacion.value+='&#x1F6B9'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/transportes/1f6ba.png" onclick="document.publicar.publicacion.value+='&#x1F6BA'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/transportes/1f6bb.png" onclick="document.publicar.publicacion.value+='&#x1F6BB'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/transportes/1f6bc.png" onclick="document.publicar.publicacion.value+='&#x1F6BC'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/transportes/1f6bd.png" onclick="document.publicar.publicacion.value+='&#x1F6BD'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/transportes/1f6be.png" onclick="document.publicar.publicacion.value+='&#x1F6BE'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/transportes/1f6c0.png" onclick="document.publicar.publicacion.value+='&#x1F6C0'" style="width: 25px; cursor: pointer"></td>
                        </tr>
                    </table>
                    <table id="especiales" name="especiales" style="display: none">
                        <tr>
                            <td><img src="../img/emojis/especiales/24c2.png" onclick="document.publicar.publicacion.value+='&#x24C2'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/especiales/1f170.png" onclick="document.publicar.publicacion.value+='&#x1F170'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/especiales/1f171.png" onclick="document.publicar.publicacion.value+='&#x1F171'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/especiales/1f17e.png" onclick="document.publicar.publicacion.value+='&#x1F17E'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/especiales/1f17f.png" onclick="document.publicar.publicacion.value+='&#x1F17F'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/especiales/1f18e.png" onclick="document.publicar.publicacion.value+='&#x1F18E'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/especiales/1f191.png" onclick="document.publicar.publicacion.value+='&#x1F191'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/especiales/1f192.png" onclick="document.publicar.publicacion.value+='&#x1F192'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/especiales/1f193.png" onclick="document.publicar.publicacion.value+='&#x1F193'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/especiales/1f194.png" onclick="document.publicar.publicacion.value+='&#x1F194'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/especiales/1f195.png" onclick="document.publicar.publicacion.value+='&#x1F195'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/especiales/1f196.png" onclick="document.publicar.publicacion.value+='&#x1F196'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/especiales/1f197.png" onclick="document.publicar.publicacion.value+='&#x1F197'" style="width: 25px; cursor: pointer"></td>
                        </tr>
                        <tr>
                            <td><img src="../img/emojis/especiales/1f198.png" onclick="document.publicar.publicacion.value+='&#x1F198'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/especiales/1f199.png" onclick="document.publicar.publicacion.value+='&#x1F199'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/especiales/1f19a.png" onclick="document.publicar.publicacion.value+='&#x1F19A'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/especiales/1f201.png" onclick="document.publicar.publicacion.value+='&#x1F201'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/especiales/1f202.png" onclick="document.publicar.publicacion.value+='&#x1F202'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/especiales/1f21a.png" onclick="document.publicar.publicacion.value+='&#x1F21A'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/especiales/1f22f.png" onclick="document.publicar.publicacion.value+='&#x1F22F'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/especiales/1f232.png" onclick="document.publicar.publicacion.value+='&#x1F232'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/especiales/1f233.png" onclick="document.publicar.publicacion.value+='&#x1F233'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/especiales/1f234.png" onclick="document.publicar.publicacion.value+='&#x1F234'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/especiales/1f235.png" onclick="document.publicar.publicacion.value+='&#x1F235'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/especiales/1f236.png" onclick="document.publicar.publicacion.value+='&#x1F236'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/especiales/1f237.png" onclick="document.publicar.publicacion.value+='&#x1F237'" style="width: 25px; cursor: pointer"></td>
                        </tr>
                        <tr>
                            <td><img src="../img/emojis/especiales/1f238.png" onclick="document.publicar.publicacion.value+='&#x1F238'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/especiales/1f239.png" onclick="document.publicar.publicacion.value+='&#x1F239'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/especiales/1f23a.png" onclick="document.publicar.publicacion.value+='&#x1F23A'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/especiales/1f250.png" onclick="document.publicar.publicacion.value+='&#x1F250'" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/especiales/1f251.png" onclick="document.publicar.publicacion.value+='&#x1F251'" style="width: 25px; cursor: pointer"></td>
                        </tr>
                    </table>
                </div>
                <div id="notificationFooter">
                    <table>
                        <tr>
                            <td><img src="../img/emojis/expresiones.png" alt="expresiones" id="expresion" name="expresion" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/iconos.png" alt="inconos" id="icono" name="icono" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/transporte.png" alt="transportes" id="transporte" name="transporte" style="width: 25px; cursor: pointer"></td>
                            <td><img src="../img/emojis/especiales.png" alt="especiales" id="especial" name="especial" style="width: 25px; cursor: pointer"></td>
                        </tr>
                    </table>
                </div>
            </div>
            <?php
            if (sizeof($resas)== 0){
                echo "<label style='margin-left: 30%'>Espera el sorteo para participar en el muro</label>";
            }else{
              echo "
            <select style=\"margin-left: 46%\" id=\"persona\" name=\"persona\">
                <option value=\"0\" selected>Anonimo</option>
                <option value=\"1\">Publicar con mi personaje</option>
            </select>
            <button id=\"boton\">Publicar Mensaje</button>";
            }
            ?>
            <br><br>
        </form>
    </div>
<div style="margin-left: 18%">
    <div style="margin-top: 25px; margin-left: 17%; width: 650px; background-color: #f1f1f1">
        <?php
        $public =mysqli_query($con, "SELECT * FROM `publicaciones` ORDER BY `publicaciones`.`fecha` DESC");
        $respuesta = mysqli_fetch_all($public);

        //echo $_SESSION['id'];
        for ($i = 0; $i<sizeof($respuesta); $i++){
            $nomPer =mysqli_query($con, "SELECT asignacion.personaje, personajes.nombre, personajes.color FROM asignacion INNER JOIN personajes ON asignacion.personaje = personajes.idPersonaje AND asignacion.usuario = " . $respuesta[$i][2]);
            $nom = mysqli_fetch_all($nomPer);
            echo "<div style='background-color: #ffffff; margin-bottom: 10px'>";

            if (sizeof($nom)==0){
                echo "<header id='mensajes1'>Anonimo</header><table><tr><label id='date'>" . $respuesta[$i][1];
            }else{
                if ($nom[0][2] === '#ffffff') {
                    echo "<header id='mensajes' style='box-shadow: 0 0 1px #818181; background-color: " . $nom[0][2] . "'><label style='color: #222222'>" . $nom[0][1] . "</label></header><table><tr><label id='date'>" . $respuesta[$i][1];
                }else{
                    if ($nom[0][2] === '#f1f1f1'){
                        echo "<header id='mensajes' style='box-shadow: 0 0 1px #818181; background-color: " . $nom[0][2] . "'><label style='color: #222222'>" . $nom[0][1] . "</label></header><table><tr><label id='date'>" . $respuesta[$i][1];
                    }else {
                        echo "<header id='mensajes' style='background-color: " . $nom[0][2] . "'>" . $nom[0][1] . "</header><table><tr><label id='date'>" . $respuesta[$i][1];
                    }
                }
            }


            echo "</label></tr><tr>";

            if ($respuesta[$i][2]==0){
                echo "<td><img src='../img/anonimo.png' style='width: 100px; height: 100px; padding-left: 5px'></td>";
            }else{
                $personaje =mysqli_query($con, "SELECT asignacion.personaje, personajes.ruta, personajes.imagen FROM asignacion INNER JOIN personajes ON asignacion.personaje = personajes.idPersonaje AND asignacion.usuario = " . $respuesta[$i][2]);
                $img = mysqli_fetch_all($personaje);
                //echo $img[0][2] . "<br>";
                echo "<td><img src='http://52.15.245.23" . $img[0][1] . $img[0][2] . "' style='width: 100px; height: 100px; padding-left: 5px'></td>";
            }
            if(strlen($respuesta[$i][3]) > 73) { // verifica si el texto tiene mas de 80 caracteres

                $respuesta[$i][3] = wordwrap($respuesta[$i][3],73,"<br>",1); } // inserta el salto a los 80 car...

            else $respuesta[$i][3]=$respuesta[$i][3]; // si no es mas largo de 80 caracteres, lo deja igual

            echo "<td><label>" . $respuesta[$i][3] . "</label></td>";
            echo "</tr></table><br></div>";
        }
        ?>
    </div>
</div>
</body>
</html>