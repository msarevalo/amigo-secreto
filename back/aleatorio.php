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
echo sizeof($perF);
/*for ($i = 0; $i<sizeof($resPerf); $i++){
    //echo $resPerf[$i][0] . "<br>";
}*/
echo "<br>";
$randF = range(0, sizeof($resPerf)-1);
shuffle($randF);
//print_r($rand);
/*foreach ($rand as $val) {
    //echo $val . '<br />';
    echo $resPerf[$val][0] . "<br>";
}*/
echo "<br>";

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
echo "<br>";

$randM1 = range(0, sizeof($resUserm)-1);
shuffle($randM1);
//print_r($rand1);
/*foreach ($rand1 as $val1) {
    //echo $val1 . '<br />';
        echo $resUserf[$val1][0] . "<br>";
}*/

for ($i = 0; $i<sizeof($randF); $i++){
    $to = $resUserf[$randF[$i]][1];
    $subject = "Tu personaje de amigo secreto";
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
        <title>Tu personaje de amigo secreto</title>
    </head>
    <body>
    <label>Hola ' . $nombre . '</label><br><br>
    <p>Te queremos informar que tu personaje para amigo secreto es ' . $resPerf[$randF1[$i]][1] . '</p><br>
    <p>Recuerda que es secreto entonces no le digas a nadie quien eres.</p>
</body>
</html>
';
    $headers = null;
// To send HTML mail, the Content-type header must be set
    $headers[] = 'MIME-Version: 1.0';
    $headers[] = 'Content-type: text/html; charset=iso-8859-1';
// Additional headers
    $headers[] = 'To: ' . $nombre . ' <' . $to . '>';
    $headers[] = 'From: Soporte Amormania <soporte@amormania.com>';
// Mail it
    if (mail($to, $subject, $message, "From: soporte@amormania.com" . implode("\r\n", $headers))){
        //echo "<script>alert('Mensaje de reestablecer contraseña enviado'); window.location.href='../public/usuarios-admin.php'</script>";
    }else{
        echo "<script>alert('Algo ha pasado')</script>";
    }


    $consulta = mysqli_query($con, "INSERT INTO `asignacion` (`usuario`, `personaje`) VALUES ('" . $resUserf[$randF[$i]][0] . "', '" . $resPerf[$randF1[$i]][0] . "')");
    if ($consulta){
        //echo "<script>alert('Se realizó el registro con exito'); window.location.href='../public/asginar-personaje.php'</script>";
    }else{
        echo "<script>alert('Algo ha fallado'); window.location.href='../public/asginar-personaje.php'</script>";
    }
}

for ($i = 0; $i<sizeof($randM); $i++){
    $toM = $resUserm[$randM[$i]][1];
    $subjectM = "Tu personaje de amigo secreto";
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
        <title>Tu personaje de amigo secreto</title>
    </head>
    <body>
    <label>Hola ' . $nombreM . '</label><br><br>
    <p>Te queremos informar que tu personaje para amigo secreto es ' . $resPerm[$randM1[$i]][1] . '</p><br>
    <p>Recuerda que es secreto entonces no le digas a nadie quien eres.</p>
</body>
</html>
';
    $headersm = null;
// To send HTML mail, the Content-type header must be set
    $headersm[] = 'MIME-Version: 1.0';
    $headersm[] = 'Content-type: text/html; charset=iso-8859-1';
// Additional headers
    $headersm[] = 'To: ' . $nombreM . ' <' . $toM . '>';
    $headersm[] = 'From: Soporte Amormania <soporte@amormania.com>';
// Mail it
    if (mail($toM, $subjectM, $messageM, "From: soporte@amormania.com" . implode("\r\n", $headersm))){
        //echo "<script>alert('Mensaje de reestablecer contraseña enviado'); window.location.href='../public/usuarios-admin.php'</script>";
    }else{
        echo "<script>alert('Algo ha pasado')</script>";
    }

    $consulta = mysqli_query($con, "INSERT INTO `asignacion` (`usuario`, `personaje`) VALUES ('" . $resUserm[$randM[$i]][0] . "', '" . $resPerm[$randM1[$i]][0] . "')");
    if ($consulta){
        //echo "<script>alert('Se realizó el registro con exito'); window.location.href='../public/asginar-personaje.php'</script>";
    }else{
        echo "<script>alert('Algo ha fallado'); window.location.href='../public/asginar-personaje.php'</script>";
    }
}

echo "<script>alert('Se realizó el registro con exito'); window.location.href='../public/asginar-personaje.php'</script>";
//$asignacion = mysqli_query($con,"SELECT * FROM `personajes` WHERE `genero` LIKE '%F%'");