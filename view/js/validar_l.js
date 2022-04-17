function validar(){

    var email = document.getElementById("email")
    var pass = document.getElementById("pass")
    var boton = document.getElementById("boton")
    var mensaje = document.getElementById("mensaje")
    var cont = document.getElementById("warnings")
    
    let warning = ""
    let emailv = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/
    let entrada = false

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