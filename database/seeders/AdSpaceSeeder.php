<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AdSpace;

class AdSpaceSeeder extends Seeder
{
    public function run(): void
    {
        $this->command->info('Creating Ad Spaces...');

        $ads = [
            [
                'name' => 'Banner Header Dummy',
                'title' => 'Promo Akhir Tahun 50%',
                'description' => 'Dapatkan diskon gila-gilaan untuk semua produk elektronik kesayangan Anda hanya di bulan ini!',
                'url' => 'https://example.com/promo',
                'location' => 'header',
                'is_active' => true,
            ],
            [
                'name' => 'Sidebar Banner Dummy',
                'title' => 'Investasi Properti Riau',
                'description' => 'Mulai investasi masa depan Anda dengan harga terjangkau di kawasan paling strategis di Riau.',
                'url' => 'https://example.com/invest',
                'location' => 'sidebar',
                'is_active' => true,
            ]
        ];

        foreach ($ads as $index => $adData) {
            $ad = AdSpace::firstOrCreate(['name' => $adData['name']], $adData);

            if ($ad->wasRecentlyCreated || $ad->getMedia('ad_images')->count() === 0) {
                try {
                    $width = $ad->location === 'header' ? 1200 : 300;
                    $height = $ad->location === 'header' ? 150 : 250;
                    $ad->addMediaFromUrl("https://picsum.photos/seed/ad{$index}/{$width}/{$height}")->toMediaCollection('ad_images');
                } catch (\Exception $e) {
                    $this->command->warn("Gagal unduh gambar untuk ad {$adData['name']}");
                }
            }
        }
        
        $this->command->info('Ad Spaces berhasil di-generate!');
    }
}
