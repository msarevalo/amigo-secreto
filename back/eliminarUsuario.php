<?php
include ('conexion.php');

$idEliminar = null;
if (isset($_GET['id'])){
    $idEliminar = $_GET['id'];
}


$consulta = mysqli_query($con,"DELETE FROM `user` WHERE `user`.`idUser` = '" . $idEliminar . "';");
if ($consulta){
    echo "<script>alert('Se elimino correctamente el usuario'); window.location.href='../public/usuarios-admin.php'</script>";
}else{
    echo "<script>alert('Algo ha fallado'); window.location.href='../public/usuarios-admin.php'</script>";
}


?>