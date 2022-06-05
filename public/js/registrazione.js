function checkName(event){
    const input=event.currentTarget;
    const p=input.parentNode.parentNode.parentNode;
    pattern=/^([a-zA-Z\xE0\xE8\xE9\xF9\xF2\xEC\x27]\s?)+$/;
    span=p.querySelector('span');
    if(!input.value){
        span.textContent="Campo Obbligatorio";
        input.classList.add('error'); 
        span.classList.add('spanvisible');
        span.classList.remove('spanhidden');
        form[0]=0;
    }
    else{
        if (!pattern.test(input.value)){
            span.textContent="Controlla bene il nome";
            input.classList.add('error'); 
            span.classList.add('spanvisible');
            span.classList.remove('spanhidden');
            form[0]=0;
        }
        else{
            input.classList.remove('error');
            span.classList.add('spanhidden');
            span.classList.remove('spanvisible');
            form[0]++;
        }
    }
    checkForm();
}

function checkSurname(event){
    const input=event.currentTarget;
    const p=input.parentNode.parentNode.parentNode;
    span=p.querySelector('span');
    pattern=/^([a-zA-Z\xE0\xE8\xE9\xF9\xF2\xEC\x27]\s?)+$/;
    if(!input.value){
        span.textContent="Campo Obbligatorio";
        input.classList.add('error'); 
        span.classList.add('spanvisible');
        span.classList.remove('spanhidden');
        form[1]=0;
    }
    else{
        if (!pattern.test(input.value)){
            span.textContent="Controlla bene il cognome";
            input.classList.add('error'); 
            span.classList.add('spanvisible');
            span.classList.remove('spanhidden');
            form[1]=0;
        }
        else{
            input.classList.remove('error');
            span.classList.add('spanhidden');
            span.classList.remove('spanvisible');
            form[1]++;
        }
    }
    checkForm();
}

function checkEta(event){
    const input=event.currentTarget;
    const p=input.parentNode.parentNode.parentNode;
    span=p.querySelector('span');
    if(!input.value){
        span.textContent="Campo Obbligatorio";
        input.classList.add('error'); 
        span.classList.add('spanvisible');
        span.classList.remove('spanhidden');
        form[3]=0;
    }
    else{
        if (isNaN(input.value)){
            span.textContent="Deve essere numerica";
            input.classList.add('error'); 
            span.classList.add('spanvisible');
            span.classList.remove('spanhidden');
            form[3]=0;
        }
        else{
            input.classList.remove('error');
            span.classList.add('spanhidden');
            span.classList.remove('spanvisible');
            form[3]++;
        }
    }
    checkForm();
}

function checkUsername(event){
    const username=event.currentTarget;
    p=username.parentNode.parentNode.parentNode;
    span=p.querySelector('span');
    if(!username.value) {
        checkForm();
        span.textContent="Campo Obbligatorio"
        span.classList.add('spanvisible');
        span.classList.remove('spanhidden');
        username.classList.add('error');
        form[2]=0;
    } else {
        fetch("/registrazione/username/"+encodeURIComponent(username.value)).then(FetchResponse).then(jsonCheckUsername);
    } 
}

function FetchResponse(response){
    return response.json();
}

function jsonCheckUsername(json){
    username=document.querySelector('.username input');
    p=username.parentNode.parentNode.parentNode;
    span=p.querySelector('span');
    if(json==true){
        span.textContent="Username già utilizzato";
        span.classList.add('spanvisible');
        span.classList.remove('spanhidden');
        username.classList.add('error');
        form[2]=0;
    }
    else{
        span.classList.add('spanhidden');
        span.classList.remove('spanvisible');
        username.classList.remove('error');
        form[2]++;
    }
    checkForm();
}

function checkEmail(event){
    const email=event.currentTarget;
    p=email.parentNode.parentNode.parentNode;
    span=p.querySelector('span');
    if(!/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(String(email.value).toLowerCase())) {
        checkForm();
        span.textContent="Email non valida";
        span.classList.add('spanvisible');
        span.classList.remove('spanhidden');
        email.classList.add('error');
        form[4]=0;
    } else {
        fetch("/registrazione/email/"+encodeURIComponent(String(email.value).toLowerCase())).then(FetchResponse).then(jsonCheckEmail);
    }
}

function jsonCheckEmail(json){
    const email=document.querySelector('.email input');
    p=email.parentNode.parentNode.parentNode;
    span=p.querySelector('span');
    if(json==true){
        span.textContent="Email già in uso";
        span.classList.add('spanvisible');
        span.classList.remove('spanhidden');
        email.classList.add('error');
        form[4]=0;
    }
    else{
        span.classList.add('spanhidden');
        span.classList.remove('spanvisible');
        email.classList.remove('error');
        form[4]++;
    }
    checkForm();
}

function checkPassword(event){
    const password=event.currentTarget;
    const p=password.parentNode.parentNode.parentNode;
    span=p.querySelector('span');
    const regularPassword  =/^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}$/;
    if(!regularPassword.test(password.value)){
        span.classList.add('spanvisible');
        span.classList.remove('spanhidden');
        password.classList.add('error');
        form[5]=0;
    }
    else{
        span.classList.add('spanhidden');
        span.classList.remove('spanvisible');
        password.classList.remove('error');
        form[5]++;
    }
    checkForm();
}

function checkForm(){
    let vuoti=0;
    for(let input in form){
        if(form[input]==0){
            vuoti++;
        }
    }
    if(vuoti==0){
        submit.disabled=false;
    }
    else{
        submit.disabled=true;
    }
}

document.querySelector('.name input').addEventListener('blur',checkName);
document.querySelector('.surname input').addEventListener('blur',checkSurname);
document.querySelector('.username input').addEventListener('blur',checkUsername);
document.querySelector('.email input').addEventListener('blur',checkEmail);
document.querySelector('.eta input').addEventListener('blur',checkEta);
document.querySelector('.password input').addEventListener('blur',checkPassword);

const submit=document.querySelector('.submit');
submit.disabled=true;

//array usato per vedere se sono stati riempiti tutti i campi o meno
let form=['0','0','0','0','0','0'];

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