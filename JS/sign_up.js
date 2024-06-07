'use strict';

function testAuthentification() {
  
}

// Fonction qui vérifie si les champs du formulaire sont bien remplis
function checkForm() {
    let form = document.forms['sign_up'];
    let inputs = form.getElementsByTagName('input');
    let error = false;

    for (let i = 0; i < inputs.length; i++) {
        if (inputs[i].value === '') {
            error = true;
            inputs[i].style.borderColor = 'red';
        } else {
            inputs[i].style.borderColor = 'initial';
        }
    }

    if (error) {
        alert('Veuillez remplir tous les champs');
    } else {
        form.submit();
    }
}

// Fonction confirmInscription qui envoie une requête AJAX avec les données du formulaire en format JSON no need alerts
function confirmInscription() {

    checkForm();

    let form = document.forms['sign_up'];
    let inputs = form.getElementsByTagName('input');
    let data = {};

    for (let i = 0; i < inputs.length; i++) {
        data[inputs[i].name] = inputs[i].value;
    }
    // requête AJAx
    ajaxRequest('POST', 'PHP/vues/request.php/signing_up', function (response) {
        console.log(response);
    }, JSON.stringify(data));
}

