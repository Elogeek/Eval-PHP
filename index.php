<?php
require_once "include.php";

session_start();

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
        <img src="assets/img/logo.png" alt="logoSite" id="logo">
        <img src="assets/img/back.png" alt="WelcomeCat" id="wlcCat">
    </div>

    <div id="tchat">
        <h3><?= isset($_SESSION['email']) ? 'Vous êtes connecté(e) en tant que ' . $_SESSION['email'] : "Vous n'êtes pas connecté" ?> </h3>


            <div id="message">
                <textarea name="message" id="messageToSend" placeholder=" Tapez votre message ici ! " maxlength="500"></textarea>
                <div class="flex-row">
                    <input type="submit" name="submit" value="Envoyez votre message !" id="sendMessage" />
                    <?php
                    if(!isset($_SESSION['email'])) { ?>
                        <div class="flex-row-end">
                            <!-- Link to open the modal -->
                            <a class="btn" href="#modal-1" rel="modal:open" id="connect">Se connecter</a>
                        </div> <?php
                    } ?>
                </div>

                <?php
                if(!isset($_SESSION['email'])) { ?>
                    <div>
                        <!-- Modal  -->
                        <div id="modal-1" class="modal">
                            <div id="windowConnect">
                                <input type="email" placeholder=" Email"  id="emailConnect"required>
                                <input type="password" placeholder="Password" id="passwordConnect" required>
                            </div>
                            <button type="submit" id="btnConnect"> Me connecter !</button>
                            <a href="#modal-2" rel="modal:open" id="openWdw">Pas encore inscrit?</a>
                        </div>

                        <!--modal2-->
                        <div id="modal-2" class="modal">
                            <div id="singWindow">
                                <input type="email" placeholder=" Email" id="emailSign" required>
                                <input type="password" placeholder="Password" id="passwordSign" required>
                                <button type="submit" id="btnSing"> Valider !</button>
                            </div>
                        </div>
                    </div> <?php
                }
                ?>
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