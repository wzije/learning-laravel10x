<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

trait ResourceAdminController
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


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
