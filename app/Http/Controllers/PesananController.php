<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditPesananRequest;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;

class PesananController extends Controller
{
    public function index() {
        $pesanan = new Pesanan;
        $pesanan = [
            'diterima' => $pesanan->where('status', 0)->count(),
            'diproses' => $pesanan->where('status', 1)->count(),
            'selesai' => $pesanan->where('status', 2)->count(),
        ];
        return view('admin-template.pesanan', compact('pesanan'));
    }

    public function show(Request $request){
        
        $pesanan = Pesanan::with('kategori', 'produk');
        if ($request->type == "selesai") {
            $pesanan->where('status', 2);
        } elseif ($request->type == 'diproses') {
            $pesanan->where('status', 1);
        } elseif ($request->type == 'diterima') {
            $pesanan->where('status', 0);
        }

        $pesanan->orderBy('created_at', 'asc')->get();
        return DataTables::of($pesanan)
        ->addIndexColumn()
       
        ->addColumn('action', function ($row) {
            $icon = ($row->status) ? "ti-circle-x" : "ti-circle-check";
            $color = ($row->status) ? "danger" : "success";
            $btn = "
            <a data-bs-toggle='modal' data-id='{$row->id}' onclick=edit($(this)) class='btn-icon text-warning waves-effect waves-light'><i class='tf-icons ti ti-edit'></i>
            <a data-bs-toggle='modal' data-id='{$row->id}' onclick=detail($(this)) class='btn-icon text-success waves-effect waves-light'><i class='tf-icons ti ti-download' ></i>  ";
            return $btn;
        })
        ->rawColumns(['action', 'status'])

        ->make(true);
    }

    public function edit(Request $request, $id) {
        $pesanan = Pesanan::with('ukuran', 'produk')->where('id', $id)->first();
        return $pesanan;
    }

    public function update(EditPesananRequest $request, $id) {
        try {
            $pesanan = Pesanan::with('ukuran', 'produk')->where('id', $id)->first();
            
            $pesanan->status = $request->status;
            $pesanan->save();
            return response()->json([
                'error' => false,
                'message' => 'Pesanan successfully Updated!',
                'modal' => '#modal-pesanan',
                'table' => '#diterima, #diproses, #selesai',
            ]);

        } catch (Exception $e) {
            return response()->json([
                'error' => true,
                'message' => $e->getMessage(),
            ]);
        }
    }
    
    public function unduh($id_pesanan){
        $pesanan = Pesanan::with('ukuran', 'produk')->where('id', $id_pesanan)->firstOrFail();

        $data = [
            'invoice_number' => 'INV-' . $pesanan->id,
            'date' => now()->format('d/m/Y'),
            'customer_name' => $pesanan->nama_pemesan,
            'customer_email' => $pesanan->email,
            'customer_phone' => $pesanan->nohp,
            'customer_address' => $pesanan->alamat,
            'items' => [
                [
                    'name' => $pesanan->produk->nama_produk,
                    'sizes' => [
                        'S' => $pesanan->ukuran->s ?? '-',
                        'M' => $pesanan->ukuran->m ?? '-',
                        'L' => $pesanan->ukuran->l ?? '-',
                        'XL' => $pesanan->ukuran->xl ?? '-',
                        'XXL' => $pesanan->ukuran->xxl ?? '-',
                        'XXXL' => $pesanan->ukuran->xxxl ?? '-',
                    ],
                ],
            ],
            'notes' => $pesanan->catatan,
        ];

        // Load view dan buat PDF
        $pdf = PDF::loadView('order.pdf', $data);

        // Download PDF
        return $pdf->download('Faktur Pesanan' . $pesanan->produk->nama_produk . '.pdf');
    }

}
