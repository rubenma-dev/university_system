<!DOCTYPE html>
<html lang="es">

<head>
<meta charset="utf-8">
  <title>Listado</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

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
          <li><a href="materia.php" class="smoothscroll">Materia</a></li>  
          <li class="active"><a href="listado.php">Lista de Profesores</a></li>
          <li><a href="lista_materias.php" class="smoothscroll">Lista de Materias</a></li>
          <li><a href="generar.php" class="smoothscroll">Generar PDF</a></li>
        </ul>
      </div>
    </div>
  </div>

  <?php
  include 'db.php';
  $conexiondb = conectardb();
  $query = "SELECT * FROM docente";
  //$query = "SELECT cedula, nombre, apellido, fecha_nacimiento, profesion, nombre_m FROM docente, materia WHERE docente.id_docente = materia.id_docente";
  $resultado = mysqli_query($conexiondb, $query);
  mysqli_close($conexiondb);
  ?>

  <div class="container center">
    <div class="row">
      <div class="col-md-4 mt-3">
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
        <br>
        <br>
        <br>
        <br>
      <div class="rows-sm-6">
        <h1 class="text-center mt-4">LISTADO DE PROFESORES</h1>
        <table class="table table-striped">
          <thead class="table-dark">
            <tr>
              <th scope="col">N</th>
              <th scope="col">Cédula</th>
              <th scope="col">Nombre</th>
              <th scope="col">Apelido</th>
              <th scope="col">Nacimiento</th>
              <th scope="col">Profesion</th>
              <!--<th scope="col">Materia</th>-->
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            <?php
            $index = 1;
            while ($docente = mysqli_fetch_assoc($resultado)) {
              echo "<tr>";
              echo "<th scope='row'>" . $index++ . "</th>";
              echo "<td>" . $docente['cedula'] . "</td>";
              echo "<td>" . $docente['nombre'] . "</td>";
              echo "<td>" . $docente['apellido']. "</td>";
              echo "<td>" . $docente['fecha_nacimiento'] . "</td>";
              echo "<td>" . $docente['profesion'] . "</td>";
              echo "<td>";
              echo "<td>";
              echo "<a href='editar_docente.php?cedula=" . $docente['cedula'] . "' class='btn btn-outline-primary mx-1 my-1'> <i class=for='btnradio1'>Editar</i> </a>";
              echo "<a href='eliminar_docente.php?cedula=" . $docente['cedula'] . "' class='btn btn-outline-primary mx-1 my-1'> <i class=for='btnradio1'>Borrar</i> </a>";
              echo "</td>";
              echo "</tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
      <script type="text/javascript">
        const btnDelete = document.querySelectorAll('.btn-danger');
        if (btnDelete) {
          const btnArray = Array.from(btnDelete);
          btnArray.forEach((btn) => {
            btn.addEventListener('click', (e) => {
              if (!confirm('Estàs seguro de eliminarlo?')) {
                e.preventDefault();
              }
            });
          })
        }
      </script>
</body>

</html>