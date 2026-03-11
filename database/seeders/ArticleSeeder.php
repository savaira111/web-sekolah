<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get first user or create one
        $user = User::first() ?? User::factory()->create(['name' => 'Admin User']);

        $articles = [
            [
                'title' => 'Kegiatan Menarik di Hari Olahraga Musim Panas 2024',
                'category' => 'Acara',
                'content' => 'Acara olahraga musim panas tahun 2024 menjadi salah satu kegiatan yang paling ditunggu oleh siswa-siswi SMKS Mahaputra. Berbagai perlombaan seru dan menantang diadakan untuk meningkatkan semangat sportivitas dan kerja sama tim.',
                'views_count' => 1200,
                'is_published' => true,
                'published_at' => now()->subDays(2),
            ],
            [
                'title' => 'Peluang Beasiswa Baru Diumumkan',
                'category' => 'Akademik',
                'content' => 'Dengan bangga kami umumkan bahwa SMKS Mahaputra telah bermitra dengan berbagai institusi untuk memberikan beasiswa kepada siswa berprestasi. Persyaratan dan prosedur pendaftaran sudah tersedia di halaman beasiswa.',
                'views_count' => 856,
                'is_published' => true,
                'published_at' => now()->subDays(1),
            ],
            [
                'title' => 'Panduan Keamanan untuk Siswa Baru',
                'category' => 'Pengumuman',
                'content' => 'Keselamatan dan keamanan siswa adalah prioritas utama kami. Panduan lengkap tentang protokol keamanan sekolah dapat ditemukan dalam buku panduan siswa atau dengan menghubungi bagian keamanan sekolah.',
                'views_count' => 543,
                'is_published' => false,
                'published_at' => null,
            ],
            [
                'title' => 'Siswa PPLG SMK Mahaputra Raih Prestasi Internasional',
                'category' => 'Prestasi',
                'content' => 'Kami dengan bangga melaporkan bahwa tim Program Keahlian Pengembangan Perangkat Lunak dan Gim berhasil memenangkan kompetisi internasional di bidang teknologi informasi. Prestasi ini membuktikan dedikasi dan kerja keras siswa-siswi kami.',
                'views_count' => 2100,
                'is_published' => true,
                'published_at' => now()->subDays(5),
            ],
            [
                'title' => 'Program Magang Industri Dimulai Bulan Depan',
                'category' => 'Kegiatan',
                'content' => 'Program magang industri untuk siswa kelas XII akan dimulai minggu depan. Para siswa akan ditempatkan di perusahaan-perusahaan terkemuka sesuai dengan minat dan keahlian mereka masing-masing.',
                'views_count' => 678,
                'is_published' => true,
                'published_at' => now()->subDays(3),
            ],
            [
                'title' => 'Fasilitas Perpustakaan Digital Sekarang Tersedia',
                'category' => 'Umum',
                'content' => 'SMKS Mahaputra dengan senang hati mengumumkan peluncuran perpustakaan digital yang dapat diakses oleh seluruh siswa dan guru. Ribuan e-book dan jurnal ilmiah tersedia untuk mendukung proses pembelajaran.',
                'views_count' => 445,
                'is_published' => true,
                'published_at' => now()->subDays(4),
            ],
        ];

        foreach ($articles as $article) {
            Article::create([
                ...$article,
                'slug' => Str::slug($article['title']) . '-' . Str::random(4),
                'user_id' => $user->id,
            ]);
        }
    }
}
