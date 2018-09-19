<?php

include('conexion.php');

if (isset($_GET['arreglo'])){
    $correos = unserialize($_GET['arreglo']);
}else{
    echo "fallo";
}

//print_r($correos);
echo sizeof($correos);
//for ($i=1; $i<= )
