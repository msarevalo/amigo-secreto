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
<body>
<div>
    <header>Olvidé mi contraseña</header>
    <form method="post" action="../back/enviar.php" autocomplete="off">
        <table>
            <tr>
                <td>
                    <label class="titulos">Correo</label>
                </td>
                <td>
                    <input type="email" placeholder="Correo" id="correo" name="correo" required>
                </td>
            </tr>
        </table>
        <input type="submit" value="Enviar">
    </form>
    <br /><a href="index.php">Volver</a>
</div>
</body>