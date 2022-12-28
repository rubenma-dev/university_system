<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Inicio</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="/img/favicon.png" rel="icon">
  <link href="/img/favicon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">

</head>

<body>
  <?php
  include 'db.php';
  $conexiondb = conectardb();
  $query = "SELECT * FROM docente ORDER BY nombre ASC";
  $resultado = mysqli_query($conexiondb, $query);
  mysqli_close($conexiondb);
  ?>
  <!-- Static navbar -->
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
          <li><a href="index.php" class="smoothscroll">Formulario</a></li>
          <li class="active"><a href="materia.php">Materia</a></li>
          <li><a href="listado.php" class="smoothscroll">Lista de Profesores</a></li>
          <li><a href="lista_materias.php" class="smoothscroll">Lista de Materias</a></li>
          <li><a href="generar.php" class="smoothscroll">Generar PDF</a></li>
        </ul>
      </div>
      <!--/.nav-collapse -->
    </div>
  </div>

  <div id="contactwrap">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
          <h1>REGISTRO DE MATERIAS</h1>
        </div>
      </div>
    </div>
    <!-- /container -->
  </div>

  <div id="contact">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <h2 class="centered">REGISTRO DE MATERIA</h2>

          <form class="contact-form php-mail-form" role="form" action="guardar_materia.php" method="Post">
            <div class="form-group">
              <input type="text" name="nombre_m" class="form-control" id="contact-subject" placeholder="Nombre de Materia" data-rule="minlen:4" data-msg="Por favor, complete los datos">
              <div class="validate"></div>
            </div>
            <div class="form-group">
              <input type="number" name="horas_catedras" class="form-control" id="contact-name" placeholder="Horas Catedras" data-msg="Por favor, complete los datos">
              <div class=""></div>
            </div>
            <div class="mb-3">
              <th>
                <select name="id_docente" class=" form-control" id="inputGroupSelect01">
                  <?php
                  while ($docente = mysqli_fetch_assoc($resultado)) {
                    echo "<option value='" . $docente['id_docente'] . "'>" . $docente['nombre'] . "</option>";
                  }
                  ?>
                </select>
              </th>
            </div>
            <div class="loading"></div>
            <div class="error-message"></div>
            <div class="sent-message">Formulario completado</div>
            <input type="hidden" name="editar" value="no" readonly>
            <div class="form-send">
              <button type="submit" value="GUARDAR" class="btn btn-large">Enviar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>



  <div id="copyrights">
    <div class="container">
      <div class="credits">

        TODOS LOS DERECHOS RESERVADOS <a href="">PROGRAMACION III</a>
      </div>
    </div>
  </div>

  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="lib/php-mail-form/validate.js"></script>

  <script src="js/main.js"></script>

</body>

</html>