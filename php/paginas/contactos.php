<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactos</title>
    <!--CSS-->
    <link href="../../css/bootstrap.css" rel="stylesheet">
    <link href="../../css/headers.css" rel="stylesheet">
    <link href="../../css/desplegable.css" rel="stylesheet">
    <link href="../../css/mostrarListas.css" rel="stylesheet">

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
        <a class="button" href="inicioUser.php" id="volver"><img src="../../img/salir.png"></a>
        <a class="button" href="contactos.php" id="correo"><img src="../../img/correo.png"></a>
        <a class="button" id="menu"><img src="<?php echo $imagenPerfil;?>"></a>
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
      <div id="Cerrar" class="opciones">
        <a class="button option salida" id="salir"href="login.php"><img src="../../img/flecha.png"><p>Cerrar sesión</p></a>
      </div>
    </div>
  </aside>
  <main>
    <section class="listaContactos">
        <div class="nuevo" id="nuevoContacto">
            <a class="button opt" id="agregar" href="agregarContacto.php"><img src="../../img/mas.png"><h3>Agregar Contacto</h3></a>
        </div>
        <div class="listado">
        <?php 
          if($resultContactos->num_rows == 0) {
            ?>
            <div id="impar" class="lista">
            <?php
            echo "<p>No hay contactos agregados</p>";
            ?>
            </div>
            <?php
          }else{
            $idNum=0;
            while($fila=$resultContactos->fetch_assoc()){
              $idNum++;
              if($idNum%2===0){
                $id="par";
              }else{
                $id="impar";
              }
              ?>
              <div id="<?php echo $id?>" class="lista">
              <img class="imgPerfil" src="<?php echo $fila['imagen']?>">
              <form action="../conexiones/gestionMensajes.php" method="POST">
                <input type="hidden" name="id_agregado" value="<?php echo $fila['id_agregado']; ?>">
                <button type="submit" id="Contacto"><p><?php echo $fila['nombre_agregado']?></p></button>
              </form>
              </div>
              <hr>
            <?php
            }
          }
        ?>
        </div>
    </section>
  </main>
</body>
</html>