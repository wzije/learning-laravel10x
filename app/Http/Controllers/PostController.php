<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;

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

    public function fetch()
    {
        $data = Post::with(['category', "author"])->limit(2)->get();

        if (request()->isJson()) {
            return response()->json([
                "code" => "200",
                "message"  => "success",
                "data" => $data
            ]);
        }

        return response()->json([
            "code" => Response::HTTP_BAD_REQUEST,
            "message"  => "error",
        ]);
    }
}
