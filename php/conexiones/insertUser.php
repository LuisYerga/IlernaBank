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

    $iban=calcularIban($nombre, $conexion);

    $insertPerfil = "INSERT INTO perfil(iban, nombre, apellidos, dni, email, contrasena, fecha_nacimiento, direccion, ciudad, codigo_postal, provincia, pais, saldo) VALUES ('$iban','$nombre', '$apellidos', '$dni', '$email', '$contrasena', '$f_nacimiento', 'null', 'null', 'null', 'null', '$pais', 'null')";
    $result=$conexion->query($insertPerfil);

    $insertRol= "INSERT INTO rol(id_perfil, tipo_rol) VALUES ('$iban', 'usuario')";
    $result=$conexion->query($insertRol);

    if ($result) {
        echo "¡Usuario creado exitosamente!";
    } else {
        echo "Error en la creación del usuario: " . $conexion->error;
    }

}