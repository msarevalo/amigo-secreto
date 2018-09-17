<!DOCTYPE html>
<html>
<head>
    <title>Celmedia | Amigo Secreto</title>
    <meta charset="UTF-8">
    <!-- Estilos -->
    <link href="../css/estilos.css" rel="stylesheet">
    <!--<link href="../css/estilos.css" rel="stylesheet">
    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../js/index.js" type="application/javascript"></script>
    <link rel="shortcut icon" type="image/x-icon" href="../img/LOGO_blanco.png">
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
            <li><a href="admin.php"><i class="fa fa-home"></i>Inicio</a></li>
            <li><a href="personajes-admin.php"><i class="fa fa-laptop"></i>Personajes</a></li>
            <li><a href="usuarios-admin.php"><i class="fa fa-laptop"></i>Usuarios</a></li>
            <li><a href="asginar-personaje.php" class="active"><i class="fa fa-laptop"></i>Asignacion de Personajes</a></li>
            <li><a href="asignar-amigo.php"><i class="fa fa-laptop"></i>Aleatorio</a></li>
            <li><a href="../back/cerrar.php"><i class="fa fa-phone"></i>Salir<img src="../img/cerrar.png" style="width: 15px"></a></li>
        </ul>
    </nav>
</div>
<div style="margin-left: 350px">
    <?php
    $conteoUser = mysqli_query($con,"SELECT COUNT(`idUser`) FROM `user` WHERE `perfil` NOT LIKE '%admin%'");
    $cuser = mysqli_fetch_all($conteoUser);

    $conteoAsig = mysqli_query($con,"SELECT COUNT(`idAsignacion`) FROM `asignacion`");
    $casig = mysqli_fetch_all($conteoAsig);

    $perF = mysqli_query($con,"SELECT COUNT(`idPersonaje`) FROM `personajes` WHERE `genero` LIKE '%F%' AND `activo`=1");
    $resPerf = mysqli_fetch_all($perF);
    //echo $resPerf[0][0] . "<br><br>";

    $perM = mysqli_query($con,"SELECT COUNT(`idPersonaje`) FROM `personajes` WHERE `genero` LIKE '%M%' AND `activo`=1");
    $resPerm = mysqli_fetch_all($perM);
    //echo $resPerm[0][0] . "<br><br>";

    $userF = mysqli_query($con,"SELECT COUNT(`idUser`) FROM `user` WHERE `genero` LIKE '%F%' ");
    $resUserf = mysqli_fetch_all($userF);
    //echo $resUserf[0][0] . "<br><br>";

    $userM = mysqli_query($con,"SELECT COUNT(`idUser`) FROM `user` WHERE `genero` LIKE '%M%'");
    $resUserm = mysqli_fetch_all($userM);
    //echo $resUserm[0][0];
    //echo $cuser[0][0] . "<br>" . $casig[0][0];
    if ($casig[0][0] != 0) {
        if ($cuser == $casig) {
            echo "<label class='titulos'>Ya existe un aleatorio, si quieres hacer otro te sugerimos vaciar el actual</label>
                    <br><a href='../back/vaciarAleatorio.php' class='titulos'>Vaciar aleatorio</a>";
        } else {
            if ($cuser > $casig) {
                echo "<label class='titulos'>Has creado nuevos usuarios que no han sido asignados, te recomendamos que vacies el aleatorio para incluir a los nuevos usuarios</label>
                    <br><a href='../back/vaciarAleatorio.php' class='titulos'>Vaciar aleatorio</a>";
            } else {
                if ($cuser < $casig) {
                    echo "<label class='titulos'>Parece que has asignados personajes mas veces que los usuarios creados, por lo que es probable que haya usuarios con mas de un personaje</label>
                    <br><a href='../back/vaciarAleatorio.php' class='titulos'>Vaciar aleatorio</a>";
                } else {
                    if ($resUserf == $resPerf && $resUserm == $resPerm) {
                        //echo "Habemus Coherencia";
                        echo "<a href='../back/aleatorio.php'><button>Asignar los personajes</button></a>";
                    } else {
                        echo "<label class='titulos'>Los generos de los usuarios no coincide con los generos de los personajes</label>";
                    }
                }
            }
        }
    }else{
        if ($resUserf == $resPerf && $resUserm == $resPerm) {
            //echo "Habemus Coherencia";
            echo "<a href='../back/aleatorio.php'><button>Asignar los personajes</button></a>";
        } else {
            echo "<label class='titulos'>Los generos de los usuarios no coincide con los generos de los personajes</label>";
        }
    }
    ?>
</div>