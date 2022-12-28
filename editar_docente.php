<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Inicio</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="" rel="icon">
  <link href="./img/favicon.png" rel="apple-touch-icon">

  <!-- Fuentes Google -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Archivos Bootstrap CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libreria CSS -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">

  <!--  Estilo principal -->
  <link href="css/style.css" rel="stylesheet">

</head>

<body>

  <!-- Navegador -->
  <div class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        <a class="navbar-brand" href="index.php">UNIVERSIDAD CATOLICA</a>
      </div>
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
          <li class="active"><a href="index.php">Formulario</a></li>
          <li><a href="materia.php" class="smoothscroll">Materia</a></li>  
          <li><a href="listado.php" class="smoothscroll">Lista de Profesores</a></li>
          <li><a href="lista_materias.php" class="smoothscroll">Lista de Materias</a></li>
          <li><a href="generar.php" class="smoothscroll">Generar PDF</a></li>
        </ul>
      </div>
    </div>
  </div>

    <!--Conexion a la base de datos-->
    <?php
    include 'db.php';
    $conexiondb = conectardb();
    $cedula = $_GET['cedula'];
    $query = "SELECT * FROM docente WHERE cedula ='" . $cedula . "'";
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
                        <th><input type="text" name="nombre" id="" value='<?php echo $persona[2]; ?>'></th>
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
                <input type="hidden" name="docente_id" id="" value='<?php echo $persona[0]; ?>' readonly>
                <input type="hidden" name="editar" id="" value='si' readonly>
                <input class="btn btn-outline-primary" type="submit" value="GUARDAR">
            </form>
        </div>
    </div>

        </div>
    </div>


    <link rel="stylesheet" href="./css/index.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>


</body>

</html>