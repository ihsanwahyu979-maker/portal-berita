<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;
use Carbon\Carbon;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Bersihkan koleksi jika ingin me-reset (opsional)
        // Article::truncate();

        $articles = [
            [
                'title' => 'Pemilu 2026 Berjalan Lancar di Seluruh Nusantara',
                'category' => 'Nasional',
                'is_featured' => true,
                'view_count' => 15200,
                'excerpt' => 'Proses pemilihan umum tahun ini dinilai sebagai yang paling damai dan teratur dibandingkan tahun-tahun sebelumnya.',
                'content' => "Jakarta — Pelaksanaan Pemilu serentak 2026 yang berlangsung hari ini dilaporkan berjalan sangat kondusif di hampir seluruh wilayah Indonesia.\n\nMenurut laporan dari KPU dan Bawaslu, tingkat partisipasi masyarakat meningkat tajam hingga menyentuh angka 85%. Tidak ada insiden kerusuhan berarti yang dilaporkan. Para pengamat politik memuji kedewasaan demokrasi rakyat Indonesia yang semakin matang.",
                'image_url' => 'https://images.unsplash.com/photo-1540910419892-4a36d2c3266c?w=900',
                'author_name' => 'Redaksi',
                'tags' => ['Pemilu2026', 'Demokrasi', 'Indonesia'],
                'created_at' => Carbon::now()->subDays(2),
            ],
            [
                'title' => 'Saham Sektor Teknologi Melonjak Tajam Menjelang Akhir Tahun',
                'category' => 'Ekonomi',
                'is_featured' => false,
                'view_count' => 8300,
                'excerpt' => 'IHSG ditutup menghijau berkat dorongan luar biasa dari saham-saham emiten teknologi dan bank digital.',
                'content' => "Jakarta — Indeks Harga Saham Gabungan (IHSG) hari ini ditutup menguat 1.5% ke level 7.500. Kenaikan ini dipimpin oleh sektor teknologi yang melesat lebih dari 4%.\n\nPara analis memperkirakan tren positif ini akan terus berlanjut hingga akhir tahun seiring dengan rilis laporan keuangan kuartal ketiga yang menunjukkan pertumbuhan signifikan pada laba bersih emiten startup teknologi dan bank digital lokal.",
                'image_url' => 'https://images.unsplash.com/photo-1611974789855-9c2a0a7236a3?w=900',
                'author_name' => 'Budi Santoso',
                'tags' => ['IHSG', 'Ekonomi', 'Saham'],
                'created_at' => Carbon::now()->subDays(5),
            ],
            [
                'title' => 'Timnas Indonesia Berhasil Lolos ke Semifinal Piala Asia',
                'category' => 'Olahraga',
                'is_featured' => false,
                'view_count' => 32100,
                'excerpt' => 'Kemenangan dramatis 2-1 atas raksasa Asia memastikan langkah Garuda Nusantara ke babak empat besar.',
                'content' => "Doha — Sejarah baru tercipta! Tim Nasional Indonesia sukses melaju ke semifinal Piala Asia setelah menumbangkan tim kuat Jepang dengan skor tipis 2-1.\n\nGul penentu kemenangan dicetak pada menit ke-89 melalui skema serangan balik cepat. Kemenangan ini memicu euforia di tanah air, dengan jutaan suporter turun ke jalan merayakan pencapaian bersejarah ini.",
                'image_url' => 'https://images.unsplash.com/photo-1518605368461-8447814b77f9?w=900',
                'author_name' => 'Agus Rahman',
                'tags' => ['Timnas', 'Sepakbola', 'PialaAsia'],
                'created_at' => Carbon::now()->subDays(1),
            ],
            [
                'title' => 'Inovasi Terbaru: Baterai Smartphone Bertahan Hingga 1 Minggu',
                'category' => 'Teknologi',
                'is_featured' => false,
                'view_count' => 12400,
                'excerpt' => 'Sebuah perusahaan teknologi terkemuka baru saja mematenkan desain baterai solid-state berkapasitas ultra besar.',
                'content' => "Silicon Valley — Masalah baterai cepat habis mungkin akan segera menjadi masa lalu. Hari ini, raksasa teknologi mengumumkan terobosan baru dalam teknologi baterai solid-state untuk smartphone.\n\nBaterai ini diklaim mampu bertahan hingga 7 hari dalam pemakaian normal hanya dengan sekali pengisian daya selama 15 menit. Teknologi ini diprediksi akan mulai disematkan pada smartphone flagship tahun depan.",
                'image_url' => 'https://images.unsplash.com/photo-1519389950473-47ba0277781c?w=900',
                'author_name' => 'Redaksi',
                'tags' => ['Gadget', 'Inovasi', 'Baterai'],
                'created_at' => Carbon::now()->subDays(7),
            ],
        ];

        foreach ($articles as $article) {
            Article::create($article);
        }
    }
}
