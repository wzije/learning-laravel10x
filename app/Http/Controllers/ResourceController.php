<?php

namespace App\Http\Controllers;

trait ResourceController
{

    public function index()
    {
        $model = $this->model;

        if ($this->relation) {
            $model = $model->with($this->relation);
        }

        $data = $model->paginate($this->perPage ?? 8);

        return view("$this->view.index", [
            "title" => $this->title,
            "active" => $this->active,
            "posts" => $data
        ]);
    }

    public function show($slug)
    {
        $data = $this->model->where("slug", $slug)->first();

        return view("$this->view.show", [
            "title" => $this->title,
            "active" => $this->active,
            "post" => $data
        ]);
    }
}
