<?php
require "Configuracion.php";

session_start();

$sesion = $_SESSION['sessCustomerID'];
$rol = $_SESSION['rol'];

if ($sesion == null || $sesion == '' || $rol !=1) {
  header("location: ../login.php");
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title>Tatuajes</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link type="text/css" rel="stylesheet" href="libs/css/bootstrap.min.css">
    <link rel="stylesheet" href="libs/css/all.min.css">
    <!-- CSS PERSONALIZADO -->
    <style>
        .container {
            padding: 20px;
        }

        .cart-link {
            width: 100%;
            text-align: right;
            display: block;
            font-size: 22px;
        }
    </style>
</head>

<body>
<header>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">

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
        <h1 style="text-align: center">Tatuajes Disponibles</h1>
        <div class="container" class=" col-md-3 py-1">
            <div class="album py-2" id="galeria">
                <div class="row">
                    <?php
                    //get rows query
                    $query = $db->query("SELECT p.id , p.name ,p.description , p.price , p.imagen , t.tamaño
                    FROM mis_productos p inner join tamaño t on p.idtamaño = t.idtamaño ");
                    if ($query->num_rows > 0) {
                        while ($row = $query->fetch_assoc()) {
                    ?>





                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="card mb-4 shadow-sm">
                                    <img class="mediana img-fluid mx-auto py-3 px-3" src="libs/img/<?php echo $row['imagen']; ?>">
                                    <div class="card-body">
                                        <h4 class="list-group-item-heading"><?php echo $row["name"]; ?></h4>
                                        <p class="list-group-item-text"><?php echo $row["description"]; ?></p>
                                        <div class="row">

                                            <div class="col-md-6">
                                                <p class="lead"><?php echo '$' . $row["price"] . ' USD'; ?></p>
                                            </div>
                                            <div class="col-md-6">
                                                <p class="list-group-item-text"><?php echo 'Tamaño: ' . $row["tamaño"]; ?></p>
                                            </div>
                                        </div>
                                        <div class="row ml-5">
                                            <div class="col-4">
                                                <a class="btn btn-warning" style="color: white" href="actatu.php?id=<?php echo $row["id"]; ?>"><i class="fas fa-pencil-alt"></i> Editar</a>
                                            </div>
                                            <div class="col-4 ">



                                                <!-- <a class="btn btn-danger" href="<?php echo $row["id"]; ?>"><i class="fas fa-trash"></i> Eliminar</a> -->
                                                 <!-- se abrirá un modal para eliminar -->
                                                <a class="btn btn-danger" data-toggle="modal" data-target="#<?php echo $row["name"]; ?>" style="color: white"><i class="fas fa-trash"></i> Eliminar</a>
                                                
                                                

                                                <!-- Modal -->
                                                <div class="modal fade" id="<?php echo $row["name"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title " id="exampleModalLongTitle">¿ Seguro que dese eliminar este Tatuaje ?</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                            <h4 class="list-group-item-heading ml-5"><?php echo $row["name"]; ?></h4>
                                                            <img class="mediana img-fluid mx-auto py-3 px-3" src="libs/img/<?php echo $row['imagen']; ?>">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button"  class="btn btn-info" data-dismiss="modal">Cancelar</button>
                                                                <a class="btn btn-danger" style="color: white" href="eliminartatu.php?id=<?php echo $row["id"]; ?>&ruta=<?php echo $row['imagen'];?>"><i class="fas fa-trash"></i> Eliminar</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>



                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>















                        <?php }
                    } else { ?>
                        <p>Producto(s) no existe.....</p>
                    <?php } ?>

                </div>
            </div>
        </div>
    </div>
    </div>
    <!--Panek cierra-->

    <!-- ARCHIVOS DE BOOTSTRAP4 JavaScript -->
    <!-- 1jQuery , 2Popper.js, 3Bootstrap JS -->
    <script src="libs/js/jquery-3.4.1.min.js">
    </script>
    <script src="libs/js/popper.min.js">
    </script>
    <script src="libs/js/bootstrap.min.js">
    </script>


</body>

</html>