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
            <li><a href="usuarios-admin.php" class="active"><i class="fa fa-laptop"></i>Usuarios</a></li>
            <li><a href="asginar-personaje.php"><i class="fa fa-laptop"></i>Asignacion de Personajes</a></li>
            <li><a href="asignar-amigo.php"><i class="fa fa-laptop"></i>Aleatorio</a></li>
            <li><a href="../back/cerrar.php"><i class="fa fa-phone"></i>Salir<img src="../img/cerrar.png" style="width: 15px"></a></li>
        </ul>
    </nav>
</div>

<div style="margin-left: 350px">
    <?php
    $hombres =mysqli_query($con, "SELECT COUNT(`idUser`) FROM `user` WHERE `genero`='M'");
    $resHom = mysqli_fetch_all($hombres);
    $mujeres =mysqli_query($con, "SELECT COUNT(`iduser`) FROM `user` WHERE `genero`='F'");
    $resMuj = mysqli_fetch_all($mujeres);
    if ($resHom){
        $canhom = $resHom[0][0];
    }
    if ($resMuj){
        $canmuj = $resMuj[0][0];
    }
    ?>
    <table>
        <tr>
            <th>
                <label>Cantidad de usuarios masculinos</label>
            </th>
            <th>
                <label>Cantidad de usuarios femeninos</label>
            </th>
        </tr>
        <tr>
            <th>
                <label><?php echo $canhom?></label>
            </th>
            <th>
                <label><?php echo $canmuj?></label>
            </th>
        </tr>
    </table><br><br>
    <a href="crear-usuario.php">Crear Usuario</a>
    <?php
    $id_eliminar = null;
    $dia_eliminar = null;
    $hora_eliminar = null;
    echo "<div id=\"listado-admin\" name=\"listado-admin\">
        <header>Usuarios</header>";
    $consulta = mysqli_query($con,"SELECT `idUser`, `correo`,`nombre`,`genero` FROM `user` WHERE `perfil` NOT LIKE '%admin%' ORDER BY `correo`");
    /*$lconsulta = mysqli_fetch_array($consulta);
    $long = count($lconsulta);*/
    echo "<table id='personajes'><thead><tr><th>Correo</th><th>Nombre</th><th>Genero</th><th>Acciones</th></tr></thead>";
    while ($lconsulta = mysqli_fetch_array($consulta)){
        $contador = 0;
        echo "<tr>";
        for ($i = 1; $i <= 3; $i++){
            $id_eliminar = $lconsulta['idUser'];
            echo "<td style='text-transform: capitalize'>" . $lconsulta[$i] . "</td>";
        }
        echo "<td><a href='editar-usuario.php?id={$lconsulta[$contador]}'><img src='../img/edit.png' style='width: 35%'></a>
                              <a onclick='alertaUsuario(" . $id_eliminar . ")'><img src='../img/delete.png' style='width: 25%; cursor: pointer'></a>
                              <a onclick='alertaRestablecer(" . $id_eliminar . ")'><img src='../img/restablecer.png' style='width: 25%; cursor: pointer'></a></td>";
        $contador++;
    }

    echo "</tr>";
    echo "</table>
        </div>";?><br>
</div>