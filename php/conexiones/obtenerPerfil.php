<?php

include_once("conexion.php");
session_start();
if(isset($_SESSION['iban'])){
    $iban=$_SESSION['iban'];
    $consultaNombre = "SELECT nombre FROM perfil WHERE iban='$iban'";
    $resultNombre = $conexion->query($consultaNombre);

    if($resultNombre->num_rows > 0) {
        $row = $resultNombre->fetch_assoc(); // 
        $nombrePerfil = $row['nombre']; 
    } else {
        echo "No se encontró el nombre del perfil.";
    }
}