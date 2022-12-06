@extends('layout')

@section('content')
    <div class="dashboard container mt-8 pb-8">
    <h1>Selamat Datang di Halaman Dashboard</h1>
    <h1>Username : {{ auth()->user()->username }}</h1>
    <h1>Email : {{ auth()->user()->email }}</h1>

@if(session('isGuest'))
<h2>
    <b>
        <i>
            {{session('isGuest') }}
        </i>
    </b>
</h2>
@endif

@if (Session::get('addTodo'))
    <div class="alert alert-success">
        {{ Session::get('addTodo') }}
    </div>
@endif


@endsection