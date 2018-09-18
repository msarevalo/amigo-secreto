<?php

include ('conexion.php');

if (isset($_POST['nombre'])){
    $nombre = $_POST['nombre'];
}

if (isset($_POST['mail'])){
    $correo = $_POST['mail'];
}

if (isset($_POST['genero'])){
    $genero = $_POST['genero'];
}

$consulta = mysqli_query($con, "UPDATE `user` SET `correo` = '" . $correo . "', `nombre`='" . $nombre . "', `genero`='" . $genero . "' WHERE `user`.`idUser` = ". $_SESSION['idUsuario'] . ";");

if ($consulta){
    echo "<script>alert('Se editó el registro con exito'); window.location.href='../public/usuarios-admin'</script>";
}else{
    echo "<script>alert('Algo ha fallado'); window.location.href='../public/editar-usuario?id=" . $_SESSION['idUsuario'] . "'</script>";
}