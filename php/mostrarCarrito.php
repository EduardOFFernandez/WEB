<?php
require 'database.php';
//CONSULTA PARA SABER EL ID CARRITO DEL USUARIO
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
    ?>

    <input type="hidden" value="<?php echo $fila[0]?>">
    <div class="lineaProducto">
      <span id=<?php echo $filaCarrito[0] ?> class='close'>&times;</span>
      <div class="imagenProducto">
      <img src= <?php echo $filaProducto[5] ?> alt="">
      </div>
      <div class="nombreProducto">
      <h2>Nombre</h2>
      <p><?php echo $filaProducto[3] ?></p>
      </div>
      <div class="tallaProducto">
        <h2>Talla</h2>
        <p><?php echo $filaCarrito[3] ?></p>
      </div>
      <div class="precioProducto">
      <h2>Precio</h2>
      <p><?php echo $filaCarrito[4] ?>€</p>
      </div>
    </div>
    
    <?php
  }
}

?>

<button id="comprar">Comprar</button>