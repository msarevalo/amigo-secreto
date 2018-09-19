<!DOCTYPE html>
<html>
<head>
    <title>Celmedia | Amigo Secreto</title>
    <meta charset="UTF-8">
    <!-- Estilos -->
    <link href="../css/estilos.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cairo:300,400,700" rel="stylesheet">
    <!-- Scripts -->
    <link rel="shortcut icon" type="image/x-icon" href="../img/favico.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../js/index.js" type="application/javascript"></script>
</head>
<?php
include ('../back/conexion.php');

if (!isset($_SESSION['username'])){
    header("Location: ../public/index.php");
}

$asignacion = mysqli_query($con, "SELECT * FROM `asignacion` ");
$resas = mysqli_fetch_all($asignacion);

?>
<body style="background-color: #f1f1f1; font-family: 'Cairo', sans-serif;">
<header id="header" class="left show">
    <img src="../img/LOGO_blanco.png" style="width: 270px; margin-top: 20px">
    <label style="margin-left: 50%; font-size: 40px; margin-top: -5px">Muro Público</label>
    <img src="../img/banner.gif" style="margin-left: 88%; margin-top: 7.5%; z-index: 9; position: fixed; height: 90%;" class="left show">
</header>

<div>
</div>
<div style="position: relative;">
    <nav id="menu" class="left show">
        <ul>
            <!--<li style="margin-bottom: 5px; margin-left: 30px"><img src="../img/perfil.png" style="width: 16px"><?php //echo "<label class='titulos'>" . $_SESSION['username'] . "</label>"?></li>-->
            <li><a href="perfil"><i class="fa fa-laptop"></i>Mi Perfil</a></li>
            <li><a href="home" class="active"><i class="fa fa-home"></i>Muro Público</a></li>
            <li><a href="muro-regalos"><i class="fa fa-laptop"></i>Muro de los regalos</a></li>
            <li><a href="../back/cerrar.php"><i class="fa fa-phone"></i>Salir<img src="../img/cerrar.png" style="width: 15px"></a></li>
        </ul>
    </nav></div>

    <div id="texto">
        <header id='public'>Escribe en el Muro</header>
        <form method="post" action="../back/publicar.php" id="publicar">
            <textarea required maxlength="600" rows="5" cols="85" placeholder="Publica tu mensaje aquí...Todos van a leer tu mensaje jajajaja (risa malévola)" id="publicacion" name="publicacion" onpaste="contarcaracteres();" onkeyup="contarcaracteres();"></textarea><br>
            <label id="res" style="color: #bbbbbb; margin-left: 85%">0 / 600</label><br>
            <?php
            if (sizeof($resas)== 0){
                echo "<label style='margin-left: 30%'>Espera el sorteo para participar en el muro</label>";
            }else{
              echo "
            <select style=\"margin-left: 46%\" id=\"persona\" name=\"persona\">
                <option value=\"0\" selected>Anonimo</option>
                <option value=\"1\">Publicar con mi personaje</option>
            </select>
            <button id=\"boton\">Publicar Mensaje</button>";
            }
            ?>
            <br><br>
        </form>
    </div>
<div style="margin-left: 18%">
    <div style="margin-top: 25px; margin-left: 17%; width: 650px; background-color: #f1f1f1">
        <?php
        $public =mysqli_query($con, "SELECT * FROM `publicaciones` ORDER BY `publicaciones`.`fecha` DESC");
        $respuesta = mysqli_fetch_all($public);

        //echo $_SESSION['id'];
        for ($i = 0; $i<sizeof($respuesta); $i++){
            $nomPer =mysqli_query($con, "SELECT asignacion.personaje, personajes.nombre, personajes.color FROM asignacion INNER JOIN personajes ON asignacion.personaje = personajes.idPersonaje AND asignacion.usuario = " . $respuesta[$i][2]);
            $nom = mysqli_fetch_all($nomPer);
            echo "<div style='background-color: #ffffff; margin-bottom: 10px'>";

            if (sizeof($nom)==0){
                echo "<header id='mensajes1'>Anonimo</header><table><tr><label id='date'>" . $respuesta[$i][1];
            }else{
                if ($nom[0][2] === '#ffffff') {
                    echo "<header id='mensajes' style='box-shadow: 0 0 15px #818181; background-color: " . $nom[0][2] . "'><label style='color: #000000'>" . $nom[0][1] . "</label></header><table><tr><label id='date'>" . $respuesta[$i][1];
                }else{
                    if ($nom[0][2] === '#f1f1f1'){
                        echo "<header id='mensajes' style='box-shadow: 0 0 15px #818181; background-color: " . $nom[0][2] . "'>" . $nom[0][1] . "</header><table><tr><label id='date'>" . $respuesta[$i][1];
                    }else {
                        echo "<header id='mensajes' style='background-color: " . $nom[0][2] . "'>" . $nom[0][1] . "</header><table><tr><label id='date'>" . $respuesta[$i][1];
                    }
                }
            }


            echo "</label></tr><tr>";

            if ($respuesta[$i][2]==0){
                echo "<td><img src='../img/anonimo.png' style='width: 100px; height: 100px; padding-left: 5px'></td>";
            }else{
                $personaje =mysqli_query($con, "SELECT asignacion.personaje, personajes.ruta, personajes.imagen FROM asignacion INNER JOIN personajes ON asignacion.personaje = personajes.idPersonaje AND asignacion.usuario = " . $respuesta[$i][2]);
                $img = mysqli_fetch_all($personaje);
                //echo $img[0][2] . "<br>";
                echo "<td><img src='http://52.15.245.23" . $img[0][1] . $img[0][2] . "' style='width: 100px; height: 100px; padding-left: 5px'></td>";
            }
            if(strlen($respuesta[$i][3]) > 73) { // verifica si el texto tiene mas de 80 caracteres

                $respuesta[$i][3] = wordwrap($respuesta[$i][3],73,"<br>",1); } // inserta el salto a los 80 car...

            else $respuesta[$i][3]=$respuesta[$i][3]; // si no es mas largo de 80 caracteres, lo deja igual

            echo "<td><label>" . $respuesta[$i][3] . "</label></td>";
            echo "</tr></table><br></div>";
        }
        ?>
    </div>
</div>
</body>
</html>