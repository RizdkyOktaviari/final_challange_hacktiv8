<?php

namespace App\Http\Controllers;
use App\Models\Produk;
use App\Models\Kategori;

use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $posts = Produk::all();
        return view('admin.produk.index', compact('posts'));
    }

    public function create()
    {
        $categories = Kategori::all();
        return view('admin.produk.create', compact('categories'));
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'berat' => 'required|integer|max:255',
            'harga' => 'required|integer',
            'status' => 'required|string|max:255',
            'images' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $post = new Produk();
        $categori = Kategori::find($request->category);
        // dd($categori);
        $post->nama = $request->nama;
        $post->berat = $request->berat;
        $post->harga = $request->harga;
        $post->status = $request->status;


        $post->kategori_id = $request->kategori;

        if($request->hasFile('images')){
            $imagee = $request->images;
            $image_name = time().'-'.$imagee->getClientOriginalName();
            $imagee->move('images/post/', $image_name);
            $image_path = 'images/post/'. $image_name;
            $post->image = $image_path;
        }

        $post->save();
        return redirect()->route('produk_index');
    }
    public function edit($id)
    {
        $post = Produk::find($id);
        $categories = Kategori::all();
        return view('admin.produk.edit', compact('post', 'categories'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'berat' => 'required|integer|max:255',
            'harga' => 'required|integer',
            'status' => 'required|string|max:255',
            'images' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $post = Produk::findOrFail($id);
        $categori = Kategori::find($request->category);
        $post->nama = $request->nama;
        $post->berat = $request->berat;
        $post->harga = $request->harga;
        $post->status = $request->status;


        $post->kategori_id = $request->kategori;

        if($request->hasFile('images')){
            $imagee = $request->images;
            $image_name = time().'-'.$imagee->getClientOriginalName();
            $imagee->move('images/post/', $image_name);
            $image_path = 'images/post/'. $image_name;
            $post->image = $image_path;
        }

        $post->save();
        return redirect()->route('produk_index');
    }

    public function delete($id)
    {
        $post = Produk::findOrFail($id);
        if (file_exists($post->image)) {
            unlink($post->image);
        }

        $post->delete();
        return redirect()->route('produk_index');
    }
}
