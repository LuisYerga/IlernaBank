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

    $consultaApellidos = "SELECT apellidos FROM perfil WHERE iban='$iban'";
    $resultApellidos = $conexion->query($consultaApellidos);

    if($resultApellidos->num_rows > 0) {
        $row = $resultApellidos->fetch_assoc(); // 
        $nombreApellidos = $row['apellidos']; 
    } else {
        echo "No se encontró el nombre del perfil.";
    }

    $consultaDni = "SELECT dni FROM perfil WHERE iban='$iban'";
    $resultDni = $conexion->query($consultaDni);

    if($resultDni->num_rows > 0) {
        $row = $resultDni->fetch_assoc(); // 
        $nombreDni = $row['dni']; 
    } else {
        echo "No se encontró el nombre del perfil.";
    }

    $consultaEmail = "SELECT email FROM perfil WHERE iban='$iban'";
    $resultEmail = $conexion->query($consultaEmail);

    if($resultEmail->num_rows > 0) {
        $row = $resultEmail->fetch_assoc(); // 
        $nombreEmail = $row['email']; 
    } else {
        echo "No se encontró el nombre del perfil.";
    }

    $consultaFnac = "SELECT fecha_nacimiento FROM perfil WHERE iban='$iban'";
    $resultFnac = $conexion->query($consultaFnac);

    if($resultFnac->num_rows > 0) {
        $row = $resultFnac->fetch_assoc(); // 
        $nombreFnac = $row['fecha_nacimiento']; 
    } else {
        echo "No se encontró el nombre del perfil.";
    }

    $consultaDir = "SELECT direccion FROM perfil WHERE iban='$iban'";
    $resultDir = $conexion->query($consultaDir);

    if($resultDir->num_rows > 0) {
        $row = $resultDir->fetch_assoc(); // 
        $nombreDir = $row['direccion']; 
    } else {
        echo "No se encontró el nombre del perfil.";
    }
}