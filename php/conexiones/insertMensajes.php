<?php

include_once("conexion.php");

if(isset($_POST['mensajeEnviado'])){
    $mensajeEnviado=$_POST['mensajeEnviado'];

    session_start();
    $id_agregado = $_SESSION['agregado'];
    $iban=$_SESSION['iban'];


    $insertMensaje="INSERT INTO mensajes(id_destinatario, id_remitente, mensaje) 
    VALUES ('$id_agregado', '$iban', '$mensajeEnviado')";

    $result=$conexion->query($insertMensaje);

    if($result){
        $selectConversacion= "(SELECT id_mensajes,id_remitente, mensaje FROM mensajes WHERE id_remitente='$id_agregado' AND id_destinatario='$iban')
        UNION ALL 
        (SELECT id_mensajes, id_remitente, mensaje FROM mensajes WHERE id_remitente='$iban' AND id_destinatario='$id_agregado')
        ORDER BY id_mensajes DESC";
    
        $conversacion=$conexion->query($selectConversacion);
    
        $mensajes=[];
        while($fila=$conversacion->fetch_assoc()){
            $mensajes[]=$fila;
        }
    
        $_SESSION['conversacion'] = $mensajes;
    
        header("Location: ../paginas/mensajes.php");
    }else{
        header("Location: ../paginas/mensajes.php");
    }


}