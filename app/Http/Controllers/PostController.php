<?php

namespace App\Http\Controllers;

use App\Models\Post;


class PostController extends Controller
{

    use ResourceController;

    protected $model;
    protected $title = "Post";
    protected $view = "posts";
    protected $active = "post";
    protected $perPage = 10;
    protected $relation = ["category", "author"];

    public function __construct(Post $post)
    {
        $this->model = $post;
    }
}
