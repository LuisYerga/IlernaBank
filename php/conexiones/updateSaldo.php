<?php

include_once("conexion.php");
include_once("../conexiones/obtenerPerfil.php");

if(isset($_POST['retirar'], $_POST['concepto'])){
    $retirar=$_POST['retirar'];
    $concepto=$_POST['concepto'];

    session_start();
    $iban = $_SESSION['iban'];

    $nomre

}