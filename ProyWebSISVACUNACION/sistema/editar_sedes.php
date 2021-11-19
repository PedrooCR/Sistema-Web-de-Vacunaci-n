<?php
include "includes/header.php";
include "../conexion.php";
if (!empty($_POST)) {
  $alert = "";
  if (empty($_POST['nombreSede']) || empty($_POST['direccionsede']) || empty($_POST['telefono'])) {
    $alert = '<p class"msg_error">Todo los campos son requeridos</p>';
  } else {
    $iddsede = $_GET['id'];
    $sedenomb = $_POST['nombreSede'];
    $sededireccion = $_POST['direccionsede'];
    $sedetelefono = $_POST['telefono'];

    $sql_update = mysqli_query($conexion, "UPDATE sedes SET nombreSede = '$sedenomb', direccionsede = '$sededireccion' , telefono = '$sedetelefono' WHERE SedeID = '$iddsede'");

    if ($sql_update) {
      $alert = '<p class"msg_save">Sede Actualizado correctamente</p>';
    } else {
      $alert = '<p class"msg_error">Error al Actualizar</p>';
    }
  }
}
// Mostrar Datos

if (empty($_REQUEST['id'])) {
  header("Location: lista_sedes.php");
  mysqli_close($conexion);
}
$iddsede = $_REQUEST['id'];
$sql = mysqli_query($conexion, "SELECT * FROM sedes WHERE SedeID = $iddsede");
mysqli_close($conexion);
$result_sql = mysqli_num_rows($sql);
if ($result_sql == 0) {
  header("Location: lista_sedes.php");
} else {
  while ($data = mysqli_fetch_array($sql)) {
    $iddseder = $data['SedeID'];
    $sedenomb = $data['nombreSede'];
    $sededireccion = $data['direccionsede'];
    $sedetelefono = $data['telefono'];
  }
}
?>
<!-- Begin Page Content -->
<div class="container-fluid">

  <div class="row">
    <div class="col-lg-6 m-auto">
      <?php echo isset($alert) ? $alert : ''; ?>
      <form class="" action="" method="post">
        <input type="hidden" name="id" value="<?php echo $iddseder; ?>">
        <div class="form-group">
          <label for="nombreSede">Nombre de la Sede</label>
          <input type="text" placeholder="Ingrese proveedor" name="nombreSede" class="form-control" id="nombreSede" value="<?php echo $sedenomb; ?>">
        </div>
        <div class="form-group">
          <label for="direccionsede">Dirección</label>
          <input type="text" placeholder="Ingrese contacto" name="direccionsede" class="form-control" id="direccionsede" value="<?php echo $sededireccion; ?>">
        </div>
        <div class="form-group">
          <label for="telefono">Teléfono</label>
          <input type="number" placeholder="Ingrese Teléfono" name="telefono" class="form-control" id="telefono" value="<?php echo $sedetelefono; ?>">
        </div>

        <input type="submit" value="Editar Sede" class="btn btn-primary">
        <a href="lista_sedes.php" class="btn btn-danger">Regresar</a>
      </form>
    </div>
  </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php include_once "includes/footer.php"; ?>