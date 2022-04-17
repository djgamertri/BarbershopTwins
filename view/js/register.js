var abrir_modal_r = document.querySelector(".register_btn");
var modal_r = document.querySelector(".modal_register");
var cerrar_modal_r = document.getElementById("close_modal_r");

abrir_modal_r.onclick = function(e){
    e.preventDefault();
    modal_r.classList.add("mostrar-modal");
}
cerrar_modal_r.onclick = function(e){
    e.preventDefault();
    modal_r.classList.remove("mostrar-modal");
}