<?php

    include("conexion.php");

    $con = conectar();

    $IDProducto = $_GET['idProd'];
    $idUs = $_GET['idUs'];

    $consulta = "DELETE FROM productos WHERE IDProducto ='$IDProducto'";
    $resul = mysqli_query($con,$consulta);
    $consulta1 = "SELECT User FROM registro WHERE ID='$idUs'";
    $result1 = mysqli_query($con,$consulta1);
    $User = mysqli_fetch_assoc($result1)['User'];
    $consulta2 = "SELECT Rol FROM registro WHERE ID='$idUs'";
    $result2 = mysqli_query($con,$consulta2);
    $Rol = mysqli_fetch_assoc($result2)['Rol'];
    $consulta3 = "INSERT into seguridad(FechaHora, Accion, IDUsuario, User, RolUser) VALUES (NOW(), 'Eliminar producto existente','$idUs','$User','$Rol')";
    $result3 = mysqli_query($con,$consulta3);

    header("Location: inventario.php?idUs=".$idUs);
    die();
?>