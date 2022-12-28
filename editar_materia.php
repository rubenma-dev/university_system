<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Persona</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!--Logo superior de la pagina-->
    <link rel="icon" type="image/png" href="./images/logo.png" sizes="16x16">
</head>

<body>

    <!--Barra de navegación-->
    <div id="navegacion">
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">
                    <img src="./images/logo.png" alt="" width="30" height="24" class="d-inline-block align-text-top">
                    Instituto
                </a>
                <a class="nav-link" href="./docente.php">Registro del Docente</a>
                <a class="nav-link" href="./materia.php">Registro de Materias</a>
                <a class="nav-link" href="./listar_docente.php">Listado de Docentes</a>
                <a class="nav-link" href="./listar_materia.php">Listado de Materia</a>
                <a class="nav-link" href="./reporte.php">Reportes</a>
            </div>
        </nav>
    </div>

    <!--Conexion a la base de datos-->
    <?php
    include 'db.php';
    $conexiondb = conectardb();
    $cedula = $_POST['cedula'];
    $query = "SELECT * FROM docente";
    //$query = "SELECT cedula, nombre, apellido, nacimiento, profesion, nombre_m FROM docente, materia WHERE docente.id = materia.docente_id";
    $respuesta = mysqli_query($conexiondb, $query);
    $persona = mysqli_fetch_row($respuesta);
    mysqli_close($conexiondb);
    ?>

    <!--Alerta de modificacion-->
    <div class="row">
        <div class="float-sm-4 mt-3">
            <?php
            if (isset($_COOKIE['message'])) {
                echo "<div class='alert " . $_COOKIE['alert'] . " alert-dismissible fade show' role='alert'>";
                echo $_COOKIE['message'];
                echo "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>";
                echo "</div>";
                setcookie('message', '', 1);
                setcookie('alert', '', 1);
            }
            ?>
        </div>
    </div>

    <!--Formulario para editar informacion del docente-->
    <div id="formul">
        <h1 class="text-center">Editar Docente</h1>
        <div class="col-sm-4 offset-sm-4">
            <br>
            <form action="guardar_docente.php" method="post">
                <table border="0">
                    <tr>
                        <th><b><label for="">Cedula:</label></b></th>
                        <th><input type="text" name="cedula" id="" value='<?php echo $persona[1]; ?>'></th>
                    </tr>

                    <tr>
                        <th><b><label for="">Nombre:</label></b></th>
                        <th><input type="text" name="nombre_d" id="" value='<?php echo $persona[2]; ?>'></th>
                    </tr>

                    <tr>
                        <th><b><label for="">Apellido:</label></b></th>
                        <th><input type="text" name="apellido" id="" value='<?php echo $persona[3]; ?>'></th>
                    </tr>

                    <tr>
                        <th><b><label for="">Fecha de N.:</label></b></th>
                        <th><input type="date" name="fecha_nacimiento" id="" value='<?php echo $persona[4]; ?>'></th>
                    </tr>

                    <tr>
                        <th><b><label for="">Profesión:</label></b></th>
                        <th><input type="text" name="profesion" id="" value='<?php echo $persona[5]; ?>'></th>
                    </tr>

                </table>
                <input type="hidden" name="id_docente" id="" value='<?php echo $persona[0]; ?>' readonly>
                <input type="hidden" name="editar" id="" value='si' readonly>
                <input class="btn btn-outline-primary" type="submit" value="GUARDAR">
            </form>
        </div>
    </div>


    <link rel="stylesheet" href="./css/index.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>


</body>

</html>