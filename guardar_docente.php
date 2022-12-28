<?php

include 'db.php';

$cedula = $_POST['cedula'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$profesion = $_POST['profesion'];
$editar = $_POST['editar'];


$conexiondb = conectardb();

if ($editar == "si") {
    $query = "UPDATE docente SET cedula='" . $cedula . "', nombre='" . $nombre . "', apellido='" . $apellido . "', fecha_nacimiento='" . $fecha_nacimiento . "', profesion='" . $profesion . "' WHERE id_docente='" . $nombre . "'";
} else {
    $query = "INSERT INTO docente (cedula, nombre, apellido, fecha_nacimiento, profesion) VALUES 
        ('$cedula', '$nombre', '$apellido', '$fecha_nacimiento', '$profesion')";
}

$respuesta = mysqli_query($conexiondb, $query);

if ($respuesta) {
    if ($editar == "si") {
        echo ("Se Actualizo la persona");
    } else {
        echo ("Se Registro la persona");
    }
} else {
    if ($editar == "si") {
        echo ("No se pudo actualizar la persona");
    } else {
        echo ("No se pudo registrar la persona");
    }
}

mysqli_close($conexiondb);
?>