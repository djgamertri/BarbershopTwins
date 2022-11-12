var abrir_modal_register_servicio = document.querySelector(".register_btn");
var modal_register_servicio = document.querySelector(".modal_register_service");
var cerrar_modal_register_servicio = document.getElementById("close_modal_register_service");

abrir_modal_register_servicio.onclick = function(e){
    e.preventDefault();
    modal_register_servicio.classList.add("mostrar-modal");
}
cerrar_modal_register_servicio.onclick = function(e){
    e.preventDefault();
    modal_register_servicio.classList.remove("mostrar-modal");
}