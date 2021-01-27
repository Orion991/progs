<?php

namespace App\Core;

use PDO;

abstract class AbstractRepository
{
    protected $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    abstract public function getTableName();
    abstract public function getModelName();

    function all(){
        $table = $this->getTableName();
        $model = $this->getModelName();
        $stmt = $this->pdo->query("SELECT * FROM $table");
        $posts = $stmt->fetchAll(PDO::FETCH_CLASS, "$model");
        return $posts;
    }

    function find($id)
    {
        $table = $this->getTableName();
        $model = $this->getModelName();
        $sql = "SELECT * FROM $table WHERE id= ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, "App\\Post\\PostModel");
        $post = $stmt->fetch(PDO::FETCH_CLASS);
        return $post;
    }
}