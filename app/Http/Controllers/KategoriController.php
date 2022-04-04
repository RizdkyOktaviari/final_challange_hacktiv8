<?php

namespace App\Http\Controllers;
use App\Models\Kategori;

use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $categories = Kategori::all();
        return view('admin.kategori.index', compact('categories'));
    }
    public function create()
    {
        return view('admin.kategori.create');
    }
    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required|max:100',
            'kategori' => 'required|max:100',

        ]);

        $category = new Kategori();
        $category->parent = $request->name;
        $category->kategori = $request->kategori;
        $category->save();

        return redirect()->route('kategori_index');
    }

    public function storeAjax(Request $request){
        $this->validate($request,[
            'parent' => 'required|max:100',
            'kategori' => 'required|max:100',
        ]);

        $category = new Kategori();
        $category->parent = $request->parent;
        $category->kategori = $request->kategori;

        $category->save();
        return $category;
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'name' => 'required|max:100',
        ]);

        $category = Kategori::findOrFail($id);
        $category->parent = $request->name;
        $category->kategori = $request->kategori;
        $category->save();

        return redirect()->route('kategori_index');
    }

    public function delete($id){
        $category = Kategori::findOrFail($id);
        $category->delete();

        return redirect()->route('kategori_index');
    }
}
