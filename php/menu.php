<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"><span>STREETWEAR</span></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php?idModelo=7">Inicio <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="sudaderas.php?idModelo=1">Sudaderas</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="chaquetas.php?idModelo=6">Chaquetas</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="camisetas.php?idModelo=2">Camisetas</a>
      </li>
      <?php 
        session_start();
        if (isset($_SESSION["usuario"])) { 
        $usuario = $_SESSION['usuario'];
        ?>
          <li class='nav-item active' id='sesion'>
          <a class='nav-link' id='usuario' >Hola, <?php echo $usuario ?></a>
          
          <div id='detallesDeSesion'>
          <ul>
          <li id='perfil'> <a href='datosDeUsuario.php'>Perfil</a> </li>
          <li id='pedidos'> <a href='pedidos.php'>Mis Pedidos</a> </li>
          <li id='atencionCliente'>Atención al cliente</li>
          <li id='cerrarSesion'> <a href='php/cerrarSesion.php'> Cerrar Sesión </a> </li>
          </ul>          
        </div>
      <?php }else{ ?>
        <li class="nav-item active" id="sesion">
        <a class="nav-link" href="inicioSesion.php">Iniciar sesión</a>
      </li>
      <?php } ?>
      
    </ul>
    <form onsubmit="return false">
      <button id="carrito" >TU CARRITO <img src="img/carrito2.png" style="float:right"/></button>
    </form>
  </div>
</nav>