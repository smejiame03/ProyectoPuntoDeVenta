<?php

    include("conexion.php");

    $con = conectar();

    $Nombre = $_POST['Nombre'];
    $Descripcion = $_POST['Descripcion'];
    $Costo = $_POST['Costo'];
    $Imagen=$_POST['Imagen'];

    $consulta = "INSERT INTO productos(Nombre,Descripcion,Costo,Imagen)
    VALUES ('$Nombre','$Descripcion','$Costo','$Imagen')";

    $resul = mysqli_query($con,$consulta);
    mysqli_close($con);

    header("Location: inventario.php");
    die();
?>