<?php

include ('conexion.php');

$pass = rand(999, 99999);
$password_hash=md5($pass);

if (isset($_POST['correo'])){
    $user = $_POST['correo'];
}

$resultado = mysqli_query($con, "SELECT * FROM `user` WHERE `correo` LIKE '" . $user . "'");
$respuesta = mysqli_fetch_all($resultado);

if ($respuesta){
    if (!empty($respuesta[0][6])){
        $actual = mysqli_query($con, "UPDATE `user` SET `spass` = '" . $password_hash . "' WHERE `users`.`id_user` = " . $respuesta[0][0] . ";");
        header("Location: /amigo-secreto/back/remember?id=" . $respuesta[0][0] . "&user=" . $respuesta[0][1] . "&pass=" . $password_hash);
        $_SESSION['user_correo'] = $user;
    }else{
        $actual = mysqli_query($con, "UPDATE `user` SET `spass` = '" . $password_hash . "' WHERE `users`.`id_user` = " . $respuesta[0][0] . ";");
        header("Location: /amigo-secreto/back/remember?id=" . $respuesta[0][0] . "&user=" . $respuesta[0][1] . "&pass=" . $password_hash . "&nombre=" . $respuesta[0][3]);
        $_SESSION['user_correo'] = $user;
    }
}else{
    echo "<script>alert('Usuario " . $user . " inexistente');window.location.href='../public/olvide'</script>";
}