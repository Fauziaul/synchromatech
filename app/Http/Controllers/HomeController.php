<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $banner = Banner::all();
        $kategori = Kategori::all();
        $produk = Produk::all();
        return view('landingpage', compact('banner', 'kategori', 'produk'));
    }

    public function produk($id){

        $kategori = Kategori::findOrFail($id);
        $produk = Produk::where('id_kategori', $id)->get();

        return view('produk.polaroid', compact('kategori', 'produk'));

    }
    
    public function order($id){
        $produk = Produk::where('id_produk', $id)->get();
        return view('order.polaroid', compact('produk'));
    }
}
