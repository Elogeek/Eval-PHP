<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/DB/DB.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Entity/User.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Manager/UserManager.php';


use App\Entity\User;
use App\Manager\UserManager;

header('Content-Type: application/json');

$requestType = $_SERVER['REQUEST_METHOD'];
$manager = new UserManager();

switch($requestType) {
    // Obtention d'informations.
    case 'GET':
        echo getUsers($manager);
        break;
    default:
        break;
}

/**
 * Return the schools list.
 * @param UserManager $manager
 * @return false|string
 */
function getUsers(UserManager $manager): string {
    $response = [];
    // Obtention des students.
    $data = $manager->getUsers();
    foreach($data as $user) {
        /* @var user $user */
        $response[] = [
            'id' => $user->getEmail(),
        ];
    }
    return json_encode($response);
}