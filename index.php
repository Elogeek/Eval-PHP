<?php
require_once "Include.php";
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/e3ddf954eb.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Eval tchat</title>
</head>
<body>

<div id="container">
    <!--header-->
    <div class="menu">

        <img src="assets/img/logo.png" alt="logoSite" id="logo">

        <div id="menuContainer">

            <a href="#" class="userAddBtn">S'inscrire</a>
            <div class="windowConnect">
                <input type="email" placeholder=" email" required>
                <input type= "password" placeholder=" password" required>
                <button type="submit" id="closeWindow"> Valider ! </button>;
            </div>

            <a href="#" class="text">Se connecter</a>
            <div class="connect">
                <input type="email" placeholder=" email" required>
                <input type="password" placeholder=" password" required>
                <button type="submit"> Ok! </button>
            </div

        </div>

    </div>

    <div id="tchat">

        <!--Users listes
        <div id="users">
            <button id="usersList" class="btn btn-rounded btn-primary">Liste des utilisateurs</button>
            list users tchat
            <div>
                <table>
                    <tbody id="#usersListContent"></tbody>
                </table>
            </div>
        </div>
          -->

        <!--ALL TCHAT here-->
        <form method="POST" action="">
            <div id="message">
                <textarea name="message" id="messageToSend" placeholder=" Tapez votre message ici ! " maxlength="500"></textarea>
                <input type="submit" name="submit" value="Envoyez votre message !" id="sendMessage" />
            </div>
        </form>
        <!--display messages chat here-->
        <div class="message">
            <!--<i class="fas fa-comment-alt"></i> back one message-->
        </div>
    </div>

</div>
<script src="assets/js/app.js"></script>
</body>
</html>