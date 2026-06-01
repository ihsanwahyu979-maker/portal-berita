<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;

class InternationalSeeder extends Seeder
{
    public function run()
    {
        $articles = [
            [
                'title' => 'Trump Umumkan Kesepakatan Dagang Baru dengan Uni Eropa, Tarif Impor Diturunkan',
                'excerpt' => 'Presiden AS Donald Trump mengumumkan kesepakatan dagang baru dengan Uni Eropa yang akan menurunkan tarif impor hingga 15% untuk berbagai komoditas.',
                'content' => "Washington, D.C. — Presiden Amerika Serikat Donald Trump pada hari Sabtu mengumumkan tercapainya kesepakatan dagang baru dengan Uni Eropa. Kesepakatan ini diharapkan mampu menurunkan tarif impor hingga 15 persen untuk berbagai komoditas utama termasuk otomotif, teknologi, dan produk pertanian.\n\nKesepakatan ini datang setelah berbulan-bulan negosiasi yang alot antara perwakilan dagang AS dan Komisi Eropa. Presiden Komisi Eropa Ursula von der Leyen menyambut baik langkah ini sebagai \"era baru kerjasama transatlantik\".\n\nPara analis memperkirakan kesepakatan ini akan berdampak positif pada pasar saham global dan meningkatkan volume perdagangan bilateral antara kedua blok ekonomi terbesar dunia tersebut.",
                'region' => 'Internasional',
                'category' => 'Ekonomi',
                'image_url' => 'https://images.unsplash.com/photo-1565106430482-8f6e74349ca1?w=800',
                'author_name' => 'Sarah Wijaya',
                'view_count' => 4520,
                'is_featured' => true,
                'tags' => ['trump', 'uni-eropa', 'perdagangan'],
            ],
            [
                'title' => 'Perang Rusia-Ukraina: Zelenskyy Desak NATO Percepat Keanggotaan di KTT Brussel',
                'excerpt' => 'Presiden Ukraina Volodymyr Zelenskyy mendesak negara-negara NATO untuk mempercepat proses keanggotaan Ukraina dalam KTT darurat di Brussel.',
                'content' => "Brussel — Presiden Ukraina Volodymyr Zelenskyy tampil di hadapan para pemimpin NATO dalam KTT darurat di Brussel, Belgia. Ia mendesak aliansi militer tersebut untuk segera mempercepat proses keanggotaan Ukraina sebagai langkah strategis menghadapi agresi Rusia.\n\n\"Ukraina sudah membuktikan diri di medan perang. Sekarang saatnya memberikan jaminan keamanan yang nyata,\" ujar Zelenskyy dalam pidatonya yang disambut tepuk tangan oleh para delegasi.\n\nSecretary General NATO Mark Rutte menyatakan bahwa aliansi akan membahas jalur percepatan keanggotaan Ukraina dalam pertemuan tingkat menteri bulan depan.",
                'region' => 'Internasional',
                'category' => 'Politik',
                'image_url' => 'https://images.unsplash.com/photo-1555848962-6e79363ec58f?w=800',
                'author_name' => 'Ahmad Fauzi',
                'view_count' => 6780,
                'is_featured' => true,
                'tags' => ['ukraina', 'nato', 'rusia'],
            ],
            [
                'title' => 'Apple Luncurkan iPhone 17 dengan AI Generatif Terintegrasi dan Desain Layar Lipat',
                'excerpt' => 'Apple resmi memperkenalkan iPhone 17 series dengan fitur AI generatif Apple Intelligence 2.0 dan varian layar lipat pertama mereka.',
                'content' => "Cupertino, California — Apple pada acara WWDC 2026 resmi meluncurkan iPhone 17 series yang mengusung teknologi AI generatif Apple Intelligence 2.0. Ini adalah pertama kalinya Apple mengintegrasikan AI secara mendalam ke dalam perangkat keras iPhone.\n\nYang paling mengejutkan, Apple juga memperkenalkan iPhone 17 Fold — varian layar lipat pertama dari Apple. Perangkat ini memiliki layar utama 7.9 inci yang dapat dilipat menjadi ukuran kompak 4.5 inci.\n\nTim Cook, CEO Apple, menyatakan bahwa iPhone 17 adalah \"lompatan terbesar dalam sejarah iPhone\" dan akan tersedia di pasar global mulai September 2026 dengan harga mulai dari USD 1.199.",
                'region' => 'Internasional',
                'category' => 'Teknologi',
                'image_url' => 'https://images.unsplash.com/photo-1592750475338-74b7b21085ab?w=800',
                'author_name' => 'Dimas Pratama',
                'view_count' => 12300,
                'is_featured' => true,
                'tags' => ['apple', 'iphone', 'teknologi', 'ai'],
            ],
            [
                'title' => 'Gempa Magnitudo 7.2 Guncang Jepang, Peringatan Tsunami Diaktifkan',
                'excerpt' => 'Gempa bumi berkekuatan 7.2 magnitudo mengguncang wilayah Hokkaido, Jepang. Otoritas segera mengaktifkan peringatan tsunami.',
                'content' => "Tokyo — Gempa bumi berkekuatan 7.2 magnitudo mengguncang wilayah Hokkaido, Jepang bagian utara pada Sabtu dini hari waktu setempat. Japan Meteorological Agency (JMA) segera mengaktifkan peringatan tsunami untuk seluruh pesisir Pasifik di wilayah tersebut.\n\nMenurut laporan awal, gempa terjadi pada kedalaman 30 km dan terasa hingga ke Tokyo. Beberapa bangunan di Sapporo mengalami kerusakan ringan, namun belum ada laporan korban jiwa.\n\nPerdana Menteri Jepang segera mengadakan rapat darurat dan menginstruksikan evakuasi warga pesisir ke tempat yang lebih tinggi.",
                'region' => 'Internasional',
                'category' => 'Kesehatan',
                'image_url' => 'https://images.unsplash.com/photo-1545558014-8692077e9b5c?w=800',
                'author_name' => 'Rina Tanaka',
                'view_count' => 8900,
                'is_featured' => false,
                'tags' => ['gempa', 'jepang', 'tsunami'],
            ],
            [
                'title' => 'Liga Champions: Real Madrid Juara Setelah Kalahkan Manchester City 3-1 di Final',
                'excerpt' => 'Real Madrid meraih gelar Liga Champions ke-16 setelah mengalahkan Manchester City dengan skor 3-1 di Stadion Wembley.',
                'content' => "London — Real Madrid kembali menegaskan dominasinya di pentas Eropa dengan meraih gelar Liga Champions ke-16 sepanjang sejarah. Los Blancos mengalahkan Manchester City dengan skor telak 3-1 di final yang digelar di Stadion Wembley, London.\n\nGol-gol Real Madrid dicetak oleh Vinicius Jr pada menit ke-23, Jude Bellingham menit ke-57, dan Kylian Mbappe menit ke-78. Manchester City hanya mampu membalas melalui gol Erling Haaland di menit ke-65.\n\nPerlatih Carlo Ancelotti menjadi pelatih pertama yang memenangkan Liga Champions sebanyak lima kali.",
                'region' => 'Internasional',
                'category' => 'Olahraga',
                'image_url' => 'https://images.unsplash.com/photo-1522778119026-d647f0596c20?w=800',
                'author_name' => 'Marco Gonzales',
                'view_count' => 15600,
                'is_featured' => true,
                'tags' => ['liga-champions', 'real-madrid', 'sepakbola'],
            ],
            [
                'title' => 'Elon Musk Resmikan Misi Mars Pertama: 12 Astronot Berhasil Mendarat',
                'excerpt' => 'SpaceX berhasil mendaratkan 12 astronot pertama di Mars sebagai bagian dari misi kolonisasi yang dipimpin Elon Musk.',
                'content' => "Cape Canaveral — SpaceX mencatatkan sejarah baru dalam eksplorasi antariksa dengan keberhasilan mendaratkan 12 astronot pertama di permukaan Mars. Misi yang diberi nama \"Ares One\" ini merupakan puncak dari proyek kolonisasi Mars yang telah dipersiapkan selama lebih dari satu dekade.\n\nElon Musk, CEO SpaceX, menyaksikan pendaratan tersebut dari pusat kontrol di Cape Canaveral. \"Ini adalah hari yang akan dikenang selamanya oleh umat manusia,\" ujar Musk.\n\nPara astronot akan tinggal di habitat modular dan menjalankan misi riset selama 18 bulan sebelum kembali ke Bumi.",
                'region' => 'Internasional',
                'category' => 'Teknologi',
                'image_url' => 'https://images.unsplash.com/photo-1614728263952-84ea256f9679?w=800',
                'author_name' => 'Neil Suryanto',
                'view_count' => 20100,
                'is_featured' => false,
                'tags' => ['spacex', 'mars', 'elon-musk'],
            ],
            [
                'title' => 'WHO Deklarasikan Virus H5N8 Sebagai Pandemi Global, Vaksinasi Massal Dimulai',
                'excerpt' => 'Organisasi Kesehatan Dunia (WHO) secara resmi mendeklarasikan wabah virus flu burung H5N8 sebagai pandemi global.',
                'content' => "Jenewa — Organisasi Kesehatan Dunia (WHO) pada hari Jumat secara resmi mendeklarasikan wabah virus flu burung H5N8 sebagai pandemi global. Keputusan ini diambil setelah virus tersebut menyebar ke lebih dari 60 negara.\n\nDirektur Jenderal WHO Dr. Tedros Adhanom Ghebreyesus menyerukan kepada seluruh negara untuk segera mengaktifkan protokol darurat kesehatan dan memulai program vaksinasi massal.\n\n\"Kita telah belajar dari pengalaman COVID-19. Kali ini kita harus bertindak lebih cepat dan lebih terkoordinasi,\" tegas Dr. Tedros dalam konferensi pers di Jenewa.",
                'region' => 'Internasional',
                'category' => 'Kesehatan',
                'image_url' => 'https://images.unsplash.com/photo-1584036561566-baf8f5f1b144?w=800',
                'author_name' => 'Dr. Putri Handayani',
                'view_count' => 9800,
                'is_featured' => false,
                'tags' => ['who', 'pandemi', 'kesehatan'],
            ],
            [
                'title' => 'G20 Summit di Rio: Pemimpin Dunia Sepakati Dana Iklim USD 500 Miliar',
                'excerpt' => 'Para pemimpin dunia dalam KTT G20 di Rio de Janeiro menyepakati dana iklim sebesar USD 500 miliar untuk negara berkembang.',
                'content' => "Rio de Janeiro — KTT G20 yang berlangsung di Rio de Janeiro, Brasil, menghasilkan kesepakatan bersejarah terkait perubahan iklim. Para pemimpin dari 20 ekonomi terbesar dunia menyepakati pembentukan Dana Iklim Global senilai USD 500 miliar.\n\nPresiden Brasil Lula da Silva memuji kesepakatan ini sebagai \"kemenangan bagi planet kita dan generasi mendatang\". Dana ini akan disalurkan selama periode 10 tahun mulai 2027.\n\nIndonesia, sebagai salah satu negara penerima, diperkirakan akan mendapatkan alokasi sebesar USD 15 miliar untuk proyek energi terbarukan dan konservasi hutan tropis.",
                'region' => 'Internasional',
                'category' => 'Politik',
                'image_url' => 'https://images.unsplash.com/photo-1529107386315-e1a2ed48a620?w=800',
                'author_name' => 'Budi Santoso',
                'view_count' => 5400,
                'is_featured' => false,
                'tags' => ['g20', 'iklim', 'politik'],
            ],
            [
                'title' => 'Taylor Swift Umumkan Tur Dunia Eras Tour 2.0, Jakarta Masuk Daftar!',
                'excerpt' => 'Superstar musik Taylor Swift mengumumkan tur dunia terbarunya yang akan menyambangi 80 kota termasuk Jakarta.',
                'content' => "Los Angeles — Superstar musik dunia Taylor Swift mengumumkan tur dunia terbarunya bertajuk \"Eras Tour 2.0\" yang akan menyambangi 80 kota di seluruh dunia. Kabar gembira bagi penggemar di Indonesia, Jakarta masuk dalam daftar kota yang akan dikunjungi.\n\nKonser di Jakarta dijadwalkan berlangsung di Stadion Gelora Bung Karno pada Maret 2027. Ini akan menjadi penampilan pertama Taylor Swift di Indonesia.\n\n\"Indonesia selalu ada di hati saya. Saya tidak sabar untuk bertemu para Swifties Indonesia!\" tulis Taylor Swift di akun media sosialnya.",
                'region' => 'Internasional',
                'category' => 'Hiburan',
                'image_url' => 'https://images.unsplash.com/photo-1493225457124-a3eb161ffa5f?w=800',
                'author_name' => 'Luna Maharani',
                'view_count' => 18700,
                'is_featured' => false,
                'tags' => ['taylor-swift', 'musik', 'konser'],
            ],
            [
                'title' => 'China Luncurkan Stasiun Antariksa Baru Tiangong-2 dengan Kapasitas 10 Astronot',
                'excerpt' => 'China berhasil meluncurkan modul inti stasiun antariksa Tiangong-2 yang mampu menampung hingga 10 astronot.',
                'content' => "Beijing — China kembali menunjukkan ambisinya di bidang antariksa dengan meluncurkan modul inti stasiun antariksa terbaru Tiangong-2 menggunakan roket Long March 5B. Stasiun ini memiliki kapasitas menampung hingga 10 astronot secara bersamaan.\n\nBadan Antariksa Nasional China (CNSA) menyatakan bahwa Tiangong-2 dilengkapi dengan laboratorium riset canggih, fasilitas manufaktur mikrogravitasi, dan sistem pendukung kehidupan generasi terbaru.\n\nPeluncuran ini menempatkan China sebagai pesaing utama AS dan Eropa dalam perlombaan antariksa modern.",
                'region' => 'Internasional',
                'category' => 'Teknologi',
                'image_url' => 'https://images.unsplash.com/photo-1446776811953-b23d57bd21aa?w=800',
                'author_name' => 'Wang Li',
                'view_count' => 7200,
                'is_featured' => false,
                'tags' => ['china', 'antariksa', 'teknologi'],
            ],
        ];

        foreach ($articles as $article) {
            Article::create($article);
        }

        echo "Berhasil menambahkan " . count($articles) . " berita internasional!\n";
    }
}
