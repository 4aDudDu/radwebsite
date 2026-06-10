<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$posts = \App\Models\Post::all();
foreach($posts as $post) {
    if($post->getMedia('thumbnail')->count() === 0) {
        try {
            $post->addMedia(public_path('logo/logo.png'))->preservingOriginal()->toMediaCollection('thumbnail');
        } catch (\Exception $e) { }
    }
}

$ads = \App\Models\AdSpace::all();
foreach($ads as $ad) {
    if($ad->getMedia('ad_images')->count() === 0) {
        try {
            $ad->addMedia(public_path('logo/logo.png'))->preservingOriginal()->toMediaCollection('ad_images');
        } catch (\Exception $e) { }
    }
}
echo "Images seeded!\n";
