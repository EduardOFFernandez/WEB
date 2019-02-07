<?php
    
    require 'database.php';

    $usu = $_POST["usuario"];
    $pass = md5($_POST["pass"]);
    $nom = $_POST["nombre"];
    $corr = $_POST["correo"];

    $consulta = "SELECT * FROM Usuarios WHERE usuario = '$usu'";
    $result = $conn->query($consulta);

    if($result->num_rows >=1){
      header("Location:../registrarse.php");
    }else{
      $sql = "INSERT INTO Usuarios (idUsuario, usuario, contrasenya, nombre, correo) VALUES (NULL, '$usu', '$pass', '$nom', '$corr')";
      if (mysqli_query($conn, $sql)) {
              //Consulta para ID Usuario
              $consultaIdUsuario = "SELECT idUsuario FROM Usuarios WHERE usuario='$usu'";
              $resultadoIdUsuario = $conn->query($consultaIdUsuario);
              $idUsuario = mysqli_fetch_array($resultadoIdUsuario);
              $idDios = $idUsuario['idUsuario'];
              //Insertar Carrito 
              $crearCarrito = "INSERT INTO Carrito (idCarrito, idUsuario) VALUES (NULL, '$idDios')";
              $resultadoCarrito = $conn->query($crearCarrito);
              header("Location: ../inicioSesion.php");
      } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
    }
     mysqli_close($conn);
    ?>