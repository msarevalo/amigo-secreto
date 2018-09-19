<?php

include('conexion.php');

if (isset($_GET['arreglo'])){
    $correos = unserialize($_GET['arreglo']);
}else{
    echo "fallo";
}

$contador =0;
//print_r($correos);
//echo sizeof($correos);
for ($i=1; $i<sizeof($correos); $i++ ){
    $to = $correos[$i][0];
    $subject = "Correo Informativo Amormania";
//$usuario = $respuesta[0][1];
    $usuario = $correos[$i][0];
    $nombre = $correos[$i][1];
    echo $nombre . " " . $usuario . "<br>";
//}
//}
//$to = 'msscout11@gmail.com'; // note the comma
// Subject
//$subject = 'Pruebas';
// Message
    /*$message = '
<html>
    <head>
        <title>Correo Informativo Amormania</title>
        <meta charset="UTF-8">
    </head>
    <body>
    <p>Querido(a) ' . $nombre . '</p>
    <p>Queremos hacerte participe de este mes de amor y amistad, ingresa a <b><a href="http://52.15.245.23/amigo-secreto/public/index">Amormania</a></b> para crear tu cuenta y espera el sorteo de tu personaje</p>
    <p>Participar es muy facil, solo sigue los siguientes pasos</p>
    <ol>
    <li>Ingresa a la pagina dando click <a href="http://52.15.245.23/amigo-secreto/public/index">aqui</a></li>
    <li>Da clic en la opcion "aun no tengo cuenta"</li>
    <li>Ingresa los datos que alli te piden</li>
    <li>Espera el sorteo para que tengas un personaje para jugar</li>
    <li>Disfruta de esta fecha con tus companeros</li>
</ol>
<p>Ate.,
<br>
Equipo de Desarrollo de Amormania.
</p>
</body>
</html>
';
// To send HTML mail, the Content-type header must be set
    $headers[] = 'MIME-Version: 1.0';
    $headers[] = 'Content-type: text/html; charset=iso-8859-1';
// Additional headers
    $headers[] = 'To: ' . $nombre . ' <' . $to . '>';
    $headers[] = 'From: Soporte Amormania <soporte@amormania.com>';
// Mail it
    if (mail($to, $subject, $message, "From: soporte@amormania.com" . implode("\r\n", $headers))){
        //echo "<script>alert('Mensaje de reestablecer contraseña enviado'); window.location.href='../public/usuarios-admin'</script>";
        $contador++;
    }else{
        echo "<script>alert('Algo ha pasado'); window.location.href='../public/correo-informativo'</script>";
    }
    //$actual = mysqli_query($con, "UPDATE `user` SET `spass` = '" . $pass . "' WHERE `user`.`idUser` = " . $idRes . ";");
//$confirmar = mysqli_fetch_all($actual);

    /*if ($actual){
        //echo "<script>alert('Mensaje de reestablecer contraseña enviado'); window.location.href='../public/usuarios-admin.php'</script>";
    }else{
        echo "<script>alert('Algo ha pasado'); window.location.href='../public/usuarios-admin'</script>";
    }*/
}
//echo "<script>alert('Se enviaron " . $contador . " correos'); window.location.href='../public/correo-informativo'</script>";
