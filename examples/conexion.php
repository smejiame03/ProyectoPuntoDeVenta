<?php
function conectar(){
    $user="root";
    $password="";
    $hostname="localhost";
    $dbname="puntodeventa";

    $con=mysqli_connect($hostname,$user,$password,$dbname) or die ("Error al conectar el servidor".mysqli_error());

    return $con;
    }
?>