<?php include_once "includes/header.php";
include "../conexion.php";
if (!empty($_POST)) {
  $alert = "";
  if (empty($_POST['numerodosis'])) {
    $alert = '<p class"error">Todo los campos son requeridos</p>';
  } else {
        $iddpaciente = $_POST['id'];
        $numerodocumentopa = $_POST['Pacientenumdocumento']; ///>
        //$nombrespa = $_POST['Pacientenombre'];              ///>
        //$apellidospa = $_POST['Pacienteapellido'];          ///>
        //$direccionpa = $_POST['Pacientedireccion'];         ///>
        //$edadpa = $_POST['Pacienteedad'];                  ///> 
        //$telefonopa = $_POST['Pacientetelefono'];          ///>
        //$nacionalidadpa = $_POST['Pacientenacionalidad'];  ///>
        //$tipodocumentopa = $_POST['Pacientetipodocu'];     ///>
        //$correopa = $_POST['Pacientecorreo'];              ///>
        //$distritopa = $_POST['Pacientedistrito'];          ///>
        //$provinciapa = $_POST['Pacienteprovincia'];        ///>
        //$departamentopa = $_POST['Pacientedepartamento'];  ///>
        //$vacuna = $_POST['idvacuna'];                      ///>
        //$sede = $_POST['idsede'];                          ///>
        $numerodosis = $_POST['numerodosis'];              ///>
        //$femisionpa = $_POST['Pacientedniemision'];        ///>
        //$fenacimientopa = $_POST['PacienteFechaNac'];      ///>
        $feprimdosis = $_POST['Fechaunodosis'];            ///>
        $fesegudosis = $_POST['fechadosdosis'];  
        //$rol = $_POST['idROL'];     
    /*
    $idcliente = $_POST['id'];
    $dni = $_POST['dni'];
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
*/
    $result = 0;
    if (is_numeric($numerodocumentopa) and $numerodocumentopa != 0) {

      $query = mysqli_query($conexion, "SELECT * FROM pacientes where (Pacientenumdocumento = '$numerodocumentopa' AND PacienteID != $iddpaciente)");
      $result = mysqli_fetch_array($query);
      $resul = mysqli_num_rows($query);
    }

    if ($resul >= 1) {
      $alert = '<p class"error">El dni ya existe</p>';
    } else {
      if ($numerodocumentopa == '') {
        $numerodocumentopa = 0;
      }
      $sql_update = mysqli_query($conexion, "UPDATE pacientes SET Pacientenumdocumento = '$numerodocumentopa', numerodosis =  '$numerodosis' , Fechaunodosis = '$feprimdosis' ,fechadosdosis = '$fesegudosis' WHERE PacienteID = $iddpaciente");

      if ($sql_update) {
        $alert = '<p class"exito">Paciente Actualizado correctamente</p>';
      } else {
        $alert = '<p class"error">Error al Actualizar el Cliente</p>';
      }
    }
  }
}
// Mostrar Datos

if (empty($_REQUEST['id'])) {
  header("Location: lista_pacientes.php");
}
$iddpaciente = $_REQUEST['id'];
$sql = mysqli_query($conexion, "SELECT * FROM pacientes WHERE PacienteID = $iddpaciente");
$result_sql = mysqli_num_rows($sql);
if ($result_sql == 0) {
  header("Location: lista_pacientes.php");
} else {
  while ($data = mysqli_fetch_array($sql)) {
    $iddpaciente = $data['PacienteID'];
    $numerodocumentopa = $data['Pacientenumdocumento'];
    $feprimdosis = $data['Fechaunodosis'];
    $fesegudosis = $data['fechadosdosis'];
    //$direccion = $data['direccion'];
  }
}

?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <div class="row">
            <div class="col-lg-6 m-auto">

              <form class="" action="" method="post">
                <?php echo isset($alert) ? $alert : ''; ?>
                <input type="hidden" name="id" value="<?php echo $iddpaciente; ?>">
                <div class="form-group">
                  <label for="Pacientenumdocumento">NUMERO DE DOCUMENTO</label>
                  <input type="number" placeholder="" name="Pacientenumdocumento" id="Pacientenumdocumento" class="form-control" value="<?php echo $numerodocumentopa; ?>">
                </div>
                <div class="form-group">
                  <label for="numerodosis">NUMERO DE DOSIS</label>
                  <input type="text" placeholder="" name="numerodosis" class="form-control" id="numerodosis" value="">
                </div>
                <div class="form-group">
                  <label for="Fechaunodosis">FECHA DE PRIMERA DOSIS</label>
                  <input type="date" class="form-control" name="Fechaunodosis" id="Fechaunodosis" value="<?php echo $feprimdosis; ?>">
                </div>
                <div class="form-group">
                  <label for="fechadosdosis">FECHA DE SEGUNDA DOSIS</label>
                  <input type="date" class="form-control" name="fechadosdosis" id="fechadosdosis" value="<?php echo $fesegudosis; ?>">
                </div>
                
                <button type="submit" class="btn btn-primary"><i class="fas fa-user-edit"></i> Editar</button>
                <a href="lista_pacientes.php" class="btn btn-danger">Regresar</a>
              </form>
            </div>
          </div>


        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
      <?php include_once "includes/footer.php"; ?>