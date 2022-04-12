var abrir_modal = document.querySelector(".login_btn");
var modal = document.querySelector(".modal_login");
var cerrar_modal = document.querySelector(".modal_close");

abrir_modal.onclick = function(e){
    e.preventDefault();
    modal.classList.add("mostrar-modal");
}
cerrar_modal.onclick = function(e){
    e.preventDefault();
    modal.classList.remove("mostrar-modal");
}
