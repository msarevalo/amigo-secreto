<?php
include ('conexion.php');

$passAL=null;
$passAl = rand(999, 99999);
$password_hash=md5($passAL);

$idRes = null;
if (isset($_GET['id'])){
    $idRes = $_GET['id'];
}

$consulta = mysqli_query($con, "SELECT * FROM `user` WHERE `IDuser`=" . $idRes . ";");
$respuesta = mysqli_fetch_assoc($consulta);

$to = $respuesta['correo'];
$subject = "Reestablecer Password";
//$usuario = $respuesta[0][1];
$usuario = $respuesta['correo'];
$nombre = $respuesta['nombre'];
$pass = $password_hash;
//}
//}
//$to = 'msscout11@gmail.com'; // note the comma
// Subject
//$subject = 'Pruebas';
// Message
$message = '
<html>
    <head>
        <title>Reestablecer Password</title>
    </head>
    <body>
    <label>Haga click en el siguiente link para reestablecer el password</label>
    <a href="http://localhost:63342/amigo-secreto/public/validar.php?id=' . $idRes . '&usuario=' . $usuario . '&pass=' . $pass . '">Cambiar mi password</a>
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
    echo "<script>alert('Mensaje de reestablecer contraseña enviado'); window.location.href='../public/usuarios-admin.php'</script>";
}else{
    echo "<script>alert('Algo ha pasado'); window.location.href='../public/usuarios-admin.php'</script>";
}

$actual = mysqli_query($con, "UPDATE `user` SET `spass` = '" . $pass . "' WHERE `user`.`idUser` = " . $idRes . ";");
//$confirmar = mysqli_fetch_all($actual);

if ($actual){
    echo "<script>alert('Mensaje de reestablecer contraseña enviado'); window.location.href='../public/usuarios-admin.php'</script>";
}else{
    echo "<script>alert('Algo ha pasado'); window.location.href='../public/usuarios-admin.php'</script>";
}