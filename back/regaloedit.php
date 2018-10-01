<?php

include ('conexion.php');


if ($_POST['publicacion']){
    $public = $_POST['publicacion'];
}

$consulta = mysqli_query($con, "SELECT asignacion.personaje FROM asignacion WHERE asignacion.usuario = " . $_SESSION['id']);
$respuesta = mysqli_fetch_all($consulta);
//echo $public;
//print_r($respuesta);exit();

$publicar = mysqli_query($con, "UPDATE `regalos` SET `regalo` = '" . $public . "' WHERE `regalos`.`idPersonaje` = " . $respuesta[0][0] . ";");

if ($publicar){
    //header("Location: ../public/perfil.php");
    echo "<script>alert('Se ha editado tu regalo'); window.location.href='../public/muro-regalos'</script>";
}else{
    echo "<script>alert('Algo pasó, intenta nuevamente'); window.location.href='../public/muro-regalos'</script>";
}