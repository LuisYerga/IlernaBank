<?php

include_once("conexion.php");

if(isset($_POST['id_agregado'])){
    $id_agregado=$_POST['id_agregado'];
    $nombre_agregado=$_POST['nombre_agregado'];

    session_start();
    $_SESSION['agregado'] = $id_agregado;
    $_SESSION['nombre_agregado']=$nombre_agregado;
    $iban=$_SESSION['iban'];

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

}