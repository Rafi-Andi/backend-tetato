<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\Produk;
use Exception;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $query = Pesanan::query();

            if ($request->has('status')) {
                $query->where('status', $request['status']);
            };

            if ($request->has('tanggal')) {
                $query->whereDate('created_at', $request['tanggal']);
            }

            if ($request->has('search')) {
                $search = $request['search'];

                $query->where(function($q) use ($search) {
                    $q->where('id', $search)->orWhere('nama_pelanggan', 'like', "%{$search}%");
                });
            }

            $produk = $query->with('pesanan_details')->paginate(5);

            return response()->json([
                "message" => "berhasil ambil data pesanan",
                "data" => $produk
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                "message" => "gagal mengambil data pesanan",
                "errors" => $e->getMessage()
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Pesanan $pesanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pesanan $pesanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pesanan $pesanan)
    {
        $data = $request->validate([
            "status" =>  "required|string|in:baru,proses,selesai"
        ]);

        $pesanan->update($data);

        return response()->json([
            "message" => "Berhasil update pesanan",
            "data" => $pesanan->status
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pesanan $pesanan)
    {
        //
    }
}
