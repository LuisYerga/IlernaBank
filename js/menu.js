"use strict";

const aside = document.getElementById('aside'),
      menu= document.getElementById('menu');

menu.onclick =() => aside.classList.toggle('active');

const editar = document.getElementById('editarPerfil'),
      mostrar=document.getElementById('mostrarPerfil'),
      pincel1= document.getElementById('pincel1'),
      pincel2=document.getElementById('pincel2');


pincel1.onclick = () => {
  editar.classList.toggle('active');
  if (!mostrar.classList.contains('active')) {
    mostrar.classList.add('active');
  }
};

pincel2.onclick = () => {
  mostrar.classList.toggle('active');
  if (!editar.classList.contains('active')) {
    editar.classList.add('active');
  }
};
