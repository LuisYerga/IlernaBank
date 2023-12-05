<?php

include("conexion.php");
include("logUser.php");
include("insertUser.php");

echo $email;

if(!isset($_COOKIE['iban'])){
    if(isset($iban)){
        echo $iban;
        setcookie('iban', $iban, time() + 86400,'/');
    }else if (isset($email)){
        echo $email;
        $consultaIban= "SELECT iban FROM perfil WHERE email='$email'";
        $resultIban = $conexion->query($consultaIban);
        if ($resultIban->num_rows > 0) {
            $row = $resultIban->fetch_assoc();
            $iban = $row['iban'];
            setcookie('iban', $iban, time() + 86400,'/');
        }
    }
}