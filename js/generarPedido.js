document.addEventListener("DOMContentLoaded", cargar);
var ip = "192.168.4.77";

function cargar(){
    document.getElementById("comprar").addEventListener("click", generarPedido);
}

function generarPedido(){
    
    //Conexion AJAX
    peticion_http = new XMLHttpRequest();

    peticion_http.onreadystatechange = generar;

    peticion_http.open("POST", "http://"+ip+"/web/php/generarPedido.php", true);

    //Enviamos parámetros;
    peticion_http.send(null);
    
    function generar() {
        
       /* if (peticion_http.readyState == 4 && peticion_http.status == 200) {
            alert("YE");
            //Conexion AJAX
            peticion_http = new XMLHttpRequest();

            peticion_http.onreadystatechange = redirect;

            peticion_http.open("POST", "http://"+ip+"/web/php/eliminarCarrito.php", true);

            //Enviamos parámetros;
            peticion_http.send(null);

            

            function redirect(){
                if (peticion_http.readyState == 4 && peticion_http.status == 200) {
                    
                }
            }
            
        
        }*/
    }
}

