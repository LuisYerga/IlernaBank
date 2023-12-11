<?php

include_once("conexion.php");
session_start();
if(isset($_SESSION['iban'])){
    $iban=$_SESSION['iban'];

    $consultaNombre = "SELECT nombre FROM perfil WHERE iban='$iban'";
    $resultNombre = $conexion->query($consultaNombre);

    if($resultNombre->num_rows > 0) {
        $row = $resultNombre->fetch_assoc(); 
        $nombrePerfil = $row['nombre']; 
    } else {
        echo "No se encontró el nombre del perfil.";
    }

    $consultaApellidos = "SELECT apellidos FROM perfil WHERE iban='$iban'";
    $resultApellidos = $conexion->query($consultaApellidos);

    if($resultApellidos->num_rows > 0) {
        $row = $resultApellidos->fetch_assoc(); 
        $nombreApellidos = $row['apellidos']; 
    } else {
        echo "No se encontró el nombre del perfil.";
    }

    $consultaDni = "SELECT dni FROM perfil WHERE iban='$iban'";
    $resultDni = $conexion->query($consultaDni);

    if($resultDni->num_rows > 0) {
        $row = $resultDni->fetch_assoc(); 
        $nombreDni = $row['dni']; 
    } else {
        echo "No se encontró el nombre del perfil.";
    }

    $consultaEmail = "SELECT email FROM perfil WHERE iban='$iban'";
    $resultEmail = $conexion->query($consultaEmail);

    if($resultEmail->num_rows > 0) {
        $row = $resultEmail->fetch_assoc(); 
        $nombreEmail = $row['email']; 
    } else {
        echo "No se encontró el nombre del perfil.";
    }

    $consultaFnac = "SELECT fecha_nacimiento FROM perfil WHERE iban='$iban'";
    $resultFnac = $conexion->query($consultaFnac);

    if($resultFnac->num_rows > 0) {
        $row = $resultFnac->fetch_assoc();
        $nombreFnac = $row['fecha_nacimiento']; 
    } else {
        echo "No se encontró el nombre del perfil.";
    }

    $consultaDir = "SELECT direccion FROM perfil WHERE iban='$iban'";
    $resultDir = $conexion->query($consultaDir);

    if($resultDir->num_rows > 0) {
        $row = $resultDir->fetch_assoc(); 
        $nombreDir = $row['direccion']; 
    } else {
        echo "No se encontró el nombre del perfil.";
    }

    $consultaCod= "SELECT codigo_postal FROM perfil WHERE iban='$iban'";
    $resultCod = $conexion->query($consultaCod);

    if($resultCod->num_rows > 0) {
        $row = $resultCod->fetch_assoc(); 
        $nombreCod = $row['codigo_postal']; 
    } else {
        echo "No se encontró el nombre del perfil.";
    }

    $consultaCiudad= "SELECT ciudad FROM perfil WHERE iban='$iban'";
    $resultCiudad = $conexion->query($consultaCiudad);

    if($resultCiudad->num_rows > 0) {
        $row = $resultCiudad->fetch_assoc();
        $nombreCiudad = $row['ciudad']; 
    } else {
        echo "No se encontró el nombre del perfil.";
    }

    $consultaProv= "SELECT provincia FROM perfil WHERE iban='$iban'";
    $resultProv = $conexion->query($consultaProv);

    if($resultProv->num_rows > 0) {
        $row = $resultProv->fetch_assoc(); 
        $nombreProv = $row['provincia']; 
    } else {
        echo "No se encontró el nombre del perfil.";
    }

    $consultaPais= "SELECT pais FROM perfil WHERE iban='$iban'";
    $resultPais = $conexion->query($consultaPais);

    if($resultPais->num_rows > 0) {
        $row = $resultPais->fetch_assoc(); 
        $nombrePais = $row['pais']; 
    } else {
        echo "No se encontró el nombre del perfil.";
    }

    $consultaSaldo= "SELECT saldo FROM perfil WHERE iban='$iban'";
    $resultSaldo = $conexion->query($consultaSaldo);

    if($resultSaldo->num_rows > 0) {
        $row = $resultSaldo->fetch_assoc(); 
        $nombreSaldo = $row['saldo']; 
    } else {
        echo "No se encontró el nombre del perfil.";
    }

    $consultaMovimientos= "SELECT descripcion, cantidad, fecha FROM operaciones WHERE id_realizador='$iban' ORDER BY fecha DESC LIMIT 5 ";
    $resultMovimientos= $conexion->query($consultaMovimientos);
    
    $consultaPrestamos="SELECT nombre_prestamo, cantidad_prestamo, estado, final_prestamo FROM prestamos WHERE id_solicitante='$iban' ORDER BY id_prestamos ASC";
    $resultPrestamos= $conexion->query($consultaPrestamos);

    $comprobacionActivo= "SELECT nombre_prestamo FROM prestamos WHERE id_solicitante='$iban' AND solicitud_activa=true ";
    $resultActivo= $conexion->query($comprobacionActivo);
}