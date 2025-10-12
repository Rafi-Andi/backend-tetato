<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Ganti 'false' menjadi 'true' jika Anda mengizinkan siapa pun (tamu) untuk membuat request ini.
        return true; 
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "nama_pelanggan" => "required|string",
            "email" => "required|email",
            "telepon" => "required|string",
            "alamat_pengiriman" => "required|string",
            "items" => "required|array|min:1",        
            "items.*.produk_id" => "required|integer|exists:produks,id",
            "items.*.jumlah" => "required|integer|min:1"
        ];
    }
    
    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'nama_pelanggan.required' => 'Nama pelanggan wajib diisi.',
            'nama_pelanggan.string' => 'Nama pelanggan harus berupa teks.',
            
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            
            'telepon.required' => 'Nomor telepon wajib diisi.',
            'telepon.string' => 'Nomor telepon harus berupa teks.',
            
            'alamat_pengiriman.required' => 'Alamat pengiriman wajib diisi.',
            'alamat_pengiriman.string' => 'Alamat pengiriman harus berupa teks.',
            
            'metode_pembayaran.required' => 'Metode pembayaran wajib dipilih.',
            
            'items.required' => 'Keranjang belanja tidak boleh kosong.',
            'items.array' => 'Format item pesanan tidak valid.',
            'items.min' => 'Anda harus memilih minimal satu produk untuk melanjutkan checkout.',

            'items.*.produk_id.required' => 'ID produk pada item ke-:position wajib diisi.',
            'items.*.produk_id.integer' => 'ID produk harus berupa angka.',
            'items.*.produk_id.exists' => 'Produk dengan ID pada item ke-:position tidak ditemukan.',
            
            'items.*.jumlah.required' => 'Kuantitas (jumlah) produk pada item ke-:position wajib diisi.',
            'items.*.jumlah.integer' => 'Kuantitas harus berupa angka.',
            'items.*.jumlah.min' => 'Kuantitas minimal 1 untuk item ke-:position.'
        ];
    }
}