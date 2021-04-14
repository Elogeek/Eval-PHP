<?php
require_once "Include.php";
//if user 's email is already existing it is ok, if not, it is sent back to the home page to create a new one by exemple
if(isset($_POST['email'])) {
    session_start();
    $_SESSION["email"] = $_POST['email'];
    header("location:index.php");
}

//connect ==== btn connect barrer/ grisé
//noconnect ==== btn connect activé


?>
<div id="tchat">

    <!--ALL TCHAT here-->
    <form method="POST" action="index.php">
        Message :
        <div id="message">
            <label for="message">
                <textarea name="message" id="message"></textarea><br>
            </label>
        </div>
        <input type="submit" name="submit" value="Envoyez votre message !" id="send" />
    </form>

</div>


