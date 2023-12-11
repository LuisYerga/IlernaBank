<?php

include_once("conexion.php");

if(isset($_POST['nombre_prestamo'], $_POST['motivo_prestamo'], $_POST['cantidad_prestamo'])){
    $nombre_prestamo=$_POST['nombre_prestamo'];
    $motivo_prestamo=$_POST['motivo_prestamo'];
    $cantidad_prestamo=$_POST['cantidad_prestamo'];

    session_start();
    $iban = $_SESSION['iban'];

    $insertPrestamos= "INSERT INTO prestamos(nombre_prestamo,motivo_prestamo,cantidad_prestamo,solicitud_activa,final_prestamo,estado,id_solicitante)
    VALUES ('$nombre_prestamo', '$motivo_prestamo', '$cantidad_prestamo', '1', 'null', 'pendiente', '$iban')";

    $result=$conexion->query($insertPrestamos);

    if ($result) {
        header("Location: ../paginas/pantallaConfirmacion.php");
    }else{
        header("Location: ../paginas/pantallaFallo.php");
    }
}else{
    header("Location: ../paginas/solicitarPrestamos.php");
}