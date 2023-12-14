<?php

include_once("conexion.php");

if(isset($_POST['rachazar'], $_POST['id_prestamos'])){
    $id_prestamos=$_POST['id_prestamos'];

    $updateRechazo="UPDATE prestamos SET solicitud_activa='0', estado='rechazada'";
    $result=$conexion->query($updateRechazo);
    if($result){
        header("Location: ../paginas/listaPrestamosAdmin.php");
    }else{
        header("Location: ../paginas/listaPrestamosAdmin.php");
    }
}else if(isset($_POST['fecha_final'], $_POST['id_prestamos'])){
    $id_prestamos=$_POST['id_prestamos'];
    $fecha_final=$_POST['fecha_final'];

    $saldo="SELECT pr.cantidad_prestamo, pe.saldo FROM prestamos pr INNER JOIN perfil pe ON pr.id_solicitante=pe.iban WHERE pr.id_prestamos='$id_prestamos'";
    $result=$conexion->query($saldo);
    $row = $result->fetch_assoc(); 
    $cantidad= $row['cantidad_prestamo'];
    $saldoUser = $row['saldo']; 
    $updateSaldo=$saldoUser+$cantidad;

    $updateSolicitante="UPDATE perfil pe SET pe.saldo='$updateSaldo' INNER JOIN prestamos pr ON pr.id_solicitante=pe.iban WHERE pr.id_prestamos='$id_prestamos'";
    $result=$conexion->query($updateSolicitante);
    
    $updateAprovada="UPDATE prestamos SET solicitud_activa='0', estado='aprobada', final_prestamo='$fecha_final' WHERE id_prestamo='$id_prestamos'";
    $result=$conexion->query($updateAprovada);
    if($result){
        header("Location: ../paginas/listaPrestamosAdmin.php");
    }else{
        header("Location: ../paginas/listaPrestamosAdmin.php");
    }
}