var fecha = document.getElementById("fecha");
var auxiliar = document.getElementById("auxiliar");
var opciones = document.getElementById("horario");
const horario = ["6","7","8","9","10","11","12","13","14","15","16","17","18"]


function obetenerfecha() {
    if(!fecha.value){
        fecha.style.borderBottom = "1px solid red"
    }else{
        fecha.style.borderBottom = "1px solid black"
    }
    if (!auxiliar.value) {
        fecha.style.border = "1px solid red"
    }
    if(fecha.value && auxiliar.value){
        var XHR = new XMLHttpRequest();
        XHR.open("POST", "../controller/assets/reserva.php", true);
        XHR.setRequestHeader("content-type","application/x-www-form-urlencoded");
        XHR.send("Auxiliar=" + auxiliar.value + "&Fecha=" + fecha.value);
        XHR.onreadystatechange = function(){
            if(XHR.readyState == XMLHttpRequest.DONE){
                var data = JSON.parse(XHR.responseText);

                var arreglo1 = [...horario.map((d) => Math.round(d))];
                var arreglo2 = [...data.map((d) => Math.round(d))]; //Math round redondea y el map hace un reccorrido de la matriz
                var resultado = [];

                for (const e of arreglo1) { // sentencia for..of; https://developer.mozilla.org/es/docs/Web/JavaScript/Reference/Statements/for...of
                    if (arreglo2.indexOf(e) == -1) {
                        resultado.push(e);
                    }
                }

                function listar() {
                    opciones.innerHTML = "" //vacio las opciones antes de rellenarlas
                    opciones.style.visibility = "visible"
                    resultado.forEach(element => {
                        if (element >= 12) {
                            opciones.innerHTML += "<option value="+element+">"+element+" pm </option>";
                        }
                        else{
                            opciones.innerHTML += "<option value="+element+">"+element+" am </option>";
                        }
                    });
                }

                listar()
         
            }

        }
    }
}
