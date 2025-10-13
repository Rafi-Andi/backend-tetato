<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\PesananDetail;
use App\Models\Produk;
use Illuminate\Http\Request;

class AnalisisController extends Controller
{
    public function analisis() {
        $totalPendapatanSelesai = Pesanan::where('status', 'selesai')->sum('total_harga');
        $jumlahPesanan = Pesanan::count();
        $produkTerjual = PesananDetail::sum('jumlah');
        $jumlahProduk = Produk::count();
        $totalPesananBaru = Pesanan::where('status', 'baru')->count();

        return response()->json([
            "message" => "berhasil mendapatkan analisis dashboard",
            "data" => [
                "totalPendapatanSelesai" => $totalPendapatanSelesai,
                "jumlahPesanan" => $jumlahPesanan,
                "produkTerjual" => $produkTerjual,
                "jumlahProduk" => $jumlahProduk,
                "totalPesananBaru" => $totalPesananBaru,
            ]
        ]);
    }
}
