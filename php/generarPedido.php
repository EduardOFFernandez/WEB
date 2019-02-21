<?php 

require 'database.php';

//SACAR EL PRECIO TOTAL

$precioTotal = 0;

//CONSULTA PARA SABER EL ID CARRITO DEL USUARIO
session_start();
$idUsuario = $_SESSION['idUsuario'];
$sql="SELECT idCarrito FROM Carrito WHERE idUsuario = $idUsuario";
$res=$conn->query($sql);
$fila = mysqli_fetch_array($res);

//CONSULTA PARA LINEACARRITO
$lineaCarrito = "SELECT * FROM LineaCarrito WHERE idCarrito = $fila[0]";
$resCarrito = $conn->query($lineaCarrito);

while($filaCarrito = mysqli_fetch_array($resCarrito)){
  
  //CONSULTA PARA CADA PRODUCTO
  $producto="SELECT * FROM Productos WHERE idProducto = $filaCarrito[1]";
  $resProducto = $conn->query($producto);
  while($filaProducto = mysqli_fetch_array($resProducto)){
    
    $precioTotal = $precioTotal + $filaProducto[2];

  }
}

//Abrir transacción
$crearPedido = "INSERT INTO Pedido (idPedido, total, idUsuario) VALUES (NULL, '$precioTotal', '$idUsuario')";
$resCrearPedido=$conn->query($crearPedido);

//Obtener el idPedido generado
$obtenerIdPedido = "SELECT * FROM Pedido ORDER BY idPedido DESC LIMIT 1;";
$residPedido=$conn->query($obtenerIdPedido);
$idPedidoV = mysqli_fetch_array($residPedido);
$idPedido = $idPedidoV["idPedido"];

//Sería un update
$volcarTabla = "INSERT INTO LineaPedido (idProducto, precio, talla)
                SELECT idProducto, precio, talla
                FROM LineaCarrito
                WHERE idCarrito = " . $fila[0];

$conn->query($volcarTabla);

//INSERT (idPedido) + UPDATE (lineaCarrito)
$insertIdPedido = "UPDATE LineaPedido SET idPedido = '$idPedido' WHERE idPedido IS NULL;";
$conn->query($insertIdPedido);

//Cerrar transacción
include 'eliminarCarrito.php';
?>