var abrir_modal_e = document.querySelectorAll("#Edit");
var modal_e = document.querySelector(".modal_editar");
var cerrar_modal_e = document.getElementById("close_modal_e");
var id_user = document.getElementById("id_user");
var user_e = document.getElementById("name");
var email_e = document.getElementById("email");
var pass_e = document.getElementById("pass");
var opcion_e = document.getElementById("opcion");

    for(var i =0; i< abrir_modal_e.length; i++){
        abrir_modal_e[i].onclick = function(e){
            e.preventDefault();
            var usuario = e.target.getAttribute("usuario");
            var XHR = new XMLHttpRequest();
            XHR.open("POST", "../controller/assets/Editar.php", true);
            XHR.setRequestHeader("content-type","application/x-www-form-urlencoded");
            XHR.send("id_user=" + usuario);
            XHR.onreadystatechange = function(){
               var data = JSON.parse(XHR.responseText);
               data.forEach( data => {
                id_user.value = data.id_user_e;
                user_e.value = data.nombre_e;
                email_e.value = data.correo_e;
                // pass_e.value = data.contraseña_e;
                opcion_e.value = data.opcion;
                opcion_e.innerText = data.rol_e;
               });
               
            }
            
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