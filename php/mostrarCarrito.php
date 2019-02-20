<?php
require 'database.php';
$ip = "192.168.4.77";
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

    $total += $filaCarrito[4];
  }
}



?>

<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
            <input type="hidden" name="cmd" value="_xclick">
            <input type="hidden" name="business" value="streetwearshop@shop.com">
            <input type="hidden" name="item_name" value="Pedido">
            <input type="hidden" name="currency_code" value="EUR">
            <input type="hidden" name="amount" value='<?php echo $total ?>'>
            <input type="hidden" name="return" value=<?php echo "http://".$ip."/web/pedidos.php" ?>>
            <input type="hidden" name="cancel_return" value=<?php echo "http://".$ip."/web" ?>> 
            <input id="comprar" type="image" src="https://www.paypalobjects.com/es_ES/ES/i/btn/btn_buynow_LG.gif" border="0" name="submit" alt="PayPal, la forma rápida y segura de pagar en Internet.">
            
</form>

