<?php

namespace App\Core;

use App\Post\PostController;
use App\Post\PostsAdminController;
use App\User\LoginController;
use App\User\LoginService;
use App\User\UserRepository;
use PDO;
use App\Post\PostRepository;
use App\Post\CommentsRepository;
use Exception;

class Container
{

    private $instances =[];
    private $reciepts = [];

    public function __construct()
    {
        $this->reciepts =[
            'postsAdminController' => function()
            {
                return new PostsAdminController (
                    $this->make("postRepository"),
                    $this->make("loginService")
                );
            },
            'loginService' => function()
            {
              return new LoginService(
                  $this->make("usersRepository")
              );
            },
            'loginController' => function() {
            return new LoginController(
                $this->make("loginService")
            );
            },
            'postsController' => function() {
            return new PostController(
                $this->make('postRepository'),
                $this->make('commentsRepository')
            );
            },
            'postRepository' => function() {
            return new PostRepository(
                $this->make("pdo"));
            },
            'commentsRepository' => function() {
                return new CommentsRepository(
                    $this->make('pdo')
                );
            },
            'usersRepository' => function() {
            return new UserRepository(
                $this->make('pdo')
            );
            },
            'pdo' => function() {
              try {
                $pdo = new PDO('mysql:host=localhost; dbname=blog',
                    'thomas',
                    'geheim2,'
                );
              } catch (\Exception $e) {
                  echo 'Verbindung zum SQL Server fehlgeschlagen!';
                  die();
              }
              $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
              return $pdo;
            }
        ];
    }

    public function make($name) {
        if (!empty($this->instances[$name]))
        {
            return $this->instances[$name];
        }

        if (isset($this->reciepts[$name])) {
            $this->instances[$name] = $this->reciepts[$name]();
            }

        return $this->instances[$name];

    }


}