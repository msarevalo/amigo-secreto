<!DOCTYPE html>
<html>
<head>
    <title>Celmedia | Amigo Secreto</title>
    <meta charset="UTF-8">
    <!-- Estilos -->
    <link href="../css/estilos.css" rel="stylesheet">
    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../js/index.js" type="application/javascript"></script>
    <link rel="shortcut icon" type="image/x-icon" href="../img/LOGO_blanco.png">
</head>
<body onload="noVolver()">
<div>
    <a href="index.php" style="text-decoration: none">Volver</a>
    <form method="post" action="../back/registrar.php" enctype="multipart/form-data" id="registro">
        <table>
            <tr>
                <th>
                    <label>Nombre</label>
                </th>
                <th>
                    <input type="text" placeholder="Nombre" id="nombre" name="nombre" required>
                </th>
            </tr>
            <tr>
                <th>
                    <label>Correo</label>
                </th>
                <th>
                    <input type="email" placeholder="Correo" id="mail" name="mail" required>
                </th>
            </tr>
            <tr>
                <th>
                    <label>Genero</label>
                </th>
                <th>
                    <select id="genero" name="genero" required>
                        <option disabled selected value="">Seleccione</option>
                        <option value="F">Femenino</option>
                        <option value="M">Masculino</option>
                    </select>
                </th>
            </tr>
            <tr>
                <th>
                    <label>Contraseña</label>
                </th>
                <th>
                    <input type="password" placeholder="Contraseña" id="pass" name="pass" required>
                </th>
            </tr>
            <tr>
                <th>
                    <label>Repetir</br>Contraseña</label>
                </th>
                <th>
                    <input type="password" placeholder="Contraseña" id="rpass" name="rpass" required>
                </th>
            </tr>
        </table>
        <input type="submit" value="Registrarme">
    </form>
</div>
</body>
</html>