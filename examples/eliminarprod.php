<?php

    include("conexion.php");

    $con = conectar();

    $IDProducto = $_GET['id'];

    $consulta = "DELETE FROM productos WHERE IDProducto ='$IDProducto'";
    $resul = mysqli_query($con,$consulta);

    header("Location: inventario.php");
    die();
?>