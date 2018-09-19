<?php

include ('conexion.php');

try{
//obtenemos el archivo .csv
    $tipo = $_FILES['archivo']['type'];

    $tamanio = $_FILES['archivo']['size'];

    $archivotmp = $_FILES['archivo']['tmp_name'];

//cargamos el archivo
    $lineas = file($archivotmp);

//inicializamos variable a 0, esto nos ayudará a indicarle que no lea la primera línea
    $i = 0;
    ini_set('max_execution_time', 6000);
    if ($tipo==="application/vnd.ms-excel") {
        foreach ($lineas as $linea_num => $linea) {
            //echo "entro";
            //abrimos bucle
            /*si es diferente a 0 significa que no se encuentra en la primera línea
            (con los títulos de las columnas) y por lo tanto puede leerla*/
            if ($i != 0) {
                //echo "entro if i";
                //abrimos condición, solo entrará en la condición a partir de la segunda pasada del bucle.
                /* La funcion explode nos ayuda a delimitar los campos, por lo tanto irá
                leyendo hasta que encuentre un ; */
                $datos = explode(";", $linea);

                //Almacenamos los datos que vamos leyendo en una variable
                //usamos la función utf8_encode para leer correctamente los caracteres especiales

                if (isset($datos[0])) {
                    $correo = $datos[0];
                }
                if (isset($datos[1])) {
                    $nombre = $datos[1];
                }
                $contacto[0] = $dia;
                $contacto[1] = $nombre;
            }
            $correos[] = $contacto;
            unset($contacto);
            $i++;
        }
    }
    print_r($correos);
}catch (Exception $e){
    echo "<script>alert('Algo ha pasado, verifica tu archivo'); window.location.href='../views/importar-horario.php'</script>";
}