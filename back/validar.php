<?php

include ('conexion.php');

$user =null;
$psw = null;

if(isset($_GET['id'])){
    $idUser = $_GET['id'];
    //echo $idUser;
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

    $resultado = mysqli_query($con, "SELECT * FROM `user` WHERE `user`.`idUser` = " . $idUser);
//$result = mysql_query("SELECT * from users where user='" . $usuario . "'");
    $respuesta = mysqli_fetch_all($resultado);

    print_r($respuesta);
    echo "<br>";

echo $respuesta[0][6];
    if ($respuesta) {
        $hash = $respuesta[0][6];
        if ($hash === $psw){
            //echo "entro";
            //$_SESSION['restablece'] = $idUser;
            header("Location: ../public/nueva-pass.php?id=" . $idUser);
        }else{
            //echo "fallo";
            echo "<script>alert('El hash ha cambiado');window.location.href='../public/index.php'</script>";
        }
    }else{
        //echo "fallo consulta";
    }

?>