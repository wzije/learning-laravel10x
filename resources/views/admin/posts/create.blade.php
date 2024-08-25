@extends('admin.app')

@section('content')
    <div class="card">
        <div class="card-header ">
            Create New Post
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('posts.store') }}">
                @csrf
                <!-- Title -->
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                        name="title" placeholder="Enter title" value="{{ old('title') }}" required>
                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <!-- Slug -->

                <!-- Body -->
                <div class="mb-3">
                    <label for="body" class="form-label">Body</label>
                    <textarea class="form-control" id="body" name="body" rows="5" placeholder="Enter body text" required> {{ old('body') }} </textarea>
                </div>
                <!-- Category ID -->
                <div class="mb-3">
                    <label for="category_id" class="form-label">Category</label>
                    <select class="form-select @error('category_id') is-invalid @enderror" id="category_id"
                        name="category_id" required>
                        <option selected disabled>Choose Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}</option>
                        @endforeach
                        <!-- Tambahkan kategori lain sesuai kebutuhan -->
                    </select>
                    @error('category_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <!-- User ID -->

                <!-- Tombol Submit -->
                <div class="d-flex justify-content-between">
                    <a href="{{ route('posts.index') }}" type="button" class="btn btn-danger px-5 py-2">Cancel</a>
                    <button type="submit" class="btn btn-primary px-5 py-2">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
