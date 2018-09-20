<?php
include ('conexion.php');

$perF = mysqli_query($con,"SELECT * FROM `personajes` WHERE `genero` LIKE '%F%' AND `activo`=1");
$resPerf = mysqli_fetch_all($perF);

$userF = mysqli_query($con,"SELECT * FROM `user` WHERE `genero` LIKE '%F%'");
$resUserf = mysqli_fetch_all($userF);

$perM = mysqli_query($con,"SELECT * FROM `personajes` WHERE `genero` LIKE '%M%' AND `activo`=1");
$resPerm = mysqli_fetch_all($perM);

$userM = mysqli_query($con,"SELECT * FROM `user` WHERE `genero` LIKE '%M%'");
$resUserm = mysqli_fetch_all($userM);
//echo sizeof($perF);
/*for ($i = 0; $i<sizeof($resPerf); $i++){
    //echo $resPerf[$i][0] . "<br>";
}*/
//echo "<br>";
$randF = range(0, sizeof($resPerf)-1);
shuffle($randF);
//print_r($rand);
/*foreach ($rand as $val) {
    //echo $val . '<br />';
    echo $resPerf[$val][0] . "<br>";
}*/
//echo "<br>";

$randF1 = range(0, sizeof($resUserf)-1);
shuffle($randF1);
//print_r($rand1);
/*foreach ($rand1 as $val1) {
    //echo $val1 . '<br />';
        echo $resUserf[$val1][0] . "<br>";
}*/

$randM = range(0, sizeof($resPerm)-1);
shuffle($randM);
//print_r($rand);
/*foreach ($rand as $val) {
    //echo $val . '<br />';
    echo $resPerf[$val][0] . "<br>";
}*/
//echo "<br>";

$randM1 = range(0, sizeof($resUserm)-1);
shuffle($randM1);
//print_r($rand1);
/*foreach ($rand1 as $val1) {
    //echo $val1 . '<br />';
        echo $resUserf[$val1][0] . "<br>";
}*/

for ($i = 0; $i<=sizeof($randF); $i++){
    $to = $resUserf[$randF[$i]][1];
    $subject = "Este sera tu personaje para jugar al Amigo Secreto!";
//$usuario = $respuesta[0][1];
    $nombre = $resUserf[$randF[$i]][3];
//}
//}
//$to = 'msscout11@gmail.com'; // note the comma
// Subject
//$subject = 'Pruebas';
// Message
    $message = '
<html>
    <head>
        <title>Este sera tu personaje para jugar al Amigo Secreto!</title>
        <meta charset="UTF-8">
    </head>
    <body>
    <label>Bienvenido ' . $nombre . ' a Amormania!</label><br><br>
    <p>Se han sorteado los personajes y el personaje que te corresponde es: <b style="text-transform: uppercase">' . $resPerf[$randF1[$i]][1] . '</b></p>
    <p>Para disfrutar de este mes de amor y amistad hemos creado una plataforma para ti. Alli podras escribir en un muro publico, escribir que quieres de regalo en el muro de regalos, editar tu foto de perfil.</p>
    <p>Estos son los pasos para que puedas hacer parte de la celebracion:</p>
    <ol>
    <li>Ingresa a http://52.15.245.23/amigo-secreto/public/index con tu usuario y contrasena</li>
    <li>Puedes agregar la foto de perfil de tu personaje. Puede ser un JPG, PNG o GIF animado</li>
    <li>Escribe en los muros publicos de la plataforma</li>
    <li>Sonrie compartiendo con tus companeros!</li>
</ol><br>
<p>Ate.,
<br>
Equipo de Desarrollo de Amormania.
</p>
</body>
</html>
';
    $headers = null;
// To send HTML mail, the Content-type header must be set
    $headers[] = 'MIME-Version: 1.0';
    $headers[] = 'Content-type: text/html; charset=iso-8859-1';
// Additional headers
    $headers[] = 'To: ' . $to . ' <' . $to . '>';
    $headers[] = 'From: Soporte Amormania <soporte@amormania.com>';
// Mail it
    if (mail($to, $subject, $message, "From: soporte@amormania.com" . implode("\r\n", $headers))){
        //echo "<script>alert('Mensaje de reestablecer contraseña enviado'); window.location.href='../public/usuarios-admin.php'</script>";
        $bogota = time() - (5 * 60 * 60);
        $dia = date('Y-m-d H:i:s', $bogota);
        $mail = mysqli_query($con, "INSERT INTO `correos` (`nombre`, `correo`, `mensaje`, `seccion`, `date`) VALUES ('" . $nombre . "', '" . $to . "', '" . $message . "', 'aleatorio', '" . $dia . "')");
    }else{
        echo "<script>alert('Algo ha pasado 1')</script>";
    }

//unset($headers);
    $consulta = mysqli_query($con, "INSERT INTO `asignacion` (`usuario`, `personaje`) VALUES ('" . $resUserf[$randF[$i]][0] . "', '" . $resPerf[$randF1[$i]][0] . "')");
    if ($consulta){
        //echo "<script>alert('Se realizó el registro con exito'); window.location.href='../public/asginar-personaje.php'</script>";
    }else{
        echo "<script>alert('Algo ha fallado 2'); window.location.href='../public/asginar-personaje'</script>";
    }
}

