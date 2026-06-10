<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Cache;

class Post extends Model implements HasMedia
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'title', 'slug', 'author_id', 'category_id', 'content', 'excerpt', 
        'published_at', 'status', 'is_breaking_news', 'is_headline', 'views_count',
        'meta_title', 'meta_description', 'keywords'
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'is_breaking_news' => 'boolean',
        'is_headline' => 'boolean',
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('status', 'published')
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now());
    }

    public function scopePopular(Builder $query): Builder
    {
        return $query->orderBy('views_count', 'desc');
    }

    public static function getTrendingPosts(int $limit = 5)
    {
        return Cache::remember('trending_posts', 3600, function () use ($limit) {
            return self::published()
                ->popular()
                ->limit($limit)
                ->get();
        });
    }

    public function incrementViews(): void
    {
        $this->increment('views_count');
        // Clear cache when views change significantly or after a period
        // For high performance, we might want to batch this or use Redis
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('thumbnail')
            ->singleFile();
    }
}
