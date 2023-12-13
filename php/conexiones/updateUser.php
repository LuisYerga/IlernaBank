<?php

include_once("conexion.php");

if(isset($_POST['nombre'], $_POST['apellidos'], $_POST['dni'] ,$_POST['f_nacimiento'], $_FILES['image'], $_POST['pais'], $_POST['cod_postal'], $_POST['provincia'], $_POST['ciudad'], $_POST['direccion'])){
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $dni = $_POST['dni'];
    $f_nacimiento=date('Y-m-d', strtotime($_POST['f_nacimiento']));
    $image= $_FILES['image']['tmp_name'];
    $imgContent = file_get_contents($image);
    $pais = $_POST['pais'];
    $cod_postal=$_POST['cod_postal'];
    $provincia=$_POST['provincia'];
    $ciudad=$_POST['ciudad'];
    $direccion=$_POST['direccion'];

    session_start();
    $iban = $_SESSION['iban'];

    /*$insertPerfil = "UPDATE perfil SET nombre='$nombre', apellidos='$apellidos', dni='$dni', imagen='$imgContent',fecha_nacimiento = '$f_nacimiento', direccion='$direccion', ciudad='$ciudad', 
    codigo_postal='$cod_postal', provincia='$provincia', pais='$pais' WHERE iban='$iban'";
    $result=$conexion->query($insertPerfil);*/

    $insertPerfil = $conexion->prepare("UPDATE perfil SET nombre=?, apellidos=?, dni=?, imagen=?, fecha_nacimiento=?, direccion=?, ciudad=?, codigo_postal=?, provincia=?, pais=? WHERE iban=?");
    $insertPerfil->bind_param("sssbsssssss", $nombre, $apellidos, $dni, $imgContent, $f_nacimiento, $direccion, $ciudad, $cod_postal, $provincia, $pais, $iban);

    $result = $insertPerfil->execute();
    
    /*if ($result) {
        header("Location: ../paginas/verPerfil.php");
    } else {
        echo "Error en la creación del usuario: " . $conexion->error;
    }*/
}else{
    //header("Location: ../paginas/verPerfil.php");
}
