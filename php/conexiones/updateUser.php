<?php

include_once("conexion.php");

if(isset($_POST['nombre'], $_POST['apellidos'], $_POST['dni'] ,$_POST['f_nacimiento'], $_FILES['image'], $_POST['pais'], $_POST['cod_postal'], $_POST['provincia'], $_POST['ciudad'], $_POST['direccion'])){
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $dni = $_POST['dni'];
    $f_nacimiento=date('Y-m-d', strtotime($_POST['f_nacimiento']));
    $image= $_FILES['image'];
    $ruta='../../img/perfil/'.$image['name'];
    move_uploaded_file($image['tmp_name'], $ruta);
    $pais = $_POST['pais'];
    $cod_postal=$_POST['cod_postal'];
    $provincia=$_POST['provincia'];
    $ciudad=$_POST['ciudad'];
    $direccion=$_POST['direccion'];

    session_start();
    $iban = $_SESSION['iban'];

    $insertPerfil = "UPDATE perfil SET nombre='$nombre', apellidos='$apellidos', dni='$dni', imagen='$ruta',fecha_nacimiento = '$f_nacimiento', direccion='$direccion', ciudad='$ciudad', 
    codigo_postal='$cod_postal', provincia='$provincia', pais='$pais' WHERE iban='$iban'";
    $result=$conexion->query($insertPerfil);

    if ($result) {
        header("Location: ../paginas/verPerfil.php");
    } else {
        echo "Error en la creación del usuario: " . $conexion->error;
    }
}else{
    header("Location: ../paginas/verPerfil.php");
}
