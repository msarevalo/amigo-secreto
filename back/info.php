<?php

include('conexion.php');

if (isset($_GET['arreglo'])){
    $correos = $_GET['arreglo'];
}

print_r($correos);
