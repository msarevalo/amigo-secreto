<?php

include('conexion.php');

$correo[] = 'soportecolombia@celmedia.com';
$correo[] = 'Manuel';
$correos[] = $correo;
unset($correo);

$correo[] = 'ftorres@celmedia.com';
$correo[] = 'Fernando';
$correos[] = $correo;

/*for ($i=0; $i<sizeof($correos); $i++){

}*/

print_r($correos);
