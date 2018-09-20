<?php

include ('conexion.php');

if (isset($_POST['nombre'])){
    $nombre = $_POST['nombre'];
}

if (isset($_POST['mail'])){
    $correo = $_POST['mail'];
}

if (isset($_POST['genero'])){
    $genero = $_POST['genero'];
}

if (isset($_POST['pass'])){
    $pass = $_POST['pass'];
}

if (isset($_POST['rpass'])){
    $rpass = $_POST['rpass'];
}

if ($pass == $rpass){
    $encrip = password_hash($pass, PASSWORD_BCRYPT);
    $consulta = mysqli_query($con, "INSERT INTO `user` (`correo`, `pass`, `nombre`, `genero`) VALUES ('" . $correo . "', '" . $encrip . "', '" . $nombre . "', '" . $genero . "')");


    $to = $correo;
    $subject = "Registro a Amormania";
//$usuario = $respuesta[0][1];
    $user = $nombre;
    //echo $nombre . " " . $usuario . "<br>";
//}
//}
//$to = 'msscout11@gmail.com'; // note the comma
// Subject
//$subject = 'Pruebas';
// Message
    $message = '
<html>
    <head>
        <title>Registro a Amormania</title>
        <meta charset="UTF-8">
    </head>
    <body>
    <p>Hola ' . $user . '!</p>
    <p>Te confirmamos que tu registro a Amormania se completo satisfactoriamente, espera el sorteo de tu personaje para empezar a participar en nuestra plataforma.</p>
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
    $headers[] = 'To: ' . $to . ' <' . $to . '>';
    $headers[] = 'From: Soporte Amormania <soporte@amormania.com>';
// Mail it
//print_r($headers); echo "<br>";unset($headers);}
mail($to, $subject, $message, "From: soporte@amormania.com" . implode("\r\n", $headers));

    $mail = mysqli_query($con, "INSERT INTO `correos` (`nombre`, `correo`, `mensaje`, `seccion`) VALUES ('" . $user . "', '" . $to . "', '" . $message . "', 'registro')");

    if ($consulta){
        echo "<script>alert('Se realizó el registro con exito'); window.location.href='../public/index'</script>";
    }else{
        echo "<script>alert('Algo ha fallado'); window.location.href='../public/registro'</script>";
    }
}else{
    echo "<script>alert('Las contraseñas no son iguales'); window.location.href='../public/registro'</script>";
}