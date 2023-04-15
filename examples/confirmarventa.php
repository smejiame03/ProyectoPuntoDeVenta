<?php

    include("conexion.php");

    $con = conectar();

    $IDVendedor = $_POST['idUs'];
    $IDProducto = $_POST['IDProducto'];
    $CantidadProducto = $_POST['CantidadProducto'];
    $NombreCliente = $_POST['NombreCliente'];
    $DireccionCliente = $_POST['DireccionCliente'];
    $CelularCliente = $_POST['CelularCliente'];
    $CorreoCliente = $_POST['CorreoCliente'];

    $consulta1 = "SELECT User FROM registro WHERE ID='$idUs'";
    $result1 = mysqli_query($con,$consulta1);
    $User = mysqli_fetch_assoc($result1)['User'];
    $consulta2 = "SELECT Rol FROM registro WHERE ID='$idUs'";
    $result2 = mysqli_query($con,$consulta2);
    $Rol = mysqli_fetch_assoc($result2)['Rol'];
    $consulta3 = "INSERT into seguridad(FechaHora, Accion, IDUsuario, User, RolUser) VALUES (NOW(), '','$idUs','$User','$Rol')";
    $result3 = mysqli_query($con,$consulta3);
?>