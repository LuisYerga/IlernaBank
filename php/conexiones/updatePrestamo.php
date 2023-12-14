<?php

include_once("conexion.php");

if(isset($_POST['cantidad_pagada'],$_POST['cantidadPorPagar'])){
    $cantidad_pagada=$_POST['cantidad_pagada'];
    $cantidadPorPagar=$_POST['cantidadPorPagar'];

    session_start();
    $id_prestamos=$_SESSION['id_prestamos'];
    $iban=$_SESSION['iban'];

    $consultaSaldo= "SELECT saldo FROM perfil WHERE iban='$iban'";
    $resultSaldo = $conexion->query($consultaSaldo);

    if($resultSaldo->num_rows > 0) {
        $row = $resultSaldo->fetch_assoc(); 
        $nombreSaldo = $row['saldo']; 
    } else {
        echo "No se encontró el nombre del perfil.";
    }
    $nuevoSaldo=$nombreSaldo-$cantidad_pagada;
    if($nuevoSaldo>=0){
        if($cantidadPorPagar-$cantidad_pagada>=0){
            $nuevaPorPagar=$cantidadPorPagar-$cantidad_pagada;

            if($nuevaPorPagar===0){
                $updatePrestamo="UPDATE prestamos SET cantidad_porPagar='$nuevaPorPagar', estado='finalizada' WHERE id_prestamos='$id_prestamos';
                UPDATE perfil SET saldo='$nuevoSaldo' WHERE iban='$iban';";
                $result=$conexion->multi_query($updatePrestamo);
                if($result){
                    header("Location: ../paginas/listaPrestamos.php");
                }else{
                    header("Location: ../paginas/pagarPrestamo.php");
                }
            }else{
                $updatePrestamo="UPDATE prestamos SET cantidad_porPagar='$nuevaPorPagar' WHERE id_prestamos='$id_prestamos';
                UPDATE perfil SET saldo='$nuevoSaldo' WHERE iban='$iban';";
                $result=$conexion->multi_query($updatePrestamo);
                if($result){
                   header("Location: ../paginas/listaPrestamos.php");
                }else{
                    header("Location: ../paginas/pagarPrestamo.php");
                }
            }
        }else{
            header("Location: ../paginas/pagarPrestamo.php");
        }
    }else{
        header("Location: ../paginas/pagarPrestamo.php");
    }
}