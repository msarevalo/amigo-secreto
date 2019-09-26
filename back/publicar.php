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

$bogota = time() - (5 * 60 * 60);
$dia = date('Y-m-d H:i:s', $bogota);

$publicar = mysqli_query($con, "INSERT INTO `publicaciones` (`fecha`, `idUser`, `publicacion`) VALUES ('" . $dia . "', '" . $usuario . "', '" . $public . "');");

if ($publicar){
    header("Location: ../public/home");
}else{
    //echo "<script>alert('Algo pasó, intenta nuevamente'); window.location.href='../public/home'</script>";
}