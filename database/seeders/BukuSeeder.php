<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Buku;

class BukuSeeder extends Seeder
{
    public function run(): void
    {
        $buku = [
            // Pendidikan
            [
                'judul' => 'Belajar Laravel 12',
                'kategori' => 'pendidikan',
                'sampul' => 'laravel12.jpg',
                'penulis' => 'Andi Saputra',
                'penerbit' => 'Pustaka Ilmu',
                'sinopsis' => 'Panduan lengkap belajar Laravel 12 dari dasar hingga mahir.',
                'harga' => 120000,
                'stok' => 10,
            ],
            [
                'judul' => 'Matematika SMA Kelas 10',
                'kategori' => 'pendidikan',
                'sampul' => 'matematika.jpg',
                'penulis' => 'Budi Santoso',
                'penerbit' => 'Edukasi Media',
                'sinopsis' => 'Buku matematika lengkap untuk siswa SMA kelas 10.',
                'harga' => 80000,
                'stok' => 15,
            ],
            [
                'judul' => 'Fisika Dasar',
                'kategori' => 'pendidikan',
                'sampul' => 'fisika.jpg',
                'penulis' => 'Citra Dewi',
                'penerbit' => 'Ilmu Pengetahuan',
                'sinopsis' => 'Pengantar fisika dasar dengan contoh soal lengkap.',
                'harga' => 90000,
                'stok' => 12,
            ],
            [
                'judul' => 'Sejarah Dunia',
                'kategori' => 'pendidikan',
                'sampul' => 'sejarah.jpg',
                'penulis' => 'Dedi Prasetyo',
                'penerbit' => 'Pustaka Dunia',
                'sinopsis' => 'Buku sejarah dunia dari zaman kuno hingga modern.',
                'harga' => 95000,
                'stok' => 8,
            ],
            [
                'judul' => 'Biologi Modern',
                'kategori' => 'pendidikan',
                'sampul' => 'biologi.jpg',
                'penulis' => 'Elisa Rahma',
                'penerbit' => 'EduScience',
                'sinopsis' => 'Pembahasan biologi modern untuk pelajar dan mahasiswa.',
                'harga' => 110000,
                'stok' => 10,
            ],

            // Olahraga
            [
                'judul' => 'Latihan Fisik Harian',
                'kategori' => 'olahraga',
                'sampul' => 'latihan_fisik.jpg',
                'penulis' => 'Fajar Nugroho',
                'penerbit' => 'FitMedia',
                'sinopsis' => 'Panduan latihan fisik harian untuk kebugaran.',
                'harga' => 70000,
                'stok' => 20,
            ],
            [
                'judul' => 'Sepak Bola Dasar',
                'kategori' => 'olahraga',
                'sampul' => 'sepakbola.jpg',
                'penulis' => 'Gilang Ramadhan',
                'penerbit' => 'Sportiva',
                'sinopsis' => 'Teknik dasar sepak bola untuk pemula.',
                'harga' => 65000,
                'stok' => 15,
            ],
            [
                'judul' => 'Yoga untuk Pemula',
                'kategori' => 'olahraga',
                'sampul' => 'yoga.jpg',
                'penulis' => 'Hesti Anggraini',
                'penerbit' => 'ZenMedia',
                'sinopsis' => 'Panduan yoga untuk pemula agar sehat dan rileks.',
                'harga' => 75000,
                'stok' => 12,
            ],
            [
                'judul' => 'Kebugaran Jasmani',
                'kategori' => 'olahraga',
                'sampul' => 'kebugaran.jpg',
                'penulis' => 'Ivan Pratama',
                'penerbit' => 'FitBooks',
                'sinopsis' => 'Buku lengkap tentang kebugaran jasmani dan latihan otot.',
                'harga' => 80000,
                'stok' => 10,
            ],
            [
                'judul' => 'Atletik Dasar',
                'kategori' => 'olahraga',
                'sampul' => 'atletik.jpg',
                'penulis' => 'Joko Santoso',
                'penerbit' => 'SportScience',
                'sinopsis' => 'Dasar-dasar atletik dan latihan lari untuk pemula.',
                'harga' => 68000,
                'stok' => 18,
            ],

            // Fiksi
            [
                'judul' => 'Petualangan di Negeri Ajaib',
                'kategori' => 'fiksi',
                'sampul' => 'negeri_ajaib.jpg',
                'penulis' => 'Kirana Putri',
                'penerbit' => 'FiksiMuda',
                'sinopsis' => 'Cerita fiksi penuh petualangan dan fantasi.',
                'harga' => 90000,
                'stok' => 10,
            ],
            [
                'judul' => 'Detektif Cilik',
                'kategori' => 'fiksi',
                'sampul' => 'detektif.jpg',
                'penulis' => 'Liam Hartanto',
                'penerbit' => 'StoryBooks',
                'sinopsis' => 'Petualangan seorang detektif cilik yang cerdas.',
                'harga' => 85000,
                'stok' => 15,
            ],
            [
                'judul' => 'Dongeng Malam',
                'kategori' => 'fiksi',
                'sampul' => 'dongeng.jpg',
                'penulis' => 'Maya Lestari',
                'penerbit' => 'CeritaIndah',
                'sinopsis' => 'Kumpulan dongeng malam untuk anak-anak.',
                'harga' => 60000,
                'stok' => 20,
            ],
            [
                'judul' => 'Novel Cinta Remaja',
                'kategori' => 'fiksi',
                'sampul' => 'cinta_remaja.jpg',
                'penulis' => 'Nadia Prameswari',
                'penerbit' => 'TeenBooks',
                'sinopsis' => 'Cerita fiksi romantis untuk remaja.',
                'harga' => 75000,
                'stok' => 12,
            ],
            [
                'judul' => 'Misteri Hutan Terlarang',
                'kategori' => 'fiksi',
                'sampul' => 'misteri_hutan.jpg',
                'penulis' => 'Omar Fikri',
                'penerbit' => 'MysteryBooks',
                'sinopsis' => 'Novel misteri penuh teka-teki di hutan terlarang.',
                'harga' => 88000,
                'stok' => 8,
            ],

            // Desain
            [
                'judul' => 'Desain Grafis untuk Pemula',
                'kategori' => 'desain',
                'sampul' => 'grafis.jpg',
                'penulis' => 'Putri Andini',
                'penerbit' => 'CreativeBooks',
                'sinopsis' => 'Belajar desain grafis dari dasar dengan mudah.',
                'harga' => 95000,
                'stok' => 12,
            ],
            [
                'judul' => 'Tips Desain Interior',
                'kategori' => 'desain',
                'sampul' => 'interior.jpg',
                'penulis' => 'Qori Ahmad',
                'penerbit' => 'DesignMedia',
                'sinopsis' => 'Panduan tips desain interior rumah modern.',
                'harga' => 105000,
                'stok' => 10,
            ],
            [
                'judul' => 'Desain UI/UX Modern',
                'kategori' => 'desain',
                'sampul' => 'uiux.jpg',
                'penulis' => 'Rina Wulandari',
                'penerbit' => 'TechBooks',
                'sinopsis' => 'Buku panduan desain UI/UX modern untuk aplikasi dan web.',
                'harga' => 120000,
                'stok' => 8,
            ],
            [
                'judul' => 'Fotografi Kreatif',
                'kategori' => 'desain',
                'sampul' => 'fotografi.jpg',
                'penulis' => 'Satria Nugraha',
                'penerbit' => 'CreativeMedia',
                'sinopsis' => 'Tips dan trik fotografi kreatif untuk pemula dan profesional.',
                'harga' => 98000,
                'stok' => 15,
            ],
            [
                'judul' => 'Desain Logo Profesional',
                'kategori' => 'desain',
                'sampul' => 'logo.jpg',
                'penulis' => 'Tania Dewi',
                'penerbit' => 'BrandBooks',
                'sinopsis' => 'Panduan lengkap membuat logo profesional dari awal.',
                'harga' => 110000,
                'stok' => 10,
            ],
        ];

        // Tambahkan buku ke database
        foreach ($buku as $b) {
            Buku::create($b);
        }
    }
}
