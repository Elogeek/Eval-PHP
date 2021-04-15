<?php
namespace App\Manager;
use App\Entity\Message;
use DB;

require_once "Include.php";
class MessageManager
{
    /**
     * ArticleManager constructor.
     */
    public function __construct(){
        $this->db = DB::getInstance();
    }

    /** Return message based in user_fk ( list message one user)
     * @param int $id
     * @return Message
     */

    public function getMessages(int $id): Message {

    $request = DB::getInstance()->prepare("SELECT * FROM messages WHERE id=:id AND user_fk = :user_fk");
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

    /** Edit a message (spelling mistake,....)
     * @param string $date
     * @param int $id
     * @return array
     */

    public function editMessage(string $date, int $id) : array {
        $mess = [];
        $request = DB::getInstance()->prepare("UPDATE messages SET id = :id WHERE  user_fk = :user_fk");
        $request->execute();
        $messageGood = $request->fetchAll();

        if ($messageGood) {
            foreach ($messageGood as $data) {
                $mess[] = new Message($data['id'], $data['date'], $data['user_fk'], $data['content']);
            }
        }
        return $mess;
    }

    /** Send a message
     * @param string $messageContent
     * @param int $id
     */
    public function sendMessages(string $messageContent, int $id)
    {
        $message = new Message();
        $message->setContent($messageContent);
        $conn = $this->db->prepare("INSERT INTO messages (id,date,user_fk,content) VALUES (:id,:date,:user_fk,:content)");
        $conn->bindValue(":id", $message->getId());
        $conn->bindValue(":date", $message->getDate());
        $conn->bindValue(":user_fk", $message->getUserFk());
        $conn->bindValue(":content", $message->getContent());
        $conn->bindValue(":date", $message->getDate());
        $conn->execute();
        $this->db->lastInsertId();

    }

}