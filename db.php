<?php
    function conectardb() {
        $servidor = 'localhost';
        $usuario = 'root';
        $contraseña = '';
        $personadb = 'universidad';
        /*Crear conexion con la base de datos pasando como parametros las variables */
        $conexion = mysqli_connect($servidor, $usuario, $contraseña, $personadb);

        return $conexion;
    }
?>