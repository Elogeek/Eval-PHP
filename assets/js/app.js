const sendMessage = document.getElementById("send");
const chatMessage = document.getElementById("message");
const input = document.getElementById("sendMessageInput");
let sendStatue = false;

function loadMessage(){
    let xhr = new XMLHttpRequest();
    xhr.onload = function() {
        const messages = JSON.parse(xhr.responseText);
        chatMessage.innerHTML = "";
        for (let message of messages) {
            chatMessage.innerHTML += `
            <div class="message_content">
                <div>
                    ${message.user}  => ${message.message}
                </div>
                <div class="date">
                    ${message.date}
                </div>
            </div>
        `
        }
    }
    xhr.open('GET', '/api/message');
    xhr.send();

}

function timeOutRecur(){
    setTimeout(function() {
        loadMessage();
        timeOutRecur();
    },1000);
}

function getSessionUser(message) {
    if(message.length > 0) {
        console.log("ok");
        getUser(message).then();
    }

}

function getUser(message) {
    let xhr = new XMLHttpRequest();
    return new Promise(() => {
        xhr.onreadystatechange = (e) => {
            if (xhr.status === 200) {
                let user = JSON.parse(xhr.responseText)
                sendMessageContent(message, user["user"]);
            }
        };
        xhr.open('GET', '/api/Message?getUser=1');
        xhr.send();
    });
}

function sendMessageContent(message,user) {
    let xhr = new XMLHttpRequest();
    const messageData = {
        'user': user,
        'message': message,
    };

    xhr.open('POST', '/api/message');
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.send(JSON.stringify(messageData));
}

sendMessage.addEventListener("click", function(e){
    e.preventDefault();
    const inputValue = input.value;
    getSessionUser(inputValue);
})


timeOutRecur();