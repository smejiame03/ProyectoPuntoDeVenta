<?php

    include("conexion.php");

    $con = conectar();

    $idUs = $_POST['idUs'];
    $IDProducto = $_POST['IDProducto'];
    $consulta1 = "SELECT CantidadDisponible FROM productos WHERE IDProducto='$IDProducto'";
    $result1 = mysqli_query($con,$consulta1);

    $CantidadNueva = $_POST['CantidadNueva'];
    $CantidadDB = mysqli_fetch_assoc($result1)['CantidadDisponible'];
    $cantidadDisponibleAct = $CantidadNueva + $CantidadDB;
    $consulta = "UPDATE productos SET CantidadDisponible='$cantidadDisponibleAct' WHERE IDProducto='$IDProducto'";
    $result = mysqli_query($con,$consulta);
    $consulta1 = "SELECT User FROM registro WHERE ID='$idUs'";
    $result1 = mysqli_query($con,$consulta1);
    $User = mysqli_fetch_assoc($result1)['User'];
    $consulta2 = "SELECT Rol FROM registro WHERE ID='$idUs'";
    $result2 = mysqli_query($con,$consulta2);
    $Rol = mysqli_fetch_assoc($result2)['Rol'];
    $consulta3 = "INSERT into seguridad(FechaHora, Accion, IDUsuario, User, RolUser) VALUES (NOW(), 'Agregar cantidades al inventario','$idUs','$User','$Rol')";
    $result3 = mysqli_query($con,$consulta3);

    header("Location: compras.php?idUs=".$idUs);
    die();
?>