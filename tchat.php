<?php
require_once "include.php";

session_start();

if (isset($_SESSION['email']) && isset($_SESSION['password'])) {
    $_SESSION['email'] = $_POST['email'];

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
        <h1>Mon tchat</h1>
        <h2>Vous êtes connecté(e), en tant que <?php echo $_SESSION['email'];?> </h2>
        <img src="assets/img/logo.png" alt="logoSite" id="logo">
    </div>

    <div id="tchat">

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
