<?php
include ("conexion.php");

$id = $_GET['id'];
$eliminar = "UPDATE producto SET estado = '0' WHERE id='$id'"
;

$resultadoEliminar = mysqli_query($conectar, $eliminar);

if ($resultadoEliminar) {
    header("Location: register_products.php");
}else {
    echo"<script>alert('no se pudo actualizar los datos');window.history.go(-1);</script>";
}