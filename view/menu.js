// despliegue de menu derecha

var menuBtn = document.getElementById("menuBtn")
var sideNav = document.getElementById("sideNav")
var menu = document.getElementById("menu")

sideNav.style.right = "-250px"

menuBtn.onclick = function(){
    if(sideNav.style.right == "-250px"){
        sideNav.style.right = "0"
        menu.src = "img/close.png"
    }
    else{
        sideNav.style.right = "-250px"
        menu.src = "img/menu.png"
    }
}

//observer

const img0 = document.getElementById("imagen0");
const img1 = document.getElementById("imagen1");
const img2 = document.getElementById("imagen2")
const img3 = document.getElementById("imagen3")
const img4 = document.getElementById("imagen4")

const LoadImage = (entradas, observador) => { 

    entradas.forEach((entrada) => {
        if(entrada.isIntersecting){
            entrada.target.classList.add("visible")
        }

       /* cuando ya no sea visible 
       else{
            entrada.target.classList.remove("visible")
        }
        */
       
    });
}

const observador = new IntersectionObserver(LoadImage, {
    root: null, 
    rootMargin: "0px 0px 0px 0px",
    threshold: 1.0
});

observador.observe(img0);
observador.observe(img1); 
observador.observe(img2);
observador.observe(img3); 
observador.observe(img4); 