var abrir_modal_d = document.querySelectorAll("#Delete");
var modal_d = document.querySelector(".modal_reserva");
var cerrar_modal_d = document.getElementById("close_modal_reserva");
var id_servicio = document.getElementById("id_servicio");
var user_servicio = document.getElementById("user_servicio");
var nombre_servicio = document.getElementById("nombre_servicio");

    for(var i =0; i< abrir_modal_d.length; i++){
        abrir_modal_d[i].onclick = function(e){
            e.preventDefault();
            var usuario = e.target.getAttribute("usuario");
            var XHR = new XMLHttpRequest();
            XHR.open("POST", "../controller/assets/Eliminar_reserva.php", true);
            XHR.setRequestHeader("content-type","application/x-www-form-urlencoded");
            XHR.onreadystatechange = function(){
               var dato = JSON.parse(XHR.responseText);
               dato.forEach( dato => {
                id_servicio.value = dato.id;
                user_servicio.innerText = dato.nombre;
                nombre_servicio.innerText = dato.nombre_s;
               });
            }
            XHR.send("id_user=" + usuario);
    
            modal_d.classList.add("mostrar-modal");
        }
    }

cerrar_modal_d.onclick = function(e){
    e.preventDefault();
    modal_d.classList.remove("mostrar-modal");
}