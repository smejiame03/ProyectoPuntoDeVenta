<?php
    include("conexion.php");

    $con = conectar();
    
    $User = $_POST['User'];
    $Clave1Usuario = $_POST['Clave1Usuario'];
    $Rol = $_POST['Rol'];

    $consulta = "SELECT * FROM registro WHERE User='$User' and Clave1Usuario='$Clave1Usuario' and Rol='$Rol'";

    $resul = mysqli_query($con,$consulta);
    $filas = mysqli_num_rows($resul);
    if($filas){
        if($Rol == 'Administrador de inventario'){
            header('Location: inventario.html');
        }elseif($Rol == 'Administrador de compras'){
            header('Location: compras.html');
        }elseif($Rol == 'Operador de punto de venta'){
            header('Location: operadorventa.html');
        }elseif($Rol == 'Administrador de punto de venta'){
            header('Location: adminventa.html');
        }elseif($Rol == 'Administrador de la seguridad'){
            header('Location: seguridad.html');
        }elseif($Rol == 'Administrador de estados del sistema'){
            header('Location: adminestados.html');
        }
    }else{
        header('Location: login.html');
    }   
    mysqli_free_result($resul);
    mysqli_close($con);
?>