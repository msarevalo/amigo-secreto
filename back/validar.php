<?php

include ('conexion.php');

$user =null;
$psw = null;

if(isset($_GET['id'])){
    $idUser = $_POST['id'];
    //echo $user;
}
else{
    //echo "fallo user";
}

if(isset($_GET['usuario'])){
    $user = $_GET['usuario'];
    //echo $user;
}
else{
    //echo "fallo";
}

if(isset($_GET['pass'])){
    $psw = $_GET['pass'];
    //echo $psw;
}
else{
    //echo "fallo";
}

/*if(!$con)
    die("Fallo la conexion a MySQL: " . mysqli_error());
else
    echo "conexion exitosa";*/

    $resultado = mysqli_query($con, "SELECT * FROM `user` WHERE `idUser` = " . $idUser . ";");
//$result = mysql_query("SELECT * from users where user='" . $usuario . "'");
    $respuesta = mysqli_fetch_all($resultado);

    if ($respuesta) {
        $hash = $respuesta[0][6];
        if (password_verify($psw, $hash)) {
            echo "entro ok";
            //header("Location: /amigo-secreto/public/nueva.php");
        } else {
            //header("Location: index.html");
            echo '<script language="javascript">alert("Error en la contraseña"); window.location.href="../public/index.php"</script>';
            exit();
        }
    } else {

?>