<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class ProdukController extends Controller
{
    public function index(){
        $produk = Produk::where('id_produk')->first();
        $kategori = Kategori::all();
        return view('admin-template.produk', compact('kategori', 'produk'));
    }

    public function show()  {
        $produk = Produk::orderBy('created_at', 'desc')->get();

        return DataTables::of($produk)
            ->addIndexColumn()
            ->editColumn('created_at', function ($row) {
                return Carbon::parse($row->created_at)->format('d/m/y');
            })
            ->editColumn('updated_at', function ($row) {
                return Carbon::parse($row->updated_at)->format('d/m/y');
            })
            ->editColumn('picture', function ($row) {
                $url = Storage::url('' . $row->picture);
                return "<img src='$url' alt='Picture' style='width: 50px; height: 50px; object-fit: cover;'>";
            })

            ->editColumn('status', function ($row) {
                if ($row->status == 1) {
                    return "<div'><div class='badge rounded-pill bg-label-success'>" . "Active" . "</div></div>";
                } else {
                    return "<div'><div class='badge rounded-pill bg-label-danger'>" . "Inactive" . "</div></div>";
                }
            })
            
            ->addColumn('action', function ($row) {
                $icon = ($row->status) ? "ti-circle-x" : "ti-circle-check";
                $color = ($row->status) ? "danger" : "success";

                $btn = 
                "
                <a data-id='{$row->id_produk}' data-url='produk/destroy' class='btn-icon delete-data waves-effect waves-light'><i class='ti ti-trash fa-lg' style='color:red'></i></a>
                <a data-bs-toggle='modal' data-id='{$row->id_produk}' onclick=edit($(this)) class='btn-icon text-warning waves-effect waves-light'><i class='tf-icons ti ti-edit' ></i>
                <a data-status='{$row->status}' data-id='{$row->id_produk}' data-url='produk/status' class='btn-icon update-status text-{$color} waves-effect waves-light'><i class='tf-icons ti {$icon}'></i></a>
                ";
                return $btn;
            })
            ->rawColumns(['action', 'picture', 'status'])
            ->make(true);
    }





}
