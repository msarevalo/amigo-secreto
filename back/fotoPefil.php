<?php

include('conexion.php');

$nombre_img = $_FILES['fotografia']['name'];
$tipo = $_FILES['fotografia']['type'];
$tamano = $_FILES['fotografia']['size'];
$temp = explode(".", $_FILES['fotografia']['name']);
$extension = end($temp);
$id = rand(0, 999999999);
$nom_temp = 'personaje' . $id .'.'. $extension;
$ruta = '/amigo-secreto/img/personajes/';

if (isset($_POST['nombre'])){
    $nombre = $_POST['nombre'];
}

if (isset($_POST['genero'])){
    $genero = $_POST['genero'];
}

if (isset($_POST['activo'])){
    $activo = $_POST['activo'];
}

$consulta = mysqli_query($con, "SELECT asignacion.personaje FROM asignacion WHERE asignacion.usuario = " . $_SESSION['id']);
$respuesta = mysqli_fetch_all($consulta);

//Si existe imagen y tiene un tamaño correcto
if ($nombre_img == !NULL)
{

    //indicamos los formatos que permitimos subir a nuestro servidor
    if (($_FILES["fotografia"]["type"] == "image/gif")
        || ($_FILES["fotografia"]["type"] == "image/jpeg")
        || ($_FILES["fotografia"]["type"] == "image/jpg")
        || ($_FILES["fotografia"]["type"] == "image/png"))
    {
        $sql = "UPDATE `personajes` SET `imagen` = '" . $nom_temp . "', `ruta` = '" . $ruta . "' WHERE `personajes`.`idPersonaje` = " . $respuesta[0][0] . ";";
        $result = mysqli_query($con, $sql);
        if ($result) {
            // Ruta donde se guardarán las imágenes que subamos
            $directorio = $_SERVER['DOCUMENT_ROOT'] . $ruta;
            // Muevo la imagen desde el directorio temporal a nuestra ruta indicada anteriormente
            //echo $directorio;
            move_uploaded_file($_FILES['fotografia']['tmp_name'], $directorio . $nom_temp);
            echo "<script>alert('Se edito tu imagen con exito'); window.location.href='../public/perfil'</script>";
        }else{
            echo "<script>alert('Algo ha fallado'); window.location.href='../public/perfil'</script>";
        }
    }
    else
    {
        //si no cumple con el formato
        //echo "<script>alert('No se puede subir una imagen con ese formato'); window.location.href='../public/perfil.php'</script>";
    }
}
//else
//{
    //si existe la variable pero se pasa del tamaño permitido
    //echo "<script>alert('No se cargo la imagen'); window.location.href='../public/crear-personaje.php'</script>";
    /*$sql = "UPDATE `personajes` SET `nombre` = '" . $nombre . "', `genero` = '" . $genero . "', `ruta` = '" . $ruta . "', `activo` = '" . $activo . "'  WHERE `personajes`.`idPersonaje` = " . $_SESSION['idPersonaje'] . ";";
    $result = mysqli_query($con, $sql);
    if ($result) {
        // Ruta donde se guardarán las imágenes que subamos
        //$directorio = $_SERVER['DOCUMENT_ROOT'] . $ruta;
        // Muevo la imagen desde el directorio temporal a nuestra ruta indicada anteriormente
        //move_uploaded_file($_FILES['imagen']['tmp_name'], $directorio . $nom_temp);
        echo "<script>alert('Se cargo correctamente el personaje'); window.location.href='../public/personajes-admin.php'</script>";
    }else{
        echo "<script>alert('Algo ha fallado'); window.location.href='../public/crear-personaje.php'</script>";
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