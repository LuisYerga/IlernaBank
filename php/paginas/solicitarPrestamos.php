<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitar Prestamos</title>
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
        <a class="button" id="menu"><img src="../../img/usu.png"></a>
      </div>
    </div>
  </header>
  <aside class="aside" id="aside">
    <div class="head">
      <div id="Perfil" class="opciones">
        <a class="button option" id="perfil" href="verPerfil.php"><img src="../../img/usuario.png"><p>Mi perfil</p></a>
      </div>
      <div id="Buzon" class="opciones">
        <a class="button option" id="buzon" href="contactos.php"><img src="../../img/correo2.png"><p>Buzón</p></a>
      </div>
      <div id="Prestamos" class="opciones">
        <a class="button option" id="prestamos" href="listaPrestamos.php"><img src="../../img/usuario.png"><p>Prestamos</p></a>
      </div>
      <div id="Retirar" class="opciones">
        <a class="button option" id="retirar" href="retirar.php"><img src="../../img/usuario.png"><p>Retirar dinero</p></a>
      </div>
      <div id="Ingresar" class="opciones">
        <a class="button option" id="ingresar" href="ingresar.php"><img src="../../img/usuario.png"><p>Ingresar dinero</p></a>
      </div>
      <div id="Ingresar" class="opciones">
        <a class="button option salida" id="salir"href="login.php"><img src="../../img/flecha.png"><p>Cerrar sesión</p></a>
      </div>
    </div>
  </aside>
  <main>
  <section class="solicitarPrestamo" id="solicitarPrestamo">
      <div class="container">
        <div class="recuadro">
            <?php
            if($resultActivo->num_rows > 0) {
              echo "<h3>¡Ya tienes una solicitud activa!</h3>";
              ?>
              <a class="button option" id="boton" href="listaPrestamos.php">Volver a la lista</a> 
            <?php
            }else if($edad->y < 18 || $edad->y ==18 && $edad->m < 0 && $edad->d < 0){
              echo "<h3>¡Aún eres menor de 18!</h3>";
              ?>
              <a class="button option" id="boton" href="listaPrestamos.php">Volver a la lista</a> 
            <?php
            }else{?>
                <h3>Pedir Préstamos</h3> <br>
                <form action="../conexiones/insertPrestamos.php" method="POST"> 
                <h4>Nombre prestamo</h4> 
                <input type="text"  id="nombre_prestamo" name="nombre_prestamo" required> <br>
                <h4>Motivo prestamo</h4> 
                <input type="text"  id="motivo_prestamo" name="motivo_prestamo" required> <br>
                <h4>Cantidad</h4> 
                <input type="float" id="cantidad_prestamo" name="cantidad_prestamo" required> <br>
                <button id="boton" type="submit" name="Enviar">Realizar operación</button><br>
                </form>
            <?php
            }
            ?>
        </div>
      </div>
    </section>
  </main>
</body>
</html>