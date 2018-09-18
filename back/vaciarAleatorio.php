<?php

include ('conexion.php');

$consulta = mysqli_query($con,"TRUNCATE TABLE `asignacion`;");
//$respuetsa = mysqli_fetch_all($consulta);
if ($consulta){
    echo "<script>alert('Se elimino correctamente el aleatorio'); window.location.href='../public/asginar-personaje'</script>";
}else{
    echo "<script>alert('Algo ha fallado'); window.location.href='../public/asginar-personaje'</script>";
}