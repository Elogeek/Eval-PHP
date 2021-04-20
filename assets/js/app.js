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
                    <p> ${message.user_fk} </p>
                    <p> ${message.date}  </p>  
                    <p class="contentMessage"> ${message.content} </p>
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

/**
 * Connect user === click btn s'inscrire
 */
$('#windowConnect').on('shown.bs.modal', function () {
    $('#myInput').trigger('focus')
})

/*déco === click déconnection
 */
$('#windowDeco').on('shown.bs.modal', function () {
    $('#btnDeco').trigger('focus')
})
/** refresh message tchat*/
function refreshMessage($id) {


}