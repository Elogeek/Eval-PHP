<?php

use App\DB;
use PDO;

require_once "include.php";

if (isset($_POST["pseudo"], $_POST["password"], $_POST["email"])) {

    $password = DB::secureData($_POST["password"]);
    $email = trim($_POST["email"]);

    $passwordUser = password_hash($password, PASSWORD_BCRYPT);

    $request = DB::getInstance()->prepare("SELECT * FROM user WHERE email = :email");
    $state = $request->execute();

    if ($state) {
        foreach ($request->fetchAll() as $user) {
            $mailUser = $user['email'];
            if ($mailUser === $email) {
                echo "error=0";
            }
        }
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $majuscule = preg_match('@[A-Z]@', $password);
            $minuscule = preg_match('@[a-z]@', $password);
            $number = preg_match('@[0-9]@', $password);

            if ($majuscule && $minuscule && $number && strlen($password) < 5) {
                $sql = "INSERT INTO user VALUES (NULL,$email, $passwordUser)";

                $request->exec($sql);
                echo "success";
            }

        } else {
            echo "error=2";
        }
    }
} else {
    echo "error=0";
}