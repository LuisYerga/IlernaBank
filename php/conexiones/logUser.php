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
        if(password_verify($contrasena, $verificador)){
            if(!isset($_SESSION['iban'])){
                if(isset($email)){
                    session_start();
                    $consultaIban= "SELECT iban FROM perfil WHERE email='$email'";
                    $resultIban = $conexion->query($consultaIban);
                    if ($resultIban->num_rows > 0) {
                        $row = $resultIban->fetch_assoc();
                        $iban = $row['iban'];
                        $_SESSION['iban']=$iban;

                        $tipoUser="SELECT tipo_rol FROM rol WHERE id_perfil='$iban'";
                        $resultTipo=$conexion->query($tipoUser);

                        $row = $resultTipo->fetch_assoc();
                        $tipo_rol = $row['tipo_rol'];

                        if($tipo_rol=="usuario"){
                            header("Location: ../paginas/inicioUser.php");
                        }else if($tipo_rol=="admin"){
                            header("Location: ../paginas/inicioAdmin.php");
                        }
                    }
                }
            }
        }else{
            header("Location: ../paginas/login.php");
        }
    }else{
        header("Location: ../paginas/login.php");
    }
}
