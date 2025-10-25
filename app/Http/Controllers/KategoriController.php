<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $kategori = Kategori::select('id', 'nama_kategori')->paginate(5);

            return response()->json([
                "message" => "Berhasil mengambil data kategori",
                "data" => $kategori
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                "message" => "Gagal Mengambil Data Kategori",
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
            $data = $request->validate(["nama_kategori" => "required|string|min:4"]);

            $kategori = Kategori::create($data);

            return response()->json([
                "message" => "Berhasil menambah kategori",
                "data" => $kategori
            ], 200);
        } catch (ValidationException $e) {
            return response()->json([
                "message" => "Validasi Error",
                "errors" => $e->errors()
            ], 500);
        } catch (Exception $e) {
            return response()->json([
                "message" => "Gagal login",
                "error" => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategori $kategori) {}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kategori $kategori)
    {
        try {
            $data = $request->validate(["nama_kategori" => "required|string|min:4"]);

            $kategori->update($data);

            return response()->json([
                "message" => "Berhasil menambah kategori",
                "data" => $kategori
            ], 200);
        } catch (ValidationException $e) {
            return response()->json([
                "message" => "Validasi Error",
                "errors" => $e->errors()
            ], 500);
        } catch (Exception $e) {
            return response()->json([
                "message" => "Gagal login",
                "error" => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $kategori)
    {
        try {
            $kategori->delete();
            return response()->json([
                "message" => "berhasil menghapus kategori",
                "data" => null
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                "message" => "Gagal menghapus kategori",
                "error" => $e->getMessage()
            ], 500);
        }
    }
}
