@extends('layout')
@section('content')
    <h6><b> Kategori Produk </b></h6>
    <hr>
    <div class="btn">
        <a href="{{ url('/kategori/tambah') }}">
            <button type="button" class="btn btn-primary mt-3">+ Tambah Kategori</button>
        </a>
    </div>

    <div class="grid-container">
        @foreach ($kategori as $item)
    </div>
    <div class="card-group">
        <div class="row">
            <div class="col-sm-6">
                <div class="card-deck">
                    <div class="card">
                        <div class="grid-container">
                            <div class="card-body">
                                <div class="image">
                                    <img src="{{ asset($item->image) }}" class="img-thumbnail" style="width:400px" />
                                </div>
                                <div class="card-title"><b>
                                        {{ $item->nama }}
                                    </b></div>
                                <br>
                                <a href="/kategori/index/{{ $item->id }}/edit">
                                    <button type="button" class="btn btn-warning">Edit</button>
                                </a>
                                <a href="/kategori/index/{{ $item->id }}/delete">
                                    <button type="button" class="btn btn-danger">Hapus</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @endsection
