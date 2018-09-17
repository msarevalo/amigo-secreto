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
    <header id="crear-header">Crear Usuario</header>
    <form action="../back/crearUsuario.php" enctype="multipart/form-data" method="post" id="crear" style="padding: 30px">
        <!--<input id="archivo" accept=".csv" name="archivo" type="file" required/><br><br><br>-->
        <label for="nombre" class="titulos">Nombre</label>
        <input type="text" placeholder="Nombre" id="nombre" name="nombre" required><br><br>
        <label for="nombre" class="titulos">Correo</label>
        <input type="email" placeholder="Correo" id="mail" name="mail" required><br><br>
        <label for="genero" class="titulos">Genero</label>
        <select id="genero" name="genero" required>
            <option disabled selected value="">Seleccione</option>
            <option value="F">Femenino</option>
            <option value="M">Masculino</option>
        </select><br><br>
        <label class="titulos" for="pass">Contraseña</label>
        <input type="password" placeholder="Contraseña" id="pass" name="pass" required><br><br>
        <input name="enviar" type="submit" value="Crear" id="btnHorario"/><br>
    </form>
</div>