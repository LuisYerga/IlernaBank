<?php


if(isset($_POST['id_prestamos'])){
    $id_prestamos=$_POST['id_prestamos'];

    session_start();
    $_SESSION['id_prestamos'] = $id_prestamos;

    header("Location: ../paginas/pagarPrestamo.php");
}