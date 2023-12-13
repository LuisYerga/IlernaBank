<?php

include_once("conexion.php");
session_start();
if(isset($_SESSION['iban'])){
    $iban=$_SESSION['iban'];

    $consultaPrestamosPendiente="SELECT pf.email ,p.id_prestamos, p.nombre_prestamo,p.motivo_prestamo, p.cantidad_prestamo 
    FROM prestamos p INNER JOIN perfil pf ON p.id_solicitante=pf.iban WHERE estado='pendiente' ORDER BY id_prestamos ASC";
    $resultPrestamosPendiente= $conexion->query($consultaPrestamosPendiente);

    $consultaPrestamos="SELECT pf.email ,p.id_prestamos, p.nombre_prestamo, p.cantidad_prestamo, p.cantidad_porPagar, p.final_prestamo 
    FROM prestamos p INNER JOIN perfil pf ON p.id_solicitante=pf.iban WHERE estado='aprobada' OR estado='finalizada' ORDER BY id_prestamos ASC";
    $resultPrestamos= $conexion->query($consultaPrestamos);

}