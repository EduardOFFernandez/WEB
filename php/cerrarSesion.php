<?php
  session_start();
  unset($_SESSION["idUsuario"]); 
  unset($_SESSION["usuario"]);
  unset($_SESSION["nombre"]);
  unset($_SESSION["correo"]);
  session_destroy();
  header('Location: ../index.php?idModelo=7');
  
?>