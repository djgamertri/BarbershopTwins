var abrir_modal_c = document.getElementById("user");
var modal_c = document.querySelector(".modal_config");
var cerrar_modal_c = document.getElementById("close_modal_config");

abrir_modal_c.onclick = function(e){
    e.preventDefault();
    modal_c.classList.add("mostrar-modal");
}
cerrar_modal_c.onclick = function(e){
    e.preventDefault();
    modal_c.classList.remove("mostrar-modal");
}
