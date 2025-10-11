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
                'nama_produk' => 'Tetato Korean BBQ',
                'slug' => 'tetato-korean-bbq-65-gram',
                'harga' => 15000,
                'url_image' => 'https://ik.imagekit.io/misxxns4p/produk/korean-65gram.webp',
                'deskripsi' => 'Rasa smoky manis gurih ala barbeque Korea, bikin ngemil jadi makin seru.',
            ],
            [
                'kategori_id' => 1,
                'nama_produk' => 'Tetato Chips Spicy',
                'slug' => 'tetato-chips-spicy-65-gram',
                'harga' => 15000,
                'url_image' => 'https://ik.imagekit.io/misxxns4p/produk/spicy-65gram.webp',
                'deskripsi' => 'Pedas mantap yang bikin lidah bergoyang, cocok buat pecinta sensasi hot & crunchy!',
            ],
            [
                'kategori_id' => 1,
                'nama_produk' => 'Tetato Chips Original',
                'slug' => 'tetato-chips-original-65-gram',
                'harga' => 15000,
                'url_image' => 'https://ik.imagekit.io/misxxns4p/produk/original-65gram.webp',
                'deskripsi' => 'Kerenyahan kentang asli dengan rasa gurih alami. Ringan, renyah, dan selalu bikin nagih!',
            ],
            [
                'kategori_id' => 1,
                'nama_produk' => 'Tetato Sour Cream',
                'slug' => 'tetato-sour-cream-65-gram',
                'harga' => 15000,
                'url_image' => 'https://ik.imagekit.io/misxxns4p/produk/sourcream-65gram.webp',
                'deskripsi' => 'Perpaduan gurih, creamy, dan segar dari sour cream dengan sentuhan bawang yang khas.',
            ],
            [
                'kategori_id' => 1,
                'nama_produk' => 'Tetato Roasted Corn',
                'slug' => 'tetato-roasted-corn-65-gram',
                'harga' => 15000,
                'url_image' => 'https://ik.imagekit.io/misxxns4p/produk/roasted-65gram.webp',
                'deskripsi' => 'Aroma jagung bakar manis gurih yang khas, bikin camilan ini beda dari yang lain.',
            ],
            [
                'kategori_id' => 2,
                'nama_produk' => 'Tetato Korean BBQ',
                'slug' => 'tetato-korean-bbq-250-gram',
                'harga' => 50000,
                'url_image' => 'https://ik.imagekit.io/misxxns4p/produk/korean-250gram.webp',
                'deskripsi' => 'Rasa smoky manis gurih ala barbeque Korea, bikin ngemil jadi makin seru.',
            ],
            [
                'kategori_id' => 2,
                'nama_produk' => 'Tetato Chips Spicy',
                'slug' => 'tetato-chips-spicy-250-gram',
                'harga' => 50000,
                'url_image' => 'https://ik.imagekit.io/misxxns4p/produk/spicy-250gram.webp',
                'deskripsi' => 'Pedas mantap yang bikin lidah bergoyang, cocok buat pecinta sensasi hot & crunchy!',
            ],
            [
                'kategori_id' => 2,
                'nama_produk' => 'Tetato Chips Original',
                'slug' => 'tetato-chips-original-250-gram',
                'harga' => 50000,
                'url_image' => 'https://ik.imagekit.io/misxxns4p/produk/original-250gram.webp',
                'deskripsi' => 'Kerenyahan kentang asli dengan rasa gurih alami. Ringan, renyah, dan selalu bikin nagih!',
            ],
            [
                'kategori_id' => 2,
                'nama_produk' => 'Tetato Sour Cream',
                'slug' => 'tetato-sour-cream-250-gram',
                'harga' => 50000,
                'url_image' => 'https://ik.imagekit.io/misxxns4p/produk/sourcream-250gram.webp',
                'deskripsi' => 'Perpaduan gurih, creamy, dan segar dari sour cream dengan sentuhan bawang yang khas.',
            ],
            [
                'kategori_id' => 2,
                'nama_produk' => 'Tetato Roasted Corn',
                'slug' => 'tetato-roasted-corn-250-gram',
                'harga' => 50000,
                'url_image' => 'https://ik.imagekit.io/misxxns4p/produk/roastedcorn-250gram.webp',
                'deskripsi' => 'Aroma jagung bakar manis gurih yang khas, bikin camilan ini beda dari yang lain.',
            ],
        ]);
    }
}
