document.addEventListener("DOMContentLoaded", cargar);

function cargar() {
    document.getElementById('usuario').addEventListener("click", mostrarDatos);
}

function mostrarDatos(){

    if(document.getElementById('detallesDeSesion').style.display=='block'){

        document.getElementById('detallesDeSesion').style.display='none';

    }else{
        document.getElementById('detallesDeSesion').style.display='block';
    }

}