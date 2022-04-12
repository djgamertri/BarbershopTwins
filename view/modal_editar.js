var abrir_modal_e = document.querySelectorAll("#Edit");
var modal_e = document.querySelector(".modal_editar");
var cerrar_modal_e = document.getElementById("close_modal_e");
var id_user = document.getElementById("id_user");
var user = document.getElementById("user");
var email = document.getElementById("email");
var pass = document.getElementById("pass");
var opcion = document.getElementById("opcion");

    for(var i =0; i< abrir_modal_e.length; i++){
        abrir_modal_e[i].onclick = function(e){
            e.preventDefault();
            var usuario = e.target.getAttribute("usuario");
            var XHR = new XMLHttpRequest();
            XHR.open("POST", "Editar.php", true);
            XHR.setRequestHeader("content-type","application/x-www-form-urlencoded");
            XHR.onreadystatechange = function(){
               var data = JSON.parse(XHR.responseText);
               data.forEach( data => {
                id_user.value = data.id_user_e;
                user.value = (data.nombre_e);
                email.value = (data.correo_e);
                pass.value = (data.contraseña_e);
                opcion.value = (data.opcion);
                opcion.innerText = (data.rol_e);
               });
               
            }
            XHR.send("id_user=" + usuario);
    
            modal_e.classList.add("mostrar-modal");
        }
    }

cerrar_modal_e.onclick = function(e){
    e.preventDefault();
    modal_e.classList.remove("mostrar-modal");
}
 
/*
$(".Edit").click(function(e){
    e.preventDefault();
    var usuario = $(this).attr('usuario');
    alert(usuario)
})
*/