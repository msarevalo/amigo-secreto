<?php
include ('conexion.php');

$idEliminar = null;
if (isset($_GET['id'])){
    $idEliminar = $_GET['id'];
}


$consulta = mysqli_query($con,"DELETE FROM `personajes` WHERE `personajes`.`idPersonaje` = '" . $idEliminar . "';");
if ($consulta){
    echo "<script>alert('Se elimino correctamente el personaje'); window.location.href='../public/personajes-admin.php'</script>";
}else{
    echo "<script>alert('Algo ha fallado'); window.location.href='../public/personajes-admin.php'</script>";
}


?>