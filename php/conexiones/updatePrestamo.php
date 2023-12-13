<?php

include_once("conexion.php");

if(isset($_POST['cantidad_pagada'],$_POST['cantidadPorPagar'])){
    $cantidad_pagada=$_POST['cantidad_pagada'];
    $cantidadPorPagar=$_POST['cantidadPorPagar'];

    if($cantidadPorPagar-$cantidad_pagada>=0){
        $nuevaPorPagar=$cantidadPorPagar-$cantidad_pagada;

        session_start();
        $id_prestamos=$_SESSION['id_prestamos'];

        $updatePrestamo="UPDATE prestamos SET cantidad_porPagar='$nuevaPorPagar' WHERE id_prestamos='$id_prestamos'";
        $result=$conexion->query($updatePrestamo);
        if($result){
            header("Location: ../paginas/listaPrestamos.php");
        }else{
            header("Location: ../paginas/pagarPrestamo.php");
        }
    }else{
        header("Location: ../paginas/pagarPrestamo.php");
    }
}