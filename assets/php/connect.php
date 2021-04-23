<?php
use App\DB;
use PDO;

include "include.php";

if (isset($_POST['email']) && isset($_POST['password'])) {

    $email = \DB::secureData($_POST['email']);
    $password = \DB::secureData(($_POST['password']));

    // get the name of the user
    $stmt = \DB::getInstance()->prepare("SELECT * FROM user WHERE email = '$email'");
    $stmt->execute();
    foreach ($stmt->fetchAll() as $user) {
        // check that the encrypted password on my database
        // that i recovered with '$user['password']' matches the password entered by the user
        if (password_verify($password, $user['password'])) {
            //If the two passwords match, then the user can connect so (===> store user data in a session.)
            session_start();
            $_SESSION['id'] = $user['id'];
            $_SESSION['password'] = $password;
            $_SESSION['email'] = $email;

            echo "success";
            exit();
        } /*else {
            echo "error=0";
            exit();
        }*/
    }
} /*else {
    echo "error=1";
    exit();
}*/
