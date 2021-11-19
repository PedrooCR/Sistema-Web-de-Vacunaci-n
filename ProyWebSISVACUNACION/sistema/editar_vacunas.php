<?php
include_once "includes/header.php";
include "../conexion.php";
if (!empty($_POST)) {
  $alert = "";
  if (empty($_POST['Vacunanombre']) || empty($_POST['codigo'])) {
    $alert = '<div class="alert alert-primary" role="alert">
              Todo los campos son requeridos
            </div>';
  } else {
    $vacunaid = $_GET['id'];
    $vacunanom = $_POST['Vacunanombre'];
    $vacunacod = $_POST['codigo'];
    
    $query_update = mysqli_query($conexion, "UPDATE vacunas SET Vacunanombre = '$vacunanom', codigo = '$vacunacod' WHERE VacunaID = '$vacunaid'");
    if ($query_update) {
      $alert = '<div class="alert alert-primary" role="alert">
              Modificado
            </div>';
    } else {
      $alert = '<div class="alert alert-primary" role="alert">
                Error al Modificar
              </div>';
    }
  }
}

// Validar producto

if (empty($_REQUEST['id'])) {
  header("Location: lista_vacunas.php");
} else {
  $vacunaid = $_REQUEST['id'];
  if (!is_numeric($vacunaid)) {
    header("Location: lista_vacunas.php");
  }
  $query_producto = mysqli_query($conexion, "SELECT * FROM vacunas WHERE VacunaID = $vacunaid");
  $result_producto = mysqli_num_rows($query_producto);

  if ($result_producto > 0) {
    $data_producto = mysqli_fetch_assoc($query_producto);
  } else {
    header("Location: lista_vacunas.php");
  }
}
?>
<!-- Begin Page Content -->
<div class="container-fluid">

  <div class="row">
    <div class="col-lg-6 m-auto">

      <div class="card">
        <div class="card-header bg-primary text-white">
          Modificar Vacuna
        </div>
        <div class="card-body">
          <form action="" method="post">
            <?php echo isset($alert) ? $alert : ''; ?>
            <div class="form-group">
              <label for="Vacunanombre">Vacuna</label>
              <input type="text" class="form-control" placeholder="Ingrese nombre del producto" name="Vacunanombre" id="Vacunanombre" value="<?php echo $data_producto['Vacunanombre']; ?>">

            </div>
            <div class="form-group">
              <label for="codigo">Codigo</label>
              <input type="text" placeholder="Ingrese precio" class="form-control" name="codigo" id="codigo" value="<?php echo $data_producto['codigo']; ?>">

            </div>
            <input type="submit" value="Actualizar Vacuna" class="btn btn-primary">
            <a href="lista_vacunas.php" class="btn btn-danger">Regresar</a>
          </form>
        </div>
      </div>
    </div>
  </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php include_once "includes/footer.php"; ?>