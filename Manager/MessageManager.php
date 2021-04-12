<?php
namespace App\Manager;
use App\Entity\Message;
require_once "Include.php";
class MessageManager
{
    /** Return message based id
     * @param int $id
     * @return Message
     */

    public function getMessage(int $id): Message {

    $request = DB::getInstance()->prepare("SELECT * FROM messages WHERE id=:id");
    $request->bindValue(':id', $id);
    $request->execute();
    $message_data = $request->fetch();
    $message = new Message();
    if ($message_data) {
        $message->setId($message_data['id']);
        $message->setDate($message_data['date']);
        $message->setUserFk($message_data['user_fk']);
        $message->setContent($message_data['content']);
    }
    return $message;

    }

    /** Return a message list
     * @return array
     */
    public function getMessages(): array {
    $messages = [];
    $request = DB::getInstance()->prepare("SELECT * FROM messages");
    $request->execute();
    $messages_response = $request->fetchAll();

    if ($messages_response) {
        foreach ($messages_response as $data) {
        $messages[] = new Message($data['id'], $data['date'], $data['user_fk'], $data['content']);
        }
    }

    return $messages;
    }

    /** Edit a message (spelling mistake,....)
     * @param string $date
     * @param int $id
     * @return array
     */

    public function editMessage(string $date, int $id) : array {
        $mess = [];
        $request = DB::getInstance()->prepare("UPDATE messages SET date = :date WHERE id = :id");
        $request->execute();
        $messageGood = $request->fetchAll();

        if ($messageGood) {
            foreach ($messageGood as $data) {
                $mess[] = new Message($data['id'], $data['date'], $data['user_fk'], $data['content']);
            }
        }
        return $mess;
    }


    /** Delete  a message based user_fk
     *(if the user is no longer there, then we delete the messages he wrote)
     */
    public function deleteMessage(int $user_fk): bool {

        $request = DB::getInstance()->prepare("DELETE FROM messages WHERE user_fk = :user_fk");
        $request->bindParam(':user_fk', $user_fk);
        $request->execute();
        if ($request->execute() !== false) {
            echo "les messages de cet utilisateur ne sont plus disponibles";
        }
        return $this->deleteMessage($user_fk);
    }

}