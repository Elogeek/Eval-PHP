<?php

namespace App\Manager;
use App\Entity\User;
use PDO;
use DB;
class UserManager
{
    private UserManager $userManager;

    /**
     * UserManager constructor.
     */
    public function __construct()
    {
        $this->userManager = new UserManager();
    }

    /** Return all user
     * @return array
     */
    public function getUsers(): array
    {
        $users = [];
        $request = DB::getInstance()->prepare("SELECT * FROM user");
        $request->execute();
        $users_response = $request->fetchAll();

        if ($users_response) {
            foreach ($users_response as $data) {
                $users[] = new User($data['id'], $data['email'], $data['password']);
            }
        }

        return $users;
    }

    /**
     * Add a new user into the database
     * @param int $id
     * @param string $email
     * @param string $password
     * @return bool
     */
    public function addUser(int $id, string $email, string $password): bool
    {
        $request = DB::getInstance()->prepare("
            INSERT INTO user (id, email, password)
            VALUES (:id, :email, :password)
        ");
        $request->bindParam(':id', $id);
        $request->bindParam(':email', $email);
        $request->bindParam(':password', $password, PDO::PARAM_INT);
        $request->execute();
        return intval(DB::getInstance()->lastInsertId()) !== 0;
    }

    /** Delete one user based in the database
     * @param int $id
     * @return bool
     */
    public function deleteUser(int $id): bool
    {
        $request = DB::getInstance()->prepare("DELETE FROM user WHERE id = :id");
        $request->bindParam(':id', $id);
        $request->execute();
        if ($request->execute() !== false) {
            echo "it's ok, votre compte est supprimé";
        }
        return $this->deleteUser($id);
    }


}
