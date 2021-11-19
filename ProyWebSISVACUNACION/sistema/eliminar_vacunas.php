<?php
if (!empty($_GET['id'])) {
    require("../conexion.php");
    $vacuid = $_GET['id'];
    $query_delete = mysqli_query($conexion, "DELETE FROM vacunas WHERE VacunaID = $vacuid");
    mysqli_close($conexion);
    header("location: lista_vacunas.php");
}
?>