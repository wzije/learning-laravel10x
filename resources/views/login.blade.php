@extends("custom_layouts.main")
@section("judul", "Login")
@section("judul-halaman", "Login")

@section("content")
    <h1>Ini adalah halaman login</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            {!!  implode('', $errors->all('<div>:message</div>')) !!}
        </div>
    @endif
    <div class="container-sm">
        <form class="form-control" method="post" action="/test/login">
            @csrf
            <div>
                <label for="emailID">Email</label>
                <input class="form-control" id="emailID" name="email" type="email"/>
                @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="passwordID">Password</label>
                <input class="form-control" id="passwordID" name="password" type="password"/>
                @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <button class="btn btn-primary" type="submit">Login</button>
        </form>
    </div>
@endsection
