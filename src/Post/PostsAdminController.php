<?php

namespace App\Post;


use App\Core\AbstractController;
use App\User\LoginService;

class PostsAdminController extends AbstractController
{

    public function __construct(
        PostRepository $postRepository,
        LoginService $loginService
    )
    {
        $this->postRepository = $postRepository;
        $this->loginService = $loginService;
    }

    public function index()
    {
        $this->loginService->check();
        $all = $this->postRepository->all();
        $this->render("post/admin/index", [
            'all' => $all
        ]);
    }

    public function edit()
    {
        $this->loginService->check();
        $id = $_GET['id'];
        $entry = $this->postRepository->find($id);
        $this->render("post/admin/edit", [
            'entry' => $entry
        ]);

        if (isset($_POST['title']) and isset($_POST['content'])) {
            $entry->titel = $_POST['title'];
            $entry->content = $_POST['content'];
            $this->postRepository->update($entry);
        }
    }

    public function post()
    {
        $this->loginService->check();


        $this->render("post/admin/new", []);


        if (isset($_POST['title']) and isset ($_POST['content'])) {

            $entryTitel = $_POST['title'];
            $entryContent = $_POST['content'];
            $this->postRepository->newPost($entryTitel, $entryContent);

        }
    }
}