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

// Connect in Ajax
if ($("#btnConnect")) {
    $("#windowConnect").click(function () {
        $.ajax({
            'type': 'POST',
            'url': '../assets/php/connect.php',
            'data': {
                'email': $("#emailConnect").val(),
                'password': $("#passwordConnect").val()
            },
            'success': function (data) {
                if(data === "success"){
                    window.location.href = "tchat.php?success=0";
                }
                if (data === "error=0"){
                    window.location.href = "index.php?error=0";
                }
                if (data === "error=2") {
                    window.location.href = "index.php?error=2";
                }
                if (data === "error=1"){
                    window.location.href = "index.php?error=1";
                }
            }
        });
    });
}

// sign in Ajax
if ($("#btnSing")) {
    $("#singWindow").click(function () {
        $.ajax({
            'type': 'POST',
            'url': '../assets/php/sign.php',
            'data': {
                'password': $("#passwordSign").val(),
                'email': $("#emailSign").val()
            },
            'success': function (data) {
                if(data === "success") {
                    window.location.href = "index.php?success=0";
                }
                if (data === "error=0") {
                    window.location.href = "index.php?error=0";
                }
                if (data === "error=1") {
                    window.location.href = "index.php?error=1";
                }
                if (data === "error=2") {
                    window.location.href = "index.php?error=2";
                }
            }
        });
    });
}

//deco in Ajax
//voir deco.php



