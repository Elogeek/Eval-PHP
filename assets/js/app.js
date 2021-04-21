/**
 * Sending message
 */
let sendMessageButton = document.getElementById('sendMessage');
sendMessageButton.addEventListener('click', function(e) {
    e.preventDefault();
    const xhr = new XMLHttpRequest();
    xhr.onload = function () {
        // On vérifie si un message d'erreur est prsent.
        if(xhr.responseText) {
            const error = JSON.parse(xhr.responseText);
            alert(error);
        }

    };

    const data = {
        'message': document.querySelector('#messageToSend').value
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
        const messages = JSON.parse(xhr.responseText);
        const messagesAll = document.querySelector('.message');
        messagesAll.innerHTML = '';

        for(let message of messages) {
            messagesAll.innerHTML += `
                <div class="messages-wrapper" >
                    <i class="fas fa-comment"></i>
                    <p id="pEmail" > ${message.user}</p>
                    <p class="contentMessage" style="color: #ffc19d"> a dit : " ${message.content} "</p>
                    <p id="pDate"> ${message.date}</p>  
                </div>
            `
        }
    };

    // La récupération se fait en get
    xhr.open('GET', '/api/message');
    xhr.send();

    // Load messages at 5 second intervals
    setTimeout( getMessages, 5000);
}

getMessages();

//modal sing in and sign up ===> thanks JQuery multiple modal++++
$('#modal-1').modal({
    closeExisting: false
});
