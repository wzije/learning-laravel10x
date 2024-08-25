@extends('layouts.base')

@section('title', $title)

@section('content')
    <h3>My Posts</h3>

    <hr>
    <div class="row">
        <div class="col-lg-12">
            <article>
                <!-- Post header-->
                <header class="mb-4">
                    <!-- Post title-->
                    <h1 class="fw-bolder mb-1">{{ $post->title }} </h1>
                    <!-- Post meta content-->
                    <div class="text-muted fst-italic mb-2">Posted on {{ $post->created_at->diffForHumans() }} by Start
                        Bootstrap</div>
                    <!-- Post categories-->
                    <a class="badge bg-secondary text-decoration-none link-light" href="#!">Category</a>
                </header>
                <!-- Preview image figure-->
                <figure class="mb-4"><img class="img-fluid rounded" src="https://picsum.photos/1080/300" alt="...">
                </figure>
                <!-- Post content-->
                <section class="mb-5">
                    {{ $post->body }}
                </section>
            </article>
        </div>
    </div>
@endsection
