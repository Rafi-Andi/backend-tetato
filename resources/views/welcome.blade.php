<!DOCTYPE html>
<html>
<head>
    <title>Invoice Pesanan</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        /* Gaya CSS untuk tampilan PDF */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            font-size: 12px;
        }

        .invoice-container {
            width: 100%;
            max-width: 700px;
            margin: 20px auto;
            border: 1px solid #000;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header h1 {
            color: #1a1a1a;
            font-size: 24px;
            border-bottom: 2px solid #333;
            padding-bottom: 10px;
            margin-bottom: 15px;
        }

        .detail-group {
            margin-bottom: 15px;
        }

        .detail-group p {
            margin: 3px 0;
            line-height: 1.5;
        }

        .detail-group strong {
            display: inline-block;
            width: 100px; /* Lebar label untuk keselarasan */
        }

        .section-title {
            font-weight: bold;
            font-size: 16px;
            margin-top: 20px;
            margin-bottom: 10px;
            color: #1a1a1a;
        }

        /* Tabel Produk */
        .product-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .product-table th, .product-table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .product-table th {
            background-color: #ffb800; /* Warna kuning dari desain */
            color: #1a1a1a;
            font-weight: bold;
            border-bottom: none;
        }

        .product-table .text-right {
            text-align: right;
        }

        .product-table .text-center {
            text-align: center;
        }

        /* Summary (Total) */
        .summary-box {
            margin-top: 20px;
            width: 100%;
            border-top: 2px solid #333;
            padding-top: 10px;
        }

        .summary-label {
            width: 75%;
            text-align: right;
            padding: 5px 10px 5px 0;
            font-weight: normal;
        }

        .summary-value {
            width: 25%;
            text-align: right;
            padding: 5px 0 5px 10px;
            font-weight: normal;
        }

        .grand-total {
            font-size: 18px;
            font-weight: bold;
            color: #1a1a1a;
            border-top: 1px solid #ddd;
            padding-top: 10px;
        }
    </style>
</head>
<body>

<div class="invoice-container">

    <div class="header">
        <h1>Detail Pesanan</h1>
    </div>

    {{-- DATA DUMMY: DETAIL CUSTOMER --}}
    <div class="detail-group">
        <p><strong>Customer :</strong> NAMA CUSTOMER DUMMY</p>
        <p><strong>Alamat :</strong> ALAMAT LENGKAP PENGIRIMAN DUMMY</p>
        <p><strong>No HP :</strong> +62 812 3456 7890</p>
    </div>

    {{-- DATA DUMMY: DAFTAR PRODUK --}}
    <div class="section-title">Produk :</div>
    <table class="product-table">
        <thead>
            <tr>
                <th style="width: 40%;">Produk</th>
                <th style="width: 20%; text-align: right;">Harga</th>
                <th style="width: 10%; text-align: center;">Qty</th>
                <th style="width: 30%; text-align: right;">Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @php 
                $ongkir = 20000;
                $item1_harga = 15000; $item1_qty = 2; $item1_subtotal = $item1_harga * $item1_qty;
                $item2_harga = 50000; $item2_qty = 1; $item2_subtotal = $item2_harga * $item2_qty;
                $subtotalProduk = $item1_subtotal + $item2_subtotal;
                $totalAkhir = $subtotalProduk + $ongkir;
            @endphp
            
            {{-- Item 1 --}}
            <tr>
                <td>Tetato Chips Original 65 Gram</td>
                <td class="text-right">{{ number_format($item1_harga, 0, ',', '.') }}</td>
                <td class="text-center">{{ $item1_qty }}</td>
                <td class="text-right">{{ number_format($item1_subtotal, 0, ',', '.') }}</td>
            </tr>
            {{-- Item 2 --}}
            <tr>
                <td>Tetato Chips Spicy 250 Gram</td>
                <td class="text-right">{{ number_format($item2_harga, 0, ',', '.') }}</td>
                <td class="text-center">{{ $item2_qty }}</td>
                <td class="text-right">{{ number_format($item2_subtotal, 0, ',', '.') }}</td>
            </tr>
            {{-- Tambah Item Dummy Lagi --}}
            <tr>
                <td>Minuman Segar Botol</td>
                <td class="text-right">{{ number_format(10000, 0, ',', '.') }}</td>
                <td class="text-center">3</td>
                <td class="text-right">{{ number_format(30000, 0, ',', '.') }}</td>
            </tr>

        </tbody>
    </table>


    {{-- DATA DUMMY: RINGKASAN TOTAL (TERMASUK ONGKIR) --}}
    <div class="summary-box">
        <table style="width: 100%; border-collapse: collapse;">
            {{-- Baris Subtotal Produk --}}
            <tr>
                <td class="summary-label" style="text-align: right; width: 80%; padding: 5px 10px 5px 0; border: none;">Subtotal Produk:</td>
                {{-- Angka dihitung dari data dummy di atas: 30.000 + 50.000 + 30.000 = 110.000 --}}
                <td class="summary-value" style="text-align: right; width: 20%; padding: 5px 0 5px 10px; border: none;">Rp 110.000</td>
            </tr>
            {{-- Baris Ongkir --}}
            <tr>
                <td class="summary-label" style="text-align: right; width: 80%; padding: 5px 10px 5px 0; border: none;">Ongkos Kirim:</td>
                <td class="summary-value" style="text-align: right; width: 20%; padding: 5px 0 5px 10px; border: none;">Rp {{ number_format($ongkir, 0, ',', '.') }}</td>
            </tr>
            {{-- Baris Grand Total (Total Akhir) --}}
            <tr class="grand-total">
                <td class="summary-label" style="text-align: right; width: 80%; padding: 10px 10px 0 0; border-top: 1px solid #ddd; font-size: 14px;">TOTAL AKHIR:</td>
                {{-- Angka Total: 110.000 + 20.000 = 130.000 --}}
                <td class="summary-value" style="text-align: right; width: 20%; padding: 10px 0 0 10px; border-top: 1px solid #ddd; font-size: 14px; font-weight: bold;">Rp 130.000</td>
            </tr>
        </table>
    </div>

</div>

</body>
</html>