var abrir_modal_e = document.querySelectorAll("#Edit");
var modal_e = document.querySelector(".modal_editar_servicio");
var cerrar_modal_e = document.getElementById("modal_editar_servicio");
var id_servicio = document.getElementById("Id_servicio");
var nombre = document.getElementById("nombre");
var descripcion = document.getElementById("descripcion");
var precio = document.getElementById("precio");

    for(var i =0; i< abrir_modal_e.length; i++){
        abrir_modal_e[i].onclick = function(e){
            e.preventDefault();
            var usuario = e.target.getAttribute("servicio");
            var XHR = new XMLHttpRequest();
            XHR.open("POST", "../controller/assets/servicio.php", true);
            XHR.setRequestHeader("content-type","application/x-www-form-urlencoded");
            XHR.send("id_servicio=" + usuario);
            XHR.onreadystatechange = function(){
               var data = JSON.parse(XHR.responseText);
               console.log(data)
               data.forEach( data => {
                id_servicio.value = data.id;
                nombre.value = data.nombre_s;
                descripcion.value = data.descripcion;
                precio.value = data.precio;
               });
               
            }
            
            modal_e.classList.add("mostrar-modal");
        }
    }

cerrar_modal_e.onclick = function(e){
    e.preventDefault();
    modal_e.classList.remove("mostrar-modal");
}