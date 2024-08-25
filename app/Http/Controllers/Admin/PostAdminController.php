<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class PostAdminController extends Controller
{

    public function index()
    {

        $data = Post::latest()->paginate(10);

        if (request()->ajax()) {
            return response()->json($data);
        }

        return view("admin.posts.index", compact('data'));
    }

    public function create()
    {

        $categories = Category::all();

        return view("admin.posts.create", compact("categories"));
    }


    public function store(Request $request)
    {

        $validData = $request->validate([
            "title" => ["required", "min:5"],
            "category_id" => ["nullable", "exists:categories,id"]
        ]);

        $validData["slug"] = Str::slug($validData["title"]);
        $validData["user_id"] = Auth::id();

        $isSaved = Post::create($validData);

        if (!$isSaved) {
            return redirect()->back()->withErrors("formError", "data is not saved!");
        }

        return redirect(route("posts.index"))->with("success", "data save successfully.");
    }

    public function edit($slug)
    {


        $categories = Category::all();
        $post = Post::where("slug", $slug)->first();

        Gate::forUser(Auth::user())->authorize("post.update", $post);

        return view("admin.posts.edit", [
            'categories' => $categories,
            "post" => $post
        ]);
    }

    public function update($slug, Request $request)
    {
        $validData = $request->validate([
            "title" => ["required", "min:5"],
            "category_id" => ["nullable", "exists:categories,id"]
        ]);

        $post = Post::where("slug", $slug)->first();

        if (!$post) {
            return redirect()->back()->withErrors("formError", "data not found!");
        }

        $validData["slug"] = Str::slug($validData["title"]);

        $isSaved = $post->update($validData);

        if (!$isSaved) {
            return redirect()->back()->withErrors("formError", "data is not saved!");
        }

        return redirect(route("posts.index"))->with("success", "data update successfully.");
    }

    public function destroy($slug)
    {

        // if (!Gate::allows('admin')) {
        //     abort(403);
        // }

        Gate::authorize("admin");


        $isDeleted = Post::where("slug", $slug)->delete();

        if (!$isDeleted) {
            return redirect()->back()->withErrors("formError", "data is not deleted!");
        }

        return redirect(route("posts.index"))->with("success", "data delete successfully.");
    }
}
