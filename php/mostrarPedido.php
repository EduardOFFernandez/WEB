<?php 
require 'database.php';
//CONSULTA PARA SABER EL ID CARRITO DEL USUARIO
$idUsuario = $_SESSION['idUsuario'];
$sql="SELECT * FROM Pedido WHERE idUsuario = $idUsuario";
$res=$conn->query($sql);


while($fila = mysqli_fetch_array($res)){
    ?>
    <div class="pedido">
    <div class="numPedido"><h3>Número de Pedido</h3> <p> <?php echo $fila['idPedido'] ?> </p> </div>
    <div class="precioTotal"><h3>Precio total</h3> <p><?php echo  $fila["total"]?>€</p></div>
    <div class="botonMostrarPedido"><button id=<?php echo $fila["idPedido"] ?> class="detallesPedido">Ver detalles de pedido</button></div>
    </div>
    <?php
}
?>

<?php 
?>