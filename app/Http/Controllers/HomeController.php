<?php

namespace App\Http\Controllers;

use App\Http\Requests\PesananRequest;
use App\Models\Banner;
use App\Models\Kategori;
use App\Models\Pesanan;
use App\Models\Produk;
use App\Models\Ukuran;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        return view('produk.produk', compact('kategori', 'produk'));

    }
    
    public function order($id){
        $produk = Produk::where('id_produk', $id)->with('kategori')->first();
        return view('order.order', compact('produk'));
    }

    public function buatPesanan(PesananRequest $request) {
        try {
            DB::beginTransaction();
            $order = Pesanan::create([
                'id_produk' => $request->id_produk,
                'id_kategori' => $request->id_kategori,
                'nama_pemesan' => $request->pemesan,
                'email' => $request->email,
                'jumlah' => $request->jumlah,
                'nohp' => $request->nohp,
                'design' => $request->design,
                'catatan' => $request->catatan,
                'alamat' => $request->alamat,
                'status' => 0,
            ]);

            $ukuran = Ukuran::create([
                'id_produk' => $request->id_produk,
                'id_pesanan' => $order->id,
                's' => $request->s,
                'm' => $request->m,
                'l' => $request->l,
                'xl' => $request->xl,
                'xxl' => $request->xxl,
                'xxxl' => $request->xxl,
            ]);

            DB::commit();
            return response()->json([
                'error' => false,
                'message' => 'Pesanan Berhasil dibuat!',
                'url' => url('export/'.$order->id), 
                'redirect' => url('sukses')  
            ]);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json([
                'error' => true,
                'message' => $e->getMessage(),
            ]);
        }
    }

    public function sukses() {
        return view('order.sukses');
    }

}
