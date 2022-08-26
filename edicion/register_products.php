<!DOCTYPE html>
<html lang="en">
<head>
<?php

include("index.html");

?>
      <link type="text/css" rel="stylesheet" href="css/producto.css">
</head>
<body></body>

<?php
include("conexion.php");
$datos = "SELECT * FROM producto";
?>
<table class="row d-flex justify-content-center">
<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
			<div class="mdl-tabs__tab-bar">
        <br>
				<a href="#" class="mdl-tabs__tab">NUEVO</a>
				<a href="#edit_product" class="mdl-tabs__tab is-active">REGISTROS</a>
      </div>
  <tr>  
    
    <th>NOMBRE DE MEDICAMENTO</th><br>

    <th>FECHA DE ELABORACION</th>

    <th>FECHA DE VENCIMIENTO</th>
    
    <th>ESTADO</th>
  </tr>
    <?php $resultado = mysqli_query($conectar, $datos);
    while($row= mysqli_fetch_assoc($resultado)) { ?>
  <tr>

    <td scope="col"><?php echo $row["name_medicine"] ?></td> 

    <td scope="col"><?php echo $row["fech_ela"] ?></td>

    <td scope="col"><?php echo $row["fech_ven"] ?></td>

    <td scope="col"><?php echo $row["estado"] ?></td>
    
    <th scope="col">
        <a href="edit_product.php?id=<?php echo $row["id"]; ?>" class="table__item">editar</a> /
        <a href="delete_product.php?id=<?php echo $row["id"]; ?>" class="table__item__link">eliminar</a>
      </th>

  </tr>
  <?php } mysqli_free_result($resultado); ?> 
  <script src="confirmacion.js"></script>
              
  
</div>  
</table>
<p  class="text-center">
		<button onclick="location.href='reporte_products.php'"  class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary" id="btn-addCompany">
					<i  class="zmdi zmdi-plus"></i>
		</button>
		<div  class="mdl-tooltip" for="btn-addCompany">generar reporte</div>
</p>	
</body>
</html>