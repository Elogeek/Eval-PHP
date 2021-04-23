<?php

use App\Manager\MessageManager;
use App\DB;
use PDO;

require_once "include.php";

function userDeconnect (MessageManager $manager, $date, $message) :string {
    //à l'aide de la date du dernier message,si l'user est inactive après 5 min === alors la session se termine,
    //l'user est déco
    //il devra se reconnecter s'il veut tchatter
    $request = DB::getinstance()-> prepare("SELECT * FROM messages WHERE date :date");
    $request->bindParam(':date', $date);
    $request->execute();
    if () {
        header('location:index.php');
    }
    return $date;

}

userDeconnect();

