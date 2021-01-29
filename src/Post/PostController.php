<?php

namespace App\Post;

use App\Core\Container;
use App\Core\AbstractController;

class PostController extends AbstractController
{
    public function __construct(
        PostRepository $postRepository,
        CommentsRepository $commentsRepository
       )
    {
        $this->postRepository = $postRepository;
        $this->commentsRepository = $commentsRepository;

    }

    public function index()
    {
        $posts = $this->postRepository->all();

        $this->render("post/index", [
            'posts' => $posts
        ]);



    }

    public function view()
    {
        $id = $_GET['id'];
        if (isset($_POST["content"])) {
            $content = $_POST["content"];
            $this->commentsRepository->insertForPost($id, $content);
        }

        $post = $this->postRepository->find($id);
        $comments = $this->commentsRepository->allByPost($id);
        $this->render("post/post", [
            'post' => $post,
            'comments' => $comments
        ]);


    }

    public function search()
    {
        $search = $_POST["search"];
        $erg = $this->postRepository->search($search);
        $this->render("post/search", [
            'erg' => $erg
        ]);

    }
}
