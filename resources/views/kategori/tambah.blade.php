@extends('layout')
@section('content')

    <h3>Tambah Menu Makanan</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ url('/kategori/index') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 mt-4">
            <label for="image" class="form-label">Image</label>
            <input class="form-control" type="file" name="image" id="formFile" accept="image/*"
                onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">

        </div>
        <div class="mt-3"><img src="" id="output" width="400"></div>
        <div class="mb-3 mt-4">
            <label for="exampleInputEmail1" class="form-label">Nama</label>
            <input type="text" class="form-control " id="exampleInputEmail1" name="nama" placeholder="Ex: Makanan">
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
    </form>

@endsection
