<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $produk = Produk::with('kategori')->get();

            return response()->json([
                "message" => "Berhasil mengambil data produk",
                "data" => $produk
            ]);
        } catch (Exception $e) {
            return response()->json([
                "message" => "Gagal Mengambil data produk",
                "error" => $e->getMessage()
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
        try {
            $data = $request->validate([
                "kategori_id" => "required|integer|exists:kategoris,id",
                "nama_produk" => "required|string|min:6",
                "harga" => "required|numeric",
                "file_path" => "required|file|mimes:png,jpg,webp|max:1000"
            ]);

            $file_path = $request->file('file_path')->store('img', 'public');
            $file_url = Storage::url($file_path);

            $produk = Produk::create([
                "kategori_id" => $data['kategori_id'],
                "nama_produk" => $data['nama_produk'],
                "harga" => $data['harga'],
                "url_image" => $file_url,
            ]);

            return response()->json([
                "message" => "Berhasil menambahkan produk",
                "data" => $produk
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                "message" => "Validasi Error",
                "errors" => $e->errors()
            ]);
        } catch (Exception $e) {
            return response()->json([
                "message" => "Gagal menambahkan produk",
                "error" => $e->getMessage()
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produk $produk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produk $produk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $produk)
    {
        try {
            $produk->delete();
            return response()->json([
                "message"=> "Berhasil menghapus produk",
                "data" => "null"
            ]);
        } catch (Exception $e) {
            return response()->json([
                "message" => "Gagal menghapus produk",
                "error" => $e->getMessage()
            ]);
        }
    }
}
