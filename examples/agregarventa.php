<?php

    include("conexion.php");

    $con = conectar();

    $IDVendedor = $_POST['idUs'];
    $Nombre = $_POST['NombreCliente'];
    $Direccion = $_POST['DireccionCliente'];
    $Celular = $_POST['CelularCliente'];
    $Correo = $_POST['CorreoCliente'];
    $CostoProducto= $_POST['CostoProducto'];
    $Cantidad = $_POST['CantidadProducto'];
    $ValorTotal = $_POST['Total'];

    $consulta = "SELECT IDProducto FROM productos WHERE Costo='$CostoProducto'";
    $result = mysqli_query($con,$consulta);
    $IDProducto = mysqli_fetch_assoc($result)['IDProducto'];
    $consulta2 = "SELECT Rol FROM registro WHERE ID='$IDVendedor'";
    $result2 = mysqli_query($con,$consulta2);
    $Rol = mysqli_fetch_assoc($result2)['Rol'];

    $consulta3 = "SELECT CantidadDisponible FROM productos WHERE IDProducto='$IDProducto'";
    $result3 = mysqli_query($con,$consulta3);
    $CantidadDisponible = mysqli_fetch_assoc($result3)['CantidadDisponible'];
    $CantidadActualizada = $CantidadDisponible - $Cantidad;

    $consulta1 = "INSERT INTO ventas(Nombre,Direccion,Celular,Correo,FechaHora,IDVendedor,IDProductosVendidos,ValorTotal,Cantidad) 
    VALUES ('$Nombre','$Direccion','$Celular','$Correo',NOW(),'$IDVendedor','$IDProducto','$ValorTotal','$Cantidad')";
    $result1 = mysqli_query($con,$consulta1);

    $consulta4 = "UPDATE productos SET CantidadDiponible='$CantidadActualizada' WHERE IDProducto='$IDProducto'";
    $result4 = mysqli_query($con,$consulta4);

    $consulta5 = "SELECT User FROM registro WHERE ID='$IDVendedor'";
    $result5 = mysqli_query($con,$consulta5);
    $User = mysqli_fetch_assoc($result5)['User'];

    $consulta3 = "INSERT into seguridad(FechaHora, Accion, IDUsuario, User, RolUser) VALUES (NOW(), 'Agregar venta','$IDVendedor','$User','$Rol')";
    $result3 = mysqli_query($con,$consulta3);

    header('Location: operadorventas.php?idUs='.$IDVendedor);
?>