<?php

namespace App\Manager;

use App\Entity\User;
use PDO;
use DB;

class UserManager
{
    /**
     * Return all user
     * @return array
     */
    public function getUsers(): array
    {
        $users = [];
        $request = DB::getInstance()->prepare("SELECT * FROM user");
        $request->execute();

        if ($users_response = $request->fetchAll()) {
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
            INSERT INTO user (email, password)
                VALUES (:email, :password)
        ");
        $password = password_hash($password, PASSWORD_BCRYPT);
        $request->bindParam(':email', $email);
        $request->bindParam(':password', $password, PDO::PARAM_INT);
        $request->execute();

        return intval(DB::getInstance()->lastInsertId()) !== 0;
    }


    public function getUser(int $id): User {
        $user = new User();
        $sql = DB::getInstance()->prepare("SELECT * FROM user WHERE id = :id");
        $sql->bindParam(':id', $id);
        $sql->execute();

        if ($result = $sql->fetch()) {
            $user->setId($result['id']);
            $user->setEmail($result['email']);
            $user->setPassword($result['password']);
        }
        return $user;

    }

}
