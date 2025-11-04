<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Exception;
use App\Models\Produk;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {

            $query = Produk::query()->with('kategori');

            if ($request->has('kategori')) {
                $query->whereHas('kategori', function ($query) use ($request) {
                    $query->where('id', $request['kategori']);
                });
            }

            $produk = $query->paginate(5);
            return response()->json([
                "message" => "Berhasil mengambil data produk",
                "data" => $produk
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                "message" => "Gagal Mengambil data produk",
                "error" => $e->getMessage()
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
        try {
            $data = $request->validate([
                "kategori_id" => "required|integer|exists:kategoris,id",
                "nama_produk" => "required|string|min:6",
                "harga" => "required|numeric",
                "deskripsi" => "required|string|min:8",
                "file_path" => "required|file|mimes:png,jpg,webp|max:1000"
            ]);

            $file_path = $request->file('file_path')->store('img', 'public');
            $file_url = Storage::url($file_path);

            $image_url = 'http://127.0.0.1:8000' . $file_url;

            $produk = Produk::create([
                "kategori_id" => $data['kategori_id'],
                "nama_produk" => $data['nama_produk'],
                "slug" => Str::slug($data['nama_produk']),
                "harga" => $data['harga'],
                "url_image" => $image_url,
                "deskripsi" => $data['deskripsi']
            ]);


            return response()->json([
                "message" => "Berhasil menambahkan produk",
                "data" => [
                    "produk" => $produk,
                    "nama_kategori" => $produk->kategori->nama_kategori
                ]
            ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                "message" => "Validasi Error",
                "errors" => $e->errors()
            ], 500);
        } catch (Exception $e) {
            return response()->json([
                "message" => "Gagal menambahkan produk",
                "error" => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        try {
            $produk = Produk::where('slug', $slug)->with('kategori')->get();
            return response()->json([
                "message" => "berhasil mengambil detail produk",
                "data" => $produk
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                "message" => "Gagal mengambil detail produk",
                "error" => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produk $produk) {}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produk $produk)
    {

        try {
            $data = $request->validate([
                "kategori_id" => "required|integer|exists:kategoris,id",
                "nama_produk" => "required|string|min:6",
                "harga" => "required|numeric",
                "file_path" => "sometimes|file|mimes:png,jpg,webp|max:1000",
                "deskripsi" => "required|string|min:8",
                "_method" => "sometimes|in:PUT,PATCH",
            ]);

            $produkData = [
                "kategori_id" => $data['kategori_id'],
                "nama_produk" => $data['nama_produk'],
                "harga" => $data['harga'],
                "slug" => Str::slug($data['nama_produk']),
                "deskripsi" => $data['deskripsi']
            ];

            if ($request->hasFile('file_path')) {
                $file_path = $request->file('file_path')->store('img', 'public');
                $file_url = Storage::url($file_path);

                $url_image = 'http://127.0.0.1:8000' . $file_url;
                $produkData['url_image'] = $url_image;
            }

            $produk->update($produkData);

            return response()->json([
                "message" => "Berhasil Mengedit produk",
                "data" => $produk,
            ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                "message" => "Validasi Error",
                "errors" => $e->errors()
            ], 500);
        } catch (Exception $e) {
            return response()->json([
                "message" => "Gagal menambahkan produk",
                "error" => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $produk)
    {
        try {
            $produk->delete();
            return response()->json([
                "message" => "Berhasil menghapus produk",
                "data" => "null"
            ], 201);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['message' => 'Gagal menghapus produk, masih digunakan di pesanan!'], 500);
        } catch (Exception $e) {
            return response()->json([
                "message" => "Gagal menghapus produk",
                "error" => $e->getMessage()
            ], 500);
        }
    }
}
