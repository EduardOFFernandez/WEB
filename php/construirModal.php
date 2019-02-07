
<div class='modal-content'>
<span id='close'>&times;</span>
<?php
    $id = $_GET['id'];
    include 'database.php';
    $sql = "SELECT * FROM Productos WHERE idProducto = '$id'";
    $tallas = "SELECT * FROM Tallas";
    $resTallas = $conn->query($tallas); 
    $res=$conn->query($sql);
    while ($fila = mysqli_fetch_array($res)){?>
        <div class="ventanaModalLateralIzquierda"> <img src="<?php echo $fila['imagen']; ?>"> </div>
        <div class="ventanaModalLateralDerecha">
            <h3><?php echo $fila['nombre']; ?></h3>
            <p class="descripcion" ><?php echo $fila['descripcion']; ?></p>
            <p class="precio" ><?php echo $fila['precio']; ?>€</p>
            <form id="seleccionarTalla" class="anyadirAlCarrito" onsubmit="return false">
                <label>Selecciona talla:</label><br>
                <div style="width:100%;">
                    <select name="tallas" id="tallas">
                        <?php while ($filo = mysqli_fetch_array($resTallas)){?>
                        <option value=<?php echo $filo['descripcion'] ?> ><?php echo $filo['descripcion']; ?></option>
                        <?php } ?>
                    </select><br>
                    <div style="width:100%;padding-top:10px;">
                    <button id="anyadirProductoLineaCarrito">AÑADIR AL CARRITO<img src="img/carrito.png"/></button>
                    </div>
                </div>
                
            </form>
        </div>
    <?php }
?>
</div>;