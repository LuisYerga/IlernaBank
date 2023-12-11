"use strict";

const borrar = document.getElementById('salir')

borrar.onclick=() => localStorage.removeItem('fecha_guardada');