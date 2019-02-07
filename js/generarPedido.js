document.addEventListener("DOMContentLoaded", cargar);

function cargar(){
    document.getElementById("comprar").addEventListener("click", generarPedido);
}

function generarPedido(){
    //Conexion AJAX
    peticion_http = new XMLHttpRequest();

    peticion_http.onreadystatechange = generar;

    peticion_http.open("POST", "http://localhost/web/php/generarPedido.php", true);

    //Enviamos parámetros;
    peticion_http.send(null);
    
    function generar() {
          
        if (peticion_http.readyState == 4 && peticion_http.status == 200) {
            //Conexion AJAX
            peticion_http = new XMLHttpRequest();

            peticion_http.open("POST", "http://localhost/web/php/eliminarCarrito.php", true);

            //Enviamos parámetros;
            peticion_http.send(null);

            if (peticion_http.readyState == 4 && peticion_http.status == 200) {
                alert(peticion_http.responseText);
            }
        
        }
    }
}

