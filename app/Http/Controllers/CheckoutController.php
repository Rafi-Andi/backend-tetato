<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\PesananDetail;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CheckoutRequest;
use Exception;

class CheckoutController extends Controller
{
    public function checkout(CheckoutRequest $request) {
        $data = $request->validated();

        $produkId = collect($data['items'])->pluck('produk_id')->toArray();

        $dbProduk = Produk::whereIn('id', $produkId)->get()->keyBy('id');

        if(count($dbProduk) !== count($produkId)){
            return response()->json([
                "message" => "Beberapa produk tidak di temukan"
            ]);
        };

        $totalHarga = 0;
        $pesananDetails = [];

        foreach($data['items'] as $item){
            $product = $dbProduk->get($item['produk_id']);
            $hargaSatuan = $product->harga;
            $subTotal = $hargaSatuan * $item['jumlah'];
            $totalHarga += $subTotal;

            $pesananDetails[] = [
                "produk_id" => $item['produk_id'],
                "nama_produk" => $product->nama_produk,
                "harga" => $hargaSatuan,
                "jumlah" => $item['jumlah'],
                "subtotal" => $subTotal,
            ];
        };

        DB::beginTransaction();

        try {
            $pesanan = Pesanan::create([
                "nama_pelanggan" => $data['nama_pelanggan'],
                "email" => $data['email'],
                "telepon" => $data['telepon'],
                "alamat_pengiriman" => $data['alamat_pengiriman'],
                "total_harga" => $totalHarga,
                "status" => 'baru',
            ]);

            $pesananId = $pesanan->id;

            $detailTransaksi = collect($pesananDetails)->map(function($detail) use($pesananId) {
                $detail['pesanan_id'] = $pesananId;
                $detail['created_at'] = now();
                $detail['updated_at'] = now();
                return $detail;
            })->toArray();

            PesananDetail::insert($detailTransaksi);

            DB::commit();


            return response()->json([
                "message" => "Pesanan Berhasil dibuat, Mohon tunggu dihubungi oleh Admin",
                "data" => [
                    "pesanan_id" => $pesananId,
                    "totalHarga" => $totalHarga,
                    "status" => $pesanan->status
                ]
            ], 201);
        } catch (Exception $e) {
            DB::rollBack();

            return response()->json([
                "message"=> "Gagal Checkout",
                "error" => $e->getMessage()
            ]);
        }
    }
}
