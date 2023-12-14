<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensajes</title>
    <!--CSS-->
    <link href="../../css/bootstrap.css" rel="stylesheet">
    <link href="../../css/headers.css" rel="stylesheet">
    <link href="../../css/desplegable.css" rel="stylesheet">

    <!--JS-->
    <script defer src="../../js/menu.js"></script>
    <script defer src="../../js/eliminarFecha.js"></script>

    <!--PHP-->
    <?php include("../conexiones/gestionMensajes.php");?>
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
        <a class="button" href="contactosAdmin.php" id="volver"><img src="../../img/salir.png"></a>
        <a class="button" href="contactosAdmin.php" id="correo"><img src="../../img/correo.png"></a>
        <a class="button" id="menu"><img src="<?php echo $imagenPerfil;?>"></a>
      </div>
    </div>
  </header>
  <aside class="aside" id="aside">
    <div class="head">
      <div id="Buzon" class="opciones">
        <a class="button option" id="buzon" href="contactosAdmin.php"><img src="../../img/correo2.png"><p>Buzón</p></a>
      </div>
      <div id="Prestamos" class="opciones">
        <a class="button option" id="prestamos" href="listaPrestamosAdmin.php"><img src="../../img/usuario.png"><p>Prestamos</p></a>
      </div>
      <div id="Cerrar" class="opciones">
        <a class="button option salida" id="salir"href="login.php"><img src="../../img/flecha.png"><p>Cerrar sesión</p></a>
      </div>
    </div>
  </aside>
  <main>

    <section class="mensajes">
    <?php 
    session_start();
    if(isset($_SESSION['conversacion'])) {
        $mensajes = $_SESSION['conversacion'];

        if(empty($mensajes)) {
          echo "<p>No hay mensajes aun</p>";
        }else{
            foreach($mensajes as $mensaje){
                ?>
                <p id="<?php echo $mensaje['id_remitente'];?>"><?php echo $mensaje['mensaje'];?></p>
                <?php
            }
        }
    }
        ?>
    </section>
    <section class="enviarMensajes">
        <form action="../conexiones/insertMensajes.php" method="POST">
            <input type="text" id="mensajeEnviado" name="mensajeEnviado" required>
            <button type="submit" name="Enviar"></a>
        </form>
    </section>
  </main>
</body>
</html>