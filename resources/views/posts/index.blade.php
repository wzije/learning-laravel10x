@extends('layouts.base')

@section('title', $title)

@section('content')
    <h3>My Posts</h3>

    <hr>
    <div class="row">
        @foreach ($posts as $post)
            <div class="col-3 mb-3">
                <div class="card" style="width: 18rem;">
                    <div class="badge badge-primary position-absolute p-2 rounded-0 text-white"
                        style="background: rgba(0, 0, 0, 70%)"><a href="/categories/{{ $post->category->slug }}"
                            class=" text-decoration-none text-white">{{ $post->category->name }}</a></div>
                    {{-- <img src="https://picsum.photos/100/100?random={{ $post->id }}" class="card-img-top" alt="..."> --}}
                    <div class="card-body">
                        <div class="text-muted fst-italic mb-2">Posted on {{ $post->created_at->diffForHumans() }} by
                            {{ $post->author->name }}</div>
                        <h5 class="card-title"> <a href="/posts/{{ $post->slug }}"> {{ $post->title }}</a></h5>
                        <p class="card-text">{{ $post->body }}</p>
                        <a href="/posts/{{ $post->slug }}" class="btn btn-primary"> Detail</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{ $posts->links() }}

@endsection
