<?php
require_once "Include.php";
session_start();

if (isset($_SESSION['email']) && isset($_SESSION['password'])) {

    $return = "";
    $id = "";

    if (isset($_GET['success'])) {
        $id = "success";
        switch ($_GET['success']) {
            case '0':
                $return = "Vous êtes bien connecté(e) !";
                break;

        }
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/e3ddf954eb.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Eval tchat</title>
</head>
<body>

<div id="container">
    <!--header-->
    <div class="header">
        <img src="assets/img/back.png" alt="WelcomeCat" id="wlcCat">
        <img src="assets/img/logo.png" alt="logoSite" id="logo">

        <div id="widow">
            <!-- Modal  -->
            <div id="modal-1" class="modal">
                <div id="windowConnect">
                    <input type="email" placeholder=" Email" required>
                    <input type="password" placeholder="Password" required>
                    <a href="#modal-2" rel="modal:open" id="openWdw">Pas encore inscrit?</a>
                </div>
                <button type="submit" id="close-wdw"> Me connecter !</button>
                <a href="#" rel="modal:close" class="closeWdw">Fermer</a>
            </div>

            <!-- Link to open the modal -->
            <button type="submit" id="btnOpen"><a href="#modal-1" rel="modal:open">Se connecter</a></button>

                <!--modal2-->
                <div id="modal-2" class="modal">
                    <div id="singUp">
                        <input type="email" placeholder=" Email" required>
                        <input type="password" placeholder="Password" required>
                        <button type="submit" id="btnWdw"> Valider !</button>
                    </div>
                    <div>
                        <a href="#" rel="modal:close" id="close">Fermer</a>
                    </div>
                </div>

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
        </div>-->
        <!--ALL TCHAT here-->
        <div>
            <form method="POST" action="">
                <div id="message">
                    <textarea name="message" id="messageToSend" placeholder=" Tapez votre message ici ! " maxlength="500"></textarea>
                    <input type="submit" name="submit" value="Envoyez votre message !" id="sendMessage" />
                </div>
            </form>
        </div>
        <!--display messages chat here-->
        <div class="message"></div>
    </div>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
<script src="assets/js/app.js"></script>
</body>
</html>