for ($i = 0; $i<=sizeof($randM); $i++){
    $toM = $resUserm[$randM[$i]][1];
    $subjectM = "Este sera tu personaje para jugar al Amigo Secreto!";
//$usuario = $respuesta[0][1];
    $nombreM = $resUserm[$randM[$i]][3];
//}
//}
//$to = 'msscout11@gmail.com'; // note the comma
// Subject
//$subject = 'Pruebas';
// Message
    $messageM = '
<html>
    <head>
        <title>Este sera tu personaje para jugar al Amigo Secreto!</title>
        <meta charset="UTF-8">
    </head>
    <body>
    <label>Bienvenido ' . $nombreM . ' a Amormania!</label><br><br>
    <p>Se han sorteado los personajes y el personaje que te corresponde es: <b style="text-transform: uppercase">' . $resPerm[$randM1[$i]][1] . '</b></p>
    <p>Para disfrutar de este mes de amor y amistad hemos creado una plataforma para ti. Alli podras escribir en un muro publico, escribir que quieres de regalo en el muro de regalos, editar tu foto de perfil.</p><br>
    <p>Estos son los pasos para que puedas hacer parte de la celebracion:</p>
    <ol>
    <li>Ingresa a http://52.15.245.23/amigo-secreto/public/index con tu usuario y contrasena</li>
    <li>Puedes agregar la foto de perfil de tu personaje. Puede ser un JPG, PNG o GIF animado</li>
    <li>Escribe en los muros publicos de la plataforma</li>
    <li>Sonrie compartiendo con tus companeros!</li>
</ol><br>
<p>Ate.,
<br>
Equipo de Desarrollo de Amormania.
</p>
</body>
</html>
';
    $headersm = null;
// To send HTML mail, the Content-type header must be set
    $headersm[] = 'MIME-Version: 1.0';
    $headersm[] = 'Content-type: text/html; charset=iso-8859-1';
// Additional headers
    $headersm[] = 'To: ' . $toM . ' <' . $toM . '>';
    $headersm[] = 'From: Soporte Amormania <soporte@amormania.com>';
// Mail it
    if (mail($toM, $subjectM, $messageM, "From: soporte@amormania.com" . implode("\r\n", $headersm))){
        //echo "<script>alert('Mensaje de reestablecer contraseña enviado'); window.location.href='../public/usuarios-admin.php'</script>";
        $bogota = time() - (5 * 60 * 60);
        $dia = date('Y-m-d H:i:s', $bogota);
        $mail = mysqli_query($con, "INSERT INTO `correos` (`nombre`, `correo`, `mensaje`, `seccion`, `date`) VALUES ('" . $nombreM . "', '" . $toM . "', '" . $messageM . "', 'aleatorio', '" . $dia . "')");
    }else{
        echo "<script>alert('Algo ha pasado 3')</script>";
    }

    $consulta = mysqli_query($con, "INSERT INTO `asignacion` (`usuario`, `personaje`) VALUES ('" . $resUserm[$randM[$i]][0] . "', '" . $resPerm[$randM1[$i]][0] . "')");
    if ($consulta){
        //echo "<script>alert('Se realizó el registro con exito'); window.location.href='../public/asginar-personaje.php'</script>";
    }else{
        echo "<script>alert('Algo ha fallado 4'); window.location.href='../public/asginar-personaje'</script>";
    }
}

echo "<script>alert('Se realizó el registro con exito'); window.location.href='../public/asginar-personaje'</script>";
//$asignacion = mysqli_query($con,"SELECT * FROM `personajes` WHERE `genero` LIKE '%F%'");