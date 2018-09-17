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
    <link rel="shortcut icon" type="image/x-icon" href="../img/favico.png">
</head>
<?php
include '../back/conexion.php';

if (!isset($_SESSION['username'])){
    header("Location: ../public/index.php");
}

if (isset($_GET['id'])){
    $idUsuario = $_GET['id'];
    $_SESSION['idUsuario'] = $_GET['id'];
}

$consulta = mysqli_query($con,"SELECT * FROM `user` WHERE `idUser`='" . $idUsuario . "';");
$usuario = mysqli_fetch_array($consulta);

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
    <header id="crear-header">Editar Usuario</header>
    <form action="../back/editarUsuario.php" enctype="multipart/form-data" method="post" id="crear" style="padding: 30px">
        <label for="nombre" class="titulos">Nombre</label>
        <?php
        echo "<input type=\"text\" placeholder=\"Nombre\" id=\"nombre\" name=\"nombre\" value='" . $usuario['nombre'] . "' required><br><br>"
        ?>
        <label for="nombre" class="titulos">Correo</label>
        <?php
        echo "<input type=\"email\" placeholder=\"Correo\" id=\"mail\" name=\"mail\" value='" . $usuario['correo'] . "' required><br><br>"
        ?>
        <label for="genero" class="titulos">Genero</label>
        <select id="genero" name="genero" required>
            <?php
            if ($usuario['genero']==='F'){
                echo "<option value='F' selected>Femenino</option>
                    <option value='M'>Masculino</option>";
            }else{
                echo "<option value='F'>Femenino</option>
                    <option value='M' selected>Masculino</option>";
            }
            ?>
        </select><br><br>
        <input name="enviar" type="submit" value="Editar" id="btnHorario"/><br>
    </form>
</div>
