@extends('layouts.base')

@section('title', $title)

@section('content')
    <h1>Ini adalah halaman about</h1>

    @auth
        <p> Name: {{ Auth::user()->name }} </p>
        <p> Username: {{ Auth::user()->username }} </p>
        <p> Email: {{ Auth::user()->email }} </p>

        <a href="javascript:void(0)"
            onclick="if(confirm('Are you sure?'))event.preventDefault();document.getElementById('logoutForm').submit()"
            class="btn btn-primary">Logout</a>

        <form action="/logout" method="POST" id="logoutForm">
            @csrf
        </form>
    @else
        harus login dulu
    @endauth


@endsection
