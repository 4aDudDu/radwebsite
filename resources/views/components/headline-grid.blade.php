@php
    $headlines = \App\Models\Post::where('is_headline', true)
        ->published()
        ->latest()
        ->limit(5)
        ->get();
@endphp

@if($headlines->count() > 0)
<style>
    .headline-carousel {
        position: relative; 
        min-height: 400px; 
        display: flex;
    }
    .headline-title {
        font-size: 36px; 
        line-height: 1.2; 
        margin-bottom: 16px; 
        color: var(--white);
    }
    @media (max-width: 767px) {
        .headline-carousel { min-height: 250px; }
        .headline-title { font-size: 24px; margin-bottom: 12px; }
        .headline-carousel .overlay-card { padding: var(--spacing-4) !important; }
    }
</style>

<section style="margin-bottom: var(--spacing-10);">
    <div x-data="{ 
            activeSlide: 0,
            slides: {{ $headlines->count() }},
            next() { this.activeSlide = this.activeSlide === this.slides - 1 ? 0 : this.activeSlide + 1 },
            prev() { this.activeSlide = this.activeSlide === 0 ? this.slides - 1 : this.activeSlide - 1 },
            init() { setInterval(() => this.next(), 5000) }
         }" 
         style="position: relative; border-radius: var(--radius-lg); overflow: hidden; box-shadow: var(--shadow-l1);">
        
        <!-- Slides -->
        <div class="headline-carousel">
            @foreach($headlines as $index => $post)
                <div x-show="activeSlide === {{ $index }}"
                     x-transition:enter="transition ease-out duration-500"
                     x-transition:enter-start="opacity-0 translate-x-8"
                     x-transition:enter-end="opacity-100 translate-x-0"
                     x-transition:leave="transition ease-in duration-300"
                     x-transition:leave-start="opacity-100 translate-x-0"
                     x-transition:leave-end="opacity-0 -translate-x-8"
                     class="overlay-card" 
                     style="position: absolute; inset: 0; width: 100%; height: 100%; display: flex; flex-direction: column; justify-content: flex-end;">
                    
                    <img src="{{ $post->getFirstMediaUrl('thumbnail') ?: 'https://via.placeholder.com/1200x600' }}" alt="{{ $post->title }}" style="position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; z-index: -1;">
                    <div style="position: absolute; inset: 0; background: linear-gradient(180deg, rgba(0,0,0,0) 0%, rgba(0,0,0,0.8) 100%); z-index: 0;"></div>
                    
                    <div style="position: relative; z-index: 1; max-width: 800px;">
                        <a href="{{ route('categories.show', $post->category->slug) }}" class="tag-badge" style="background: rgba(255,255,255,0.2); backdrop-filter: blur(4px); color: var(--white); margin-bottom: 16px; display: inline-block; border: 1px solid rgba(255,255,255,0.5);">
                            {{ $post->category->name }}
                        </a>
                        <h2 class="text-h1 headline-title">
                            <a href="{{ route('posts.show', $post->slug) }}" style="color: var(--white);">{{ $post->title }}</a>
                        </h2>
                        <div class="meta-link" style="color: rgba(255,255,255,0.8); display: flex; align-items: center; justify-content: space-between; width: 100%;">
                            <div>
                                <span style="margin-right: 16px;">{{ $post->author->name }}</span>
                                <span>{{ $post->published_at->format('d M Y') }}</span>
                            </div>
                            <div style="display: flex; align-items: center; gap: 4px;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"></path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                </svg>
                                <span>{{ number_format($post->views_count ?? 0) }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Controls -->
        <button @click="prev()" style="position: absolute; top: 50%; left: var(--spacing-4); transform: translateY(-50%); background: rgba(255,255,255,0.2); backdrop-filter: blur(4px); border: none; color: white; width: 48px; height: 48px; border-radius: 50%; display: flex; align-items: center; justify-content: center; cursor: pointer; transition: var(--transition-fast); z-index: 10;" onmouseover="this.style.background='rgba(255,255,255,0.4)'" onmouseout="this.style.background='rgba(255,255,255,0.2)'">
            <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
        </button>
        <button @click="next()" style="position: absolute; top: 50%; right: var(--spacing-4); transform: translateY(-50%); background: rgba(255,255,255,0.2); backdrop-filter: blur(4px); border: none; color: white; width: 48px; height: 48px; border-radius: 50%; display: flex; align-items: center; justify-content: center; cursor: pointer; transition: var(--transition-fast); z-index: 10;" onmouseover="this.style.background='rgba(255,255,255,0.4)'" onmouseout="this.style.background='rgba(255,255,255,0.2)'">
            <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
        </button>

        <!-- Indicators -->
        <div style="position: absolute; bottom: var(--spacing-4); left: 50%; transform: translateX(-50%); display: flex; gap: 8px; z-index: 10;">
            @foreach($headlines as $index => $post)
                <button @click="activeSlide = {{ $index }}" 
                        :style="activeSlide === {{ $index }} ? 'background: var(--white); width: 24px;' : 'background: rgba(255,255,255,0.5); width: 8px;'"
                        style="height: 8px; border-radius: 4px; border: none; cursor: pointer; transition: var(--transition-smooth); padding: 0;"></button>
            @endforeach
        </div>
    </div>
</section>
@endif
