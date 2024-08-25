@extends('layouts.base')

@section('title', $title)

@section('content')
    <div class="card">
        <div class="card-header text-center">
            <h4>Form Input Data</h4>
        </div>
        <div class="card-body">
            <form>
                <!-- Title -->
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter title" required>
                </div>
                <!-- Slug -->
                <div class="mb-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" class="form-control" id="slug" name="slug" placeholder="Enter slug"
                        required>
                </div>
                <!-- Body -->
                <div class="mb-3">
                    <label for="body" class="form-label">Body</label>
                    <textarea class="form-control" id="body" name="body" rows="5" placeholder="Enter body text" required></textarea>
                </div>
                <!-- Category ID -->
                <div class="mb-3">
                    <label for="category_id" class="form-label">Category</label>
                    <select class="form-select" id="category_id" name="category_id" required>
                        <option selected disabled>Pilih kategori</option>
                        <option value="1">Kategori 1</option>
                        <option value="2">Kategori 2</option>
                        <option value="3">Kategori 3</option>
                        <!-- Tambahkan kategori lain sesuai kebutuhan -->
                    </select>
                </div>
                <!-- User ID -->
                <div class="mb-3">
                    <label for="user_id" class="form-label">User ID</label>
                    <input type="number" class="form-control" id="user_id" name="user_id" placeholder="Enter user ID"
                        required>
                </div>
                <!-- Tombol Submit -->
                <button type="submit" class="btn btn-primary w-100">Submit</button>
            </form>
        </div>
    </div>
@endsection
