"use strict";

const aside = document.getElementById('aside'),
      menu= document.getElementById('menu');

menu.onclick =() => aside.classList.toggle('active');


let comprobacionFecha= localStorage.getItem('fecha_guardada');

if(!comprobacionFecha){
let fecha= new Date();

let fechaFormateada = fecha.toLocaleString();

localStorage.setItem('fecha_guardada', fechaFormateada);

}

let idFecha =document.getElementById('fecha_actual');
idFecha.textContent=localStorage.getItem('fecha_guardada');