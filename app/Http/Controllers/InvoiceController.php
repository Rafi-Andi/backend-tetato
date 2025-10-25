<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class InvoiceController extends Controller
{
    public function exportPdfInvoice(Request $request, $id)
    {
        $data = $request->validate([
            "ongkir" => "required|integer"
        ]);

        $ongkir = $data['ongkir'];
        $invoice = Pesanan::with('pesanan_details')->findOrFail($id);

        $pdf = PDF::loadView('invoices.pdf_invoice', compact('invoice', 'ongkir'));

        return $pdf->output();

        // return response()->json([
        //     "data" => [
        //         $invoice,
        //         $ongkir
        //     ]
        // ]);
    }
}
