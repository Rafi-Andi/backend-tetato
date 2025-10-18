<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Stringable;

class ProdukSeeder extends Seeder
{
    /**
     * Jalankan database seeds.
     */
    public function run(): void
    {
        DB::table('produks')->insert([
            [
                'kategori_id' => 1,
                'nama_produk' => 'Tetato Korean BBQ 65 Gram',
                'slug' => 'tetato-korean-bbq-65-gram',
                'harga' => 15000,
                'url_image' => 'http://127.0.0.1:8000/storage/img/FQK9gqsS3MBjrairdpkLT9nD9SuconeNfvbucFN5.webp',
                'deskripsi' => 'Rasa smoky manis gurih ala barbeque Korea, bikin ngemil jadi makin seru.',
            ],
            [
                'kategori_id' => 1,
                'nama_produk' => 'Tetato Chips Spicy 65 Gram',
                'slug' => 'tetato-chips-spicy-65-gram',
                'harga' => 15000,
                'url_image' => 'http://127.0.0.1:8000/storage/img/qhL9RsVEdar0hT0xbIMN8eYQRltSU6KUUZnuox46.webp',
                'deskripsi' => 'Pedas mantap yang bikin lidah bergoyang, cocok buat pecinta sensasi hot & crunchy!',
            ],
            [
                'kategori_id' => 1,
                'nama_produk' => 'Tetato Chips Original 65 Gram',
                'slug' => 'tetato-chips-original-65-gram',
                'harga' => 15000,
                'url_image' => 'http://127.0.0.1:8000/storage/img/UsdiXLaQhi6PPgJfr0snfGCjJFS91FbWUXrSD0e6.webp',
                'deskripsi' => 'Kerenyahan kentang asli dengan rasa gurih alami. Ringan, renyah, dan selalu bikin nagih!',
            ],
            [
                'kategori_id' => 1,
                'nama_produk' => 'Tetato Sour Cream 65 Gram',
                'slug' => 'tetato-sour-cream-65-gram',
                'harga' => 15000,
                'url_image' => 'http://127.0.0.1:8000/storage/img/tbrT6nDdbJ8gd15hC5gXWLxZ8ioi789ci13qPzYg.webp',
                'deskripsi' => 'Perpaduan gurih, creamy, dan segar dari sour cream dengan sentuhan bawang yang khas.',
            ],
            [
                'kategori_id' => 1,
                'nama_produk' => 'Tetato Roasted Corn 65 Gram',
                'slug' => 'tetato-roasted-corn-65-gram',
                'harga' => 15000,
                'url_image' => 'http://127.0.0.1:8000/storage/img/suFDsqfwHea9JBtZbYgZmjKCv3gQGmTNxFY8W0Ri.webp',
                'deskripsi' => 'Aroma jagung bakar manis gurih yang khas, bikin camilan ini beda dari yang lain.',
            ],
            [
                'kategori_id' => 2,
                'nama_produk' => 'Tetato Korean BBQ 250 Gram',
                'slug' => 'tetato-korean-bbq-250-gram',
                'harga' => 50000,
                'url_image' => 'http://127.0.0.1:8000/storage/img/DfExanfXl1JnpGzKwmR1NzkOoVHVEPBqJfNELFgA.webp',
                'deskripsi' => 'Rasa smoky manis gurih ala barbeque Korea, bikin ngemil jadi makin seru.',
            ],
            [
                'kategori_id' => 2,
                'nama_produk' => 'Tetato Chips Spicy 250 Gram',
                'slug' => 'tetato-chips-spicy-250-gram',
                'harga' => 50000,
                'url_image' => 'http://127.0.0.1:8000/storage/img/vK6ITkf10Ak4WCHJ3AKvClBY6sTZiiOsauP9oimV.webp',
                'deskripsi' => 'Pedas mantap yang bikin lidah bergoyang, cocok buat pecinta sensasi hot & crunchy!',
            ],
            [
                'kategori_id' => 2,
                'nama_produk' => 'Tetato Chips Original 250 Gram',
                'slug' => 'tetato-chips-original-250-gram',
                'harga' => 50000,
                'url_image' => 'http://127.0.0.1:8000/storage/img/Fk9KMcMidVdtdLDEuv32d9yuHr6Nrvml9jp6CZVL.webp',
                'deskripsi' => 'Kerenyahan kentang asli dengan rasa gurih alami. Ringan, renyah, dan selalu bikin nagih!',
            ],
            [
                'kategori_id' => 2,
                'nama_produk' => 'Tetato Sour Cream 250 Gram',
                'slug' => 'tetato-sour-cream-250-gram',
                'harga' => 50000,
                'url_image' => 'http://127.0.0.1:8000/storage/img/JAkwPeUlJMvHQKttZdJnB4wrEmt3CaXeO1mFgF1w.webp',
                'deskripsi' => 'Perpaduan gurih, creamy, dan segar dari sour cream dengan sentuhan bawang yang khas.',
            ],
            [
                'kategori_id' => 2,
                'nama_produk' => 'Tetato Roasted Corn 250 Gram',
                'slug' => 'tetato-roasted-corn-250-gram',
                'harga' => 50000,
                'url_image' => 'http://127.0.0.1:8000/storage/img/K10V91T4lB6kHpvMNaRsNmPr3ZQTC25rPDD74nzW.webp',
                'deskripsi' => 'Aroma jagung bakar manis gurih yang khas, bikin camilan ini beda dari yang lain.',
            ],
            [
                'kategori_id' => 3,
                'nama_produk' => 'Bundling Hemat 4 Pcs 65 Gram',
                'slug' => 'bundling-hemat-4-pcs-65-gram',
                'harga' => 57000,
                'url_image' => 'http://127.0.0.1:8000/storage/img/imnhzlKLd1FU7em0F7p2G40RTXH4LDol72ocTlK8.png',
                'deskripsi' => 'Aroma jagung bakar manis gurih yang khas, bikin camilan ini beda dari yang lain.',
            ],
        ]);
    }
}
