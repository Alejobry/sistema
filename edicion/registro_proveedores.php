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
$datos = "SELECT * FROM proveedor";
?>
<!--CABECERA DE TABLA, RECORDAR PONER DERECHO-->
<div class="container">
<table class="full-width pageContent">

  <br>
<div  class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
  <br>
  <br>
			<div class="mdl-tabs__tab-bar">
				<a href="#" class="mdl-tabs__tab">NUEVO</a>
				<a href="#edit_product" class="mdl-tabs__tab is-active">REGISTROS</a>
      </div>

  <tr>  
    <br>
    <th>RAZON SOCIAL</th><br>

    <th>DIRECCION</th>

    <th>TELEFONOS</th>
    
    <th>ESTADO</th>
  </tr>
    <?php $resultado = mysqli_query($conectar, $datos);
    while($row= mysqli_fetch_assoc($resultado)) { ?>
  <tr>

    <td scope="col"><?php echo $row["razon_social"] ?></td> 

    <td scope="col"><?php echo $row["direccion"] ?></td>

    <td scope="col"><?php echo $row["telefonos"] ?></td>

    <td scope="col"><?php echo $row["estado"] ?></td>
    
    <td scope="col">
      <!--EDICION DE BOTONES CON DISEÑO GLYFHICONS-->
    <button type="button" class="btn btn-default">
      <span class="glyphicon glyphicon-align-left"></span>
    </button>
        <a href="delete_product.php?id=<?php echo $row["idproveedor"]; ?>" class="table__item__link">eliminar</a>
      </td>

  </tr>
  <?php } mysqli_free_result($resultado); ?> 
  <script src="confirmacion.js"></script>

  
</table>
</div>
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