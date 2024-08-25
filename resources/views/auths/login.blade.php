@extends('layouts.base')

@section('title', $title)

@section('content')

    @session('success')
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endsession

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    <h4>Form Login</h4>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            {!! implode('', $errors->all('<div>:message</div>')) !!}
                        </div>
                    @endif
                    <form method="POST" action="/login">
                        @csrf
                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="email"
                                placeholder="Masukkan email" required>
                        </div>
                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Kata Sandi</label>
                            <input type="password" class="form-control" name="password" id="password"
                                placeholder="Masukkan kata sandi" required>
                        </div>
                        <!-- Checkbox untuk mengingat login -->
                        {{-- <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="rememberMe">
                            <label class="form-check-label" for="rememberMe">Ingat Saya</label>
                        </div> --}}
                        <!-- Tombol Submit -->
                        <button type="submit" class="btn btn-primary w-100">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
