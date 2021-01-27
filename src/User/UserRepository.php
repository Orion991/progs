<?php

namespace App\User;

use App\Core\AbstractRepository;
use PDO;

class UserRepository extends AbstractRepository
{
    public function getTableName()
    {
        return "users";
    }

    public function getModelName()
    {
        return "App\\User\\UserModel";
    }

    public function findByUsername($user)
    {
        $table = $this->getTableName();
        $model = $this->getModelName();
        $sql = "SELECT * FROM $table WHERE user= :user";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['user' => $user]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, "App\\Post\\PostModel");
        $username = $stmt->fetch(PDO::FETCH_CLASS);
        return $username;

    }
}
