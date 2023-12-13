<?php

include_once("conexion.php");

if(isset($_POST['nombre'], $_POST['apellidos'], $_POST['dni'],$_POST['f_nacimiento'], $_POST['email'], $_POST['contrasena'], $_POST['pais'])){
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $dni = $_POST['dni'];
    $f_nacimiento=date('Y-m-d', strtotime($_POST['f_nacimiento']));
    $email = $_POST['email'];
    $contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT);
    $pais = $_POST['pais'];

    //Creación de funciones
    function calcularIban($nombre, $conexion){
        $letrasIban= strtoupper(substr($nombre,0,4));
        $letrasIban .= str_repeat("Z", 4- strlen($letrasIban));

        $letrasBinario= "";
        for($i=0;$i<4;$i++){
            $letra=$letrasIban[$i];
            $posicion=ord($letra) - ord('A') +1;
            $letrasBinario .=decbin($posicion);
        }
        $iban=$letrasBinario;
        do{
            $repeticion_Iban=false;
            $verificacion_Iban = "SELECT iban FROM perfil WHERE iban = '$iban'";
            $resultado_Iban= $conexion->query($verificacion_Iban);

            if($resultado_Iban->num_rows === 0){
                $repeticion_Iban=false;
            }else{
                $repeticion_Iban=true;
                $iban.= rand(0,1);
            }
        }while($repeticion_Iban===true);
        return $iban;
    }

    function verificarEmail($email, $conexion){
        $repeticion_Email=false;
        $consulta_Email= "SELECT email FROM perfil WHERE email='$email'";
        $resultado_Email= $conexion->query($consulta_Email);

        if($resultado_Email->num_rows != 0){
            $repeticion_Email=false;
        }else{
            $repeticion_Email=true;
        }
        return $repeticion_Email;
    }

    function verificarDni($dni, $conexion){
        $repeticion_Dni=false;
        $consulta_Dni= "SELECT dni FROM perfil WHERE dni='$dni'";
        $resultado_Dni= $conexion->query($consulta_Dni);

        if($resultado_Dni->num_rows != 0){
            $repeticion_Dni=false;
        }else{
            $repeticion_Dni=true;
        }
        return $repeticion_Dni;
    }
    
    $iban=calcularIban($nombre, $conexion);
    $verificadorEmail=verificarEmail($email, $conexion);
    $verificadorDni=verificarDni($dni, $conexion);

    if($verificadorDni===true && $verificadorEmail===true){
        $insertPerfil = "INSERT INTO perfil(iban, nombre, apellidos, dni, email, contrasena, fecha_nacimiento, direccion, ciudad, codigo_postal, provincia, pais, saldo) VALUES ('$iban','$nombre', '$apellidos', '$dni', '$email', '$contrasena', '$f_nacimiento', 'null', 'null', 'null', 'null', '$pais', 'null')";
        $result=$conexion->query($insertPerfil);

        $insertRol= "INSERT INTO rol(id_perfil, tipo_rol) VALUES ('$iban', 'usuario')";
        $result=$conexion->query($insertRol);

        if ($result) {
            if(!isset($_SESSION['iban'])){
                if(isset($iban)){
                    session_start();
                    $_SESSION['iban']=$iban;

                    $tipoUser="SELECT tipo_rol FROM rol WHERE id_perfil='$iban'";
                    $resultTipo=$conexion->query($tipoUser);
                    $row = $resultTipo->fetch_assoc();
                    $id_perfil = $row['id_perfil'];

                    if($id_perfil="usuario"){
                        header("Location: ../paginas/inicioUser.php");
                    }else if($id_perfil="admin"){
                        header("Location: ../paginas/inicioAdmin.php");
                    }
                }
            }
        } else {
            header("Location: ../paginas/signin.php");
        }
    }else{
        header("Location: ../paginas/signin.php");
    }
}