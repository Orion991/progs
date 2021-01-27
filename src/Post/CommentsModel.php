<?php

namespace App\Post;

use App\Core\AbstractModel;

class CommentsModel extends AbstractModel {

    public $id;
    public $contents;
    public $post_id;
}
