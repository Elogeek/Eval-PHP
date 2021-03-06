<?php
session_start();

require_once $_SERVER['DOCUMENT_ROOT'] . '/include.php';

use App\Entity\User;
use App\Manager\MessageManager;
use App\Manager\UserManager;

header('Content-Type: application/json');

$requestType = $_SERVER['REQUEST_METHOD'];
$manager = new MessageManager();
$data = file_get_contents('php://input');
$data = json_decode($data);

switch($requestType) {

    // Obtention des messages.
    case 'GET':
        $userManager = new UserManager();
        $messages = $manager->getMessages();
        $response = [];
        foreach($messages as $message) {
            $user = $userManager->getUser($message->getUserFk());
            if($user->getId()) {
                $response[] = [
                    'id' => $message->getId(),
                    'date' => (new \DateTime($message->getDate()))->format("\L\\e d-m-y à H:i"),
                    'user' => $user->getEmail(),
                    'content' => $message->getContent()
                ];
            }
        }
        echo json_encode($response);
        break;

    // Ajout d'un message.
    case 'POST':
        $user = new User();
        $user->setId($_SESSION['id']);
        $user->setEmail($_SESSION['email']);
        $result = $manager->sendMessages($data->message, $user);
        if(!$result) {
            echo json_encode(["error" => "Erreur d'envoi du message"]);
        }
        break;

    default:
        break;
}

/**
 * Return the user list.
 * @param UserManager $manager
 * @return false|string
 */
function getUsers(UserManager $manager): string {
    $response = [];
    // Obtention des users.
    $data = $manager->getUsers();
    foreach($data as $user) {
        /* @var user $user */
        $response[] = [
            'id' => $user->getEmail(),
        ];
    }
    return json_encode($response);
}