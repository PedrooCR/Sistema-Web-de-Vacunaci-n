<?php include_once "includes/header.php"; ?>

<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Pacientes</h1>
		<a href="registro_pacientes.php" class="btn btn-primary">Nuevo</a>
	</div>

	<div class="row">
		<div class="col-lg-12">

			<div class="table-responsive">
				<table class="table table-striped table-bordered" id="table">
					<thead class="thead-dark">
						<tr>
							<th>ID</th>
							<th>NOMBRES</th>
							<th>APELLIDOS</th>
							<th>VACUNA</th>
							<th>N° DOSIS</th>
							<th>Nacionalidad</th>
							<th>Edad</th>
							<?php if ($_SESSION['idrol'] == 2) { ?>
							<th>ACCIONES</th>
							<?php } ?>
						</tr>
					</thead>
					<tbody>
						<?php
						include "../conexion.php";

						$query = mysqli_query($conexion, "SELECT * FROM pacientes pa INNER JOIN vacunas va ON pa.idvacuna = va.VacunaID");
						$result = mysqli_num_rows($query);
						if ($result > 0) {
							while ($data = mysqli_fetch_assoc($query)) { ?>
								<tr>
									<td><?php echo $data['PacienteID']; ?></td>
									<td><?php echo $data['Pacientenombre']; ?></td>
									<td><?php echo $data['Pacienteapellido']; ?></td>
									<td><?php echo $data['Vacunanombre']; ?></td>
									<td><?php echo $data['numerodosis']; ?></td>
									<td><?php echo $data['Pacientenacionalidad']; ?></td>
									<td><?php echo $data['Pacienteedad']; ?></td>
									<?php if ($_SESSION['idrol'] == 2) { ?>
									<td>
										<a href="editar_pacientes.php?id=<?php echo $data['PacienteID']; ?>" class="btn btn-success"><i class='fas fa-edit'></i></a>
										<form action="eliminar_pacientes.php?id=<?php echo $data['PacienteID']; ?>" method="post" class="confirmar d-inline">
											<button class="btn btn-danger" type="submit"><i class='fas fa-trash-alt'></i> </button>
										</form>
									</td>
									<?php } ?>
								</tr>
						<?php }
						} ?>
					</tbody>

				</table>
			</div>

		</div>
	</div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<?php include_once "includes/footer.php"; ?>