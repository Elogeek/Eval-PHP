const form = document.querySelector('#userAddBtn');
const submitButton = form.querySelector('button[type="submit"]');


/**
 * Ajout d'un student en base de données.
 */
form.addEventListener('click', function() {
    form.parentElement.style.display = 'block';
});

// Sending form.
submitButton.addEventListener('click', function(e) {
    e.preventDefault();
    const email = form.querySelector('input[name="email"]').value;
    const password = form.querySelector('input[name="password"]').value;


    if(!email || !password) {
        alert("Vous devez compléter le formulaire avant d'envoyer un message !");
    }
    else {
        let xhr = new XMLHttpRequest();
        xhr.onload = function () {
            const response = JSON.parse(xhr.responseText);
            if(response.hasOwnProperty('error') && response.hasOwnProperty('message')){
                const div = document.createElement('div');
                div.classList.add('alert', `alert-${response.error}`);
                div.setAttribute('role', 'alert');
                div.innerHTML = response.message;
                document.body.appendChild(div);
            }
        }

        const userData = {
            'email':email,
            'password': password
        };

        xhr.open('POST', '/api/user');
        xhr.setRequestHeader('Content-Type', 'application/json');
        xhr.send(JSON.stringify(userData));
    }
});


/**
 * Récupération de la liste des utilisateurs au click du bouton.
 */
let userListButton = document.getElementById('users-list');
userListButton.addEventListener('click', function() {
    let xhr = new XMLHttpRequest();
    xhr.onload = function () {
        const users = JSON.parse(xhr.responseText);
        const table = document.querySelector('#usersListContent');
        table.innerHTML = '';

        for (let user of users) {
            table.innerHTML += `
                <tr>
                    <td>${user.email}</td>
                    <td> <!--enveloppe message ===message privée-->
                </tr>
            `;
        }

        table.parentElement.style.display = 'table';
    };

        xhr.open('GET', '/api/user');
        xhr.send();
});*/


/**
 * Sending message
 */
let sendMessageButton = document.getElementById('sendButton');
sendMessageButton.addEventListener('click', function(e) {
    e.preventDefault();
    const xhr = new XMLHttpRequest();
    xhr.onload = function () {
        // Fonction appelée quand tout a été envoyé, ou lorsque quelque chose est reçu du serveur
        // TODO affiche un message d'erreur si le messae n'a pas été envoyé
        // voir live sur api, essaie sans copier coller

        $.ajax({
            url : `index.php`,
            type : `POST`,
            datatype : `html`,
            success : function(code_html, statut) {
                console.log(statut);
            },
            error : function(result, statut, erreur) {
                console.log(statut, erreur)
            }
        })
    };

    const data = {
        'message': document.querySelector('#sendButton').value
    }

    xhr.open('POST', '/api/message');
    xhr.send(JSON.stringify(data));
});


/**
 *  all messages enter in DB by registered users
 */
function getMessages() {
    const xhr = new XMLHttpRequest();
    xhr.onload = function () {
        // Fonction appelée quand tout est reçu.
        // TODO afficher les messages dans le bon élément html
        const messages = JSON.parse(xhr.responseText);
        const messagesAll = document.querySelector('.message');
        // log des messages dans la console pour voir si tu les reçois bien
        console.log(messages);

        for(let message of messages) {
            messagesAll.innerHTML += `
                <p> ${message.user['email']} </p>
               <p>  ${message.date}  </p>  
                <p class="contentMessage"> ${message.content} </p>
            `
        }
        messagesAll.style.display = "flex"
        messagesAll.style.backgroundColor = '#03989e';
        messagesAll.style.color = 'white';

    };

    // La récupération se fait en get
    xhr.open('GET', '/api/message');
    xhr.send();
}

getMessages();


/**
 * Load messages at 5 second intervals
 */
function load(){

    setTimeout( function(){

        let firstId = $('#messages p:first').attr('id'); // retrieving the most recent id

        $.ajax({
            url : "charger.php?id=" + firstId, // pass the most recent id to the upload file
            type : 'GET',
            success : function(html){
                $('.message').prepend(html);
            }
        });

        load();

    }, 5000);

}

load();

