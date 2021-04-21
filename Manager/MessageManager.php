<?php

namespace App\Manager;

use App\Entity\Message;
use App\Entity\User;
use DB;


class MessageManager
{
    /**
     * Send a message
     * @param string $messageContent
     * @param User $user
     * @return bool
     */
    public function sendMessages(string $messageContent, User $user): bool {
        // Creating a Mysql date.
        $date = new \DateTime();
        $date = $date->format('Y-m-d H:i:s');

        $conn = DB::getInstance()->prepare("INSERT INTO messages (date,user_fk,content) VALUES (:date,:user_fk,:content)");
        $conn->bindValue(":user_fk", $user->getId());
        $conn->bindValue(":content", $messageContent);
        $conn->bindValue(":date", $date);
        return $conn->execute();
    }


    /**
     *
     */
    public function getMessages(): array {
        $conn = DB::getInstance()->prepare("SELECT * FROM messages");
        $conn->execute();
        $messages = [];
        if($data = $conn->fetchAll()) {
            foreach($data as $dmsg) {
                $messages[] = new Message($dmsg['id'], $dmsg['date'], $dmsg['user_fk'], $dmsg['content']);
            }
        }

        return $messages;
    }

}