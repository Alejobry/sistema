<?php


require "Configuracion.php";

session_start();

$sesion = $_SESSION['sessCustomerID'];
$rol = $_SESSION['rol'];

if ($sesion == null || $sesion == '' || $rol !=1) {
  header("location: ../login.php");
}

if (!empty($_POST)) {
        //CAMPOS VACIOS
        if (
        empty($_POST['tatuaje']) || empty($_POST['descripcion']) || empty($_POST['precio']) || $_POST['precio']<=0
        || empty($_POST['tamaño']) ||  empty($_FILES['foto']) ) {
        echo "<div class='container pt-3' >
                <div class='alert alert-danger' role='alert'>Todos los campos son Obligatorios</div>  
             </div>";
        }else {
            $tatuaje=$_POST['tatuaje'];
            $descripcion=$_POST['descripcion'];
            $precio=$_POST['precio'];
            $tamaño=$_POST['tamaño'];

            $foto=$_FILES['foto'];
            $nombre_foto=$foto['name'];
            $tipo=$foto['type'];
            $url_temp=$foto['tmp_name'];

            $img_tatuaje='img_def.jpg';

            if ($nombre_foto !='') {
               $destino='libs/img/';
               $img_nombre='img_'.md5(date('d-m-Y H:m:s')) ;
               $img_tatuaje=$img_nombre.'.jpg';
               $src=$destino.$img_tatuaje;
            }
            include 'Configuracion.php';
            $queryinsert = $db->query("INSERT INTO mis_productos (`name`, `description`, `price`, `idtamaño`,`imagen`) VALUES ('$tatuaje', '$descripcion', '$precio', '$tamaño','$img_tatuaje')");

            if ($queryinsert) {
                if ($nombre_foto !='') {
                     move_uploaded_file($url_temp,$src);     
                }
                echo "<div class='container pt-3' >
                      <div class='alert alert-primary' role='alert'>Registro exitoso</div>  
                   </div>";  
                }else {
                echo "<div class='container pt-3' >
                <div class='alert alert-danger' role='alert'>Error al Guardar</div>  
             </div>";
                 }

         
             }   
        }   
          
?>
<!doctype html>
<html lang="es">

<head>
    <title>Registro de tatuajes</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="libs/css/bootstrap.min.css">
    <link rel="stylesheet" href="libs/css/ingtatu.css">
</head>

<body>
<header>
  <!--  <nav class="navbar navbar-expand-sm navbar-dark bg-dark"> -->
    <nav class="navbar navbar-expand-sm " style="background: rgb(0, 0, 0);color: white;" >


      <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0 py-2">

          <li class="nav-item">
            <a class="nav-link " style="color: white;" href="index.php">Tatuajes</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link " style="color: white;" href="VerCarta.php">Reservados</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " style="color: white;" href="Pagos.php">Pedido</a>
          </li>
          <?php
          
          $sesion = $_SESSION['sessCustomerID'];
          $rol = $_SESSION['rol'];
          if ($sesion == null || $sesion == '' || $rol ==1) {

          echo    '<li class="nav-item">
              <a class="nav-link " style="color: white;" href="ingtatu.php">Agregar Tatuajes</a>
          </li>';
          echo '<li class="nav-item">
            <a class="nav-link " style="color: white;" href="listartatu.php">Lista de Tatuajes</a>
          </li>';
          }
          ?>

        </ul>
        <form class="form-inline my-2 my-lg-0">
          <a href="cersesion.php"><button type="button" class="btn btn-danger"><i class="fas fa-door-open"></i> Cerrar Sesión</button></a>

        </form>
      </div>
    </nav>

  </header>
    <div class="container">
        <div class="row justify-content-center mt-3 m-1">
            <div class="col-md-6 col-sm-8 col-xl-4 col-lg-5 formulario">

                <form action="" method="POST" enctype="multipart/form-data">

                    <div class="form-group text-center ">
                        <h1>Registrar Tatuaje</h1>
                    </div>
                    <div class="form-group mx-sm-4 pt-1">

                        <input type="text" id="tatuaje" name="tatuaje" class="form-control " placeholder="Nombre del Tatuaje">
                    </div>

                    <div class="form-group mx-sm-4 pt-1">

                        <input type="text" id="descripcion" name="descripcion" class="form-control " placeholder="Descripcion">
                    </div>

                    <div class="form-group mx-sm-4 pt-1">

                        <input type="text" id="precio" name="precio" class="form-control " placeholder="$ Precio">
                    </div>

                    <div class="form-group mx-sm-4 pt-1">
                        <?php
                        include 'Configuracion.php';
                        $query = $db->query("SELECT idtamaño, tamaño FROM pedido.tamaño;");
                        $res_query = mysqli_num_rows($query);
                        mysqli_close($db);
                        ?>

                        <select name="tamaño" id="tamaño">
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
                                <span class="delPhoto notBlock">X</span>
                                <label for="foto"></label>
                            </div>
                            <div class="upimg">
                                <input type="file" name="foto" id="foto">
                            </div>
                            <div id="form_alert"></div>
                        </div>
                    </div>



                    <div class="form-group mx-sm-4 pt-1">
                        <input type="submit" class="btn btn btn-lg btn-primary btn-block" value="Agregar Tatuaje" require>
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