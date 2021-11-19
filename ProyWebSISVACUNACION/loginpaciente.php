<?php
$alert = '';
session_start();
if (!empty($_SESSION['active'])) {
  header('location: sistema/');
} else {
  if (!empty($_POST)) {
    if (empty($_POST['tipodocu']) || empty($_POST['numerodocu']) || empty($_POST['fechaemision']) ) {
      $alert = '<div class="alert alert-danger" role="alert">
  Ingrese su usuario y su clave
</div>';
    } else {
      require_once "conexion.php";
      $nudocumento = mysqli_real_escape_string($conexion, $_POST['numerodocu']);
      $fednimision = mysqli_real_escape_string($conexion, $_POST['fechaemision']);
      $tipodocumento = mysqli_real_escape_string($conexion, $_POST['tipodocu']);
      $query = mysqli_query($conexion, "SELECT pa.PacienteID, pa.Pacientenombre, 
      pa.Pacienteapellido, pa.Pacientedireccion, pa.Pacienteedad, pa.Pacientetelefono, 
      pa.Pacientenumdocumento, pa.Pacientenacionalidad, pa.Pacientetipodocu, 
      pa.Pacientecorreo, pa.Pacientedistrito, pa.Pacienteprovincia, 
      pa.Pacientedepartamento, pa.Pacientedniemision, pa.PacienteFechaNac, 
      pa.Fechaunodosis, pa.fechadosdosis,pa.idvacuna, va.Vacunanombre, pa.idsede, pa.numerodosis, pa.idROL,r.rol, se.nombreSede FROM pacientes pa INNER JOIN rol r ON pa.idROL = r.IDrol INNER JOIN vacunas va ON pa.idvacuna 
      = va.VacunaID INNER JOIN sedes se ON pa.idsede = se.SedeID WHERE pa.Pacientenumdocumento 
      = '$nudocumento' AND pa.Pacientedniemision = '$fednimision' AND pa.Pacientetipodocu = '$tipodocumento' ");
      mysqli_close($conexion);
      $resultado = mysqli_num_rows($query);
      if ($resultado > 0) {
        $dato = mysqli_fetch_array($query);
        $_SESSION['active'] = true;
        $_SESSION['idpaciente'] = $dato['PacienteID'];
        $_SESSION['nombrepa'] = $dato['Pacientenombre'];
        $_SESSION['apellidopa'] = $dato['Pacienteapellido'];
        $_SESSION['direccionpa'] = $dato['Pacientedireccion'];
        $_SESSION['edadpa'] = $dato['Pacienteedad'];
        $_SESSION['telefonopa'] = $dato['Pacientetelefono'];
        $_SESSION['numdocumentopa'] = $dato['Pacientenumdocumento'];
        $_SESSION['nacionalidadpa'] = $dato['Pacientenacionalidad'];
        $_SESSION['tipodocumentopa'] = $dato['Pacientetipodocu'];
        $_SESSION['correopa'] = $dato['Pacientecorreo'];
        $_SESSION['distritopa'] = $dato['Pacientedistrito'];
        $_SESSION['provinciapa'] = $dato['Pacienteprovincia'];
        $_SESSION['departamentopa'] = $dato['Pacientedepartamento'];
        $_SESSION['dniemisionpa'] = $dato['Pacientedniemision'];
        $_SESSION['fenacimientopa'] = $dato['PacienteFechaNac'];
        $_SESSION['fedosisuno'] = $dato['Fechaunodosis'];
        $_SESSION['fedosisdos'] = $dato['fechadosdosis'];
        $_SESSION['vacunaid'] = $dato['idvacuna'];
        $_SESSION['nombrevacuna'] = $dato['Vacunanombre'];
        $_SESSION['sedeid'] = $dato['idsede'];
        $_SESSION['numdosis'] = $dato['numerodosis'];
        $_SESSION['idrol'] = $dato['idROL'];
        $_SESSION['rol_name'] = $dato['rol'];
        $_SESSION['nombresede'] = $dato['nombreSede'];
        header('location: sistema/');
      } else {
        $alert = '<font size="2" color="red">Datos incorrectos</font>';
        session_destroy();
      }
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Sistema de Login del Paciente</title>

  <!-- Custom fonts for this template-->
  <link href="sistema/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="sistema/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image">
                <img src="sistema/img/Fondopararegistro.png" class="img-thumbnail">
              </div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Inicio de Sesion de Pacientes</h1>
                  </div>
                  <form class="user" method="POST" >
                    
                    <div class="form-group">
                      <label for="">Tipo de Documento</label>
                      <select name="tipodocu" id="centrovacunacion" class="form-control">
                            <option>DNI</option>
					          	      <option>Pasaporte</option>
                            <option>Carnet de extranjeria</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="">Numero de documento</label>
                      <input type="text" class="form-control" placeholder="" name="numerodocu">
                    </div>
                    <div class="form-group">
                      <label for="">Fecha de emision</label>
                      <input type="date" class="form-control" name="fechaemision" id="dosisprimerafecha">
                    </div>
                    <input type="submit" value="Ingresar" class="btn btn-primary">
                    <?php echo isset($alert) ? $alert : ""; ?>
                    <hr>
                  </form>
                  <a href="menuprincipal.php"><input width="center" type="submit" value="Atras" class="btn btn-primary"></a>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="sistema/vendor/jquery/jquery.min.js"></script>
  <script src="sistema/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="sistema/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="sistema/js/sb-admin-2.min.js"></script>

</body>

</html>