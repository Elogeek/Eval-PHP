<?php

include $_SERVER['DOCUMENT_ROOT'] . "/include.php";

$data = file_get_contents('php://input');
$data = json_decode($data);

if (isset($data->email) && isset($data->password)) {

    $email = DB::secureData($data->email);
    $password = DB::secureData(($data->password));

    // get the name of the user
    $stmt = DB::getInstance()->prepare("SELECT * FROM user WHERE email = :email");
    $stmt->bindValue(':email', $email);
    $stmt->execute();
    $user_data = $stmt->fetch();
    if($user_data) {
        // check that the encrypted password on my database
        // that i recovered with '$user['password']' matches the password entered by the user
        if (password_verify($password, $user_data['password'])) {
            //If the two passwords match, then the user can connect so (===> store user data in a session.)
            session_start();
            $_SESSION['id'] = $user_data['id'];
            $_SESSION['email'] = $email;

            $response = [
                'result' => 1
            ];
        }
    }
    else {
        $response = [
            'result' => -1
        ];
    }

    echo json_encode($response);
}
exit;
