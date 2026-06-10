@php
    $breakingNews = \App\Models\Post::where('is_breaking_news', true)->published()->latest()->limit(5)->get();
@endphp

@if($breakingNews->count() > 0)
<div class="bg-black text-white py-2 overflow-hidden border-b border-gray-800">
    <div class="container mx-auto px-4 flex items-center">
        <div class="flex-shrink-0 bg-red-600 text-xs font-bold px-3 py-1 uppercase tracking-tighter mr-4 rounded-sm">
            Breaking News
        </div>
        <div class="flex-1 overflow-hidden relative h-6">
            <div class="whitespace-nowrap animate-marquee flex items-center space-x-12">
                @foreach($breakingNews as $news)
                    <a href="{{ route('posts.show', $news->slug) }}" class="text-sm font-medium hover:text-red-500 transition-colors uppercase tracking-tight">
                        {{ $news->title }}
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>

<style>
    @keyframes marquee {
        0% { transform: translateX(100%); }
        100% { transform: translateX(-100%); }
    }
    .animate-marquee {
        display: inline-block;
        animation: marquee 30s linear infinite;
    }
</style>
@endif
