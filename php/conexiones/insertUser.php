<?php

include_once("conexion.php");


if(isset($_POST['nombre'], $_POST['apellidos'], $_POST['dni'], $_POST['email'], $_POST['contraseña'], $_POST['pais'])){
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $dni = $_POST['dni'];
    $email = $_POST['email'];
    $contraseña = $_POST['contraseña'];
    $pais = $_POST['pais'];

    $consulta = "INSERT INTO perfil(nombre, apellidos, dni, email, contraseña, pais) VALUES ('$nombre', '$apellidos', '$dni', '$email', '$contraseña', '$pais')";
    $result=$conexion->query($consulta);
}