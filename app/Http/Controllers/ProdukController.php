<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Facedes\File;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $data['produk'] = Produk::with('kategori')->get();
        
        return view('product/index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['kategori'] = Kategori::all();
        return view('/product/add', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $validated = $request->validate([
            'image' => 'required|image|mimes:png,jpg|max:2040',
            'nama' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'id_kategori' => 'required'
        ]);
        //=======================

        $image = $request->image;
        $slug = Str::slug($image->getClientOriginalName());
        $new_image = time() .'_'. $slug;
        $image->move('uploads/product/', $new_image);

        $produk = new Produk;
        $produk->image = 'uploads/product/'.$new_image;
        $produk->nama= $request->nama;
        $produk->deskripsi= $request->deskripsi;
        $produk->harga= $request->harga;
        $produk->id_kategori = $request->id_kategori;
        $produk->save();

        return redirect('/product/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['kategori'] = Kategori::all();
        $data['produk'] = Produk::find($id);

        return view('/product/edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'id_kategori' => 'required'
        ]);

        $produk = Produk::find($id);
        if($request->hasFile('image')){
            $request->validate([
                'image' => 'required|image|mimes:png,jpg|max:2040'
            ]);
        //File::delete($produk->image);
        $image = $request->image;
        $slug = Str::slug($image->getClientOriginalName());
        $new_image = time() .'_'. $slug;
        $image->move('uploads/product/', $new_image);
        $produk->image = 'uploads/product/'.$new_image;
        }

        // $produk = new Produk;
        $produk->nama= $request->nama;
        $produk->deskripsi= $request->deskripsi;
        $produk->harga= $request->harga;
        $produk->id_kategori = $request->id_kategori;
        $produk->save();


        return redirect('/product/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Produk::destroy($id);
        return redirect('/product/index');
    }
}
