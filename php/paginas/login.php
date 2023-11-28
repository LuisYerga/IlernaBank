<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link href="../../css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
  </script>
</head>

<body>
     <header>
        <div class="headerAcceso">
            <img src="../../img/Esteban&Co.png">
            <h1>Esteban&Co</h1>
        </div>
    </header>
    <main>
        <div id="InicioSesion" class="formInicio">
            <form action="../conexiones/" method="POST">
                <input type="text" placeholder="Email" id="usuario" name="usuario"> <br>
                <input type="text" placeholder="Contraseña" id="contraseña" name="contraseña"><br>
                <button type="button">Iniciar Sesión</button><br>
            </form>
            <label>¿Aun no tienes una cuenta con nosotros?</label>
            <a href="signin.php"><label>Crear nueva cuenta</label></a>
        </div>
    </main>
</body>
</html>

