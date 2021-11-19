<?php include_once "includes/header.php";
include "../conexion.php";
if (!empty($_POST)) {
    $alert = "";
    if (empty($_POST['Pacientenombre']) || empty($_POST['Pacientetelefono']) || empty($_POST['Pacientedireccion'])) {
        $alert = '<div class="alert alert-danger" role="alert">
                                    Todo los campos son obligatorio
                                </div>';
    } else {
        $numerodocumentopa = $_POST['Pacientenumdocumento']; ///>
        $nombrespa = $_POST['Pacientenombre'];              ///>
        $apellidospa = $_POST['Pacienteapellido'];          ///>
        $direccionpa = $_POST['Pacientedireccion'];         ///>
        $edadpa = $_POST['Pacienteedad'];                  ///> 
        $telefonopa = $_POST['Pacientetelefono'];          ///>
        $nacionalidadpa = $_POST['Pacientenacionalidad'];  ///>
        $tipodocumentopa = $_POST['Pacientetipodocu'];     ///>
        $correopa = $_POST['Pacientecorreo'];              ///>
        $distritopa = $_POST['Pacientedistrito'];          ///>
        $provinciapa = $_POST['Pacienteprovincia'];        ///>
        $departamentopa = $_POST['Pacientedepartamento'];  ///>
        $vacuna = $_POST['idvacuna'];                      ///>
        $sede = $_POST['idsede'];                          ///>
        $numerodosis = $_POST['numerodosis'];              ///>
        $femisionpa = $_POST['Pacientedniemision'];        ///>
        $fenacimientopa = $_POST['PacienteFechaNac'];      ///>
        $feprimdosis = $_POST['Fechaunodosis'];            ///>
        $fesegudosis = $_POST['fechadosdosis'];  
        $rol = $_POST['idROL'];             ///>
        //$rol = $_SESSION['idROL'];
        //$usuario_id = $_SESSION['idUser'];

        $result = 0;
        if (is_numeric($numerodocumentopa) and $numerodocumentopa != 0) {
            $query = mysqli_query($conexion, "SELECT * FROM pacientes where Pacientenumdocumento = '$numerodocumentopa'");
            $result = mysqli_fetch_array($query);
        }
        if ($result > 0) {
            $alert = '<div class="alert alert-danger" role="alert">
                                    El numero de documento ya existe
                                </div>';
        } else {
            $query_insert = mysqli_query($conexion, "INSERT INTO pacientes(Pacientenombre, Pacienteapellido, Pacientedireccion, Pacienteedad,
            Pacientetelefono, Pacientenumdocumento,Pacientenacionalidad, Pacientetipodocu, Pacientecorreo,
            Pacientedistrito, Pacienteprovincia, Pacientedepartamento, idvacuna, idsede,
            numerodosis, idROL, Pacientedniemision, PacienteFechaNac, Fechaunodosis, 
            fechadosdosis) values ('$nombrespa', '$apellidospa', '$direccionpa', '$edadpa', '$telefonopa', '$numerodocumentopa',
             '$nacionalidadpa','$tipodocumentopa', '$correopa', '$distritopa', '$provinciapa', '$departamentopa', '$vacuna', '$sede',
              '$numerodosis','$rol', '$femisionpa', '$fenacimientopa', '$feprimdosis', '$fesegudosis')");
            if ($query_insert) {
                $alert = '<div class="alert alert-primary" role="alert">
                                    Paciente Registrado
                                </div>';
            } else {
                $alert = '<div class="alert alert-danger" role="alert">
                                    Error al Guardar
                            </div>';
            }
        }
    }
    mysqli_close($conexion);
}
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Registro de Paciente</h1>
        <a href="lista_pacientes.php" class="btn btn-primary">Regresar</a>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-6 m-auto">
            <form action="" method="post" autocomplete="off">
                <?php echo isset($alert) ? $alert : ''; ?>
                <div class="form-group">
                    <label for="Pacientenombre">Nombres</label>
                    <input type="text" placeholder="Ingrese nombres" name="Pacientenombre" id="Pacientenombre" class="form-control">
                </div>
                <div class="form-group">
                    <label for="Pacienteapellido">Apellidos</label>
                    <input type="text" placeholder="Ingrese apellidos" name="Pacienteapellido" id="Pacienteapellido" class="form-control">
                </div>
                <div class="form-group">
                    <label for="Pacientenacionalidad">Nacionalidad</label>
                    <select name="Pacientenacionalidad" id="Pacientenacionalidad" class="form-control">
						<option>Peruano</option>
						<option>Extranjero</option>
					</select>
                </div>
                <div class="form-group">
                    <label for="Pacientetipodocu">Tipo de Documento</label>
                    <select name="Pacientetipodocu" id="Pacientetipodocu" class="form-control">
						<option>DNI</option>
						<option>Carnet de extranjeria</option>
						<option>Pasaporte</option>
					</select>
                </div>
                <div class="form-group">
                    <label for="Pacientenumdocumento">Numero de Documento</label>
                    <input type="text" placeholder="N° documento" name="Pacientenumdocumento" id="Pacientenumdocumento" class="form-control">
                </div>
                <div class="form-group">
                    <label for="Pacientedniemision">Fecha de emision</label>
                    <input type="date" class="form-control" name="Pacientedniemision" id="Pacientedniemision">
                </div>
                <div class="form-group">
                    <label for="PacienteFechaNac">Fecha de Nacimiento</label>
                    <input type="date" class="form-control" name="PacienteFechaNac" id="PacienteFechaNac">
                </div>
                <div class="form-group">
                    <label for="Pacienteedad">Edad</label>
                    <input type="text" placeholder="Ingrese edad" name="Pacienteedad" id="Pacienteedad" class="form-control">
                </div>
                <div class="form-group">
                    <label for="Pacientecorreo">Correo electronico</label>
                    <input type="text" placeholder="Ingrese email" name="Pacientecorreo" id="Pacientecorreo" class="form-control">
                </div>
                <!--
                <div class="form-group">
                    <label for="sexo">Sexo</label>
                    <select name="sexo" id="sexo" class="form-control">
						<option>Masculino</option>
						<option>Femenino</option>
					</select>
                </div>
                -->
                <div class="form-group">
                    <label for="Pacientetelefono">Telefono</label>
                    <input type="text" placeholder="Ingrese numero de telefono" name="Pacientetelefono" id="Pacientetelefono" class="form-control">
                </div>
                <div class="form-group">
                    <label for="Pacientedireccion">Dirección</label>
                    <input type="text" placeholder="Ingrese Direccion" name="Pacientedireccion" id="Pacientedireccion" class="form-control">
                </div>
                <div class="form-group">
                    <label for="Pacienteprovincia">Provincia</label>
                    <select name="Pacienteprovincia" id="Pacienteprovincia" class="form-control">
                          <option >LIMA</option>
                          <option >CALLAO </option>
                          <option >CUSCO </option>
                          <option >ACOMAYO  </option>
                          <option >ACOBAMBA</option>
                          <option>HUAYTARA</option>
        
					</select>
                </div>
                <div class="form-group">
                    <label for="Pacientedepartamento">Departamento</label>
                    <select name="Pacientedepartamento" id="Pacientedepartamento" class="form-control">
                          <option >LIMA</option>
                          <option >BAGUA</option>
                          <option >AMAZONAS</option>
                          <option >ANCASH </option>
                          <option >APURIMAC </option>
                          <option>AREQUIPA</option>
                          <option>AYACUCHO</option>
					</select>
                </div>
                <div class="form-group">
                    <label for="Pacientedistrito">Distrito</label>
                    <select name="Pacientedistrito" id="Pacientedistrito" class="form-control">
                          <option >Ancón</option>
                          <option >Ate Vitarte</option>
                          <option >Barranco</option>
                          <option >Breña</option>
                          <option >Carabayllo</option>
                          <option >Chorrillos</option>
                          <option >Cieneguilla</option>
                          <option >Comas</option>
                          <option >El Agustino</option>
                          <option >Independencia</option>
                          <option >Jesús María</option>
                          <option >La Molina</option>
                          <option >La Victoria</option>
                          <option >Lima</option>
                          <option >Lince</option>
                          <option >Los Olivos</option>
                          <option >Lurigancho</option>
                          <option >Lurín</option>
                          <option >Magdalena del Mar</option>
                          <option >Miraflores</option>
                          <option >Pachacamac</option>
                          <option >Pucusana</option>
                          <option >Pueblo Libre</option>
                          <option >Puente Piedra</option>
                          <option >Punta Hermosa</option>
                          <option >Punta Negra</option>
                          <option >Rímac</option>
                          <option >San Bartolo</option>
                          <option >San Borja</option>
                          <option >San Isidro</option>
                          <option >San Juan de Lurigancho</option>
                          <option >San Juan de Miraflores</option>
                          <option >San Luis</option>
                          <option >San Martín de Porres</option>
                          <option >San Miguel</option>
                          <option >Santa Anita</option>
                          <option >Santa María del Mar</option>
                          <option >Santa Rosa</option>
                          <option >Santiago de Surco</option>
                          <option >Surquillo</option>
                          <option >Villa El Salvador</option>
                          <option >Villa María del Triunfo</option>
					</select>
                </div>
                <div class="form-group">
                    <label for="idROL">ROL</label>
                    <select name="idROL" id="idROL" class="form-control">
                          <option value="3">Paciente</option>
					</select>
                </div>
                <div class="form-group">
                    <label for="idvacuna">Nombre de la vacuna</label>
                    <select name="idvacuna" id="idvacuna" class="form-control">
                          <option value="1">Pfizer</option>
                          <option value="2">Sinopharm</option>
                          <option value="3">Astrazeneca</option>
					</select>
                </div>
                <div class="form-group">
                    <label for="numerodosis">N° de dosis</label>
                    <input type="text" placeholder="cantidad de dosis" name="numerodosis" id="numerodosis" class="form-control">
                </div>
                <div class="form-group">
                    <label for="Fechaunodosis">Fecha de la 1° Dosis</label>
                    <input type="date" class="form-control" name="Fechaunodosis" id="Fechaunodosis">
                </div>
                <div class="form-group">
                    <label for="fechadosdosis">Fecha de la 2° Dosis</label>
                    <input type="date" class="form-control" name="fechadosdosis" id="fechadosdosis">
                </div>
                <div class="form-group">
                    <label for="idsede">Centro de Vacunación</label>
                    <select name="idsede" id="idsede" class="form-control">
                      <option value="1">Parque de la Exposición </option>
                      <option value="2">(SJL) Parque Zonal Huaricocha </option>
                      <option value="3">(Ate) Estadio Municipal Ollantaytambo </option>
                      <option value="4">(Breña) Colegio Emblemático Rosa de Santa María  </option>
                    </select>
                </div>
                <input type="submit" value="Guardar Paciente" class="btn btn-primary">
            </form>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php include_once "includes/footer.php"; ?>