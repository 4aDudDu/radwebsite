@props(['post', 'vertical' => true])

<article class="{{ $vertical ? 'article-card' : 'article-card-horizontal' }}">
    <a href="{{ route('posts.show', $post->slug) }}" style="display: block;" class="img-container">
        <img src="{{ $post->getFirstMediaUrl('thumbnail') ?: 'https://via.placeholder.com/600x400' }}" 
             alt="{{ $post->title }}">
    </a>
    <div class="article-card-content">
        <div>
            <a href="{{ route('categories.show', $post->category->slug) }}" class="tag-badge">
                {{ $post->category->name }}
            </a>
        </div>
        <h3 class="text-h3" style="margin-bottom: var(--spacing-2); font-size: 16px; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
            <a href="{{ route('posts.show', $post->slug) }}" style="color: var(--text-primary);" onmouseover="this.style.color='var(--text-secondary)'" onmouseout="this.style.color='var(--text-primary)'">
                {{ $post->title }}
            </a>
        </h3>
        @if($vertical)
            <p class="text-body text-muted" style="margin-bottom: 12px; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                {{ $post->excerpt ?: Str::limit(strip_tags($post->content), 100) }}
            </p>
        @endif
        <div class="meta-link" style="display: flex; gap: 12px;">
            <span>{{ $post->author->name }}</span>
            <span>{{ $post->published_at->diffForHumans() }}</span>
        </div>
    </div>
</article>
