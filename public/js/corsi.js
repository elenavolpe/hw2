function load_corsi(){
    fetch("/corsi_load").then(OnResponseCorsi).then(OnJsonCorsi);
}

function OnResponseCorsi(response){
    return response.json();
}

function OnJsonCorsi(json){
    const gallery=document.querySelector('#corsi');
    gallery.innerHTML="";
    for(let i=0;i<json.length;i++){
        const block=document.createElement('div');
        block.classList.add('corso');

        const titolo=document.createElement('span');
        titolo.textContent=json[i].nome;
        titolo.classList.add('nome');

        const description=document.createElement('div');
        description.classList.add('description');

        const descrizione=document.createElement('span');
        descrizione.textContent=json[i].descrizione;

        const img=document.createElement('img');
        img.src=json[i].immagine;
        img.classList.add('imgcorso');

        const giorno=document.createElement('span');
        giorno.textContent=json[i].giorno;

        const ora=document.createElement('span');
        ora.textContent=json[i].ora;

        const orario=document.createElement('div');
        orario.classList.add('orario');

        const buttons=document.createElement('div');
        buttons.classList.add('bottonidiv');

        const divlike=document.createElement('div');
        divlike.classList.add('divlike');

        const like=document.createElement('img');
        if(json[i].liked==0){
            like.src="images/like_no.svg";
            like.addEventListener('click',metti_like);
        }
        else{
            like.src="images/like_yes.svg";
            like.addEventListener('click',togli_like);
        }
        like.classList.add('bottone');
        like.classList.add('like');

        const num_like=document.createElement('span');
        num_like.textContent=json[i].num_likes;

        const cart=document.createElement('img');
        if(json[i].added==0){
            cart.src="images/add_no.svg";
            cart.addEventListener('click',aggiungi_scheda);
        }
        else{
            cart.src="images/add_yes.svg";
            cart.addEventListener('click',togli_scheda);
        }
        cart.classList.add('bottone');
        cart.classList.add('cart');

        block.appendChild(titolo);

        description.appendChild(descrizione);
        description.appendChild(img);
        block.appendChild(description);

        orario.appendChild(giorno);
        orario.appendChild(ora);
        block.appendChild(orario);

        divlike.appendChild(like);
        divlike.appendChild(num_like);
        buttons.appendChild(divlike);
        buttons.appendChild(cart);
        block.appendChild(buttons);

        gallery.appendChild(block);
    }
}

function metti_like(event){
    let like=event.currentTarget;
    const box=like.parentNode.parentNode.parentNode;
    const nome=box.querySelector('span.nome').textContent;
    fetch("/comanda_like/" + encodeURIComponent(nome));
    like.src="images/like_yes.svg";
    load_corsi();
}

function togli_like(event){
    let like=event.currentTarget;
    const box=like.parentNode.parentNode.parentNode;
    const nome=box.querySelector('span.nome').textContent;
    fetch("/comanda_like/" + encodeURIComponent(nome));
    like.src="images/like_no.svg";
    load_corsi();
}

function aggiungi_scheda(event){
    let add=event.currentTarget;
    const box=add.parentNode.parentNode;
    const nome=box.querySelector('span.nome').textContent;
    fetch("/aggiungi_corso/" + encodeURIComponent(nome));
    add.src="images/add_yes.svg";
    load_corsi();
}

function togli_scheda(event){
    let add=event.currentTarget;
    const box=add.parentNode.parentNode;
    const nome=box.querySelector('span.nome').textContent;
    fetch("/togli_corso/" + encodeURIComponent(nome));
    add.src="images/add_no.svg";
    load_corsi();
}

load_corsi();

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