<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link href="../../css/headers.css" rel="stylesheet">
    <link href="../../css/desplegable.css" rel="stylesheet">
    <link href="../../css/styleTarjetas.css" rel="stylesheet">
    <link href="../../css/cambioTarjeta.css" rel="stylesheet">
    <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script defer src="../../js/menu.js"></script>
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
        <a class="button" href="" id="correo"><img src="../../img/correo.png"></a>
        <a class="button" id="menu"><img src="../../img/usu.png"></a>
      </div>
    </div>
  </header>
  <aside class="aside" id="aside">
    <div class="head">
      <div id="Perfil" class="opciones">
        <a class="button option" id="perfil" href=""><img src="../../img/usuario.png"><p>Mi perfil</p></a>
      </div>
      <div id="Buzon" class="opciones">
        <a class="button option" id="buzon" href=""><img src="../../img/correo2.png"><p>Buzón</p></a>
      </div>
      <div id="Prestamos" class="opciones">
        <a class="button option" id="prestamos" href=""><img src="../../img/usuario.png"><p>Prestamos</p></a>
      </div>
      <div id="Retirar" class="opciones">
        <a class="button option" id="retirar" href=""><img src="../../img/usuario.png"><p>Retirar dinero</p></a>
      </div>
      <div id="Ingresar" class="opciones">
        <a class="button option" id="ingresar" href=""><img src="../../img/usuario.png"><p>Ingresar dinero</p></a>
      </div>
      <div id="Ingresar" class="opciones">
        <a class="button option salida" id="salir"href="login.php"><img src="../../img/flecha.png"><p>Cerrar sesión</p></a>
      </div>
    </div>
  </aside>
  <main>
    <section class="mostrarPerfil" id="mostrarPerfil">
      <div class="container">
        <a class="button" id="pincel1"><img src="../../img/pincel.png"></a>
        <?php include_once("../conexiones/obtenerPerfil.php");?>
        <h5>Nombre:</h5>
        <p><?php echo $nombrePerfil;?></p>
        <h5>Apellidos:</h5>
        <p><?php echo $nombreApellidos;?></p>
        <h5>DNI:</h5>
        <p><?php echo $nombreDni;?></p>
        <h5>Email:</h5>
        <p><?php echo $nombreEmail;?></p>
        <h5>Fecha Nacimiento:</h5>
        <p><?php echo $nombreFnac;?></p>
        <h5>Pais:</h5>
        <p><?php echo $nombrePais;?></p>
        <h5>Código postal:</h5>
        <p><?php echo $nombreCod;?></p>
        <h5>Provincia:</h5>
        <p><?php echo $nombreProv;?></p>
        <h5>Ciudad:</h5>
        <p><?php echo $nombreCiudad;?></p>
        <h5>Dirección:</h5>
        <p><?php echo $nombreDir;?></p>
      </div>
    </section>
    <section class="editarPerfil active" id="editarPerfil">
      <div class="container">
        <a class="button" id="pincel2"><img src="../../img/pincel.png"></a>
        <?php include_once("../conexiones/obtenerPerfil.php");?>
        <form action="../conexiones/updateUser.php" method="POST">
          <h5>Nombre:</h5>
          <input type="text" placeholder="<?php echo $nombrePerfil;?>" id="nombre" name="nombre"> <br>
          <h5>Apellidos:</h5>
          <input type="text" placeholder="<?php echo $nombreApellidos;?>" id="apellidos" name="apellidos"><br>
          <h5>DNI:</h5>
          <input type="text" placeholder="<?php echo $nombreDni;?>" id="dni" name="dni"><br>
          <h5>Email:</h5>
          <input type="text" placeholder="<?php echo $nombreEmail;?>" id="email" name="email"><br>
          <h5>Fecha Nacimiento:</h5>
          <input type="text" placeholder="<?php echo $nombreFnac;?>" id="f_nacimiento" name="f_nacimiento"><br>
          <h5>Pais:</h5>
          <input type="text" placeholder="<?php echo $nombrePais;?>" id="pais" name="pais"><br>
          <h5>Código postal:</h5>
          <input type="text" placeholder="<?php echo $nombreCod;?>" id="cod_postal" name="cod_postal"><br>
          <h5>Provincia:</h5>
          <input type="text" placeholder="<?php echo $nombreProv;?>" id="provincia" name="provincia"><br>
          <h5>Ciudad:</h5>
          <input type="text" placeholder="<?php echo $nombreCiudad;?>" id="ciudad" name="ciudad"><br>
          <h5>Dirección:</h5>
          <input type="text" placeholder="<?php echo $nombreDir;?>" id="direccion" name="direccion"><br>
          <button type="submit" name="Enviar">Actualizar datos</button><br>
        </form>
      </div>
    </section>
  </main>
</body>
</html>