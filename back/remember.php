<?php
include ('conexion.php');


$idRes = null;
$user = null;
$pass = null;
$nombreR = null;
if (isset($_GET['id'])){
    $idRes = $_GET['id'];
}

if (isset($_GET['user'])){
    $user = $_GET['user'];
}

if (isset($_GET['pass'])){
    $pass = $_GET['pass'];
}

if (isset($_GET['nombre'])){
    $nombreR = $_GET['nombre'];
}

/*$consulta = mysqli_query($con, "SELECT * FROM `user` WHERE `IDuser`=" . $idRes . ";");
$respuesta = mysqli_fetch_all($consulta);*/

$to = $user;
$subject = "Reestablecer Contrasena";
//$usuario = $respuesta[0][1];
$usuario = $user;
$nombre = $nombreR;
$passR = $pass;
//}
//}
//$to = 'msscout11@gmail.com'; // note the comma
// Subject
//$subject = 'Pruebas';
// Message
$message = '
<html>
    <head>
        <title>Reestablecer Contrasena</title>
        <meta charset="UTF-8">
    </head>
    <body>
    <label>Haz clic en el siguiente link para reestablecer la contrasena de Amormania</label>
    <a href="http://52.15.245.23/amigo-secreto/back/validar?id=' . $idRes . '&usuario=' . $usuario . '&pass=' . $passR . '">Cambiar mi password</a>
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
    $bogota = time() - (5 * 60 * 60);
    $dia = date('Y-m-d H:i:s', $bogota);
    $mail = mysqli_query($con, "INSERT INTO `correos` (`nombre`, `correo`, `mensaje`, `seccion`, `date`) VALUES ('" . $nombreR . "', '" . $to . "', '" . $message . "', 'olvide', '" . $dia . "')");
    echo "<script>alert('Mensaje de reestablecer contraseña enviado'); window.location.href='../public/index'</script>";
}else{
    echo "<script>alert('Algo ha pasado'); window.location.href='../public/index'</script>";
}

$actual = mysqli_query($con, "UPDATE `user` SET `spass` = '" . $pass . "' WHERE `user`.`idUser` = " . $idRes . ";");
//$confirmar = mysqli_fetch_all($actual);

if ($actual){
    echo "<script>alert('Mensaje de reestablecer contraseña enviado'); window.location.href='../public/index'</script>";
}else{
    echo "<script>alert('Algo ha pasado'); window.location.href='../public/usuarios-admin'</script>";
}