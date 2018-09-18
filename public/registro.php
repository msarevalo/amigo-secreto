<!DOCTYPE html>
<html>
<head>
    <title>Celmedia | Amigo Secreto</title>
    <meta charset="UTF-8">
    <!-- Estilos -->
    <link href="../css/estilos.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cairo:400,700" rel="stylesheet">
    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../js/index.js" type="application/javascript"></script>
    <link rel="shortcut icon" type="image/x-icon" href="../img/favico.png">
</head>
<body style="background-color: #1A1A1A; font-family: 'Cairo', sans-serif;">
<div style="margin-left: 35%; margin-top: 8%; background-color: #f1f1f1; width: 450px; border-radius: 10px;
box-shadow: 0 0 15px #ececec;">
    <a href="index" style="text-decoration: none; padding-left: 10px" class="titulos">Volver</a>
    <form method="post" action="../back/registrar.php" enctype="multipart/form-data" id="registro">
        <table style="margin-left: 13%">
            <tr>
                <th>
                    <label class="titulos">Nombre</label>
                </th>
                <th>
                    <input type="text" placeholder="Nombre" id="nombre" name="nombre" required class="entradas">
                </th>
            </tr>
            <tr>
                <th>
                    <label class="titulos">Correo</label>
                </th>
                <th>
                    <input type="email" placeholder="Correo" id="mail" name="mail" required class="entradas">
                </th>
            </tr>
            <tr>
                <th>
                    <label class="titulos">Genero</label>
                </th>
                <th>
                    <select id="genero" name="genero" required class="entradas">
                        <option disabled selected value="">Seleccione</option>
                        <option value="F">Femenino</option>
                        <option value="M">Masculino</option>
                    </select>
                </th>
            </tr>
            <tr>
                <th>
                    <label class="titulos">Contraseña</label>
                </th>
                <th>
                    <input type="password" placeholder="Contraseña" id="pass" name="pass" required class="entradas">
                </th>
            </tr>
            <tr>
                <th>
                    <label class="titulos">Repetir Contraseña</label>
                </th>
                <th>
                    <input type="password" placeholder="Contraseña" id="rpass" name="rpass" required class="entradas">
                </th>
            </tr>
        </table><br>
        <input type="submit" value="Registrarme" id="boton-login" style="margin-left: 40%"><br><br>
    </form>
</div>
</body>
</html>