<?php include_once "includes/header.php"; ?>
<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Sistema de Vacunación contra la Covid 19</h1>
	</div>

	<!-- Content Row -->
		<!--ESTO ES EL VIEW DEL PACIENTE -->
	<?php if ($_SESSION['idrol'] == "3") { ?>
	<div class="row">
		<div class="col-lg-6">
			<div class="card">
		        <div class="card-header bg-primary text-white">
				Carnet de Vacunación del Paciente
				</div>
				<div class="card-body">
					<div class="form-group">
					<label>Nombres: <strong><?php echo $_SESSION['nombrepa']; ?></strong></label>
					</div>
					<div class="form-group">
						<label>Apellidos: <strong><?php echo $_SESSION['apellidopa']; ?></strong></label>
					</div>
					<div class="form-group">
						<label>Fecha de Nacimiento: <strong><?php echo $_SESSION['fenacimientopa']; ?></strong></label>
					</div>
					<div class="form-group">
					<label>Edad: <strong><?php echo $_SESSION['edadpa']; ?></strong></label>
					</div>
					<div class="form-group">
						<label>Dirección: <strong><?php echo $_SESSION['direccionpa']; ?></strong></label>
					</div>
			
				</div>
			</div>
	    </div>
		<div class="col-lg-6">
			<div class="card">
		        <div class="card-header bg-primary text-white">
				Fechas de la Vacunación del Paciente
				</div>
				<div class="card-body">
					<div class="form-group">
						<label>1° Dosis:</label>
					</div>
					<div class="form-group">
						<label>Fecha: <strong><?php echo $_SESSION['fedosisuno']; ?></strong></label>
					</div>
					<div class="form-group">
						<label>Dirección: <strong><?php echo $_SESSION['nombresede']; ?></strong></label>
					</div>
					<div class="form-group">
						<label>2° Dosis: </label>
					</div>
					<div class="form-group">
						<label>Fecha: <strong><?php echo $_SESSION['fedosisdos']; ?></strong></label>
					</div>
					<div class="form-group">
						<label>Dirección: <strong><?php echo $_SESSION['nombresede']; ?></strong></label>
					</div>
				</div>
				
			</div>
			
	    </div>
	    <?php } ?>
        <div></div>
	    <!--VISTA DEL ADMINISTRADOR... VIEW -->
		<?php if ($_SESSION['idrol'] == "2") { ?>
	    <div class="row">
		<div class="col-lg-6">
			<div class="card">
		        <div class="card-header bg-primary text-white">
				Perfil del Administrador
				</div>
				<div class="card-body">
					<div class="form-group">
					<label>Nombres: <strong><?php echo $_SESSION['pexternonombre']; ?></strong></label>
					</div>
					<div class="form-group">
					<label>Apellidos: <strong><?php echo $_SESSION['pexternoapellido']; ?></strong></label>
					</div>
					<div class="form-group">
					<label>Dirección: <strong><?php echo $_SESSION['pexternodireccion']; ?></strong></label>
					</div>
					<div class="form-group">
					<label>DNI: <strong><?php echo $_SESSION['pexternoDNI']; ?></strong></label>
					</div>
					<div class="form-group">
					<label>ROL: <strong><?php echo $_SESSION['rol_name']; ?></strong></label>
					</div>
			
				</div>
			</div>
	    </div>
		<div class="col-lg-6">
			<div class="card">
		        <div class="card-header bg-primary text-white">
				Contacto
				</div>
				<div class="card-body">
					<div class="form-group">
					<label>Número de teléfono: <strong><?php echo $_SESSION['pexternotelefono']; ?></strong></label>
					</div>
					<div class="form-group">
						<label>Correo: <strong><?php echo $_SESSION['pexternocorreo']; ?></strong></label>
					</div>
				</div>
				
			</div>
			
	    </div>
	    <?php } ?>
        <div></div>
		<!-- VISTA DEL REGISTRADOR... VIEW-->
	    <?php if ($_SESSION['idrol'] == "1") { ?>
	    <div class="row">
		<div class="col-lg-6">
			<div class="card">
		        <div class="card-header bg-primary text-white">
				Perfil del Registrador
				</div>
				<div class="card-body">
					<div class="form-group">
					<label>Nombres: <strong><?php echo $_SESSION['pexternonombre']; ?></strong></label>
					</div>
					<div class="form-group">
					<label>Apellidos: <strong><?php echo $_SESSION['pexternoapellido']; ?></strong></label>
					</div>
					<div class="form-group">
					<label>Dirección: <strong><?php echo $_SESSION['pexternodireccion']; ?></strong></label>
					</div>
					<div class="form-group">
					<label>DNI: <strong><?php echo $_SESSION['pexternoDNI']; ?></strong></label>
					</div>
					<div class="form-group">
					<label>ROL: <strong><?php echo $_SESSION['rol_name']; ?></strong></label>
					</div>
			
				</div>
			</div>
	    </div>
		<div class="col-lg-6">
			<div class="card">
		        <div class="card-header bg-primary text-white">
				Contacto
				</div>
				<div class="card-body">
					<div class="form-group">
					<label>Número de teléfono: <strong><?php echo $_SESSION['pexternotelefono']; ?></strong></label>
					</div>
					<div class="form-group">
						<label>Correo: <strong><?php echo $_SESSION['pexternocorreo']; ?></strong></label>
					</div>
				</div>
				
			</div>
			
	    </div>
	    <?php } ?>
        <div></div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php include_once "includes/footer.php"; ?>