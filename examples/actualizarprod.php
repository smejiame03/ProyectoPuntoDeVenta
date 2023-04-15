<?php

    include("conexion.php");

    $con = conectar();

    $idUs = $_POST['idUs'];
    $IDProducto = $_POST['IDProducto'];
    $Nombre = $_POST['Nombre'];
    $Descripcion = $_POST['Descripcion'];
    $Costo = $_POST['Costo'];
    $Imagen=$_POST['Imagen'];

    $consulta = "UPDATE productos SET Nombre='$Nombre', Descripcion='$Descripcion', Costo='$Costo', Imagen='$Imagen' WHERE IDProducto='$IDProducto'";
    $resul = mysqli_query($con,$consulta);
    $consulta1 = "SELECT User FROM registro WHERE ID='$idUs'";
    $result1 = mysqli_query($con,$consulta1);
    $User = mysqli_fetch_assoc($result1)['User'];
    $consulta2 = "SELECT Rol FROM registro WHERE ID='$idUs'";
    $result2 = mysqli_query($con,$consulta2);
    $Rol = mysqli_fetch_assoc($result2)['Rol'];
    $consulta3 = "INSERT into seguridad(FechaHora, Accion, IDUsuario, User, RolUser) VALUES (NOW(), 'Modificar producto','$idUs','$User','$Rol')";
    $result3 = mysqli_query($con,$consulta3);

    header("Location: inventario.php?idUs=".$idUs);
    die();
?>
