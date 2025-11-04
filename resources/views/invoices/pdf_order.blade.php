<!DOCTYPE html>
<html>
<head>
    <title>Bukti Pemesanan - Tetato Chips</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; font-size: 10pt; color: #333; }
        .invoice-box { width: 100%; max-width: 800px; margin: 0 auto; padding: 20px; }
        
        .header-section { margin-bottom: 25px; border-bottom: 1px solid #eee; padding-bottom: 15px; }
        .header-section table { width: 100%; border-collapse: collapse; }
        .header-section td { padding: 5px 0; vertical-align: top; }
        
        .company-name { font-size: 16pt; font-weight: bold; color: #FFB800; }
        .invoice-title { font-size: 20pt; font-weight: bold; text-align: right; color: #1a1a1a; }

        .customer-detail-section { margin-bottom: 25px; }
        .customer-detail-section p { margin: 3px 0; line-height: 1.5; }
        .customer-detail-section strong { display: inline-block; width: 110px; font-weight: bold; }
        
        .product-table { width: 100%; border-collapse: collapse; margin-top: 20px; margin-bottom: 30px; }
        .product-table thead th { 
            background-color: #FFB800; 
            color: #1a1a1a;
            font-weight: bold;
            padding: 10px;
            text-align: left;
            border: 1px solid #FFB800; 
        }
        .product-table tbody td {
            padding: 8px 10px;
            border-bottom: 1px solid #f0f0f0;
            vertical-align: top;
        }
        .text-right { text-align: right; }
        .text-center { text-align: center; }

        .summary-table { width: 100%; border-collapse: collapse; }
        .summary-table td { padding: 5px 0; }
        .summary-label { text-align: right; width: 75%; padding-right: 15px; font-weight: normal; }
        .summary-value { text-align: right; width: 25%; font-weight: normal; }
        
        .grand-total-row td {
            font-size: 12pt;
            font-weight: bold;
            border-top: 2px solid #333;
            padding-top: 10px;
        }

        .note {
            margin-top: 25px;
            padding: 10px;
            background: #fff7e6;
            border-left: 4px solid #FFB800;
            font-size: 9.5pt;
            line-height: 1.5;
        }
    </style>
</head>
<body>

<div class="invoice-box">

    <div class="header-section">
        <table>
            <tr>
                <td style="width: 50%;">
                    <div class="company-name">TETATO CHIPS</div>
                    <p style="margin: 0; line-height: 1.4;">
                        Lakarsantri 3A No. 34A,<br>
                        Surabaya, Indonesia 60211<br>
                        Telp: (+62) 823–3706–9983
                    </p>
                </td>
                <td style="width: 50%; text-align: right;">
                    <div class="invoice-title">BUKTI PEMESANAN</div>
                    <p style="margin: 0; line-height: 1.4; font-size: 10pt;">
                        <strong>Kode Pesanan:</strong> #{{ $data->kode_pesanan }}<br>
                        <strong>Tanggal:</strong> {{ $data->tanggal }}
                    </p>
                </td>
            </tr>
        </table>
    </div>

    <div class="customer-detail-section">
        <p style="font-size: 12pt; font-weight: bold; margin-bottom: 10px;">Detail Pelanggan:</p>
        <p><strong>Nama:</strong> {{ $data->nama_pelanggan }}</p>
        <p><strong>Alamat:</strong> {{ $data->alamat }}</p>
        <p><strong>No. HP:</strong> {{ $data->telepon }}</p>
    </div>

    <p style="font-size: 12pt; font-weight: bold; margin-bottom: 10px;">Rincian Produk:</p>
    <table class="product-table">
        <thead>
            <tr>
                <th style="width: 45%;">Produk</th>
                <th class="text-right" style="width: 20%;">Harga Satuan</th>
                <th class="text-center" style="width: 10%;">Qty</th>
                <th class="text-right" style="width: 25%;">Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data->detail_transaksi as $item) 
            <tr>
                <td>{{ $item['nama_produk'] }}</td>
                <td class="text-right">{{ number_format($item['harga'], 0, ',', '.') }}</td>
                <td class="text-center">{{ number_format($item['jumlah'], 0, ',', '.') }}</td>
                <td class="text-right">{{ number_format($item['subtotal'], 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <table class="summary-table">
        <tr>
            <td class="summary-label">Total Harga Produk:</td>
            <td class="summary-value">{{ number_format($data->totalHarga, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <td class="summary-label">Status:</td>
            <td class="summary-value" style="font-weight:bold; color:#FFB800;">Menunggu Konfirmasi Ongkir</td>
        </tr>
    </table>

    <div class="note">
        <p><strong>Catatan:</strong></p>
        <p>
            Terima kasih telah memesan di <strong>Tetato Chips</strong>!<br>
            Pesanan Anda telah kami terima dan akan segera kami proses.  
            Tim kami akan menghubungi Anda melalui WhatsApp untuk konfirmasi biaya pengiriman dan total pembayaran akhir.
        </p>
        <p>
            Simpan bukti pemesanan ini sebagai referensi sebelum Anda menerima invoice lengkap.
        </p>
    </div>
</div>

{{ $data->kode_pesanan }}
</body>
</html>