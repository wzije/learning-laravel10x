@extends("custom_layouts.main")
@section("judul", "About Me")
@section("judul-halaman", "Tentang kita")

@section("content")

    @if(session("message"))
        <div class="alert alert-success">
            {{ session("message") }}
        </div>
    @endif

    <h1> HALO INI ADALAH HALAMAN ABOUT ME</h1>

    <p>My Name is {{ $name }}</p>
    <p>My Address is {{ $address }}</p>
    <p>Hobbies:</p>
    @if($hobbies)
        <ul>
            @foreach($hobbies as $hobby)
                <li> {{ $hobby }} </li>
            @endforeach
        </ul>
    @else
        Ga punya hobi
    @endif
@endsection
