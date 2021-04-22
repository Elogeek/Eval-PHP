<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/DB/DB.php";
use PDO;
use App\DB;

include "include.php";

if(isset($_POST['email']) && isset($_POST['password']) ) {

    $email = \DB::secureData($_POST['email']);
    $password =\DB::secureData(($_POST['password']));

    // I get the name of the user
    $stmt = \DB::getInstance()->prepare("SELECT * FROM user WHERE email = '$email'");
    $stmt->execute();
    foreach ($stmt->fetchAll() as $user) {
        // I check that the password encrypted on my database that I retrieved using the '$ user [' password ']' loop corresponds to the password entered by the user
        if (password_verify($password, $user['password'])) {
            //If the two passwords match then logon and we store user data in a session.
            session_start();
            $_SESSION['id'] = $user['id'];
            $_SESSION['password'] = $password;
            $_SESSION['email'] = $email;

            echo "success";
            exit();
        } else {
            echo "error=0";
            exit();
        }
    }
} else {
    echo "error=1";
    exit();
}
