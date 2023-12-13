<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Prestamos</title>
    <!--CSS-->
    <link href="../../css/bootstrap.css" rel="stylesheet">
    <link href="../../css/headers.css" rel="stylesheet">
    <link href="../../css/desplegable.css" rel="stylesheet">
    <link href="../../css/styleTarjetas.css" rel="stylesheet">

    <!--JS-->
    <script defer src="../../js/menu.js"></script>
    <script defer src="../../js/eliminarFecha.js"></script>
    
    <!--PHP-->
    <?php include_once("../conexiones/obtenerAdmin.php");?>
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
        <a class="button" href="contactos.php" id="correo"><img src="../../img/correo.png"></a>
        <a class="button" id="menu"><img src="../../img/usu.png"></a>
      </div>
    </div>
  </header>
  <aside class="aside" id="aside">
    <div class="head"> 
      <div id="Buzon" class="opciones">
        <a class="button option" id="buzon" href="contactos.php"><img src="../../img/correo2.png"><p>Buzón</p></a>
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
    <section class="listaPrestamos" id="listaPrestamos">
      <div class="listado">
      <?php 
        if($resultPrestamosPendiente->num_rows == 0) {
          echo "<p>No hay prestamos pendientes</p>";
        }else{
          while($fila=$resultPrestamosPendiente->fetch_assoc()){
            echo '<p>Usuario: ' . $fila['pf.email'] . '</p>';
            echo '<span class="separador"></span>';
            echo '<p>Prestamos: ' . $fila['p.nombre_prestamo'] . '</p>';
            echo '<span class="separador"></span>';
            echo '<p>Motivo: ' . $fila['p.motivo_prestamo'] . '</p>';            
            echo '<span class="separador"></span>';
            echo '<p>Cantidad: ' . $fila['p.cantidad_prestamos'] . '</p>';
            ?>
            <form action="../conexiones/updateAdminPrestamo.php" method="POST">
                <input type="hidden" name="id_prestamos" value="<?php echo $fila['p.id_prestamos'] ?>">
                <input type="date" name="fecha_final" required>
                <button type="submit" name="Aprobar"></button>
            </form>
            <form action="../conexiones/updateAdminPrestamo.php" method="POST">
                <input type="hidden" name="id_prestamos" value="<?php echo $fila['p.id_prestamos'] ?>">
                <input type="hidden" name="rechazar" >
                <button type="submit" name="Rechazar"></button>
            </form>
            <hr>
            <?php
          }
        }
        ?>
      </div>
    </section>
    <section class="listaPrestamos" id="listaPrestamos">
      <div class="listado">
      <?php 
        if($resultPrestamos->num_rows == 0) {
          echo "<p>No hay prestamos pendientes</p>";
        }else{
          while($fila=$resultPrestamos->fetch_assoc()){
            echo '<p>Usuario: ' . $fila['pf.email'] . '</p>';
            echo '<span class="separador"></span>';
            echo '<p>Prestamos: ' . $fila['p.nombre_prestamo'] . '</p>';
            echo '<span class="separador"></span>';
            echo '<p>Motivo: ' . $fila['p.cantidad_prestamos'] . '</p>';            
            echo '<span class="separador"></span>';
            echo '<p>Cantidad: ' . $fila['p.cantidad_porPagar'] . '</p>';
            echo '<p>Cantidad: ' . $fila['p.final_prestamo'] . '</p>';
          }
        }
        ?>
      </div>
    </section>
   </main>
</body>
</html>