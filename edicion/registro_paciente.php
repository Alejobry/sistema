<!DOCTYPE html>
<html lang="en">
<head>
<?php

include("index.html");

?>
     
</head>
<body></body>

<?php
include("conexion.php");
$datos = "SELECT * FROM paciente";
?>
<table class="default">
<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
			<div class="mdl-tabs__tab-bar">
				<a href="#" class="mdl-tabs__tab">NUEVO</a>
				<a href="#edit_product" class="mdl-tabs__tab is-active">REGISTROS</a>


  <tr>  
    <br>
    <th>-----NOMBRE Y APELLIDOS-----</th><br>

    <th>IDENTIFICACION-----</th>

    <th>TIPO DE SANGRE-----</th>

    <th>FECHA DE NACIMIENTO-----</th>
    
    <th>ESTADO</th>
  </tr>
    <?php $resultado = mysqli_query($conectar, $datos);
    while($row= mysqli_fetch_assoc($resultado)) { ?>
  <tr>

    <td scope="col"><?php echo $row["nombre_apellido"] ?></td> 

    <td scope="col"><?php echo $row["identificacion"] ?></td>

    <td scope="col"><?php echo $row["tipo_sangre"] ?></td>

    <td scope="col"><?php echo $row["fecha_nac"] ?></td>

    <td scope="col"><?php echo $row["estado"] ?></td>
    
    <th scope="col">
        <a href="edit_product.php?id=<?php echo $row["idpaciente"]; ?>" class="table__item">editar</a> /
        <a href="delete_product.php?id=<?php echo $row["idpaciente"]; ?>" class="table__item__link">eliminar</a>
      </th>

  </tr>
  <?php } mysqli_free_result($resultado); ?> 
  <script src="confirmacion.js"></script>

  
</table>
<br>
<br>
<br>
<br>
<p  class="text-center">
		<button onclick="location.href='reporte_paciente.php'"  class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary" id="btn-addCompany">
					<i  class="zmdi zmdi-plus"></i>
		</button>
		<div  class="mdl-tooltip">generar reporte</div>
</p>	