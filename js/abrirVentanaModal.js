document.addEventListener("DOMContentLoaded", cargar);
var idProducto;
var ip = "localhost";

function cargar(){
    
    var btn = document.getElementsByClassName("myBtn");
    for (var i = 0; i < btn.length ; i++) {
        btn[i].addEventListener("click", mostrarModal);
    }
}


function mostrarModal() {
    idProducto = this.id;
    
    //Conexion AJAX
    peticion_http = new XMLHttpRequest();

    peticion_http.onreadystatechange = mostrar;

    peticion_http.open("POST", "http://"+ip+"/web/php/construirModal.php?id="+this.id, true);
    
    
    //Enviamos parámetros;
    peticion_http.send(null);

    function mostrar() {

        if (peticion_http.readyState == 4 && peticion_http.status == 200) {
            var texto=peticion_http.responseText;
            var padre =document.getElementById("myModal");
            padre.innerHTML=texto;
            document.getElementById("close").addEventListener("click", cerrarModal);
            document.getElementById("anyadirProductoLineaCarrito").addEventListener("click", anyadirProducto);
            padre.style.display="block";   
        }
    }

}

function cerrarModal(){
   
        if(document.getElementById('myModal').style.display=='block'){
    
            document.getElementById('myModal').style.display='none';
    
        }else{
            document.getElementById('myModal').style.display='block';
        }
    
}

function anyadirProducto(){
    //Obtener talla 
    var talla = document.getElementById('tallas').value;
    

    //Form Data
    var form = new FormData();
    form.append("idProducto", idProducto);
    form.append("talla", talla);
    //Conexion AJAX
    peticion_http = new XMLHttpRequest();

    peticion_http.onreadystatechange = anyadirProductoLineaCarrito;

    peticion_http.open("POST", "http://"+ip+"/web/php/anyadirProductoLineaCarrito.php", true);

    //Enviamos parámetros;
    peticion_http.send(form);

    function anyadirProductoLineaCarrito() {
        if (peticion_http.readyState == 4 && peticion_http.status == 200) {
            cerrarModal();
        }
    }
   

}
