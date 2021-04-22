<?php
use App\DB;
use PDO;

require_once $_SERVER['DOCUMENT_ROOT'] . "/DB/DB.php";
include "include.php";

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
            $min = preg_match('@[a-z]@', $password);
            $number = preg_match('@[0-9]@', $password);

            if ($min && $number && strlen($password) < 5) {
                $sql = "INSERT INTO user VALUES ($email, $passwordUser)";

               $request->exec($sql);
                echo "success";
            }

        } else {
            echo "error=1";
        }
    }
} else {
    echo "error=2";
}