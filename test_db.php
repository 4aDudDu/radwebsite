<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

echo "Posts count: " . \App\Models\Post::count() . PHP_EOL;
echo "Media count: " . \Spatie\MediaLibrary\MediaCollections\Models\Media::count() . PHP_EOL;
