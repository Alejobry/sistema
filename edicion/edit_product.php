<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php

    include("index.html");

    ?>
</head>
<body>
<?php
    include("conexion.php");
    $id = $_GET["id"];
    $datos = "SELECT * FROM producto WHERE id = '$id'";
?>
<?php $resultado = mysqli_query($conectar, $datos);
  while($row= mysqli_fetch_assoc($resultado)) { ?>
            <div class="full-width panel-content">

								<form action="update_medicine.php" method="post">
								<p class="text-center">
										<button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary" id="btn-addCompany">
											<i class="zmdi zmdi-plus"></i>
										</button>
									<div class="mdl-tooltip" for="btn-addCompany">Editar medicamento</div>	
                                    <input type="hidden" value="<?php echo $row["id"] ?>" name="id">
									<div class="mdl-grid">
										<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">

											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<h5 class="text-condensedLight"><strong>Nombre de Medicina</strong></h5>
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input type="text" name="name_medicine" value=" <?php echo $row["name_medicine"] ?>" >


											</div>
											<h5 class="text-condensedLight"><strong>Fecha de elaboración</strong></h5>
											<div class="mdl-textfield mdl-js-textfield">
												<input type="date" name="fech_ela" value=" <?php echo $row["fech_ela"] ?>"  class="mdl-textfield__input">
											</div>
											<h5 class="text-condensedLight"><strong>Fecha de vencimiento</strong></h5>
											<div class="mdl-textfield mdl-js-textfield">
												<input type="date" name="fech_ven" value=" <?php echo $row["fech_ven"] ?>"  class="mdl-textfield__input">
											</div>

											<div class="mdl-textfield mdl-js-textfield">
												<select name="estado" class="mdl-textfield__input">
													<option value=" <?php echo $row["estado"] ?>"selected=""><strong>Estado</strong></option>
													<option value="1">Activo</option>
													<option value="0">Inactivo</option>

												</select>
											</div>


											<!--div class="mdl-textfield mdl-js-textfield">
												<input type="file">
											</div-->
										</div>
									</div>

								</form>
							</div>
                            <?php } mysqli_free_result($resultado); ?> 
</body>
</html>