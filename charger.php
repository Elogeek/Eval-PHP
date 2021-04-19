<?php

if (!empty($_GET['id'] && !empty($_GET['date']))) {
    // check if the id and date are there and not empty
    // retrieving messages with an id greater than the one given
    DB::getInstance()->prepare('SELECT * FROM messages WHERE id > :id ORDER BY id DESC');
    $stm->execute(array("id" => $id()));
    $messages = null;

    //entry of all new messages in a variable
    while ($data = $stm->fetch()) {
        $messages .= "<p id=\"" . $data['id'] . "\">" . $data['date'] . $data['email'] . " dit : " . $data['content'] . "</p>";
    }

    echo $messages;

}
