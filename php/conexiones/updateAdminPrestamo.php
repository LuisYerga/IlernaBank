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

    $updateAprovada="UPDATE prestamos SET solicitud_activa='0', estado='aprobada', final_prestamo='$fecha_final'";
    $result=$conexion->query($updateRechazo);
    if($result){
        header("Location: ../paginas/listaPrestamosAdmin.php");
    }else{
        header("Location: ../paginas/listaPrestamosAdmin.php");
    }
}