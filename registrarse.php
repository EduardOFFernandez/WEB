<!DOCTYPE html>
<html>
<?php include 'php/header.php'?>
  <body>
    <div class="page-header">
      <h1>STREETWEAR<small>SHOP</small></h1>
    </div>

    <?php include 'php/menu.php'?>

  <div class="columna-central">
    <h1>Registrarse</h1>
    <form action="php/anyadirRegistro.php" method="POST" class="registrarse">
       Nombre completo:<br>
        <input type="text" name="nombre" size=32>
        <br>
        Correo:<br>
        <input type="text" name="correo" size=32>
        <br>
        Usuario:<br>
        <input type="text" name="usuario" size=32>
        <br>
        Contraseña:<br>
        <input type="password" name="pass" size=32>
        <br><br>
        <input type="submit" value="Registrarse">
    </form>
  </div>

  <div class="footer">

  </div>

  </body>
</html>
