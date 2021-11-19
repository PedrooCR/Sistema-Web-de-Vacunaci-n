<?php
include "includes/header.php";
include "../conexion.php";
if (!empty($_POST)) {
  $alert = "";
  if (empty($_POST['Pexternousuario']) || empty($_POST['Pexternocorreo']) || empty($_POST['Pexternocontraseña']) || empty($_POST['Pexternotelefono']) || empty($_POST['Pexternodireccion'])) {
    $alert = '<p class"error">Todo los campos son requeridos</p>';
  } else {
    $idexpersonal = $_GET['id'];
    $pexusuario = $_POST['Pexternousuario'];
    $pexcorreo = $_POST['Pexternocorreo'];
    $pexcontraseña = $_POST['Pexternocontraseña'];
    $pextelefono = $_POST['Pexternotelefono'];
    $pexdireccion = $_POST['Pexternodireccion'];

    $sql_update = mysqli_query($conexion, "UPDATE personalexternos SET Pexternousuario = '$pexusuario',
     Pexternocorreo = '$pexcorreo' , Pexternocontraseña = '$pexcontraseña', Pexternotelefono = '$pextelefono' ,
      Pexternodireccion = '$pexdireccion'  WHERE PexternoID = $idexpersonal");
    $alert = '<p>Usuario Actualizado</p>';
  }
}

// Mostrar Datos

if (empty($_REQUEST['id'])) {
  header("Location: lista_usuarios.php");
}
$idexpersonal = $_REQUEST['id'];
$sql = mysqli_query($conexion, "SELECT * FROM personalexternos WHERE PexternoID = $idexpersonal");
$result_sql = mysqli_num_rows($sql);
if ($result_sql == 0) {
  header("Location: lista_usuarios.php");
} else {
  if ($data = mysqli_fetch_array($sql)) {
    $idexpersonal = $data['PexternoID'];
    $pexusuario = $data['Pexternousuario'];
    $pexcorreo = $data['Pexternocorreo'];
    //$pexcontraseña = $data['Pexternocontraseña'];
    $pextelefono = $data['Pexternotelefono'];
    $pexdireccion = $data['Pexternodireccion'];
  }
}
?>


<!-- Begin Page Content -->
<div class="container-fluid">

  <div class="row">
    <div class="col-lg-6 m-auto">
      <form class="" action="" method="post">
        <?php echo isset($alert) ? $alert : ''; ?>
        <input type="hidden" name="id" value="<?php echo $idexpersonal; ?>">
        <div class="form-group">
          <label for="Pexternousuario">Usuario</label>
          <input type="text" placeholder="" class="form-control" name="Pexternousuario" id="Pexternousuario" value="<?php echo $pexusuario; ?>">

        </div>
        <div class="form-group">
          <label for="Pexternocorreo">Correo</label>
          <input type="text" placeholder="Ingrese correo" class="form-control" name="Pexternocorreo" id="Pexternocorreo" value="<?php echo $pexcorreo; ?>">

        </div>
        <div class="form-group">
          <label for="Pexternocontraseña">Contraseña</label>
          <input type="password" placeholder="" class="form-control" name="Pexternocontraseña" id="Pexternocontraseña">

        </div>
        <div class="form-group">
          <label for="Pexternotelefono">Telefono</label>
          <input type="text" placeholder="" class="form-control" name="Pexternotelefono" id="Pexternotelefono" value="<?php echo $pextelefono; ?>">

        </div>
        <div class="form-group">
          <label for="Pexternodireccion">Dirección</label>
          <input type="text" placeholder="" class="form-control" name="Pexternodireccion" id="Pexternodireccion" value="<?php echo $pexdireccion; ?>">
        </div>
        <button type="submit" class="btn btn-primary"><i class="fas fa-user-edit"></i> Editar Usuario</button>
        <a href="lista_usuarios.php" class="btn btn-danger">Regresar</a>
      </form>
    </div>
  </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php include_once "includes/footer.php"; ?>