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

            if ($request->filled('status')) {
                $query->where('status', $request['status']);
            };

            if ($request->filled('date')) {
                $query->whereDate('created_at', $request['date']);
            }

            if ($request->filled('search')) {
                $search = $request['search'];

                $query->where(function ($q) use ($search) {
                    $q->where('id', $search)->orWhere('nama_pelanggan', 'like', "%{$search}%");
                });
            }

            $produk = $query->with('pesanan_details')->orderByDesc('created_at')->paginate(5);

            return response()->json([
                "message" => "berhasil ambil data pesanan",
                "data" => $produk
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                "message" => "gagal mengambil data pesanan",
                "errors" => $e->getMessage()
            ], 500);
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
        $pesanan->load('pesanan_details');
        return response()->json([
            "message" => "Berhasil menampilkan detail pesanan",
            "data" => $pesanan
        ]);
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
            "status" =>  "required|string|in:baru,proses,dikirim,selesai"
        ]);

        $pesanan->update($data);

        return response()->json([
            "message" => "Berhasil update pesanan",
            "data" => $pesanan->status
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pesanan $pesanan)
    {
        //
    }
}
