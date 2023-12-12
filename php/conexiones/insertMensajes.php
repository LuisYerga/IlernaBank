<?php

include_once("conexion.php");
include_once("gestionMensajes.php");

if(isset($_POST['mensajeEnviado'])){
    $mensajeEnviado=$_POST['mensajeEnviado'];

    $insertMensaje="INSERT INTO mensajes(id_destinatario, id_remitente, mensaje) 
    VALUES ('$id_agregado', '$iba', $mensajeEnviado)";

    $result=$conexion->query($insertMensaje);

    if($result){
        header("Location: ../paginas/mensajes.php");
    }else{
        header("Location: ../paginas/mensajes.php");
    }
}