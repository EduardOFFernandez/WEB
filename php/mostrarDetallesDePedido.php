<?php 
require 'database.php';
//EXTRAER PEDIDO
$id = $_GET["id"];
$sql="SELECT * FROM LineaPedido WHERE idPedido = $id";
$res=$conn->query($sql);
?>
    <h1>Pedido <?php echo $id?></h1>
    <?php

while($fila = mysqli_fetch_array($res)){
   //CONSULTA PARA CADA PRODUCTO
   $producto="SELECT * FROM Productos WHERE idProducto = $fila[idProducto]";
   $resProducto = $conn->query($producto);
    
    while($filaProducto = mysqli_fetch_array($resProducto)){
    ?>
    <div class="lineaProducto">
      <div class="imagenProducto">
      <img src= <?php echo $filaProducto['imagen'] ?> alt="">
      </div>
      <div class="nombreProducto">
      <h2>Nombre</h2>
      <p><?php echo $filaProducto['nombre'] ?></p>
      </div>
      <div class="tallaProducto">
        <h2>Talla</h2>
        <p><?php echo $fila['talla'] ?></p>
      </div>
      <div class="precioProducto">
      <h2>Precio</h2>
      <p><?php echo $fila['precio'] ?>€</p>
      </div>
    </div>
    <?php
    }
    
}

$sql="SELECT total FROM Pedido WHERE idPedido = $id";
$resTotal=$conn->query($sql);
$total = mysqli_fetch_array($resTotal);
?>

<div id="precioTotal"><h3>Total</h3><h3><?php echo $total["total"] ?>€</h3> </div>