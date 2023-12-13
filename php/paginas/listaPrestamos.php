<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prestamos</title>
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
        <a class="button" href="inicioUser.php" id="volver"><img src="../../img/salir.png"></a>
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
    <section class="listaPrestamos" id="listaPrestamos">
      <div class="nuevo" id="nuevoPrestamo">
        <a class="button option" id="solicitar" href="solicitarPrestamos.php"><img src="../../img/mas.png"><p>Solicitar prestamo</p></a>
      </div>
      <div class="listado">
      <?php 
        if($resultPrestamos->num_rows == 0) {
          echo "<p>No hay historial de prestamos</p>";
        }else{
          while($fila=$resultPrestamos->fetch_assoc()){
            echo '<p>Descripción: ' . $fila['nombre_prestamo'] . '</p>';
            echo '<span class="separador"></span>';
            echo '<p>Cantidad: ' . $fila['cantidad_prestamo'] . '</p>';
            echo '<span class="separador"></span>';
            echo '<p>Fecha: ' . $fila['estado'] . '</p>';            
            echo '<span class="separador"></span>';
            echo '<p>Fecha: ' . $fila['final_prestamo'] . '</p>';
            if($fila['estado']!= "pendiente"){ 
              echo '<p>Por pagar: ' . $fila['cantidad_porPagar'] . '</p>';
              ?>
              <form action="../conexiones/gestionPrestamos.php" method="POST">
                <input type="hidden" name="id_prestamos" value="<?php echo $fila['id_prestamos']; ?>">
                <button type="submit" name="Pagar prestamo"></button>
              </form>
              <?php
            }
            echo '<hr>'; 
          }
        }
        ?>
      </div>
    </section>
   </main>
</body>
</html>