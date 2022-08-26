<?php
include ("conexion.php");
$id = $_POST ['id'];
$name_medicine = $_POST['name_medicine'];
$fech_ela = $_POST['fech_ela'];
$fech_ven = $_POST['fech_ven'];
$estado = $_POST['estado'];

//actualizar los datos

$actualizar = "UPDATE producto SET name_medicine='$name_medicine', fech_ela='$fech_ela', fech_ven='$fech_ven', estado='$estado' WHERE id='$id'";

$resultado = mysqli_query($conectar,$actualizar);

if ($resultado) {
    echo '<script language="javascript">alert("Datos actualizados correctamente");window.location.href="register_products.php"</script>';
}else {
    echo"<script>alert('no se pudo actualizar los datos');window.history.go(-1);</script>";
}