<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link href="../../css/bootstrap.css" rel="stylesheet">
    <link href="../../css/headers.css" rel="stylesheet">

</head>

<body>
    <header>
        <div class="headerAcceso">
            <img src="../../img/Esteban&Co.png">
            <h1>Esteban&Co</h1>
        </div>
    </header>
    <main>
        <div id="CrearCuenta" class="formInicio">
            <form action="../conexiones/insertUser.php" method="POST">
                <input type="text" placeholder="Nombre" id="nombre" name="nombre" required> <br>
                <input type="text" placeholder="Apellido" id="apellidos" name="apellidos" required><br>
                <input type="text" placeholder="DNI" id="dni" name="dni" required><br>
                <input type="text" placeholder="Fecha de nacimiento" id="f_nacimiento" name="f_nacimiento" required><br>
                <input type="text" placeholder="Email" id="email" name="email" required><br>
                <input type="text" placeholder="Contraseña" id="contrasena" name="contrasena" required><br>
                <input type="text" placeholder="País" id="pais" name="pais" required><br>
                <button type="submit" name="Enviar">Crear cuenta</button><br>
            </form>
            <label>¿Ya tienes una cuenta?</label>
            <a href="login.php"><label>Iniciar sesión</label></a>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
  </script>
</body>
</html>
