<?php
require_once "Include.php";
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Eval tchat</title>
</head>
<body>
<!--header-->
<div class="menu">
    <img src="assets/img/logo.png" alt="logoSite" id="logo">
    <div id="menuContainer">

        <a href="#" class="text" id="user-add-button">S'inscrire</a>
        <form class="fromConnect" method="post">
            <label for="email"></label>
            <input type="text" placeholder="email" required>
            <input type="text" placeholder="password" required>
            <button type="submit" class="user_add_button">OK !</button>
        </form>

        <a href="#" class="text">Se connecter</a>
        <form class="fromConnect" method="post">
            <label for="email">mon label</label>
            <input type="text" placeholder="email" required>
            <input type="text" placeholder="password" required>
            <button type="submit" class="user_add_button">OK !</button>
        </form>
    </div>
    <div class="fondContainer">
        <img src="assets/img/fond.png" alt="background-Container" id="background-menu">
    </div>
</div>

<div id="tchat">
    <!--Users listes-->
    <div id="users">
        <button id="users-list" class="btn btn-rounded btn-primary">Liste des utilisateurs</button>
        <table style="display: none" id="user-list-content" class="table">
            <thead>
            <tr>
                <th>Email</th>

            </tr>
            </thead>

        </table>
        <div style="display: none" id="user-content">

        </div>
    </div>

    <!--ALL TCHAT here-->
    <form method="POST" action="">

        <div id="message">
            <label for="message">
                <textarea name="message" id="message" placeholder="Message" maxlength="500"></textarea><br>
            </label>
        </div>
        <input type="submit" name="submit" value="Envoyez votre message !" id="send" />
    </form>

</div>


