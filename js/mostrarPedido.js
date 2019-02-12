document.addEventListener("DOMContentLoaded", cargar);
var ip = "localhost";

function cargar() {
    var btnDetallesPedido = document.getElementsByClassName("detallesPedido");
    for (var i = 0; i < btnDetallesPedido.length ; i++) {
        btnDetallesPedido[i].addEventListener("click", redirectDetallesPedido);
    }
}

function redirectDetallesPedido(){
    location.href ="http://"+ip+"/web/detallesPedido.php?id="+this.id;
}

