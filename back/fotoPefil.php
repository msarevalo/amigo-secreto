<?php

include('conexion.php');

$nombre_img = $_FILES['fotografia']['name'];
$tipo = $_FILES['fotografia']['type'];
$tamano = $_FILES['fotografia']['size'];
$temp = explode(".", $_FILES['fotografia']['name']);
$extension = end($temp);
$id = rand(0, 999999999);
$nom_temp = 'usuario' . $id .'.'. $extension;
$ruta = '/amigo-secreto/img/usuarios/';
$ruta1 = '\amigo-secreto\img\usuarios\0';

if (isset($_POST['nombre'])){
    $nombre = $_POST['nombre'];
}

if (isset($_POST['color'])){
    $color = $_POST['color'];
}

if (isset($_POST['genero'])){
    $genero = $_POST['genero'];
}

if (isset($_POST['activo'])){
    $activo = $_POST['activo'];
}

/*$consulta = mysqli_query($con, "SELECT asignacion.personaje FROM asignacion WHERE asignacion.usuario = " . $_SESSION['id']);
$respuesta = mysqli_fetch_all($consulta);*/

//Si existe imagen y tiene un tamaño correcto
if ($nombre_img == !NULL)
{

    //indicamos los formatos que permitimos subir a nuestro servidor
    if (($_FILES["fotografia"]["type"] == "image/gif")
        || ($_FILES["fotografia"]["type"] == "image/jpeg")
        || ($_FILES["fotografia"]["type"] == "image/jpg")
        || ($_FILES["fotografia"]["type"] == "image/png"))
    {
        if ($color != '#ffffff' || $color != '#f1f1f1' || $color != '#889d6f') {
            $sql = "UPDATE `personalizacion` SET `imagen` = '" . $nom_temp . "', `ruta` = '" . $ruta . "', `color` = '" . $color . "'  WHERE `personalizacion`.`idUsuario` = " . $_SESSION['id']. ";";
            $result = mysqli_query($con, $sql);
            if ($result) {
                // Ruta donde se guardarán las imágenes que subamos
                $ruta1 = str_replace("0", "", $ruta1);
                $directorio = $_SERVER['DOCUMENT_ROOT'] . $ruta1;
                // Muevo la imagen desde el directorio temporal a nuestra ruta indicada anteriormente
                echo $directorio;
                move_uploaded_file($_FILES['fotografia']['tmp_name'], $directorio . $nom_temp);
                //echo "<script>alert('Se edito el personaje con exito'); window.location.href='../public/perfil'</script>";
            } else {
                //echo "<script>alert('Algo ha fallado'); window.location.href='../public/perfil'</script>";
            }
        }else{
            echo "<script>alert('Este color es reservado, intenta con otro'); window.location.href='../public/perfil'</script>";
        }
    }
    else
    {
        //si no cumple con el formato
        //echo "<script>alert('No se puede subir una imagen con ese formato'); window.location.href='../public/perfil.php'</script>";
    }
}
else
{
    //si existe la variable pero se pasa del tamaño permitido
    //echo "<script>alert('No se cargo la imagen'); window.location.href='../public/crear-personaje.php'</script>";
    if ($color !== '#ffffff' || $color !== '#f1f1f1' || $color !== '#889d6f') {
        $sql = "UPDATE `personalizacion` SET `color` = '" . $color . "' WHERE `personalizacion`.`idUsuario` = " . $_SESSION['id'] . ";";
        $result = mysqli_query($con, $sql);
        if ($result) {
            // Ruta donde se guardarán las imágenes que subamos
            //$directorio = $_SERVER['DOCUMENT_ROOT'] . $ruta;
            // Muevo la imagen desde el directorio temporal a nuestra ruta indicada anteriormente
            //move_uploaded_file($_FILES['imagen']['tmp_name'], $directorio . $nom_temp);
            echo "<script>alert('Se edito el personaje con exito'); window.location.href='../public/perfil'</script>";
        } else {
            echo "<script>alert('Algo ha fallado'); window.location.href='../public/perfil'</script>";
        }
    }else{
        echo "<script>alert('Este color es reservado, intenta con otro'); window.location.href='../public/perfil'</script>";
    }
}


/*
if($result){
    echo "se cargo correctamente";
    echo "<a href='../views/banners.php'>Volver</a>";
}else{
    echo "fallo";
}*/
?>