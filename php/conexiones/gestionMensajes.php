<?php

include_once("conexion.php");

if(isset($_POST['id_contacto'], $_POST['nombre_agregado'], $_POST['id_agregado'])){
    $id_contacto=$_POST['id_contacto'];
    $nombre_agregado=$_POST['nombre_agregado'];
    $id_agregado=$_POST['id_agregado'];

    session_start();
    $iban=$_SESSION['iban'];

    $selectConversacion= "(SELECT id_remitente, mensaje FROM mensajes WHERE id_remitente='$id_agregado')
    UNION ALL 
    (SELECT id_remitente, mensaje FROM mensajes WHERE id_remitente='$iban')
    ORDER BY id_mensajes DESC";

    $conversacion=$conexion->query($selectConversacion);

    header("Location: ../paginas/mensajes.php");
}else{
    header("Location: ../paginas/contactos.php");
}