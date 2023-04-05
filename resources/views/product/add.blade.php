@extends('layout')
@section('content')

    <h3>Tambah Produk </h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ url('/product/index') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 mt-4">
            <label for="image" class="form-label">Image</label>
            <input class="form-control" type="file" name="image" id="formFile" accept="image/*"
                onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
        </div>
        <div class="mt-3"><img src="" id="output" width="400"></div>
        <div class="mb-3 mt-4">
            <label for="exampleInputEmail1" class="form-label">Nama</label>
            <input type="text" class="form-control " id="exampleInputEmail1" name="nama" placeholder="nama produk">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Deskripsi</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="deskripsi"
                placeholder="deskripsi produk">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Harga</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="harga" placeholder="harga">
        </div>
        <select class="form-select " aria-label="Default select example" name="id_kategori">
            <option selected>Pilih Kategori Produk</option>
            @foreach ($kategori as $item)
                <option value="{{ $item->id }}">{{ $item->id }} - {{ $item->nama }}</option>
            @endforeach
        </select>
        <div class="invalid-feedback">
            Pilih salah satu kategori
        </div>
        <br>
        <button type="submit" class="btn btn-primary mt-3">Tambah</button>
    </form>

@endsection
