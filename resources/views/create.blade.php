@extends('layout')

@section('content')
    <form action="/store" method="POST" style="max-width: 500px; margin: auto;">
        {{--menampilkan alert ketika validasi menghasilkan eror--}}
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>  
                    @endforeach
                </ul>
            </div>
        @endif
        {{--mengirim data ke controller yang ditampung oleh request $request--}}
        @csrf
        <div class="create">

            <div class="d-flex flex-column">
                 <label>Judul</label>
                 <input type="text" name="title">
            </div>
            <div class="d-flex flex-column">
                 <label>Data</label>
                 <input type="date" name="date">
            </div>
            <div class="d-flex flex-column">
                 <label>Deskripsi</label>
                 <textarea name="description" cols="30" rows="10"></textarea>
            </div>
         
                 <button type="submit" class="btn btn-success mt-2">Submit</button><br><br>
        </div>
    </form>
@endsection