/**
 * Sending message
 */
let sendMessageButton = document.getElementById('sendMessage');
sendMessageButton.addEventListener('click', function(e) {
    e.preventDefault();
    const xhr = new XMLHttpRequest();
    xhr.onload = function () {
        // On vérifie si un message d'erreur est present.
        if(xhr.responseText) {
            const error = JSON.parse(xhr.responseText);
            alert(error);
        }

    };

    const data = {
        'message': document.querySelector('#messageToSend').value
    }

    xhr.open('POST', '/api/message.php');
    xhr.send(JSON.stringify(data));
});


/**
 *  all messages enter in DB by registered users
 */
function getMessages() {
    const xhr = new XMLHttpRequest();
    xhr.onload = function () {
        // Fonction appelée quand tout est reçu.
        const messages = JSON.parse(xhr.responseText);
        const messagesAll = document.querySelector('.message');
        messagesAll.innerHTML = '';

        for(let message of messages) {
            messagesAll.innerHTML += `
                <div class="messages-wrapper" >
                    <i class="fas fa-comment"></i> <span class="italic bold"> ${message.user}</span>
                    <span class="italic"> ${message.date}</span> 
                    <p class="contentMessage"> ${message.content}</p> 
                </div>
            `
        }
    };

    // La récupération se fait en get
    xhr.open('GET', '/api/message.php');
    xhr.send();

    // Load messages at 5 second intervals
    setTimeout( getMessages, 5000);
}

getMessages();

//modal sing in and sign up ===> thanks JQuery multiple modal :D
const modal = $('#modal-1');
if(modal) {
    modal.modal({
        closeExisting: false
    });
}

// Connect in Ajax
const btnConnect = document.getElementById('btnConnect');
if(btnConnect) {
    btnConnect.addEventListener('click', function () {
        const xhr = new XMLHttpRequest();
        xhr.onload = function () {
            // Fonction appelée quand tout est reçu.
            const response = JSON.parse(xhr.responseText);
            if(response.hasOwnProperty('result')) {
                switch(response.result) {
                    case -1:
                        // Affiche un message d'erreur de connexion dans la fenetre modal de connection.
                        break;
                    case 1:
                        document.getElementById('modal-1').remove();
                        document.querySelectorAll('.jquery-modal').forEach(t => t.remove());
                        document.getElementById('connect').remove();
                        break;
                }
            }
        };

        const data = {
            'email': document.getElementById('emailConnect').value,
            'password': document.getElementById('passwordConnect').value
        };

        // La récupération se fait en get
        xhr.open('POST', '/api/connect.php');
        xhr.send(JSON.stringify(data));
    });
}

// Connect in Ajax
const btnSign = document.getElementById('btnSing');
if(btnSign) {
    btnSign.addEventListener('click', function () {
        const xhr = new XMLHttpRequest();
        xhr.onload = function () {
            // Fonction appelée quand tout est reçu.
            const response = JSON.parse(xhr.responseText);
            console.log(response.message);
        };

        const data = {
            'email': document.getElementById('emailSign').value,
            'password': document.getElementById('passwordSign').value
        };

        // La récupération se fait en get
        xhr.open('POST', '/api/sign.php');
        xhr.send(JSON.stringify(data));
    });
}
