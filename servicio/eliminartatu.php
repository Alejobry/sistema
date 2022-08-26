<?php

//CAMPOS VACIOS
if (empty($_REQUEST['id'])) {
    echo "<div class='container pt-3' >
                <div class='alert alert-danger' role='alert'>Todos los campos son Obligatorios</div>  
             </div>";
} else {

    

    include 'Configuracion.php';

    $id = $_REQUEST['id'];
    $ruta=$_REQUEST['ruta'];
    $src='libs/img/'.$ruta;
    
    $sql = "DELETE FROM `pedido`.`mis_productos` WHERE (id = '$id')";
    //si el query encontro un resultado entoces eliminada de la ruta $ruta-contiene la ruta de la imagen
    $res = mysqli_query($db, $sql);
    mysqli_close($db);
    if ($res) {
        //elimina y redirecciona al archivo index.php
        unlink($src);
        echo '<script>alert("Eliminado Correctamente"); window.location="listartatu.php";</script>';
    }else{
        echo "<div class='container pt-3' >
                <div class='alert alert-danger' role='alert'>Error al eliminar</div>  
             </div>";

    }

    
    
}
?>
<!doctype html>
<html lang="es">

<head>
    <title>Eliminar</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="libs/css/bootstrap.min.css">
</head>

<body>

</body>
  <h1>Holi</h1>
<!-- ARCHIVOS DE BOOTSTRAP4 JavaScript -->
<!-- 1jQuery , 2Popper.js , 3Bootstrap JS -->
<script src="libs/js/jquery-3.4.1.min.js"></script>
<script src="libs/js/popper.min.js"></script>
<script src="libs/js/bootstrap.min.js"></script>
</body>

</html>
