<?php

include("conexion.php");
//session_start();
//echo "test";
$usuario = null;
$pass = null;
if (isset($_POST['usuario'])){
    $usuario = $_POST['usuario'];
    //echo $usuario;
}else{
    echo "test entro";
    //header("Location: index.php");
}

if (isset($_POST['pass'])){
    $pass = $_POST['pass'];
}else{
    //header("Location: index.php");
}
$_SESSION['username'] = "test";
$resultado = mysqli_query($con, "SELECT * FROM `user` WHERE `user`.`correo` = '" . $usuario . "'");
//$result = mysql_query("SELECT * from users where user='" . $usuario . "'");
//print_r($resultado);exit;
$respuesta = mysqli_fetch_all($resultado);
//echo 'entro antes';exit;
//print_r($resultado);exit;
//print_r($respuesta);
if($resultado){
    //echo ' entro';exit;
    $hash = $respuesta[0][2];
    if (password_verify($pass, $hash) ){
        if ($respuesta[0][5]==="admin"){
            $_SESSION['username'] = $respuesta[0][3];
            $_SESSION['id'] = $respuesta[0][1];
            header("Location: ../public/admin.php");
        }else {
            $_SESSION['username'] = $respuesta[0][3];
            $_SESSION['id'] = $respuesta[0][0];
            header("Location: ../public/home.php");
            //echo "entro bien";
        }
    }else{
        //echo "fallo";
        echo "<script>alert('Usuario o ontraseña incorrectos');window.location.href='../public/index.php'</script>";
    }
}else{
    //echo 'no entro';exit;
    echo "<script>alert('Usuario o ontraseña incorrectos');window.location.href='../public/index.php'</script>";
}
?>