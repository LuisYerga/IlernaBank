<?php

include_once("conexion.php");


$iban=$_SESSION['iban'];
$selectImagenPerfil= "SELECT imagen FROM perfil WHERE iban='$iban'";
$resultImagenPerfil=$conexion->query($selectImagenPerfil);
$fila=$resultImagenPerfil->fetch_assoc();
$imagenPerfil= $fila['imagen'];
