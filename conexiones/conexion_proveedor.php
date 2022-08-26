<?php
include('conexion.php');
$razon_social=$_POST['razon_social'];
$direccion=$_POST['direccion'];
$telefonos=$_POST['telefonos'];
$estado=$_POST['estado'];

    $sql="INSERT INTO proveedor(razon_social, direccion, telefonos, estado)
    VALUES ('$razon_social', '$direccion', '$telefonos','$estado')";
    $result = mysqli_query($conectar, $sql);
    if($result){
      header("Location: registro_proveedores.php");
    }else{
      echo"<script>alert('no se pudo actualizar los datos');window.history.go(-1);</script>";

    }
?>
