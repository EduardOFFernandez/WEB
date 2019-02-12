<?php 
require 'database.php';
session_start();

//CONSTRUIR CARRITO
$idUsuario = $_SESSION['idUsuario'];
$existenciaDeCarrito = "SELECT idUsuario FROM Carrito WHERE idUsuario=$idUsuario";
$resultExistenciaDeCarrito = $conn->query($existenciaDeCarrito);

if($resultExistenciaDeCarrito->num_rows < 1){

    $crearCarrito = "INSERT INTO Carrito (idCarrito, idUsuario) VALUES (NULL, '$idUsuario')";
    $resultadoCarrito = $conn->query($crearCarrito);
}

//ANYADIR PRODUCTO
$idProducto = $_POST['idProducto'];
$talla = $_POST['talla'];
$precio = "SELECT precio FROM Productos WHERE idProducto=$idProducto";
$resultPrecio = $conn->query($precio);
$filaPrecio = mysqli_fetch_array($resultPrecio);
$price = $filaPrecio[0];

$sql = "SELECT idCarrito FROM Carrito WHERE idUsuario = $idUsuario";
$resultado = $conn->query($sql);

if($fila= mysqli_fetch_array($resultado)){

    $idCarrito = $fila['idCarrito'];
    $insertar = "INSERT INTO LineaCarrito VALUES ( NULL, '$idProducto', '$idCarrito', '$talla', '$price')";
    mysqli_query($conn, $insertar);
}
mysqli_close($conn);
?>