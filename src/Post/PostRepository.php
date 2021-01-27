<?php
namespace App\Post;

use App\Core\AbstractRepository;

class PostRepository extends AbstractRepository
{

    public function getTableName()
    {
        return "posts";
    }

    public function getModelName()
    {
        return "App\\Post\\PostModel";
    }

    public function update(PostModel $model)
    {
        $table = $this->getTableName();

        $stmt = $this->pdo->prepare("UPDATE `{$table}` SET `content` = :content, `titel` = :titel WHERE `id` = :id");
        $stmt->execute([
            'content' => $model->content,
            'titel' => $model->titel,
            'id' => $model->id
            ]);

    }

    public function newPost($entryTitle, $entryContent)
    {
        $table = $this->getTableName();

        var_dump($entryTitle);
        var_dump($entryContent);

        $stmt = $this->pdo->prepare("INSERT INTO `{$table}` (`content`, `titel`) VALUES (:content, :titel)");
        $stmt->execute([
            'content' => $entryContent,
            'titel' => $entryTitle
        ]);
    }

}