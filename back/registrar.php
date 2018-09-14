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

    if ($consulta){
        echo "<script>alert('Se realizó el registro con exito'); window.location.href='../public/index.php'</script>";
    }else{
        echo "<script>alert('Algo ha fallado'); window.location.href='../public/registro.php'</script>";
    }
}else{
    echo "<script>alert('Las contraseñas no son iguales'); window.location.href='../public/registro.php'</script>";
}