//MENU TENDINA
function ApriMenuTendina(event){
    const menu=document.querySelector('#menu');
    menu.addEventListener('click',ChiudiMenuTendina);
    menu.removeEventListener('click',ApriMenuTendina);
    const menuT=document.querySelector('#menuT');
    menuT.classList.remove('menu-hidden');
    menuT.classList.add('menu-visible');
}

function ChiudiMenuTendina(event){
    const menu=document.querySelector('#menu');
    menu.addEventListener('click',ApriMenuTendina);
    menu.removeEventListener('click',ChiudiMenuTendina);
    const menuT=document.querySelector('#menuT');
    menuT.classList.remove('menu-visible');
    menuT.classList.add('menu-hidden');
}

//MENU TENDINA
const menu=document.querySelector('#menu');
menu.addEventListener('click',ApriMenuTendina);