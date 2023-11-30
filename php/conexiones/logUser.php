<?php

include_once("conexion.php");

if(isset($_POST['email'], $_POST['contrasena'])){
    $email = $_POST['email'];
    $contrasena = $_POST['contrasena'];

    $consultaUsuario= "SELECT contrasena FROM perfil WHERE email='$email'";
    $result=$conexion->query($consultaUsuario);

    if($result->num_rows>0){
        $lista= $result->fetch_assoc();
        $verificador= trim($lista['contrasena']);
        var_dump($contrasena,$verificador);
        if(password_verify($contrasena, $verificador)){
            echo "Sesion iniciada";
        }else{
            echo "Contraseña incorrecta";
        }
    }else{
        echo "El email no existe";
    }
}
