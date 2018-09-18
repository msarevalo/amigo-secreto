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
<div style="margin-left: 35%; margin-top: 8%; background-color: #f1f1f1; width: 400px; border-radius: 10px;
box-shadow: 0 0 15px #ececec;">
    <a href="index" style="text-decoration: none; padding-left: 10px" class="titulos">Volver</a>
    <form method="post" action="../back/enviar.php" autocomplete="off" style="margin-left: 20%">
        <table>
            <tr>
                <td>
                    <label class="titulos">Correo</label>
                </td>
                <td>
                    <input type="email" placeholder="Correo" id="correo" name="correo" required class="entradas">
                </td>
            </tr>
        </table><br>
        <input type="submit" value="Enviar" id="boton-login" style="margin-left: 25%">
    </form>
    <br />
</div>
</body>