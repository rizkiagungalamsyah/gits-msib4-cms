@extends('layout')
@section('content')
    <h6><b> Produk Makanan dan Minuman </b></h6>
    <hr>

    <a href="{{ url('/product/add') }}">
        <button type="button" class="btn btn-primary mt-3">+ Tambah Produk</button>
    </a>
    <div class="grid-container">

        @foreach ($produk as $item)
            <div>
                <div class="card-group">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="card">
                                <div class="grid-container">
                                    <div class="card-body">
                                        <div class="image">
                                            <img src="{{ asset($item->image) }}" class="img-thumbnail"
                                                style="width:400px" />
                                        </div>
                                        <div class="card-title"><b>
                                                {{ $item->nama }}
                                            </b>
                                        </div>
                                        <p class="card-text">{{ $item->deskripsi }}</p>
                                        <h5>{{ $item->harga }}</h5>

                                        <button type="submit" class="btn btn-primary"><i
                                                class="fa-solid fa-cart-plus"></i></button>

                                        <a href="/product/index/{{ $item->id }}/edit">
                                            <button type="button" class="btn btn-warning "><i
                                                    class="fa-solid fa-pen-to-square"></i></button>
                                        </a>
                                        <a href="/product/index/{{ $item->id }}/delete">
                                            <button type="button" class="btn btn-danger"><i
                                                    class="fa-sharp fa-regular fa-trash"></i></button>
                                        </a>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                </form>
            </div>
        @endforeach
    </div>
@endsection
