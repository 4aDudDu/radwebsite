<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', config('app.name', 'Berita Modern'))</title>
    <meta name="description" content="@yield('meta_description', 'Portal berita terpercaya dan terkini.')">
    <meta name="keywords" content="@yield('meta_keywords', 'berita, terkini, portal')">

    <!-- Fonts: Poppins for Minimalist Polda Riau Design -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('logo/logo.png') }}">

    <!-- AlpineJS for Carousel and Mobile Menu -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body>
    <!-- Page Loader Overlay -->
    <div id="page-loader" style="position: fixed; inset: 0; background: var(--bg-secondary); z-index: 9999; display: flex; align-items: center; justify-content: center; transition: opacity 0.5s ease;">
        <div class="loader"></div>
    </div>
    
    <script>
        window.addEventListener('load', function() {
            const loader = document.getElementById('page-loader');
            loader.style.opacity = '0';
            setTimeout(() => {
                loader.style.display = 'none';
            }, 500);
        });
    </script>

    <x-navbar />
    
    @if(View::exists('components.news-ticker'))

    @endif

    <main class="container">
        @yield('content')
    </main>

    <x-footer />

    <!-- Breaking News Ticker -->
    @php
        $breakingNews = \App\Models\Post::where('status', 'published')
            ->orderBy('views_count', 'desc')
            ->limit(5)
            ->get();
    @endphp
    @if($breakingNews->count() > 0)
        <div class="breaking-news-ticker">
            <div class="breaking-news-label">
                Breaking News
            </div>
            <div class="breaking-news-content">
                <div class="breaking-news-marquee">
                    @foreach($breakingNews as $news)
                        <div class="breaking-news-item">
                            <span class="breaking-news-dot"></span>
                            <a href="{{ route('posts.show', $news->slug) }}">{{ $news->title }}</a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <style>
            body { padding-bottom: 40px; } /* Prevent footer from being covered by ticker */
        </style>
    @endif
    
    @stack('scripts')
</body>
</html>
