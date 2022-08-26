<!-- 
* Copyright 2016 Carlos Eduardo Alfaro Orellana
-->
<!DOCTYPE html>
<html lang="es">
<head>
	<?php

	include("index.php");
	
	?>
		 
</head>
<body>

	<!-- pageContent -->
	<section class="full-width pageContent">
           <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
			<div class="mdl-tabs__tab-bar">
				<a href="#tabNewProduct" class="mdl-tabs__tab is-active">NUEVO</a>
				<a onclick="location.href='registro_proveedores.php'"  class="mdl-tabs__tab">REGISTROS</a>
			</div>
		

		<div class="full-width divider-menu-h"></div>
		<div class="mdl-grid">
			<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--8-col-desktop mdl-cell--2-offset-desktop">
				<div class="full-width panel mdl-shadow--2dp">
					<div class="full-width panel-tittle bg-primary text-center tittles">
						INGRESAR DATOS
					</div>
					<div class="full-width panel-content">
						<form action="conexion_proveedor.php" method="post" autocomplete="off">
							<h5 class="text-condensedLight"><strong>Datos Proveedores</strong></h5>
							
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
								<input class="mdl-textfield__input"  type="text" name="razon_social">
								<label class="mdl-textfield__label" for="NameCompany"><strong>Razon social</strong></label>
								<span class="mdl-textfield__error">Invalid nombres</span>
							</div>
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
								<input class="mdl-textfield__input" type="text" name="direccion">
								<label class="mdl-textfield__label" for="addressCompany"><strong>Direccion</strong></label>
								<span class="mdl-textfield__error">Invalid apellidos</span>
							</div>
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
								<input class="mdl-textfield__input" type="text" name="telefonos">
								<label class="mdl-textfield__label" for="addressCompany"><strong>Telefonos</strong></label>
								<span class="mdl-textfield__error">Invalid direccion</span>
							</div>
							<div class="mdl-textfield mdl-js-textfield">
								<select name="estado" class="mdl-textfield__input">
									<option value="" selected=""><strong>Activo</strong></option>
									<option value="1" >Activo</option>
									<option value="0">No Activo</option>

								</select>
							</div>
							<p class="text-center">
								<button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary" id="btn-addCompany">
									<i class="zmdi zmdi-plus"></i>
								</button>
								<div class="mdl-tooltip" for="btn-addCompany">Add company</div>
							</p>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
</body>
</html>