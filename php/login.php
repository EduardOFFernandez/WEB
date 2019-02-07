<?php


require 'database.php';
if(!empty($_POST['usuario'] && !empty($_POST['contrasenya']))){
   $pass = md5($_POST['contrasenya']);

   $sql = "SELECT * FROM Usuarios WHERE usuario = '". $_POST['usuario'] . "' AND contrasenya = '". $pass ."'";
   if ($resultado = $conn->query($sql)) {
      if ($fila = $resultado->fetch_assoc()) {
         $usu = $_POST['usuario'];
         $idUsuario = "SELECT * FROM Usuarios WHERE usuario='$usu'";
         $res = $conn->query($idUsuario);
         if($usuario=mysqli_fetch_array($res)){
            session_start();
            $_SESSION["idUsuario"]=$usuario[0];
            $_SESSION["usuario"]=$usuario[1];
            $_SESSION["nombre"]=$usuario[3];
            $_SESSION["correo"]=$usuario[4];
            
         }
         if (isset($_SESSION["idUsuario"])){
            header('Location: ../index.php?idModelo=7');
         }

         

      } else {
         header('Location: ../inicioSesion.php?err=1');
      }
   }

}

mysqli_close($conn);


?>