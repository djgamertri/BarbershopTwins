var abrir_modal_d = document.querySelectorAll("#Delete");
var modal_d = document.querySelector(".modal_delete_service");
var cerrar_modal_d = document.getElementById("close_modal_service");
var id_servicio_d = document.getElementById("id_d");
var nombre_d = document.getElementById("nombre_d");
var descripcion_d = document.getElementById("descripcion_d");
var precio_d = document.getElementById("precio_d");

    for(var i =0; i< abrir_modal_d.length; i++){
        abrir_modal_d[i].onclick = function(e){
            e.preventDefault();
            var usuario = e.target.getAttribute("servicio");
            var XHR = new XMLHttpRequest();
            XHR.open("POST", "../controller/assets/servicio.php", true);
            XHR.setRequestHeader("content-type","application/x-www-form-urlencoded");
            XHR.onreadystatechange = function(){

               var dato = JSON.parse(XHR.responseText);

               var arreglo = [...dato.map((d) => d)];

               console.log(arreglo);

               arreglo.forEach( data => {
                console.log(data);
                id_servicio_d.value = data.id;
                nombre_d.innerText = data.nombre_s;
                descripcion_d.innerText = data.descripcion;
                precio_d.innerText = data.precio;
               });

            }

            XHR.send("id_servicio=" + usuario);
    
            modal_d.classList.add("mostrar-modal");
        }
    }

cerrar_modal_d.onclick = function(e){
    e.preventDefault();
    modal_d.classList.remove("mostrar-modal");
}