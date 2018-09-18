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

date_default_timezone_set('UTC -5'); // your user's timezone
$my_datetime='2013-10-23 15:47:10';
$dia = date('Y-m-d H:i:s',strtotime("$my_datetime UTC"));

$publicar = mysqli_query($con, "INSERT INTO `publicaciones` (`fecha`, `usuario`, `publicacion`) VALUES ('" . $dia['year'] . "-" . $dia['mon'] ."-" . $dia['mday'] . " " . $dia['hours'] . ":" . $dia['minutes'] . ":" . $dia['seconds'] . "', '" . $usuario . "', '" . $public . "');");

if ($publicar){
    header("Location: ../public/home");
}else{
    echo "<script>alert('Algo pasó, intenta nuevamente'); window.location.href='../public/home'</script>";
}