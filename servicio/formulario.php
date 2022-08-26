<?php 
    session_start();
    if (!isset($_SESSION['usuario'])) {
        header('Location: index.php');
    }
?>



<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Información sobre el producto</title>
</head>

<body>

<h3>Información sobre el producto</h3>

<form name="miform" method="post" action="http://www.eui.upm.es/~salonso/curso/procesa.php">

<fieldset>
  <legend><strong>Datos básicos</strong></legend>

  <label for="nombre">Nombre</label> <br>  
  <input name="nombre" id="nombre" size="50" maxlength="250" type="text"><br><br>

  <label for="descripcion">Descripción</label> <br>  
  <textarea name="descripcion" id="descripcion" cols="40" rows="5"></textarea><br><br>

  Foto <input name="foto" type="file"><br><br>  
  <input name="contador" value="si" type="checkbox"> Añadir contador de visitas
</fieldset>

<br>
<fieldset>
  <legend><strong>Datos económicos</strong></legend>
  
  <label for="precio">Precio</label> 
  <input size="5" id="precio" name="precio" type="text"> €
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <label for="impuestos">Impuestos</label> 
  <select name="impuestos">
    <option value="4">4%</option>
    <option value="7">7%</option>
    <option value="16">16%</option>
    <option value="25">25%</option>
  </select>
  
  <br><br>
  <label>Promoción</label> <br>
  <input name="promocion" value="ninguno" checked="checked" type="radio"> Ninguno <br>

  <input name="promocion" value="portes" type="radio"> Transporte gratuito <br>
  <input name="promocion" value="descuento" type="radio"> Descuento 5%
</fieldset>
</form>


</body></html>