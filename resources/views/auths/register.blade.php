@extends('layouts.base')

@section('title', $title)

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    <h4>Register Form</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="/register">
                        @csrf
                        {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}" /> --}}
                        <!-- Nama Depan -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input value="{{ old('name') }}" name="name" type="text"
                                class="form-control @error('name') is-invalid @enderror" id="name"
                                placeholder="Input your name">
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- Nama Belakang -->
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input value="{{ old('username') }}" name="username" type="text"
                                class="form-control @error('username') is-invalid @enderror" id="username"
                                placeholder="Input your name">
                            @error('username')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input value="{{ old('email') }}" name="email" type="email"
                                class="form-control @error('email') is-invalid @enderror" id="email"
                                placeholder="Input your email">
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Kata Sandi</label>
                            <input name="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" id="password"
                                placeholder="Input your password">
                            @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- Konfirmasi Password -->
                        <div class="mb-3">
                            <label for="confirmPassword" class="form-label">Confirm Password</label>
                            <input name="password_confirmation" type="password"
                                class="form-control @error('password') is-invalid @enderror" id="confirmPassword"
                                placeholder="Confirm your password">
                        </div>
                        @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <!-- Checkbox untuk menyetujui persyaratan -->
                        {{-- <div class="mb-3 form-check">
                            <input name="name" type="checkbox" class="form-check-input" id="terms">
                            <label class="form-check-label" for="terms">Saya menyetujui syarat dan ketentuan</label>
                        </div> --}}
                        <!-- Tombol Submit -->
                        <button type="submit" class="btn btn-primary w-100">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
