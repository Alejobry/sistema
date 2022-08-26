<!DOCTYPE html>
<html lang="es">
<head>
<?php

include("index.html");

 session_start();
 error_reporting(0);
 $prohibir = ($_SESSION['id_rol'] == '2');

 if($prohibir == null || $prohibir = ''){
	echo '<script language="javascript">alert("ACCESO PROHIBIDO PARA USUARIO");window.location.href="home.php"</script>';
	die();
 }
 else(session_start());
 	

?>
     
</head>
<body>
	<!-- pageContent -->
	<section class="full-width pageContent">
		<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
			<div class="mdl-tabs__tab-bar">
				<a href="#tabNewProduct" class="mdl-tabs__tab is-active">NUEVO</a>
				<a onclick="location.href='register_products.php'" class="mdl-tabs__tab">REGISTROS</a>
			</div>
			<div class="mdl-tabs__panel is-active" id="tabNewProduct">
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
						<div class="full-width panel mdl-shadow--2dp">
							<div class="full-width panel-tittle bg-primary text-center tittles">
								INGRESO DE MEDICAMENTOS
							</div>
							<div class="full-width panel-content">
								<form action="conexion_products.php" method="post" autocomplete="off">
								<p class="text-center">
										<button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary" id="btn-addCompany">
											<i class="zmdi zmdi-plus"></i>
										</button>
									<div class="mdl-tooltip" for="btn-addCompany">agregar medicamento</div>
								</p>	
									<div class="mdl-grid">
										<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">

											</div>
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<h5 class="text-condensedLight"><strong>Descripcion</strong></h5>
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" name="name_medicine" type="text" id="nombre" required>
												<label class="mdl-textfield__label" for="BarCode">Nombre de medicina</label>

											</div>
											<h5 class="text-condensedLight"><strong>Fecha de elaboración</strong></h5>
											<div class="mdl-textfield mdl-js-textfield">
												<label for="start"></label>
													<input type="date" id="start" name="fech_ela"
														value=""
														min="0000-01-01" max="0000-12-31" required>
											</div>
											<h5 class="text-condensedLight"><strong>Fecha de vencimiento</strong></h5>
											<div class="mdl-textfield mdl-js-textfield">
												<label for="start"></label>
													<input type="date" id="start" name="fech_ven"
														value=""
														min="0000-01-01" max="0000-12-31" required>
											</div>
											<div class="mdl-textfield mdl-js-textfield">
												<select name="estado" class="mdl-textfield__input">
													<option value="" selected=""><strong>Activo</strong></option>
													<option value="1" >Activo</option>
													<option value="0">No Activo</option>

												</select>
											</div>

										</div>

								</form>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</section>
</body>
</html>