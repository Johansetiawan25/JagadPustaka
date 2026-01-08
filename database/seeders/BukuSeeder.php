<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Buku;

class BukuSeeder extends Seeder
{
    public function run(): void
    {
        Buku::create([
            'judul' => 'Belajar Laravel',
            'sampul' => 'laravel.jpg',
            'penulis' => 'Andi',
            'penerbit' => 'Pustaka Kita',
            'sinopsis' => 'Buku panduan belajar Laravel dari dasar hingga mahir.',
            'harga' => 120000,
            'stok' => 10
        ]);

        Buku::create([
            'judul' => 'PHP untuk Pemula',
            'sampul' => 'php.jpg',
            'penulis' => 'Budi',
            'penerbit' => 'TechBooks',
            'sinopsis' => 'Panduan lengkap PHP untuk pemula.',
            'harga' => 90000,
            'stok' => 15
        ]);

        Buku::create([
            'judul' => 'Desain Web Modern',
            'sampul' => 'desain.jpg',
            'penulis' => 'Citra',
            'penerbit' => 'WebMedia',
            'sinopsis' => 'Tips dan trik desain web modern.',
            'harga' => 150000,
            'stok' => 8
        ]);
    }
}