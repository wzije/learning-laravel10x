@extends("custom_layouts.main")
@section("judul", "Juzz Amma")
@section("judul-halaman", "Juzz Amma")

@section("content")

    <div class="mt-3 w-50">
        <h2>Juzz Amma</h2>
        <hr>
        <table class="table table-bordered">
            <thead>
            <tr>
                <td>Number</td>
                <td>Name</td>
                <td>Latin</td>
                <td>Total Ayah</td>
            </tr>
            </thead>
            <tbody>
            @foreach($datalist as $data)
                <tr>
                    <td>{{$data->number}}</td>
                    <td>{{$data->name}}</td>
                    <td>{{$data->name_latin}}</td>
                    <td>{{$data->number_of_ayah}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
