<aside style="display: flex; flex-direction: column; gap: var(--spacing-8);">
    <!-- Ad Space Sidebar -->
    @php
        $sidebarAd = \App\Models\AdSpace::where('location', 'sidebar')->where('is_active', true)->first();
    @endphp
    @if($sidebarAd)
        @if($sidebarAd->getFirstMediaUrl('ad_images'))
            <a href="{{ $sidebarAd->url ?? '#' }}" target="_blank" class="featured-card" style="display: block; padding: 0; overflow: hidden; border: none; background: transparent; text-align: center;">
                <img src="{{ $sidebarAd->getFirstMediaUrl('ad_images') }}" alt="{{ $sidebarAd->title }}" style="width: 100%; height: auto; display: block; border-radius: var(--radius-lg);">
                @if($sidebarAd->description)
                    <p style="padding: 8px; font-size: 12px; color: var(--text-muted); margin: 0;">{{ $sidebarAd->description }}</p>
                @endif
            </a>
        @elseif($sidebarAd->code)
            <div class="featured-card" style="display: flex; justify-content: center; align-items: center; min-height: 250px; background: var(--bg-secondary);">
                {!! $sidebarAd->code !!}
            </div>
        @endif
    @endif

    <!-- Popular/Trending -->
    <div class="featured-card">
        <div class="section-header">
            <h2 style="font-size: 16px;">Terpopuler</h2>
            <div class="divider"></div>
        </div>
        <div style="display: flex; flex-direction: column; gap: var(--spacing-4);">
            @php
                $trending = \App\Models\Post::getTrendingPosts(5);
            @endphp
            @foreach($trending as $index => $post)
                <div style="display: flex; gap: var(--spacing-3); align-items: flex-start; padding-bottom: var(--spacing-3); border-bottom: 1px solid var(--border-medium);">
                    <div style="font-family: var(--font-primary); font-size: 28px; font-weight: 700; color: var(--text-muted); min-width: 24px; text-align: center;">
                        {{ $index + 1 }}
                    </div>
                    <div>
                        <a href="{{ route('categories.show', $post->category->slug) }}" class="tag-badge" style="background: transparent; color: var(--text-primary); padding: 0; margin-bottom: 4px; display: block; border: none;">
                            {{ $post->category->name }}
                        </a>
                        <h3 class="text-h4" style="font-size: 14px; line-height: 1.4;">
                            <a href="{{ route('posts.show', $post->slug) }}" style="color: var(--text-primary);" onmouseover="this.style.color='var(--text-secondary)'" onmouseout="this.style.color='var(--text-primary)'">
                                {{ $post->title }}
                            </a>
                        </h3>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Newsletter Simple -->
    <div class="featured-card" style="background: var(--text-primary); color: var(--white); border: none;">
        <h3 class="text-h3" style="color: var(--white); margin-bottom: 8px;">Langganan Berita</h3>
        <p style="font-size: 13px; color: rgba(255,255,255,0.8); margin-bottom: 16px;">Dapatkan berita terupdate langsung di email Anda setiap hari.</p>
        
        @if(session('success'))
            <div role="alert" class="alert-success">
                <svg stroke="currentColor" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13 16h-1v-4h1m0-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" stroke-width="2" stroke-linejoin="round" stroke-linecap="round"></path>
                </svg>
                <p>{{ session('success') }}</p>
            </div>
        @endif

        <form action="{{ route('subscribe') }}" method="POST" style="display: flex; flex-direction: column; gap: 12px;">
            @csrf
            <input type="email" name="email" placeholder="Email Anda" required class="search-input" style="border-radius: 8px; width: 100%; border: none;">
            <button type="submit" class="btn btn-primary" style="background: var(--bg-secondary); color: var(--text-primary); border-radius: 8px; width: 100%;">Daftar</button>
        </form>
    </div>
</aside>
