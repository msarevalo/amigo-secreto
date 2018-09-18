<?php

include ('conexion.php');


if ($_POST['publicacion']){
    $public = $_POST['publicacion'];
}

$consulta = mysqli_query($con, "SELECT asignacion.personaje FROM asignacion WHERE asignacion.usuario = " . $_SESSION['id']);
$respuesta = mysqli_fetch_all($consulta);

$publicar = mysqli_query($con, "INSERT INTO `regalos` (`idPersonaje`, `regalo`) VALUES ('" . $respuesta[0][0] . "', '" . $public . "');");

if ($publicar){
    //header("Location: ../public/perfil.php");
    echo "<script>alert('Se ha publicado tu regalo'); window.location.href='../public/perfil.php'</script>";
}else{
    echo "<script>alert('Algo pasó, intenta nuevamente'); window.location.href='../public/perfil.php'</script>";
}