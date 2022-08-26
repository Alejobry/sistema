<?php

if (!empty($_POST)) {
    //CAMPOS VACIOS
    if (
        empty($_POST['tatuaje']) || empty($_POST['descripcion']) || empty($_POST['precio']) || $_POST['precio'] <= 0
        || empty($_POST['tamaño']) ||  empty($_FILES['foto']) || empty($_POST['id']) || empty($_POST['foto_actual'])  
    ) {
        echo "<div class='container pt-3' >
                <div class='alert alert-danger' role='alert'>Todos los campos son Obligatorios</div>  
             </div>";
    } else {

        $cod_tatuaje = $_POST['id'];
        $foto_actual = $_POST['foto_actual'];
        $foto_remove= $_POST['foto_remove'];
        $tatuaje = $_POST['tatuaje'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $tamaño = $_POST['tamaño'];
         
        

        $foto = $_FILES['foto'];
        $nombre_foto = $foto['name'];
        $tipo = $foto['type'];
        $url_temp = $foto['tmp_name'];

        $upd = '';

        if ($nombre_foto != '') {
            $destino = 'libs/img/';
            $img_nombre = 'img_' . md5(date('d-m-Y H:m:s'));
            $img_tatuaje = $img_nombre . '.jpg';
            $src = $destino . $img_tatuaje;
        }else {
            if ($_POST['foto_actual'] !=  $_POST['foto_remove']) {
                $img_tatuaje = 'img_def.jpg';
            }
        }
        include 'Configuracion.php';
        $queryupdate = $db->query("UPDATE mis_productos 
                                 SET name = '$tatuaje', description = '$descripcion' , price='$precio',
                                  idtamaño='$tamaño',imagen='$img_tatuaje'
                                  WHERE id ='$cod_tatuaje'
                                  ");

        if ($queryupdate) {
            if (($nombre_foto != ''  && ($_POST['foto_actual'] != 'img_def.jpg'   )) || 
                ($_POST['foto_actual'] != $_POST['foto_remove'])){
             
                unlink('libs/img/'.$_POST['foto_actual']);
            }


            if ($nombre_foto != '') {
                move_uploaded_file($url_temp, $src);
            }
            echo "<div class='container pt-3' >
                      <div class='alert alert-primary' role='alert'>Actualizado Correctamente</div>  
                   </div>";
        } else {
            echo "<div class='container pt-3' >
                <div class='alert alert-danger' role='alert'>Error al Actualizar</div>  
             </div>";
        }
    }
}


//validar tatuaje

if (empty($_REQUEST['id'])) {
    header("location: listartatu.php");
}else {
    $id_tatuaje=$_REQUEST['id'];
    if (!is_numeric($id_tatuaje)) {
        header("location: listartatu.php");
    }
    include 'Configuracion.php';
    $querytatu = $db->query("SELECT p.id , p.name ,p.description , p.price , p.imagen ,p.idtamaño, t.tamaño 
    FROM mis_productos p inner join tamaño t on p.idtamaño = t.idtamaño where p.id='$id_tatuaje' ");
    $resul_tatu= mysqli_num_rows($querytatu);
    $foto='';
    $clase_Remover='notBlock';
    if ($resul_tatu >0) {
        $arraytatu=mysqli_fetch_assoc($querytatu);
        if ($arraytatu['imagen'] != 'img_def.jpg') {
            $clase_Remover='';
            $foto= '<img id="img" src="libs/img/'.$arraytatu['imagen'].'" alt="Tatuaje">';
            # code...
        }

        //print_r($arraytatu);
        
        
    }else {
        header("location: listartatu.php");
    }
}


?>



<!doctype html>
<html lang="es">

<head>
    <title>Editar Tatuaje</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="libs/css/bootstrap.min.css">
    <link rel="stylesheet" href="libs/css/ingtatu.css">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center mt-3 m-1">
            <div class="col-md-6 col-sm-8 col-xl-4 col-lg-5 formulario">

                <form action="" method="POST" enctype="multipart/form-data">

                <input type="hidden" name="id" value="<?php echo $id_tatuaje; ?>">
                <input type="hidden"  id="foto_actual"  name="foto_actual"   value="<?php echo $arraytatu['imagen'] ;?>" require>
                <input type="hidden"  id="foto_remove"  name="foto_remove"   value="<?php echo $arraytatu['imagen'] ;?>" require>
                





                    <div class="form-group text-center ">
                        <h1>Actualizar Tatuaje</h1>
                    </div>
                    <div class="form-group mx-sm-4 pt-1">

                        <input type="text" id="tatuaje" name="tatuaje" class="form-control " placeholder="Nombre del Tatuaje" value="<?php echo $arraytatu['name']  ?>"  >
                    </div>

                    <div class="form-group mx-sm-4 pt-1">

                        <input type="text" id="descripcion" name="descripcion" class="form-control " placeholder="Descripcion" value="<?php echo $arraytatu['description']  ?>"  >
                    </div>

                    <div class="form-group mx-sm-4 pt-1">

                        <input type="text" id="precio" name="precio" class="form-control " placeholder="$ Precio" value="<?php echo $arraytatu['price']  ?>"  >
                    </div>

                    <div class="form-group mx-sm-4 pt-1">
                        <?php
                        include 'Configuracion.php';
                        $query = $db->query("SELECT idtamaño, tamaño FROM pedido.tamaño;");
                        $res_query = mysqli_num_rows($query);
                        mysqli_close($db);
                        ?>

                        <select name="tamaño" id="tamaño" class="notItemOne">
                            <option value="<?php echo $arraytatu['idtamaño']  ?>" selected><?php echo $arraytatu['tamaño']  ?></option>
                            <?php
                            if ($res_query > 0) {
                                while ($tamaños = mysqli_fetch_array($query)) {

                            ?>
                                    <!-- SE REPITE -->
                                    <option value="<?php echo $tamaños['idtamaño'] ?>"><?php echo $tamaños['tamaño'] ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>


                    <div class="form-group mx-sm-4 pt-1">
                        <div class="photo">
                            <label for="foto">Foto</label>
                            <div class="prevPhoto">
                                <span class="delPhoto <?php echo $clase_Remover; ?>">X</span>
                                <label for="foto"></label>
                                <?php echo $foto; ?>
                            </div>
                            <div class="upimg">
                                <input type="file" name="foto" id="foto">
                            </div>
                            <div id="form_alert"></div>
                        </div>
                    </div>



                    <div class="form-group mx-sm-4 pt-1">
                        <input type="submit" class="btn btn btn-lg btn-primary btn-block" value="Actualizar Tatuaje" require>
                    </div>

                </form>
            </div>
        </div>
    </div>


</body>

<!-- ARCHIVOS DE BOOTSTRAP4 JavaScript -->
<!-- 1jQuery , 2Popper.js , 3Bootstrap JS -->
<script src="libs/js/jquery-3.4.1.min.js"></script>
<script src="libs/js/popper.min.js"></script>
<script src="libs/js/ingtatu.js"></script>
<script src="libs/js/bootstrap.min.js"></script>
</body>

</html>