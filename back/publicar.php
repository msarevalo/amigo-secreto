<?php

include ('conexion.php');

if ($_POST['persona']){
    $usuario = $_POST['persona'];
}

if ($_POST['publicacion']){
    $public = $_POST['publicacion'];
}

if ($usuario != 0 ){
    $usuario = $_SESSION['id'];
}
$zona = date_default_timezone_set('America/Bogota');
$dia = date('Y-m-d h:i:s', $zona);

$publicar = mysqli_query($con, "INSERT INTO `publicaciones` (`fecha`, `usuario`, `publicacion`) VALUES ('" . $dia . "', '" . $usuario . "', '" . $public . "');");

if ($publicar){
    header("Location: ../public/home");
}else{
    echo "<script>alert('Algo pasó, intenta nuevamente'); window.location.href='../public/home'</script>";
}