/*
 * Welcome to your app's main JavaScript file!
 *
 * This file will be included onto the page via the importmap() Twig function,
 * which should already be in your base.html.twig.
 */

import './styles/app.css';

const send = document.getElementById('send');
const toastBootstrap = bootstrap.Toast.getOrCreateInstance(document.getElementById('liveToast'))
send.addEventListener('click', (e) =>{
    e.preventDefault();
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    if(name && email){
        const regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        regexEmail.test(email) && register(name, email);
        !regexEmail.test(email) && displayToast('❌ Veuillez saisir une adresse email valide !');
    } else {
        displayToast('❌ Veuillez remplir tous les champs!');
    }
});

const displayToast = (message) => {
    const toastBody = document.getElementById('toast-body');
    toastBody.innerHTML = message;
    toastBootstrap.show();
}

const register = (name, email) => {
    const data = {name, email};
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'http://localhost:4000/register', true);
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.onreadystatechange = () => {
        if(xhr.readyState === 4 && xhr.status === 201){
            const data = JSON.parse(xhr.responseText);
            console.log(data);
            const message = `<strong> ✅ ${data.message}</strong> <br> <p> Merci de t'être inscrit ${data.data.name}👏. Email utilisé ${data.data.email} </p>`;
            displayToast(message);
        }else{
            displayToast('❌ Une erreur est survenue, veuillez réessayer ultérieurement!');
        }
    }
    xhr.send(JSON.stringify(data));
}

