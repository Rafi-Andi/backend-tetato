<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Produk;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use App\Models\PesananDetail;
use Illuminate\Support\Facades\DB;

class AnalisisController extends Controller
{
    public function analisis()
    {
        $totalPendapatanSelesai = Pesanan::where('status', 'selesai')->sum('total_harga');
        $jumlahPesanan = Pesanan::count();
        $produkTerjual = PesananDetail::sum('jumlah');
        $jumlahProduk = Produk::count();
        $totalPesananBaru = Pesanan::where('status', 'baru')->count();

        $pendapatanBulanIni = DB::table('pesanans')
            ->where('status', 'selesai')
            ->whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->sum('total_harga');
        return response()->json([
            "message" => "berhasil mendapatkan analisis dashboard",
            "data" => [
                "totalPendapatanSelesai" => $totalPendapatanSelesai,
                "jumlahPesanan" => $jumlahPesanan,
                "produkTerjual" => $produkTerjual,
                "jumlahProduk" => $jumlahProduk,
                "totalPesananBaru" => $totalPesananBaru,
                "pendapatanBulanIni" => $pendapatanBulanIni
            ]
        ]);
    }
}
