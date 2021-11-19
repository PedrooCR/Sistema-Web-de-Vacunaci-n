<?php include_once "includes/header.php"; ?>

<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Usuarios</h1>
		<?php if ($_SESSION['idrol'] == 2) { ?>
		<a href="registro_usuario.php" class="btn btn-primary">Nuevo</a>
		<?php } ?>
	</div>

	<div class="row">
		<div class="col-lg-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered" id="table">
					<thead class="thead-dark">
						<tr>
							<th>ID</th>
							<th>NOMBRE</th>
							<th>APELLIDOS</th>
							<th>CORREO</th>
							<th>NUMEROTELEFONO</th>
							<th>ROL</th>
							<?php if ($_SESSION['idrol'] == 2) { ?>
							<th>ACCIONES</th>
							<?php }?>
						</tr>
					</thead>
					<tbody>
						<?php
						include "../conexion.php";

						$query = mysqli_query($conexion, "SELECT * FROM personalexternos per INNER JOIN rol r ON per.idrol = r.IDrol");
						$result = mysqli_num_rows($query);
						if ($result > 0) {
							while ($data = mysqli_fetch_assoc($query)) { ?>
								<tr>
									<td><?php echo $data['PexternoID']; ?></td>
									<td><?php echo $data['Pexternonombre']; ?></td>
									<td><?php echo $data['Pexternoapellido']; ?></td>
									<td><?php echo $data['Pexternocorreo']; ?></td>
									<td><?php echo $data['Pexternotelefono']; ?></td>
									<td><?php echo $data['rol']; ?></td>
									<?php if ($_SESSION['idrol'] == 2) { ?>
									<td>
										<a href="editar_usuario.php?id=<?php echo $data['PexternoID']; ?>" class="btn btn-success"><i class='fas fa-edit'></i> Editar</a>
										<form action="eliminar_usuario.php?id=<?php echo $data['PexternoID']; ?>" method="post" class="confirmar d-inline">
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