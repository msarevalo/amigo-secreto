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

$dia = getdate();

$publicar = mysqli_query($con, "INSERT INTO `publicaciones` (`fecha`, `usuario`, `publicacion`) VALUES ('" . $dia['year'] . "-" . $dia['mon'] ."-" . $dia['mday'] . " " . $dia['hours'] . ":" . $dia['minutes'] . ":" . $dia['seconds'] . "', '" . $usuario . "', '" . $public . "');");

if ($publicar){
    header("Location: ../public/home");
}else{
    echo "<script>alert('Algo pasó, intenta nuevamente'); window.location.href='../public/home'</script>";
}