<?php

namespace App\Http\Controllers;

use App\Models\Post;

class CategoryController extends Controller
{


    public function findBySlug($slug)
    {
        $data = Post::with("category", "author")->whereHas("category", function ($q) use ($slug) {
            return $q->where("slug", $slug);
        })->get();




        // dd($data);

        // return view("posts.index", [
        //     "title" => "Blog",
        //     "active" => "blog",
        //     "posts" => $data
        // ]);
    }
}
