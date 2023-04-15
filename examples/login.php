<?php
    include("conexion.php");

    $con = conectar();
    
    $User = $_POST['User'];
    $Clave1Usuario = $_POST['Clave1Usuario'];
    $Rol = $_POST['Rol'];

    $consulta = "SELECT * FROM registro WHERE User='$User' and Clave1Usuario='$Clave1Usuario' and Rol='$Rol'";
    $resul = mysqli_query($con,$consulta);
    $id = mysqli_fetch_assoc($resul)['ID'];
    $filas = mysqli_num_rows($resul);
    if($filas){
        if($Rol == 'Administrador de inventario'){
            header('Location: inventario.php?idUs='.$id);
        }elseif($Rol == 'Administrador de compras'){
            header('Location: compras.php?idUs='.$id);
        }elseif($Rol == 'Operador de punto de venta'){
            header('Location: operadorventas.php?idUs='.$id);
        }elseif($Rol == 'Administrador de punto de venta'){
            header('Location: adminpuntoventa.php?idUs='.$id);
        }elseif($Rol == 'Administrador de la seguridad'){
            header('Location: seguridad.php?idUs='.$id);
        }elseif($Rol == 'Administrador de estados del sistema'){
            header('Location: adminestados.html');
        }
    }else{
        header('Location: login.html');
    }   
    mysqli_free_result($resul);
    mysqli_close($con);
?>