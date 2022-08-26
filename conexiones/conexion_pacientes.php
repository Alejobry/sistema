<?php
include('conexion.php');
$nombre_apellido=$_POST['nombre_apellido'];
$identificacion=$_POST['identificacion'];
$tipo_sangre=$_POST['tipo_sangre'];
$fecha_nac=$_POST['fecha_nac'];
$estado=$_POST['estado'];

    $sql="INSERT INTO paciente (nombre_apellido, identificacion, tipo_sangre, fecha_nac, estado)
    VALUES ('$nombre_apellido', '$identificacion', '$tipo_sangre','$fecha_nac','$estado')";
    $result = mysqli_query($conectar, $sql);
    if($result){
      header("Location: registro_paciente.php");
    }else{
      echo"<script>alert('no se pudo actualizar los datos');window.history.go(-1);</script>";

    }
?>
