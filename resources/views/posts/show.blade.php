@extends('layouts.app')

@section('title', $post->meta_title ?: $post->title)
@section('meta_description', $post->meta_description ?: Str::limit(strip_tags($post->content), 150))
@section('meta_keywords', $post->keywords)
@section('og_image', $post->getFirstMediaUrl('thumbnail') ?: asset('logo/logo.png'))
@section('og_type', 'article')

@section('content')
@push('styles')
<style>
    .article-header {
        margin-bottom: var(--spacing-6);
    }
    .article-title {
        font-size: 16px;
        font-weight: bold;
        line-height: 1.4;
        margin-bottom: var(--spacing-4);
        color: var(--text-primary);
    }
    .article-meta-box {
        display: flex;
        flex-direction: column;
        gap: 16px;
        padding: var(--spacing-4) 0;
        border-top: 1px solid var(--border-medium);
        border-bottom: 1px solid var(--border-medium);
        margin-bottom: var(--spacing-6);
    }
    .author-info {
        display: flex;
        align-items: center;
    }
    .author-avatar {
        width: 44px;
        height: 44px;
        background: var(--bg-secondary);
        border-radius: 50%;
        margin-right: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        color: var(--text-primary);
        border: 1px solid var(--border-medium);
        font-size: 18px;
    }
    .author-name {
        font-weight: 700;
        color: var(--text-primary);
        font-size: 15px;
        margin-bottom: 2px;
    }
    .author-date {
        font-size: 13px;
        color: var(--text-secondary);
    }
    .share-buttons {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
    }
    .share-btn {
        color: white;
        border: none;
        padding: 8px 16px;
        border-radius: 6px;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-size: 13px;
        font-weight: 600;
        text-decoration: none;
        transition: transform 0.2s, opacity 0.2s;
        cursor: pointer;
    }
    .share-btn:hover {
        transform: translateY(-2px);
        opacity: 0.9;
    }
    .btn-fb { background: #1877F2; }
    .btn-wa { background: #25D366; }
    .btn-copy { background: #6C757D; } /* Changed color to be neutral, Instagram color for copy link is weird */
    
    .article-featured-image {
        margin-bottom: var(--spacing-8);
        border-radius: var(--radius-lg);
        overflow: hidden;
        box-shadow: var(--shadow-l1);
        border: 1px solid var(--border-medium);
    }
    .article-featured-image img {
        width: 100%;
        height: auto;
        display: block;
    }
    .article-caption {
        background: var(--bg-secondary);
        padding: 10px 16px;
        font-size: 13px;
        color: var(--text-secondary);
        font-weight: 500;
        border-top: 1px solid var(--border-medium);
    }
    .article-body-content {
        font-size: 16px;
        line-height: 1.8;
        color: var(--text-primary);
        text-align: justify; /* Requested by user */
    }
    .article-body-content p {
        margin-bottom: 1.5em;
    }
    .article-body-content img {
        max-width: 100%;
        height: auto;
        border-radius: var(--radius-md);
        margin: var(--spacing-4) 0;
    }
    .article-tags {
        margin-top: var(--spacing-10);
        padding-top: var(--spacing-6);
        border-top: 1px solid var(--border-medium);
    }
    @media (min-width: 768px) {
        .article-title {
            font-size: 20px;
        }
        .article-meta-box {
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
        }
        .article-body-content {
            font-size: 17px;
        }
    }
</style>
@endpush

<div class="content-wrapper">
    <!-- Main Content -->
    <div class="main-content">
        <article class="article-hero">
            <div class="article-header">
                <nav class="meta-link" style="margin-bottom: var(--spacing-4); text-transform: uppercase;">
                    <a href="/">Home</a>
                    <span style="margin: 0 var(--spacing-2);">/</span>
                    <a href="{{ route('categories.show', $post->category->slug) }}" style="color: var(--text-primary); font-weight: 700;">{{ $post->category->name }}</a>
                </nav>

                <h1 class="article-title">
                    {{ $post->title }}
                </h1>
            </div>

            <div class="article-meta-box">
                <div class="author-info">
                    <div class="author-avatar">
                        {{ substr($post->author->name, 0, 1) }}
                    </div>
                    <div>
                        <p class="author-name">{{ $post->author->name }}</p>
                        <p class="author-date">{{ $post->published_at->format('d M Y, H:i') }} WIB</p>
                    </div>
                </div>
                <!-- Social Share -->
                <div class="share-buttons">
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank" class="share-btn btn-fb">
                        <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.95c5.05-.5 9-4.76 9-9.95z"></path></svg>
                        Share
                    </a>
                    <a href="https://wa.me/?text={{ urlencode($post->title . ' - ' . url()->current()) }}" target="_blank" class="share-btn btn-wa">
                        <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a5.8 5.8 0 0 0-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.015-1.04 2.476 1.065 2.873 1.213 3.071c.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.82 9.82 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.81 11.81 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.88 11.88 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.82 11.82 0 0 0-3.48-8.413Z"/></svg>
                        WhatsApp
                    </a>
                    <button onclick="navigator.clipboard.writeText('{{ url()->current() }}'); alert('Link disalin ke clipboard!');" class="share-btn btn-copy">
                        <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                        Copy Link
                    </button>
                </div>
            </div>

            <div class="article-featured-image">
                <img src="{{ $post->getFirstMediaUrl('thumbnail') ?: 'https://via.placeholder.com/800x600' }}" alt="{{ $post->title }}">
                @if($post->getMedia('thumbnail')->first() && $post->getMedia('thumbnail')->first()->getCustomProperty('caption'))
                    <div class="article-caption">
                        {{ $post->getMedia('thumbnail')->first()->getCustomProperty('caption') }}
                    </div>
                @endif
            </div>

            <!-- Ad Space Top Content -->
            @php $topAd = \App\Models\AdSpace::where('location', 'content')->where('is_active', true)->first(); @endphp
            @if($topAd)
                <div style="margin-bottom: var(--spacing-8); text-align: center;">
                    {!! $topAd->code !!}
                </div>
            @endif

            <div class="article-body-content">
                {!! $post->content !!}
            </div>

            <div class="article-tags">
                <h4 class="text-h4" style="margin-bottom: var(--spacing-4);">Tags</h4>
                <div style="display: flex; flex-wrap: wrap; gap: var(--spacing-2);">
                    @foreach($post->tags as $tag)
                        <a href="#" class="tag-badge" style="text-decoration: none;">#{{ $tag->name }}</a>
                    @endforeach
                </div>
            </div>
        </article>

        <!-- Related Posts -->
        <div style="margin-top: var(--spacing-10);">
            <div class="section-header">
                <h2>Berita Terkait</h2>
                <div class="divider"></div>
            </div>
            <div class="post-grid" style="grid-template-columns: repeat(3, 1fr);">
                @foreach($relatedPosts as $related)
                    <x-post-card :post="$related" />
                @endforeach
            </div>
        </div>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
        <x-sidebar />
    </div>
</div>
@endsection
