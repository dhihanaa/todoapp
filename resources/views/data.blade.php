@extends('layout')

@section('content')
    @if (session('successUpdate'))
        <div class="alert alert-success">
            {{session('successUpdate')}}
        </div>
    @endif
    @if (session('successDelete'))
        <div class="alert alert-success">
            {{session('successDelete')}}
        </div>
    @endif
    @if (session('successComplated'))
        <div class="alert alert-success">
            {{session('successComplated')}}
        </div>
    @endif
    <div class="data container mt-4 pb-3">
        <table class="table table-success table-striped table-bordered">
            <tr>
                <td>No</td>
                <td>Kegiatan</td>
                <td>Deskripsi</td>
                <td>Batas Waktu</td>
                <td>Status</td>
                <td>Aksi</td>
            </tr>
            @php
                $no = 1;  
            @endphp
            @foreach ($todos as $todo)
            <tr>
                {{-- tiap di lauting, $no bakal ditambah--}}
                <td>{{ $no++ }}</td>    
                <td>{{ $todo['title'] }}</td>   
                <td>{{ $todo['description'] }}</td>  
                {{-- carbon : mengubah packge data pada laravel, 
                nntinya si data yng 2022-11-22 formalnya jadi 22 November,2022--}} 
                <td>{{ \Carbon\Carbon::parse($todo['date'])->format('j F, Y')}}</td>
                {{--konsep ternary, if statusnya 1 nampilin teks complated kalo 0 
                nampilin teks on-process status tuh booolean kan? cuma antara 1 dan 0 --}}
                <td>{{ $todo['status'] == 1 ? 'Complated' : 'On-Process'}}</td>
                <td>
                    {{-- karena path {id} merupakan path dinamis, jadi kita harus ini path dinamis tersebut,
                    karena kita mengisinya dengan data dinamis/data dari databasenya id buat isi nya pake kurawal dua kali--}}
                    <a href="/edit/{{$todo['id']}}" class="btn btn-info pt-0 ">Edit</a>  |  
                    <form action="/destroy/{{$todo['id']}}"method="POST">
                        @csrf
                        @method('DELETE')    
                            <button type="submit" class="btn btn-danger pt-0">Hapus</button>
                    </form>
                    @if ($todo['status'] == 0)
                    <form action="/complated/{{$todo['id']}}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-success">Complated</button>
                    </form>
                    @endif
                </td>
            @endforeach
        </table>
    </div>
@endsection