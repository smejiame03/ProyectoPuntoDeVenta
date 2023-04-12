<?php

    include("conexion.php");

    $con = conectar();

    $IDProducto = $_POST['IDProducto'];
    $Nombre = $_POST['Nombre'];
    $Descripcion = $_POST['Descripcion'];
    $Costo = $_POST['Costo'];
    $CantidadDisponible = $_POST['CantidadDisponible'];
    $Imagen=$_POST['Imagen'];

    $consulta = "UPDATE productos SET Nombre='$Nombre', Descripcion='$Descripcion', Costo='$Costo', CantidadDisponible='$CantidadDisponible', Imagen='$Imagen' WHERE IDProducto='$IDProducto'";
    $resul = mysqli_query($con,$consulta);
    header("Location: inventario.php");
    die();
?>