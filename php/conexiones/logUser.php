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
            header("Location: ../paginas/inicioUser.php");
        }else{
            header("Location: ../paginas/login.php");
        }
    }else{
        header("Location: ../paginas/login.php");
    }
}
