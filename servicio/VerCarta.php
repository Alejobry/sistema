<?php
// initializ shopping cart class

include 'La-carta.php';

$sesion = $_SESSION['sessCustomerID'];

if ($sesion == null || $sesion == '') {
    header("location: ../login.php");
}

$cart = new Cart;
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title>Reservados</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="libs/css/bootstrap.min.css">
    <link rel="stylesheet" href="libs/css/all.min.css">

    <style>
        .container {
            padding: 20px;
        }

        input[type="number"] {
            width: 20%;
        }
    </style>
    <script>
        function updateCartItem(obj, id) {
            $.get("cartAction.php", {
                action: "updateCartItem",
                id: id,
                qty: obj.value
            }, function(data) {
                if (data == 'ok') {
                    location.reload();
                } else {
                    alert('Cart update failed, please try again.');
                }
            });
        }
    </script>
</head>
</head>

<body>


    <!-- NAVBAR -->

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

            </ul>
            <form class="form-inline my-2 my-lg-0">
                <a href="cersesion.php"><button type="button" class="btn btn-danger"><i class="fas fa-door-open"></i> Cerrar Sesión</button></a>

            </form>
        </div>
    </nav>



    <!-- EL RESTO -->

    <div class="container">
        <div class="panel panel-default">

            <div class="panel-body">


                <h1>Tatuajes Reservados</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Tatuaje</th>
                            <th>Precio</th>
                            <th>FOTO</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        



                        if ($cart->total_items() > 0) {
                            //get cart items from session
                            $cartItems = $cart->contents();
                            foreach ($cartItems as $item) {
                        ?>

                        <?php 
                        include_once 'Configuracion.php';
                        $nombre=$item["name"];
                        $query = $db->query("SELECT imagen FROM mis_productos where name='$nombre'");
                        $arraynombre = $query->fetch_assoc();
                        ?>
                                <tr>
                                    <td><?php echo $item["name"]; ?></td>
                                    <td><?php echo '$' . $item["subtotal"] . ' USD'; ?></td>
                                    <td>
                                        <img class="mediana img-fluid mx-auto  px-3" style="height: 70px"  src="libs/img/<?php echo $arraynombre['imagen']; ?>">
                                    </td>
                                    <td>
                                        <a href="AccionCarta.php?action=removeCartItem&id=<?php echo $item["rowid"]; ?>" class="btn btn-danger" onclick="return confirm('Desea eliminarlo?')"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php }
                        } else { ?>
                            <tr>
                                <td colspan="5">
                                    <p>No ha elegido ningún tatuaje.....</p>
                                </td>
                            <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td><a href="index.php" class="btn btn-warning">Seguir reservando</a></td>
                            <td colspan="2"></td>
                            <?php if ($cart->total_items() > 0) { ?>
                                <td class="text-center"><strong>Total <?php echo '$' . $cart->total() . ' USD'; ?></strong></td>
                                <td><a href="Pagos.php" class="btn btn-success btn-block">Pedido <i class="fas fa-share-square"></i></a></td>
                            <?php } ?>
                        </tr>
                    </tfoot>
                </table>

            </div>

        </div>
        <!--Panek cierra-->

    </div>

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