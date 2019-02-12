<?php 
    
    require 'database.php';
    session_start();
    $idUsuario = $_SESSION['idUsuario'];
    $eliminarCarrito = "DELETE FROM Carrito WHERE idUsuario = $idUsuario";
    $conn->query($eliminarCarrito);
    
?>