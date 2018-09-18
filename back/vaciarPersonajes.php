<?php

include ('conexion.php');

$consulta = mysqli_query($con,"TRUNCATE TABLE `personajes`;");
//$respuetsa = mysqli_fetch_all($consulta);
if ($consulta){
    echo "<script>alert('Se eliminaron correctamente los personajes'); window.location.href='../public/personajes-admin'</script>";
}else{
    echo "<script>alert('Algo ha fallado'); window.location.href='../public/personajes-admin'</script>";
}