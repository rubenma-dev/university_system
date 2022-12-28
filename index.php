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


  <div id="contactwrap">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
          <h4>BIENVENIDO</h4>
          <h1>UNIVERSIDAD CATOLICA</h1>
        </div>
      </div>
    </div>
  </div>

  <div id="contact">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <h2 class="centered">REGISTRO DEL DOCENTE</h2>

          <form class="contact-form php-mail-form" role="form" action="guardar_docente.php" method="POST">
            <div class="form-group">
              <input type="number" name="cedula" class="form-control" id="contact-subject" placeholder="Cedula" data-rule="minlen:1" data-msg="Ingrese su numero de cedula">
              <div class="validate"></div>
            </div>
            <div class="form-group">
              <input type="name" name="nombre" class="form-control" id="contact-name" placeholder="nombre" data-rule="minlen:1" data-msg="Por favor, complete los datos">
              <div class="validate"></div>
            </div>
            <div class="form-group">
              <input type="name" name="apellido" class="form-control" id="contact-name" placeholder="apellido" data-rule="minlen:1" data-msg="Por favor, complete los datos">
              <div class="validate"></div>
            </div>
            <div class="form-group">
              <input type="date" name="fecha_nacimiento" class="form-control" id="contact-name" placeholder="fecha_nacimiento" data-rule="minlen:1" data-msg="Por favor, complete los datos">
              <div class="validate"></div>
            </div>
            <div class="form-group">
              <input type="name" name="profesion" class="form-control" id="contact-name" placeholder="profesion" data-rule="minlen:1" data-msg="Por favor, complete los datos">
              <div class="validate"></div>
            </div>
            <div class="error-message">error</div>
            <div class="sent-message">Formulario completado</div>
            <br>
            <input type="hidden" name="editar" value="no" readonly>
            <div class="form-send">
              <button type="submit" class="btn btn-large">Enviar</button>
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

  <!-- JavaScript  -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="lib/php-mail-form/validate.js"></script>
  <script src="js/main.js"></script>

</body>

</html>