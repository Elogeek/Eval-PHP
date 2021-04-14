<?php

session_start();

require_once $_SERVER['DOCUMENT_ROOT'] . '/DB/DB.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Entity/Message.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Manager/MessageManager.php';

require_once $_SERVER['DOCUMENT_ROOT'] . '/Entity/User.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Manager/UserManager.php';

use App\Entity\Message;
use App\Manager\MessageManager;
use App\Entity\User;
use App\Manager\UserManager;

header('Content-Type: application/json');

$requestType = $_SERVER['REQUEST_METHOD'];
$managerMessage = new MessageManager();
$userManager = new UserManager();

switch($requestType) {
    case 'GET':
        if(isset($_GET["getUser"]) && $_GET["getUser"] === "1"){
            echo sendUserSession();
        }
        else {
            echo getMessages($managerMessage, $userManager);
        }
        break;
    case 'POST':
        $data = json_decode(file_get_contents('php://input'));
        sendMessage($managerMessage,$data->user,$data->message);
        break;
    default:
        break;
}

/**
 * @param MessageManager $managerMessage
 * @param UserManager $managerUser
 * @return string
 */
function getMessages(MessageManager $managerMessage, UserManager $userManager): string {
    $response = [];
    // Obtention des messages.
    $data = $managerMessage->getMessages();
    foreach($data as $message) {
        /* @var Message $message*/
        $response[] = [
            'id' => $message->getId(),
            'date' => $message->getDate(),
            'user_fk' => $message->getUserFk(),
            'content' =>$message->getContent(),
        ];
    }
    // Envoi de la réponse ( en format json ).
    return json_encode($response);
}

function sendMessage(MessageManager $managerMessage, int $id, string $message) {
    $managerMessage->sendMessages($message, $id);
}

function sendUserSession(){
    return json_encode(["user" => $_SESSION["user"]]);
}

exit;