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
        ORDER BY id_mensajes ASC";
    
        $conversacion=$conexion->query($selectConversacion);
    
        $mensajes=[];
        while($fila=$conversacion->fetch_assoc()){
            $mensajes[]=$fila;
        }
    
        $_SESSION['conversacion'] = $mensajes;
    
        $tipoUser="SELECT tipo_rol FROM rol WHERE id_perfil='$iban'";
        $resultTipo=$conexion->query($tipoUser);
        $row = $resultTipo->fetch_assoc();
        $tipo_rol = $row['tipo_rol'];
    
        if($tipo_rol=="usuario"){
            header("Location: ../paginas/mensajes.php");
        }else if($tipo_rol=="admin"){
            header("Location: ../paginas/mensajesAdmin.php");
        }
    }else{
        $tipoUser="SELECT tipo_rol FROM rol WHERE id_perfil='$iban'";
        $resultTipo=$conexion->query($tipoUser);
        $row = $resultTipo->fetch_assoc();
        $tipo_rol = $row['tipo_rol'];
    
        if($tipo_rol=="usuario"){
            header("Location: ../paginas/mensajes.php");
        }else if($tipo_rol=="admin"){
            header("Location: ../paginas/mensajesAdmin.php");
        }
    }


}