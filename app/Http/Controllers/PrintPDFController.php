<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PrintPDFController extends Controller
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
    }

    public function exportPdfOrder(Request $request) {
        $data = $request;
        $pdf = PDF::loadView('invoices.pdf_order', compact('data'));

        // return $request;
        return $pdf->output();
    }
}
