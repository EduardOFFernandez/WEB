<!DOCTYPE html>
<html>
<?php include 'php/header.php'?>
  <body>
    <div class="page-header">
      <h1>STREETWEAR<small>SHOP</small></h1>
    </div>
    <?php include 'php/menu.php'?>
  <div class="columna-central">
    <h1>Detalles de usuario</h1>
    <?php 
        session_start();
        if (isset($_SESSION["usuario"])) { 
        $usuario = $_SESSION['usuario'];
        $nombre = $_SESSION['nombre'];
        $correo = $_SESSION['correo'];
          echo "<div id='detallesDeUsuario'>
          <p>Nombre de usuario: $usuario</p>
          <p>Nombre completo: $nombre</p>
          <p>Correo electrónico: $correo</p>
          </div>";
        }
    ?>
  </div>
  <div class="footer">
  </div>
  </body>
</html>