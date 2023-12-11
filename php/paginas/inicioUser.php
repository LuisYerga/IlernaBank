<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <!--CSS-->
    <link href="../../css/bootstrap.css" rel="stylesheet">
    <link href="../../css/headers.css" rel="stylesheet">
    <link href="../../css/desplegable.css" rel="stylesheet">

    <!--JS-->
    <script defer src="../../js/menu.js"></script>
    <script defer src="../../js/fecha.js"></script>
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
        <a class="button" href="" id="correo"><img src="../../img/correo.png"></a>
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
        <a class="button option" id="buzon" href=""><img src="../../img/correo2.png"><p>Buzón</p></a>
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
      <section class="principal">
          <div class="container">
              <h3>Bienvenido de vuelta <?php echo $nombrePerfil;?></h3>
              <img src="../../img/credito.png">
              <h4>Iniciaste sesión en:</h4>
              <h5 id="fecha_actual"></h5>
              <h5>Tu saldo</h5>
              <h3><?php echo $nombreSaldo;?></h3>
              <h5>Últimos movimientos</h5>
              <?php 
                if($resultMovimientos->num_rows == 0) {
                  echo "<p>No hay últimos movimientos</p>";
                }else{
                  while($fila=$resultMovimientos->fetch_assoc()){
                    echo '<p>Descripción: ' . $fila['descripcion'] . '</p>';
                    echo '<p>Cantidad: ' . $fila['cantidad'] . '</p>';
                    echo '<p>Fecha: ' . $fila['fecha'] . '</p>';
                    echo '<hr>'; 
                  }
                }
              ?>
              <h5>Realizar operación</h5>
              <a class="button gestion retirar" name="Retirar" href="retirar.php">Retirar dinero</a>
              <a class="button gestion ingresar" name="Ingresar" href="ingresar.php">Ingresar dinero</a>
          </div>
      </section>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
  </script>
</body>
</html>