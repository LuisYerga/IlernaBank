<?php

include_once("conexion.php");

if(isset($_POST['nombre_agregado'],$_POST['correo_agregado'])){
    $nombre_agregado=$_POST['nombre_agregado'];
    $correo_agregado=$_POST['correo_agregado'];

    $selectIban= "SELECT iban from perfil WHERE email='$correo_agregado'";
    $resultIban= $conexion->query($selectIban);

    if($resultIban->num_rows > 0) {
        $row=$resultIban->fetch_assoc();
        $ibanAgregado=$row['iban'];

        session_start();
        $iban=$_SESSION['iban'];

        $insertContacto="INSERT INTO contacto(nombre_agregado,id_usuario,id_agregado)
        VALUES ('$nombre_agregado', '$iban', '$ibanAgregado)";
        $result=$conexion->query($insertContacto);

        if($result){
            header("Location: ../paginas/contactos.php");  
        }else{
            header("Location: ../paginas/pantallaFallo.php");
        }
    }else{
        header("Location: ../paginas/agregarContactos.php");
    }

}