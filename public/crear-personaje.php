<!DOCTYPE html>
<html>
<head>
    <title>Celmedia | Amigo Secreto</title>
    <meta charset="UTF-8">
    <!-- Estilos -->
    <link href="../css/estilos.css" rel="stylesheet">
    <!--<link href="../css/estilos.css" rel="stylesheet">
    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../js/index.js" type="application/javascript"></script>
    <link rel="shortcut icon" type="image/x-icon" href="../img/favico.png">
</head>
<?php
include '../back/conexion.php';

if (!isset($_SESSION['username'])){
    header("Location: ../public/index.php");
}
?>
<body>
<div style="position: relative">
    <nav id="menu" class="left show">
        <ul>
            <li><a href="#"><i class="fa fa-home"></i><?php echo $_SESSION['username']?></a></li>
            <li><a href="admin"><i class="fa fa-home"></i>Inicio</a></li>
            <li><a href="personajes-admin" class="active"><i class="fa fa-laptop"></i>Personajes</a></li>
            <li><a href="usuarios-admin"><i class="fa fa-laptop"></i>Usuarios</a></li>
            <li><a href="asginar-personaje"><i class="fa fa-laptop"></i>Asignacion de Personajes</a></li>
            <li><a href="asignar-amigo"><i class="fa fa-laptop"></i>Aleatorio</a></li>
            <li><a href="correo-informativo"><i class="fa fa-laptop"></i>Correo informativo</a></li>
            <li><a href="../back/cerrar.php"><i class="fa fa-phone"></i>Salir<img src="../img/cerrar.png" style="width: 15px"></a></li>
        </ul>
    </nav>
</div>

<div style="margin-left: 350px">
    <header id="crear-header">Crear Personaje</header>
    <form action="../back/crearPersonaje.php" enctype="multipart/form-data" method="post" id="crear" style="padding: 30px">
        <!--<input id="archivo" accept=".csv" name="archivo" type="file" required/><br><br><br>-->
        <label for="nombre" class="titulos">Nombre</label>
        <input type="text" id="nombre" name="nombre" required><br><br>
        <label for="genero" class="titulos">Genero</label>
        <select id="genero" name="genero" required>
            <option disabled selected value="">Seleccione</option>
            <option value="F">Femenino</option>
            <option value="M">Masculino</option>
        </select><br><br>
        <label class="file" title="" >
            <input id="imagen" name="imagen" type="file" onchange="this.parentNode.setAttribute('title', this.value.replace(/^.*[\\/]/, ''))" required/>
        </label><br>
        <output id="list"></output><br>
        <label for="activo" class="titulos">Activo</label>
        <select id="activo" name="activo" required>
            <option value="1" selected>Activo</option>
            <option value="0">Inactivo</option>
        </select><br><br>

        <script>
            function archivo(evt) {
                var files = evt.target.files; // FileList object

                // Obtenemos la imagen del campo "file".
                for (var i = 0, f; f = files[i]; i++) {
                    //Solo admitimos imágenes.
                    if (!f.type.match('image.*')) {
                        continue;
                    }

                    var reader = new FileReader();

                    reader.onload = (function(theFile) {
                        return function(e) {
                            // Insertamos la imagen
                            document.getElementById("list").innerHTML = ['<img class="thumb" src="', e.target.result,'" style= "width: 250px;" title="', escape(theFile.name), '"/>'].join('');
                        };
                    })(f);

                    reader.readAsDataURL(f);
                }
            }

            document.getElementById('imagen').addEventListener('change', archivo, false);
        </script>
        <input name="enviar" type="submit" value="Crear" id="btnHorario"/><br>
    </form>
</div>