<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; 
    }

    public function rules(): array
    {
        return [
            'nama_pelanggan' => 'required|string',
            'email' => 'required|email',
            'telepon' => ['required', 'regex:/^(?:\\+62|62|0)8[0-9]{8,13}$/', 'string'],
            'alamat_pengiriman' => 'required|string',
            'items' => 'required|array|min:1',        
            'items.*.produk_id' => 'required|integer|exists:produks,id',
            'items.*.jumlah' => 'required|integer|min:1',
        ];
    }
    
    public function messages(): array
    {
        return [
            'nama_pelanggan.required' => 'Nama pelanggan wajib diisi.',
            'nama_pelanggan.string' => 'Nama pelanggan harus berupa teks.',
            
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            
            'telepon.required' => 'Nomor telepon wajib diisi.',
            'telepon.regex' => 'Nomor WhatsApp harus diawali dengan 08, 62, atau +62 dan hanya berisi angka.',
            'telepon.string' => 'Nomor WhatsApp harus berupa teks.',
            
            'alamat_pengiriman.required' => 'Alamat pengiriman wajib diisi.',
            'alamat_pengiriman.string' => 'Alamat pengiriman harus berupa teks.',
            
            'items.required' => 'Keranjang belanja tidak boleh kosong.',
            'items.array' => 'Format item pesanan tidak valid.',
            'items.min' => 'Anda harus memilih minimal satu produk untuk melanjutkan checkout.',

            'items.*.produk_id.required' => 'ID produk wajib diisi.',
            'items.*.produk_id.integer' => 'ID produk harus berupa angka.',
            'items.*.produk_id.exists' => 'Produk yang dipilih tidak ditemukan.',
            
            'items.*.jumlah.required' => 'Kuantitas produk wajib diisi.',
            'items.*.jumlah.integer' => 'Kuantitas harus berupa angka.',
            'items.*.jumlah.min' => 'Kuantitas minimal 1 untuk setiap produk.',
        ];
    }
}
