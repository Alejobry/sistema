<?php

// include database configuration file
include 'Configuracion.php';

// initializ shopping cart class
include 'La-carta.php';
$cart = new Cart;

// redirect to home if cart is empty
if ($cart->total_items() <= 0) {
    header("Location: index.php");
}

// la sesion esta guardada en validarus.php (este es el id del clienete en la tabla esta como customer_id)


// validando si     $_SESSION['sessCustomerID']   esta vacio para que no entre usuario no autorizado
if ($_SESSION['sessCustomerID'] == null || $_SESSION['sessCustomerID'] == '') {
    header("location: ../login.php");
}

// get customer details by session customer ID
$query = $db->query("SELECT * FROM clientes WHERE id = " . $_SESSION['sessCustomerID']);
$custRow = $query->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title>Pedido</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="libs/css/bootstrap.min.css">
    <link rel="stylesheet" href="libs/css/all.min.css">

    <style>
        .container {
            padding: 20px;
        }

        .table {
            width: 65%;
            float: left;
        }

        .shipAddr {
            width: 30%;
            float: left;
            margin-left: 30px;
        }

        .footBtn {
            width: 95%;
            float: left;
        }

        .orderBtn {
            float: right;
        }
    </style>
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
                <h1>Vista previa del Pedido</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Pricio</th>
                            <th>Cantidad</th>
                            <th>Sub total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($cart->total_items() > 0) {
                            //get cart items from session
                            $cartItems = $cart->contents();
                            foreach ($cartItems as $item) {

                        ?>
                                <tr>
                                    <td><?php echo $item["name"]; ?></td>
                                    <td><?php echo '$' . $item["price"] . ' USD'; ?></td>
                                    <td><?php echo $item["qty"]; ?></td>
                                    <td><?php echo '$' . $item["subtotal"] . ' USD'; ?></td>
                                </tr>
                            <?php
                                $_SESSION['carritocompra'] = $item;
                            }
                        } else { ?>
                            <tr>
                                <td colspan="4">
                                    <p>No hay articulos en tu carta......</p>
                                </td>
                            <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3"></td>
                            <?php if ($cart->total_items() > 0) { ?>
                                <td class="text-center"><strong>Total <?php echo '$' . $cart->total() . ' USD'; ?></strong></td>
                            <?php } ?>
                        </tr>
                    </tfoot>
                </table>
                <div class="shipAddr">
                    <h4>Detalles del Cliente</h4>
                    <p>Cedula: <?php echo $custRow['Cedula']; ?></p>
                    <p>Nombres: <?php echo $custRow['Nombres']; ?></p>
                    <p>Apellidos: <?php echo $custRow['Apellidos']; ?></p>
                    <p>Correo: <?php echo $custRow['Correo']; ?></p>
                    <p>Teléfono: <?php echo $custRow['Telefono']; ?></p>
                    <p>Edad: <?php echo $custRow['Edad']; ?> Años</p>
                    
                </div>
                <div class="footBtn">
                    <a href="index.php" class="btn btn-warning"><i class="glyphicon glyphicon-menu-left"></i> Continue Comprando</a>
                    <a href="AccionCarta.php?action=placeOrder" class="btn btn-success orderBtn">Realizar pedido <i class="glyphicon glyphicon-menu-right"></i></a>
                    <button class="btn btn-outline-primary ">
                        <a href="comprobante/pdf.php"> Hacer Reserva </a>
                    </button>
                </div>
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