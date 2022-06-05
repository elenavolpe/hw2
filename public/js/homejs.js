//genera l'esercizio corrispondente al numero
function GenerateExcercise(event){
    event.preventDefault();
    //eseguo il fetch
    fetch("/generate_exercise").then(onResponseExercise).then(onJsonExercise);
}

function onResponseExercise(response){
    return response.json();
}

function onJsonExercise(json){
    const gallery=document.querySelector('#gallery-view');
    gallery.innerHTML=''; //svuoto prima la galleria
    const random_number= Math.floor( Math.random()*(json.results.length));
    const source=json.results[random_number].image;
    const img=document.createElement('img');
    img.src=source;
    img.classList.add('gallery_img');
    gallery.appendChild(img);
}

//genera la canzone cercata
function SearchMusic(event){
    event.preventDefault();
    //prelevo l'input
    const titolo=form2.querySelector('#canzone').value;
    fetch("/spotify_track/" + encodeURIComponent(titolo)).then(onResponseMusic).then(onJsonMusic);
}

function onResponseMusic(response){
    return response.json();
}

function onJsonMusic(json){
    const playlist=document.querySelector("#music-view");
    playlist.innerHTML=''; //lo svuoto se c'è già qualcosa
    let results=json.tracks.total;

    if(results>3){
        results=3;
    }

    for(let i=0; i<results ; i++){
        const result=json.tracks.items[i];
        const title=result.name;
        const albumName=result.album.name;
        const artista=result.artists[0].name;
        const img_album=result.album.images[0].url;

        const track=document.createElement('div');
        track.classList.add('track');
        const titolo=document.createElement('span');
        titolo.textContent=title;
        const cantante=document.createElement('span');
        cantante.textContent=artista;
        const nome_album=document.createElement('span');
        nome_album.textContent=albumName;

        const player=document.createElement('iframe');
        player.src = "https://open.spotify.com/embed/track/"+result.id;
        player.setAttribute('allowtransparency', 'true');
        player.allow = "encrypted-media";
        player.classList = "player";

        track.appendChild(titolo);
        track.appendChild(cantante);
        track.appendChild(nome_album);
        track.appendChild(player);
        playlist.appendChild(track);
    }
}

//aggiungo gli event listener ai submit
const button=document.querySelector('#Exercise');
button.addEventListener('click',GenerateExcercise);

const form2=document.querySelector('#form2');
form2.addEventListener('submit',SearchMusic);

function load_preferiti(){
    fetch("/load_preferiti").then(OnResponsePreferiti).then(OnJsonPreferiti);
}

function OnResponsePreferiti(response){
    return response.json();
}

function OnJsonPreferiti(json){
    const gallery=document.querySelector('#preferiti');
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

        const like=document.createElement('img');
        like.src="images/like_no.svg";
        like.classList.add('bottone');

        const num_like=document.createElement('span');
        num_like.textContent=json[i].num_likes;

        block.appendChild(titolo);

        description.appendChild(descrizione);
        description.appendChild(img);
        block.appendChild(description);

        orario.appendChild(giorno);
        orario.appendChild(ora);
        block.appendChild(orario);

        buttons.appendChild(like);
        buttons.appendChild(num_like);
        block.appendChild(buttons);

        gallery.appendChild(block);
    }
}

load_preferiti();
load_comments();

//forum
function AppendComment(event){ 
    event.preventDefault();
    const commento=forum.querySelector('#commento').value;
    fetch("/carica_commento/" + encodeURIComponent(commento)).then(onResponseComments).then(onJsonAppendComment);
}

function onJsonAppendComment(json){ 
    span=document.querySelector('#forumspan');
    if(json==false){
        span.classList.add('spanvisible');
        span.classList.remove('spanhidden');
    }
    else{
        span.classList.add('spanhidden');
        span.classList.remove('spanvisible');
        load_comments();
    }
}

function load_comments(){
    fetch("/load_comments").then(onResponseComments).then(onJsonComments);
}

function onResponseComments(response){
    return response.json();
}

function onJsonComments(json){
    commenti=document.querySelector('#commenti');
    commenti.innerHTML='';
    for(let i=0;i<json.length;i++)
    {
        box=document.createElement('div');
        box.classList.add('divcommento');
        nome=document.createElement('span');
        nome.textContent="@" + json[i].utente + ": ";
        nome.classList.add('nomecommento');
        commento=document.createElement('span');
        commento.textContent=json[i].commento;

        box.appendChild(nome);
        box.appendChild(commento);
        commenti.appendChild(box);
    }
}
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

const forum=document.querySelector('#formforum');
forum.addEventListener('submit',AppendComment);
//MENU TENDINA
const menu=document.querySelector('#menu');
menu.addEventListener('click',ApriMenuTendina);
