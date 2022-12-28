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
          <li><a href="listado.php" class="smoothscroll">Lista de Profesores</a></li>   
          <li class="active"><a href="lista_materias.php">Lista de Materias</a></li>
          <li><a href="generar.php" class="smoothscroll">Generar PDF</a></li>
        </ul>
      </div>
    </div>
  </div>

  <?php
  include 'db.php';
  $conexiondb = conectardb();
  $query = "SELECT * FROM `docente`, `materia` WHERE 1";
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
        <h1 class="text-center mt-4">LISTADO DE MATERIAS</h1>
        <table class="table table-striped">
          <thead class="table-dark">
            <tr>
              <th scope="col">N</th>
              <th scope="col">Nombre</th>
              <th scope="col">horas</th>
              <th scope="col">profesor</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            <?php
            $index = 1;
            while ($materia = mysqli_fetch_assoc($resultado)) {
              echo "<tr>";
              echo "<th scope='row'>" . $index++ . "</th>";
              echo "<td>" . $materia['nombre_m'] . "</td>";
              echo "<td>" . $materia['horas_catedras']. "</td>";
              echo "<td>" . $materia['nombre']. "</td>";
              echo "<td>";
              echo "<td>";
              echo "<a href='editar_docente.php?cedula=" . $materia['id_materia'] . "' class='btn btn-outline-primary mx-1 my-1'> <i class=for='btnradio1'>Editar</i> </a>";
              echo "<a href='eliminar_docente.php?cedula=" . $materia['id_materia'] . "' class='btn btn-outline-primary mx-1 my-1'> <i class=for='btnradio1'>Borrar</i> </a>";
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