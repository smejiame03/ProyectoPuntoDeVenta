<?php
    include("conexion.php");

    $con = conectar();

    $PrimerNombre = $_POST['PrimerNombre'];
    $SegundoNombre = $_POST['SegundoNombre'];
    $PrimerApellido = $_POST['PrimerApellido'];
    $SegundoApellido = $_POST['SegundoApellido'];
	$ID = $_POST['ID'];
    $User = $_POST['User'];
    $Clave1Usuario = $_POST['Clave1Usuario'];
    $Rol = $_POST['Rol'];

    $consulta = "INSERT INTO registro(PrimerNombre,SegundoNombre,PrimerApellido,SegundoApellido,ID,User,Clave1Usuario,Rol) 
    VALUES ('$PrimerNombre','$SegundoNombre','$PrimerApellido','$SegundoApellido','$ID','$User','$Clave1Usuario','$Rol')";

    $resul = mysqli_query($con,$consulta);

    header('Location: registro.html');
?>
