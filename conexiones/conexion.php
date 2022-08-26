<?php

$hostname = "localhost";
$usuario = "root";
$passworddb = "Scarlett2021.";
$dbname = "fundacion_dejando_huellas";

    $conectar = mysqli_connect($hostname,$usuario,$passworddb,$dbname);
    mysqli_set_charset($conectar, "utf8");
    return $conectar;


?>