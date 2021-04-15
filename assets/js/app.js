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
        // Les données sont la :-)
        const users = JSON.parse(xhr.responseText);
        const table = document.querySelector('#student-list-content tbody');
        table.innerHTML = '';

        for (let user of users) {
            table.innerHTML += `
                <tr>
                    <td>${user.id}</td>
                    <td>${user.email}</td>
                    
                </tr>
            `;
        }

        table.parentElement.style.display = 'table';
    };

        xhr.open('GET', '/api/user');
        xhr.send();
    });