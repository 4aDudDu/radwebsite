<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Str;

class DummyDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('Creating Categories & Tags...');
        $catNasional = Category::firstOrCreate(['slug' => 'nasional'], ['name' => 'Nasional']);
        $catDaerah = Category::firstOrCreate(['slug' => 'daerah'], ['name' => 'Daerah']);
        $catHukum = Category::firstOrCreate(['slug' => 'hukum-kriminal'], ['name' => 'Hukum & Kriminal']);
        $catEkonomi = Category::firstOrCreate(['slug' => 'ekonomi-bisnis'], ['name' => 'Ekonomi & Bisnis']);
        $catOlahraga = Category::firstOrCreate(['slug' => 'olahraga'], ['name' => 'Olahraga']);
        
        $tagPolitik = Tag::firstOrCreate(['slug' => 'politik'], ['name' => 'Politik']);
        $tagHukum = Tag::firstOrCreate(['slug' => 'hukum'], ['name' => 'Hukum']);

        $user = User::firstOrCreate(
            ['email' => 'radaktifdigital@gmail.com'],
            ['name' => 'Radaktif', 'password' => bcrypt('radnews2026')]
        );

        $this->command->info('Creating 5 Headline Posts (Carousel)...');
        for ($i = 1; $i <= 5; $i++) {
            $post = Post::create([
                'title' => "Berita Headline Spesial Ke-$i: Pembaruan Terkini dari RADNEWS",
                'slug' => Str::slug("Berita Headline Spesial Ke-$i"),
                'content' => "<p>Ini adalah konten berita panjang yang ditambahkan sebagai data dummy. Menampilkan laporan eksklusif terkait kejadian terbaru di wilayah tersebut.</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>",
                'excerpt' => "Ringkasan berita utama ke-$i yang sangat penting untuk dibaca oleh masyarakat luas.",
                'author_id' => $user->id,
                'category_id' => $i % 2 == 0 ? $catNasional->id : $catDaerah->id,
                'status' => 'published',
                'published_at' => now()->subHours($i),
                'is_headline' => true,
                'views_count' => rand(100, 1000)
            ]);
            $post->tags()->attach([$tagPolitik->id, $tagHukum->id]);
            
            try {
                $post->addMediaFromUrl("https://picsum.photos/seed/headline{$i}/1200/600")->toMediaCollection('thumbnail');
            } catch (\Exception $e) {
                $this->command->warn("Gagal unduh gambar untuk post $i");
            }
        }

        $this->command->info('Creating 5 Normal Posts...');
        for ($i = 6; $i <= 10; $i++) {
            $post = Post::create([
                'title' => "Berita Reguler Ke-$i: Info Penting Hari Ini",
                'slug' => Str::slug("Berita Reguler Ke-$i"),
                'content' => "<p>Konten berita reguler. Quisque velit nisi, pretium ut lacinia in, elementum id enim.</p>",
                'excerpt' => "Ringkasan berita reguler ke-$i untuk halaman feed utama.",
                'author_id' => $user->id,
                'category_id' => $i % 2 == 0 ? $catNasional->id : $catDaerah->id,
                'status' => 'published',
                'published_at' => now()->subHours($i * 2),
                'is_headline' => false,
                'views_count' => rand(50, 500)
            ]);
            $post->tags()->attach([$tagHukum->id]);
            
            try {
                $post->addMediaFromUrl("https://picsum.photos/seed/post{$i}/800/600")->toMediaCollection('thumbnail');
            } catch (\Exception $e) {
                $this->command->warn("Gagal unduh gambar untuk post $i");
            }
        }

        $this->command->info('Data Dummy berhasil di-generate!');
    }
}
