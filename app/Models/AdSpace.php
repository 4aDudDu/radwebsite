<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class AdSpace extends Model implements HasMedia
{
    /** @use HasFactory<\Database\Factories\AdSpaceFactory> */
    use HasFactory, InteractsWithMedia;

    protected $fillable = ['title', 'description', 'url', 'code', 'location', 'is_active'];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
