<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\kategori;
use App\Models\Produk;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $omset = Transaction::where('status', 'success')->sum('total');
        $customer = User::count();
        $categoryProduct = kategori::count();
        $product = Produk::count();

        $newOrder = Transaction::where('status', 'pending')->count();
        $processOrder = Transaction::where('status', 'process')->count();
        $sendOrder = Transaction::where('status', 'send')->count();
        $successOrder = Transaction::where('status', 'success')->count();

        return view('admin.home', compact('omset', 'customer', 'categoryProduct', 'product', 'newOrder', 'processOrder', 'sendOrder', 'successOrder'));
    }
}