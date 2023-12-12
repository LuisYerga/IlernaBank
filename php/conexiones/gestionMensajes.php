<?php

include_once("conexion.php");

if(isset($_POST['id_agregado'])){
    $id_agregado=$_POST['id_agregado'];

    session_start();
    $_SESSION['agregado'] = $id_agregado;
    $iban=$_SESSION['iban'];

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
}