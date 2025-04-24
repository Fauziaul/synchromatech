<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class ExportController extends Controller
{
    public function export($id_pesanan)
    {
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
