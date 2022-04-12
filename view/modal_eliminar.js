var abrir_modal_d = document.querySelectorAll("#Delete");
var modal_d = document.querySelector(".modal_delete");
var cerrar_modal_d = document.getElementById("close_modal_d");
var id_user_d = document.getElementById("id_d");
var user_d = document.getElementById("user_d");
var email_d = document.getElementById("email_d");
var opcion_d = document.getElementById("rol_d");

    for(var i =0; i< abrir_modal_d.length; i++){
        abrir_modal_d[i].onclick = function(e){
            e.preventDefault();
            var usuario = e.target.getAttribute("usuario");
            console.log(usuario);
            var XHR = new XMLHttpRequest();
            XHR.open("POST", "Eliminar.php", true);
            XHR.setRequestHeader("content-type","application/x-www-form-urlencoded");
            XHR.onreadystatechange = function(){
               var dato = JSON.parse(XHR.responseText);
               console.log(this.response);
               dato.forEach( dato => {
                id_user_d.value = dato.id_user_d;
                user_d.innerText = dato.nombre_d;
                email_d.innerText = dato.correo_d;
                opcion_d.innerText = dato.rol_d;
               });
            }
            XHR.send("id_delete=" + usuario);
    
            modal_d.classList.add("mostrar-modal");
        }
    }

cerrar_modal_d.onclick = function(e){
    e.preventDefault();
    modal_d.classList.remove("mostrar-modal");
}