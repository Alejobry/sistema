<!-- 
* Copyright 2016 Carlos Eduardo Alfaro Orellana
-->
<!DOCTYPE html>
<html lang="es">
<head>
<?php

include("index.html");

?>

</head>
<body>

	<!-- pageContent -->
	<section class="full-width pageContent">
	
		<div class="full-width divider-menu-h"></div>
		<div class="mdl-grid">
			<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--8-col-desktop mdl-cell--2-offset-desktop">
				<div class="full-width panel mdl-shadow--2dp">
					<div class="full-width panel-tittle bg-primary text-center tittles">
						REGISTRAR INGRESO DE DONACIONES
					</div>
					<div class="full-width panel-content">
						<form>
						<form >
							<div class="card-body">
							<div class="form-group">
								<label class="text-uppercase text-primary">FECHA:</label>
								<label>  
									<?php
									include 'conexion.php';
									date_default_timezone_set('America/Mexico_City');
									$fecha_ingreso=date("Y-m-d H:i:s");
								   ?>			
								  <input type="datetime" value="<?=$fecha_ingreso ?>" />
								 </label>
							</div>
							</div>
							  </form>
							
							
								<div class="card-body">
									<div class="form-group">
										<label for="distrito" class="text-uppercase text-primary">bodega: </label>
										<input type="text" value="FDH">
										</input>
									</div>
									<br>
									<!--div class="form-group">
										<label for="distrito" class="text-uppercase text-primary">Motivo</label>
										<select  class="custom_select">
											<option value="DONACION" selected="DONACION"><strong>DONACION</strong>
									
												
											</option>

										</select>
									</div-->
									<br>
									<div class="form-group">
										<label for="departamento" class="text-uppercase text-primary">PACIENTE: </label>
											<select name="paciente" class="custom-select">
												<?php
												include("conexion.php");
												$getcabecera1 = "select * from paciente order by idpaciente";
												$getcabecera2= mysqli_query($conectar,$getcabecera1);
												while($row = mysqli_fetch_array($getcabecera2))
												{
													$idpaciente = $row['idpaciente'];
													$nombre_apellido= $row['nombre_apellido'];
													
													?>
															<option value="<?php echo $idpaciente; ?>"><?php echo $nombre_apellido; ?></option>
															<?php
													}
													?>
											</select>
									</div>
					
									<!--div class="form-group">
										<label for="provincia" class="text-uppercase text-primary">Destino: </label>
										<select name="" id="provincia" class="custom-select">
										/*
											
	
										</select>
										</select>
									</div-->
													<br>
									<div class="form-group">
										<label for="distrito" class="text-uppercase text-primary">Descripción: </label>
										<input type="text">
											<!-- cargaremos las etiquetas de option con javascript -->
										</input>
									</div>

															
						</form>
												
					</div>
				</div>
				
		</div>
<!--CABEZERA DETALLE-->

<html>
  <head>
    <title></title>
    <meta content="">

  </head>
  <body>

    <div class="container">
      <div style="height:50px"></div>
      <h1><small>Detalle</small></h1>
      <p class="lead">
	<form action="company.php" method="POST">
      <input name="busqueda" class="form-control col-md-3 light-table-filter" data-table="order-table" name="busqueda" type="text" placeholder="Buscar.." >
	  <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
	  <input type="submit" value="busqueda">
	  <hr>

	  </form>

      <table class="table table-bordered order-table ">
        <thead>
          <tr>
            <th>NOMBRE DE MEDICINA</th>            
          </tr>

        </thead>
		<?php 
		include ('filtro_de_busqueda_medicina.php');
		while($row= mysqli_fetch_array($sql_query)){?>
	
	
        <tr>
          <td><?$row['name_medicine'] ?></td>
          
          
        </tr>
        
		<?php }
		?>
       
      </table>
	  <p class="text-center">
				<button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary" id="btn-addCompany">
				<i class="zmdi zmdi-plus"></i>
				</button>
			<div class="mdl-tooltip" for="btn-addCompany">Añadir</div>
			</p>

    </div> <!-- /container -->

  </body>
</html>
	
	</section>

	<script src="js/main.js" ></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

</body>
</html>


