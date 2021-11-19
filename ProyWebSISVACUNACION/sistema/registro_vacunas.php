 <?php include_once "includes/header.php";
  include "../conexion.php";
  if (!empty($_POST)) {
    $alert = "";
    if (empty($_POST['Vacunanombre']) || empty($_POST['codigo'])){
      $alert = '<div class="alert alert-danger" role="alert">
                Todo los campos son obligatorios
              </div>';
    } else {
      $vacunomb = $_POST['Vacunanombre'];
      $vacucod = $_POST['codigo'];
     
      $query_insert = mysqli_query($conexion, "INSERT INTO vacunas(Vacunanombre,codigo) values ('$vacunomb', '$vacucod')");
      if ($query_insert) {
        $alert = '<div class="alert alert-primary" role="alert">
                Vacuna Registrado
              </div>';
      } else {
        $alert = '<div class="alert alert-danger" role="alert">
                Error al registrar
              </div>';
      }
    }
  }
  ?>

 <!-- Begin Page Content -->
 <div class="container-fluid">

   <!-- Page Heading -->
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
     <h1 class="h3 mb-0 text-gray-800">Registro de la Vacuna</h1>
     <a href="lista_vacunas.php" class="btn btn-primary">Regresar</a>
   </div>

   <!-- Content Row -->
   <div class="row">
     <div class="col-lg-6 m-auto">
       <form action="" method="post" autocomplete="off">
         <?php echo isset($alert) ? $alert : ''; ?>
         <div class="form-group">
           <label for="Vacunanombre">Nombre de la Vacuna</label>
           <input type="text" placeholder="" name="Vacunanombre" id="Vacunanombre" class="form-control">
         </div>
         <div class="form-group">
           <label for="codigo">Codigo</label>
           <input type="text" placeholder="" class="form-control" name="codigo" id="codigo">
         </div>
         
         <input type="submit" value="Guardar Vacuna" class="btn btn-primary">
         <a href="lista_vacunas.php" class="btn btn-danger">Regresar</a>
       </form>
     </div>
   </div>


 </div>
 <!-- /.container-fluid -->

 </div>
 <!-- End of Main Content -->
 <?php include_once "includes/footer.php"; ?>