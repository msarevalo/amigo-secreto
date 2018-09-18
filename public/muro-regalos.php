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
    <label style="margin-left: 50%; font-size: 40px; margin-top: -5px">Muro de Regalos</label>
    <img src="../img/banner.gif" style="margin-left: 88%; margin-top: 7.5%; z-index: 9; position: fixed; height: 90%;" class="left show">
</header>

<div>
</div>
<div style="position: relative;">
    <nav id="menu" class="left show">
        <ul>
            <!--<li style="margin-bottom: 5px; margin-left: 30px"><img src="../img/perfil.png" style="width: 16px"><?php //echo "<label class='titulos'>" . $_SESSION['username'] . "</label>"?></li>-->
            <li><a href="perfil.php"><i class="fa fa-laptop"></i>Mi Perfil</a></li>
            <li><a href="home.php"><i class="fa fa-home"></i>Muro Público</a></li>
            <li><a href="muro-regalos.php" class="active"><i class="fa fa-laptop"></i>Muro de los regalos</a></li>
            <li><a href="../back/cerrar.php"><i class="fa fa-phone"></i>Salir<img src="../img/cerrar.png" style="width: 15px"></a></li>
        </ul>
    </nav></div>

<div style="margin-left: 18%; margin-top: 10%">
    <div style="margin-top: 25px; margin-left: 17%; width: 650px; background-color: #f1f1f1">
        <?php
        $public =mysqli_query($con, "SELECT * FROM `regalos` ORDER BY `regalos`.`idPersonaje`");
        $respuesta = mysqli_fetch_all($public);

        //echo $_SESSION['id'];
        for ($i = 0; $i<sizeof($respuesta); $i++){
            $nomPer =mysqli_query($con, "SELECT personajes.nombre FROM personajes WHERE personajes.idPersonaje = " . $respuesta[$i][1]);
            $nom = mysqli_fetch_all($nomPer);
            echo "<div style='background-color: #ffffff; margin-bottom: 10px'><header id='mensajes'>";

            echo $nom[0][0] . "</header><table><br><tr>";

            $personaje =mysqli_query($con, "SELECT personajes.ruta, personajes.imagen FROM personajes WHERE personajes.idPersonaje = " . $respuesta[$i][1]);
            $img = mysqli_fetch_all($personaje);
                //echo $img[0][2] . "<br>";
            echo "<td><img src='http://52.15.245.23" . $img[0][0] . $img[0][1] . "' style='width: 100px; height: 100px; padding-left: 5px'></td>";
            if(strlen($respuesta[$i][2]) > 73) { // verifica si el texto tiene mas de 80 caracteres

                $respuesta[$i][2] = wordwrap($respuesta[$i][2],73,"<br>",1); } // inserta el salto a los 80 car...

            else $respuesta[$i][2]=$respuesta[$i][2]; // si no es mas largo de 80 caracteres, lo deja igual

            echo "<td><label>" . $respuesta[$i][2] . "</label></td>";
            echo "</tr></table><br></div>";
        }
        ?>
    </div>
</div>