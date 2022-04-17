function validar_registro(){

var user = document.getElementById("user_r")
var email = document.getElementById("email_r")
var pass = document.getElementById("pass_r")
var boton = document.getElementById("boton_r")
var mensaje = document.getElementById("mensaje_r")
var cont = document.getElementById("warnings_r")

let warning = ""
let emailv = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/
let entrada = false
if(user.value.length != 0){
    if(user.value.length <= 3 ){
        warning += "El nombre es invalido <br>"
        entrada = true
    }
}else{
    warning += "Ingrese un nombre de usuario <br>"
    entrada = true
}
if(email.value.length != 0){
    if(!emailv.test(email.value)){
        warning += "El correo es invalido <br>"
        entrada = true
    }
}else{
    warning += "Ingrese un correo <br>"
    entrada = true
}

if(pass.value.length != 0){
    if(pass.value.length < 5){
        warning += "La contraseña es invalida <br>"
        entrada = true
    }
}else{
    warning += "Ingrese una contraseña <br>"
    entrada = true
}

if(entrada){
    cont.style.opacity = "1"
    mensaje.innerHTML = warning
    return false
}

}