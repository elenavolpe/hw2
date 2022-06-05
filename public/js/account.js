function load_scheda(){
    fetch("/account_load").then(OnResponseAccount).then(OnJsonAccount);
}

function OnResponseAccount(response){
    return response.json();
}

function OnJsonAccount(json){
    for(let i=0;i<json.length;i++){
        const day=document.querySelector("#" + json[i].giorno);

        const corso=document.createElement('div');
        corso.classList.add('corso');

        const nome=document.createElement('span');
        nome.textContent=json[i].nome;

        const orario=document.createElement('span');
        orario.textContent=json[i].ora;

        corso.appendChild(nome);
        corso.appendChild(orario);
        day.appendChild(corso);
    }
}

load_scheda();

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