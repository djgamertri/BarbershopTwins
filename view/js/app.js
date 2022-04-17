var btn = document.getElementById("btn");
var nav = document.getElementById("nav");
var content = document.getElementById("content");
var header = document.getElementById("header");
var user = document.getElementById("user");
var dark = document.getElementById("dark");
var body = document.querySelector("body");


//navegacion

btn.onclick = function(){
    if(nav.style.left == "0px"){
        nav.style.left = "-345px"
        content.style.marginLeft = "0px";
    }
    else{
        nav.style.left = "0px"
        content.style.marginLeft = "345px";
    }
}

//dark mode

load();

dark.onclick = function(){
    body.classList.toggle("dark");
    store(body.classList.contains("dark"));
}
function load(){
    const darkmode = localStorage.getItem("dark");

    if(!darkmode){
        store("false");
    }else if(darkmode == "true"){
        body.classList.add("dark");
    }
}
function store(value){
    localStorage.setItem("dark",value);
}

//loader 

window.onload = function(){
    var content = document.getElementById("c_loader");
    content.style.visibility = "hidden";
    content.style.opacity = "0";
}