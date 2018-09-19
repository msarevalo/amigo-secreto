<?php

include('conexion.php');
function hexadecimalAzar($caracteres){

    $caracteresPosibles = "0123456789abcdef";
    $azar = '';

    for($i=0; $i<$caracteres; $i++){

        $azar .= $caracteresPosibles[rand(0,strlen($caracteresPosibles)-1)];

    }
    if ($azar != 'ffffff' || $azar != 'f1f1f1' || $azar != '889d6f') {

        return $azar;
    }else{
        hexadecimalAzar($caracteres);
    }
}

$nombre_img = $_FILES['imagen']['name'];
$tipo = $_FILES['imagen']['type'];
$tamano = $_FILES['imagen']['size'];
$temp = explode(".", $_FILES['imagen']['name']);
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


//Si existe imagen y tiene un tamaño correcto
if ($nombre_img == !NULL)
{

    //indicamos los formatos que permitimos subir a nuestro servidor
    if (($_FILES["imagen"]["type"] == "image/gif")
        || ($_FILES["imagen"]["type"] == "image/jpeg")
        || ($_FILES["imagen"]["type"] == "image/jpg")
        || ($_FILES["imagen"]["type"] == "image/png"))
    {
        $sql = "INSERT INTO `personajes` (`nombre`, `genero`, `imagen`, `ruta`, `activo`, `color`) VALUES ('" . $nombre ."', '" . $genero ."', '" . $nom_temp . "', '" . $ruta ."', '" . $activo . "', '#" . hexadecimalAzar(6) . "');";
        $result = mysqli_query($con, $sql);
        if ($result) {
            // Ruta donde se guardarán las imágenes que subamos
            $directorio = $_SERVER['DOCUMENT_ROOT'] . $ruta;
            // Muevo la imagen desde el directorio temporal a nuestra ruta indicada anteriormente
            move_uploaded_file($_FILES['imagen']['tmp_name'], $directorio . $nom_temp);
            echo "<script>alert('Se cargo correctamente el personaje'); window.location.href='../public/personajes-admin'</script>";
        }else{
            echo "<script>alert('Algo ha fallado'); window.location.href='../public/crear-personaje.php'</script>";
        }
    }
    else
    {
        //si no cumple con el formato
        echo "<script>alert('No se puede subir una imagen con ese formato'); window.location.href='../public/crear-personaje'</script>";
    }
}
else
{
    //si existe la variable pero se pasa del tamaño permitido
    echo "<script>alert('No se cargo la imagen'); window.location.href='../public/crear-personaje'</script>";
}


/*
if($result){
    echo "se cargo correctamente";
    echo "<a href='../views/banners.php'>Volver</a>";
}else{
    echo "fallo";
}*/
?>