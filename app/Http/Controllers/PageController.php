<?php

namespace App\Http\Controllers;


class PageController extends Controller
{
    public function about()
    {
        return view("about", [
            "title" => "Tentang",
            "active" => "about",
            "name" => "Joko",
            "bio" => "testing",
        ]);
    }
}
