<?php

include('conexion.php');

if (isset($_GET['arreglo'])){
    $correos = unserialize($_GET['arreglo']);
}else{
    echo "fallo";
}

print_r($correos);
