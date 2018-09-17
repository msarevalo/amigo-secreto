<?php

include ('conexion.php');

if (isset($_POST['pass'])){
    $pass = $_POST['pass'];
}

if (isset($_POST['rpass'])){
    $rpass = $_POST['rpass'];
}

if (isset($_SESSION['restablece'])){
    $id = $_SESSION['restablece'];
}


if ($pass == $rpass){
    $encrip = password_hash($pass, PASSWORD_BCRYPT);
    //UPDATE `user` SET `spass` = '.' WHERE `user`.`idUser` = 1;
    $consulta = mysqli_query($con, "UPDATE `user` SET `spass` = NULL, `pass` = " . $encrip . " WHERE `user`.`idUser` = " . $id . ";");
    if ($consulta){
        echo "<script>alert('Se restableció la contraseña con exito'); window.location.href='../public/index.php'</script>";
    }else{
        echo "<script>alert('Algo ha fallado'); window.location.href='../public/nueva-pass.php?id=" . $id ."'</script>";
    }
}else{
    echo "<script>alert('Las contraseñas deben ser iguales'); window.location.href='../public/nueva-pass.php?id=" . $id ."'</script>";
}