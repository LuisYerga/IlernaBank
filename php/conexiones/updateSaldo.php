<?php

include_once("conexion.php");
include_once("../conexiones/obtenerPerfil.php");

if(isset($_POST['retirar'], $_POST['concepto'])){
    $retirar=$_POST['retirar'];
    $concepto=$_POST['concepto'];

    if($nombreSaldo-$retirar>=0){
        $nuevoSaldo= $nombreSaldo-$retirar;

        $updateSaldo= "UPDATE perfil SET saldo='$nuevoSaldo'";
        $result=$conexion->query($updateSaldo);
        
        $insertOperaciones= "INSERT INTO operaciones(fecha,cantidad,descripcion,id_realizador)
        VALUES ('2023-12-10', '$retirar', '$concepto', '$iban')";
        $result=$conexion->query($insertOperaciones);

        $id_operacion = $conexion->insert_id; //Sacamos el id autogenerado

        $insertGestion="INSERT INTO gestion(id_operacion_gestion, id_realizador_gestion, fecha_gestion, cantidad_gestion, tipo)
        VALUES ('$id_operacion','$iban','2023-12-10','$retirar','$concepto')";
        $result=$conexion->query($insertGestion);

        if($result){
            header("Location: ../paginas/pantallaConfirmacion.php");
            exit();
        }else{
            $paginaOrigen= "../retirar.php";
            header("Location: ../paginas/pantallaFallo.php");
            exit();
        }

    }else{
        header("Location: ../paginas/retirar.php");
    }
}else if(isset($_POST['ingresar'], $_POST['concepto'])){
    $ingresar=$_POST['ingresar'];
    $concepto=$_POST['concepto'];

    if($ingresar>0){
        $nuevoSaldo= $nombreSaldo+$ingresar;

        $updateSaldo= "UPDATE perfil SET saldo='$nuevoSaldo'";
        $result=$conexion->query($updateSaldo);

        $insertOperaciones= "INSERT INTO operaciones(fecha,cantidad,descripcion,id_realizador)
        VALUES ('2023-12-10', '$ingresar', '$concepto', '$iban')";
        $result=$conexion->query($insertOperaciones);

        $id_operacion = $conexion->insert_id; //Sacamos el id autogenerado

        $insertGestion="INSERT INTO gestion(id_operacion_gestion, id_realizador_gestion, fecha_gestion, cantidad_gestion, tipo)
        VALUES ('$id_operacion','$iban','2023-12-10','$ingresar','$concepto')";
        $result=$conexion->query($insertGestion);

        if($result){
           header("Location: ../paginas/pantallaConfirmacion.php");
           exit();
        }else{
            $paginaOrigen= "../ingresar.php";
            header("Location: ../paginas/pantallaFallo.php");
            exit();
        }

    }else{
        header("Location: ../paginas/ingresar.php");
    }
}