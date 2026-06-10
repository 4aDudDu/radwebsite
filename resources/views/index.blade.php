@extends('layouts.app')

@section('content')
    <!-- Headline Section -->
    <x-headline-grid />

    <div class="content-wrapper">
        <!-- Main Feed -->
        <div class="main-content">
            <!-- Section 1: Latest News (8 cards) -->
            <div class="section-header">
                <h2>Terbaruaa</h2>
                <div class="divider"></div>
            </div>

            <div class="post-grid">
                @forelse($latestNews as $post)
                    <x-post-card :post="$post" />
                @empty
                    <p class="text-muted text-body" style="font-style: italic; grid-column: 1 / -1;">Belum ada berita terbaru.</p>
                @endforelse
            </div>

            @if($latestNews->hasPages())
                <div style="margin-top: var(--spacing-8); text-align: center;">
                    <a href="{{ $latestNews->nextPageUrl() }}" class="btn btn-primary" style="background: transparent; color: var(--text-primary); border: 1px solid var(--border-medium);">Tampilkan Lebih Banyak</a>
                </div>
            @endif

            <!-- Section: Iklan Sponsor -->
            @php
                $sponsorAds = \App\Models\AdSpace::where('is_active', true)->where('location', '!=', 'sidebar')->get();
            @endphp
            @if($sponsorAds->count() > 0)
                <div class="section-header" style="margin-top: var(--spacing-15);">
                    <h2>Iklan Sponsor</h2>
                    <div class="divider"></div>
                </div>
                <div class="post-grid" style="grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));">
                    @foreach($sponsorAds as $ad)
                        @if($ad->getFirstMediaUrl('ad_images'))
                            <a href="{{ $ad->url ?? '#' }}" target="_blank" class="post-card" style="display: flex; flex-direction: column; text-decoration: none; overflow: hidden; border-radius: var(--radius-lg); box-shadow: var(--shadow-l1); background: var(--white);">
                                <img src="{{ $ad->getFirstMediaUrl('ad_images') }}" alt="{{ $ad->title }}" style="width: 100%; height: 180px; object-fit: cover;">
                                <div class="post-content" style="padding: 16px; border-top: 1px solid var(--border-light);">
                                    <h3 class="post-title" style="font-size: 16px; margin-bottom: 8px; color: var(--text-primary); font-weight: 700;">{{ $ad->title ?: $ad->name }}</h3>
                                    @if($ad->description)
                                        <p class="post-excerpt" style="font-size: 13px; margin: 0; color: var(--text-secondary);">{{ Str::limit($ad->description, 100) }}</p>
                                    @endif
                                </div>
                            </a>
                        @elseif($ad->code)
                            <div class="post-card" style="display: flex; justify-content: center; align-items: center; min-height: 180px; padding: 16px; border-radius: var(--radius-lg); box-shadow: var(--shadow-l1); background: var(--white);">
                                {!! $ad->code !!}
                            </div>
                        @endif
                    @endforeach
                </div>
            @endif
            <!-- Section 2: Popular News -->
            <div class="section-header" style="margin-top: var(--spacing-15);">
                <h2>Populer</h2>
                <div class="divider"></div>
            </div>

            <div class="horizontal-post-list">
                @forelse($popularNews as $post)
                    <x-post-card :post="$post" :vertical="false" />
                @empty
                    <p class="text-muted text-body" style="font-style: italic;">Belum ada berita populer.</p>
                @endforelse
            </div>
        </div>

        <!-- Sidebar -->
        <div class="sidebar">
            <x-sidebar />
        </div>
    </div>
@endsection
