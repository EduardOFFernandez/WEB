<?php
require 'database.php';
$idModelo = $_GET['idModelo'];
$sql="SELECT * FROM Productos WHERE idModelo = $idModelo";
$res=$conn->query($sql);

while ($fila = mysqli_fetch_array($res)){
    ?>
    <div class="caja-compra">
      <img src=<?php echo $fila['imagen']; ?> alt="">
      <h2><?php echo $fila['nombre']; ?></h2>
      <p><?php echo $fila['descripcion']; ?></p>
      <p><?php echo $fila['precio']; ?>€ <button id="<?php echo $fila['idProducto']; ?>" class="myBtn" >Comprar<img src="img/carrito.png" style="float:right"/></button></p>
    </div>    
    <?php
}
?>
<div id='myModal' class='modal'></div>

