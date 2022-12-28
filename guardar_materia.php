<?php

include 'db.php';

$nombre_m = $_POST['nombre_m'];
$horas_catedras = $_POST['horas_catedras'];
$editar = $_POST['editar'];
$id_docente = $_POST['id_docente'];

$conexiondb = conectardb();

if ($editar == "si") {
    $query = "UPDATE materia SET nombre_m='" . $nombre_m . "', horas_catedras='" . $horas_catedras . "' WHERE materia.id_materia = " . $id_materia;
} else {
    $query = "INSERT INTO materia(nombre_m, horas_catedras, id_docente) 
    VALUES ('$nombre_m','$horas_catedras',$id_docente)";
}

echo $query;
$respuesta = mysqli_query($conexiondb, $query);

if ($respuesta) {
        $message = "Se editaron los datos correctamente";
    } else {
        $message = "Se registraron los datos correctamente";
    }

exit();

mysqli_close($conexiondb);
