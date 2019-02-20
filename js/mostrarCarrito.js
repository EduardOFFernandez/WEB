document.addEventListener("DOMContentLoaded", cargar);
var ip = "192.168.4.77";

function cargar() {
    document.getElementById('carrito').addEventListener("click", mostrarCarrito);
    var closes = document.getElementsByClassName("close");
    for (var i = 0; i < closes.length ; i++) {
        closes[i].addEventListener("click", eliminarDelCarrito);
    }
}

function mostrarCarrito(){
    
    location.href ="http://"+ip+"/web/carrito.php";

}

function eliminarDelCarrito(){

    //Form Data
    var form = new FormData();
    form.append("idLineaCarrito", this.id);
    
    //Conexion AJAX
    peticion_http = new XMLHttpRequest();

    peticion_http.onreadystatechange = eliminar;

    peticion_http.open("POST", "http://"+ip+"/web/php/eliminarDelCarrito.php", true);

    //Enviamos parámetros;
    peticion_http.send(form);
    
    function eliminar() {
            
        if (peticion_http.readyState == 4 && peticion_http.status == 200) {
          if(confirm("¿Desea eliminar el producto?")){
            mostrarCarrito();
          }
        }
    }

}
