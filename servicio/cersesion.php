<?php
include 'La-carta.php';
$cart = new Cart;
$cart->destroy();
session_start();
session_destroy();

header("Location: ../home.php");
?>