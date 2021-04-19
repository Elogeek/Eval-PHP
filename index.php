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

        <a href="#" class="userAddBtn">S'inscrire</a>
        <div class="connect">
            <input type="email" placeholder="email" required>
            <input type="password" placeholder="password" required>
            <button type="submit" class="userAddBtn">OK !</button>
        </div>

        <a href="#" class="text">Se connecter</a>
        <div class="connect">
            <input type="email" placeholder="email" required>
            <input type="password" placeholder="password" required>
            <button type="submit" class="">OK !</button>
        </div
    </div>
    <div class="BackContainer">
        <img src="assets/img/back.png" alt="background-Container" id="background-menu">

    </div>

</div>

<div id="tchat">

    <!--Users listes-->
    <div id="users">
        <button id="usersList" class="btn btn-rounded btn-primary">Liste des utilisateurs</button>
        <!--list users tchat-->
        <div>
            <table>
                <tbody id="#usersListContent">

                </tbody>
            </table>
        </div>
    </div>

    <!--ALL TCHAT here-->
    <form method="POST" action="">

        <div id="message">
            <label for="message">
                <textarea name="message" id="message" placeholder="Message" maxlength="500"></textarea><br>
            </label>
            <!--display messages chat here-->
            <div class="message"></div>

        </div>
        <input type="submit" name="submit" value="Envoyez votre message !" id="send" />
    </form>

</div>


