<?php
require_once "Include.php";
//if user 's email is already existing it is ok, if not, it is sent back to the home page to create a new one by exemple
if(!empty($_POST)&&($_POST['pseudo']) && !empty($_POST['pseudo'])) {
    session_start();
    $_SESSION["pseudo"] ===[$_POST['pseudo']];
    header("location:tchat.php");
}



?>

<!--ALL TCHAT here-->
<form method="POST" action="index.php">
    Email :
    <label for="pseudo">
        <input type="text" name="pseudo" id="pseudo"/><br>
    </label>
    Message :
    <label for="message">
        <textarea name="message" id="message"></textarea><br>
    </label>
    <input type="submit" name="submit" value="Envoyez votre message !" id="envoi" />
</form>

