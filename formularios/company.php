<!-- 
* Copyright 2016 Carlos Eduardo Alfaro Orellana
-->
<!DOCTYPE html>
<html lang="es">
<head>
	<link rel="stylesheet" href="css/modal_ingreso_medicina.css">
    <script src="js/modal.js" ></script>
	<link rel="stylesheet" href="css/bootstrap.min.css"
<?php

include("index.html");

?>

</head>

<?php
	include 'conexion.php';
	date_default_timezone_set('America/Mexico_City');
?>
<body>

	<!-- pageContent -->
	<section class="full-width pageContent">
	
		<div class="full-width divider-menu-h"></div>
		<div class="mdl-grid">
			<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--8-col-desktop mdl-cell--2-offset-desktop">
				<div class="full-width panel mdl-shadow--2dp">
					<div class="full-width panel-tittle bg-primary text-center tittles">
						REGISTRAR INGRESO DE MEDICINA
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
										<label type="text" value="FDH">
										</input>
									</div>
									<br>
									<!--div class="form-group">
										<label for="distrito" class="text-uppercase text-primary">Motivo</label>
										<select  class="custom_select">
											<option value="" selected=""><strong>...</strong>
											<option>Donacion</option>
											<option>Ajuste de inventario</option>
												
											</option>

										</select>
									</div-->
									<br>
									<div class="form-group">
										<label for="departamento" class="text-uppercase text-primary">Donantes: </label>
											<select name="proveedor" class="custom-select">
												<?php
												include("conexion.php");
												$getcabecera1 = "select * from proveedor order by idproveedor";
												$getcabecera2= mysqli_query($conectar,$getcabecera1);
												while($row = mysqli_fetch_array($getcabecera2))
												{
													$idproveedor = $row['idproveedor'];
													$razon_social= $row['razon_social'];
													
													?>
															<option value="<?php echo $idproveedor; ?>"><?php echo $razon_social; ?></option>
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
				
				
			<!--div class="modal" id="modal1">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
						The header of the first modal
						<button class="close-modal" aria-label="close modal" data-close>
							✕  
						</button>
						</div>
						<div class="modal-body">
						<p><strong>Press ✕, ESC, or click outside of the modal to close it</strong></p>
						<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo repellendus reprehenderit accusamus totam ratione! Nesciunt, nemo dolorum recusandae ad ex nam similique dolorem ab perspiciatis qui. Facere, dignissimos. Nemo, ea.</p>
						<p>Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure</p>
						<p>Nullam vitae enim vel diam elementum tincidunt a eget metus. Curabitur finibus vestibulum rutrum. Vestibulum semper tellus vitae tortor condimentum porta. Sed id ex arcu. Vestibulum eleifend tortor non purus porta dapibus</p>
						<p>Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure</p>
						</div>
						<div class="modal-footer">
						The footer of the first modal
						</div>

					
					</div>
				</div>	
			</div-->
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


    </div>
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>

  
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


  </body>
</html>
	
	</section>

	<script type="text/javascript" src="js/jquery-3.2.1.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="js/main.js" ></script>
	<script type="text/javascript" src="js/jquery.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

</body>
</html>


