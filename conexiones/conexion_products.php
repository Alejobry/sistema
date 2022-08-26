<?php
include('conexion.php');
$name_medicine=$_POST['name_medicine'];
$fech_ela=$_POST['fech_ela'];
$fech_ven=$_POST['fech_ven'];
$estado=$_POST['estado'];

    $sql="INSERT INTO producto (name_medicine, fech_ela, fech_ven, estado)
    VALUES ('$name_medicine', '$fech_ela', '$fech_ven','$estado')";
    $result = mysqli_query($conectar, $sql);
    if($result){
      header("Location: register_products.php");
    }else{
      echo"<script>alert('no se pudo actualizar los datos');window.history.go(-1);</script>";

    }
?>
