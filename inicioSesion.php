

<!DOCTYPE html>
<html>
<?php include 'php/header.php'?>
  <body>
    <div class="page-header">
      <h1>STREETWEAR<small>SHOP</small></h1>
    </div>

    <?php include 'php/menu.php'?>

  <div class="columna-central">
    <h1>Iniciar Sesión</h1>
    <form action="php/login.php"  method="POST" class="inicioSesion">
         Usuario:<br>
        <input type="text" name="usuario" size=32>
        <br>
        Contraseña:<br>
        <input type="password" name="contrasenya" size=32>
        <br><br>
        <?php if ($_GET['err']) { ?>
          <div id="mensajeError">Los datos no coinciden</div>
          <br><br>
        <?php } ?>
        <input type="submit" value="Iniciar Sesión">
        <a href="registrarse.php" style="text-decoration:none"><input type="button" value="Registrarse"></a>
    </form>

  </div>

  <div class="footer">

  </div>

  </body>
</html>
