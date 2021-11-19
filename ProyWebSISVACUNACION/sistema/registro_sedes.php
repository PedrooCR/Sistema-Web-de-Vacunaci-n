<?php
include_once "includes/header.php";
include "../conexion.php";
if (!empty($_POST)) {
    $alert = "";
    if (empty($_POST['nombreSede']) || empty($_POST['direccionsede']) || empty($_POST['telefono'])) {
        $alert = '<div class="alert alert-danger" role="alert">
                        Todo los campos son obligatorios
                    </div>';
    } else {
        $sedenomb = $_POST['nombreSede'];
        $sededire = $_POST['direccionsede'];
        $sedetelefono = $_POST['telefono'];

         /*
        $query = mysqli_query($conexion, "SELECT * FROM sedes where SedeID = '$contacto'");
        $result = mysqli_fetch_array($query);
        if ($result > 0) {
            $alert = '<div class="alert alert-danger" role="alert">
                        El Ruc ya esta registrado
                    </div>';
        }else{
        */

        $query_insert = mysqli_query($conexion, "INSERT INTO sedes(nombreSede,direccionsede,telefono) values ('$sedenomb', '$sededire', '$sedetelefono')");
        if ($query_insert) {
            $alert = '<div class="alert alert-primary" role="alert">
                        Sede Registrado
                    </div>';
        } else {
            $alert = '<div class="alert alert-danger" role="alert">
                       Error al registrar
                    </div>';
        }
        }
    }
//}
mysqli_close($conexion);
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-6 m-auto">
            <div class="card-header bg-primary text-white">
                Registro de la Sede
            </div>
            <div class="card">
                <form action="" autocomplete="off" method="post" class="card-body p-2">
                    <?php echo isset($alert) ? $alert : ''; ?>
                    <div class="form-group">
                        <label for="nombreSede">NOMBRE SEDE</label>
                        <input type="text" placeholder="Ingrese nombre" name="nombreSede" id="nombreSede" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="direccionsede">DIRECIÓN</label>
                        <input type="text" placeholder="Ingrese Direccion" name="direccionsede" id="direccionsede" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="telefono">TELÉFONO</label>
                        <input type="number" placeholder="Ingrese teléfono" name="telefono" id="telefono" class="form-control">
                    </div>
                    
                    <input type="submit" value="Guardar Sede" class="btn btn-primary">
                    <a href="lista_sedes.php" class="btn btn-danger">Regresar</a>
                </form>
            </div>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php include_once "includes/footer.php"; ?>