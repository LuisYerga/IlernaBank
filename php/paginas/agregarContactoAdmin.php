<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Contactos</title>
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
        <a class="button" href="inicioAdmin.php" id="volver"><img src="../../img/salir.png"></a>
        <a class="button" href="contactosAdmin.php" id="correo"><img src="../../img/correo.png"></a>
        <a class="button" id="menu"><img src="<?php echo $imagenPerfil;?>"></a>
      </div>
    </div>
  </header>
  <aside class="aside" id="aside">
    <div class="head">
      <div id="Casa" class="opciones">
        <a class="button option" id="casa" href="inicioAdmin.php"><img src="../../img/inicio.png"><p>Inicio</p></a>
      </div>
      <div id="Buzon" class="opciones">
        <a class="button option" id="buzon" href="contactosAdmin.php"><img src="../../img/correo2.png"><p>Buzón</p></a>
      </div>
      <div id="Prestamos" class="opciones">
        <a class="button option" id="prestamos" href="listaPrestamosAdmin.php"><img src="../../img/prestamo.png"><p>Prestamos</p></a>
      </div>
      <div id="Cerrar" class="opciones">
        <a class="button option salida" id="salir"href="login.php"><img src="../../img/flecha.png"><p>Cerrar sesión</p></a>
      </div>
    </div>
  </aside>
  <main>
    <section class="agregarContactos" id="agregarContactos">
      <div class="container">
      <div class="recuadro">
        <h3>Agregar Contacto</h3> <br>
        <form action="../conexiones/insertContactoAdmin.php" method="POST"> 
          <h4>Nombre del contacto</h4> 
          <input type="text" placeholder="Usuario" id="nombre_agregado" name="nombre_agregado" required> <br>
          <h4>Correo del contacto</h4> 
          <input type="text" placeholder="Introduzca aquí el correo" id="correo_agregado" name="correo_agregado" required> <br>
          <button id="boton" type="submit" name="Enviar">Agregar</button><br>
        </form>
      </div>
      </div>
    </section>
   </main>
</body>
</html>