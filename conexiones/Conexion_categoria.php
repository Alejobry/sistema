<?php
include('conexion.php');
$nombre=$_POST['nombre'];
$estado=$_POST['estado'];

    $sql="INSERT INTO categorias (nombre,estado)
    VALUES ('$nombre','$estado')";
    $result = mysqli_query($conectar, $sql);
    if($result){
      header("Location: company.php");
    }else{
      echo"<script>alert('no se pudo actualizar los datos');window.history.go(-1);</script>";

    }
?>
