<?php

include $_SERVER['DOCUMENT_ROOT'] . "/include.php";

$data = file_get_contents('php://input');
$data = json_decode($data);

if (isset($data->email) && isset($data->password)) {

    $email = DB::secureData($data->email);
    $password = DB::secureData(($data->password));

    $passwordUser = password_hash($password, PASSWORD_BCRYPT);

    $request = DB::getInstance()->prepare("SELECT COUNT(*) AS count FROM user WHERE email = :email");
    $request->bindValue(':email', $email);
    $state = $request->execute();
    $count = intval($request->fetch()['count']);

    if ($state && $count === 0 && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $majuscule = preg_match('@[A-Z]@', $password);
        $minuscule = preg_match('@[a-z]@', $password);
        $number = preg_match('@[0-9]@', $password);

        if ($majuscule && $minuscule && $number && strlen($password) > 5) {
            $sql = DB::getInstance()->prepare("INSERT INTO user (email, password) VALUES (:email, :password)");
            $sql->bindValue(':email', $email);
            $sql->bindValue(':password', $passwordUser);
            if($sql->execute()) {
                $response = [
                    'message' => "Enregistré avec succès"
                ];
            }
        }
        else {
            $response = [
                'message' => "Le format du mot de passe n'est pas correct !"
            ];
        }
    }
    else {
        $response = [
            'message' => "Erreur, l'adresse email est déjà prise ou n'est pas correcte"
        ];
    }

    echo json_encode($response);
}

exit;