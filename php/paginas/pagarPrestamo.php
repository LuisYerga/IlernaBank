<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagar prestamo</title>
    <!--CSS-->
    <link href="../../css/bootstrap.css" rel="stylesheet">
    <link href="../../css/headers.css" rel="stylesheet">
    <link href="../../css/desplegable.css" rel="stylesheet">
    <link href="../../css/styleTarjetas.css" rel="stylesheet">

    <!--JS-->
    <script defer src="../../js/menu.js"></script>
    <script defer src="../../js/eliminarFecha.js"></script>

    <!--PHP-->
    <?php include_once("../conexiones/obtenerPerfil.php");?>
    <?php include_once("../conexiones/recuperarFoto.php");?>
</head>
<body>
  <header>
    <div class="headerPaginas">
      <div class="esteban">
        <img src="../../img/Esteban&Co.png">
      </div> 
      <div class="titulo">
        <h1>Esteban&Co</h1>
      </div>
      <div class="iconosMenu">
        <a class="button" href="listaPrestamos.php" id="volver"><img src="../../img/salir.png"></a>
        <a class="button" href="contactos.php" id="correo"><img src="../../img/correo.png"></a>
        <a class="button" id="menu"><img src="<?php echo $imagenPerfil;?>"></a>
      </div>
    </div>
  </header>
  <aside class="aside" id="aside">
    <div class="head">
      <div id="Casa" class="opciones">
        <a class="button option" id="casa" href="inicioUser.php"><img src="../../img/inicio.png"><p>Inicio</p></a>
      </div>
      <div id="Perfil" class="opciones">
        <a class="button option" id="perfil" href="verPerfil.php"><img src="../../img/usuario.png"><p>Mi perfil</p></a>
      </div>
      <div id="Buzon" class="opciones">
        <a class="button option" id="buzon" href="contactos.php"><img src="../../img/correo2.png"><p>Buzón</p></a>
      </div>
      <div id="Prestamos" class="opciones">
        <a class="button option" id="prestamos" href="listaPrestamos.php"><img src="../../img/prestamo.png"><p>Prestamos</p></a>
      </div>
      <div id="Retirar" class="opciones">
        <a class="button option" id="retirar" href="retirar.php"><img src="../../img/retirar.png"><p>Retirar dinero</p></a>
      </div>
      <div id="Ingresar" class="opciones">
        <a class="button option" id="ingresar" href="ingresar.php"><img src="../../img/ingresar.png"><p>Ingresar dinero</p></a>
      </div>
      <div id="Cerrar" class="opciones">
        <a class="button option salida" id="salir"href="login.php"><img src="../../img/flecha.png"><p>Cerrar sesión</p></a>
      </div>
    </div>
  </aside>
  <main>
    <section class="pagarPrestamo" id="pagarPrestamo">
      <div class="container">
      <div class="recuadro">
        <h3>Pagar prestamo <?php $nombrePrestamo?></h3> <br>
        <h4>Dinero actual:</h4>
        <p><?php echo $nombreSaldo;?></p>
        <form action="../conexiones/updatePrestamo.php" method="POST"> 
          <h4>Cantidad por pagar</h4> 
          <p><?php echo $cantidadPorPagar ?></p>
          <input type="hidden" id="cantidadPorPagar" name="cantidadPorPagar" value="<?php echo $cantidadPorPagar ?>" required>
          <h4>Pago</h4> 
          <input type="float" placeholder="Ingresar dinero" id="cantidad_pagada" name="cantidad_pagada" required> <br>
          <button id="boton" type="submit" name="Enviar">Pagar</button><br>
        </form>
      </div>
      </div>
    </section>
   </main>
</body>
</html>