@php
    $categories = \App\Models\Category::whereNull('parent_id')->with('children')->get();
@endphp

<nav x-data="{ mobileMenuOpen: false }" class="navbar">
    <div class="container">
        <div class="navbar-container">
            <!-- Logo -->
            <a href="/" class="nav-brand" style="display: flex; align-items: center;">
                <img src="{{ asset('logo/logo.png') }}" alt="RADNEWS Logo" style="height: 56px; width: auto; object-fit: contain;">
            </a>

            <!-- Desktop Menu -->
            <div class="nav-links">
                @foreach($categories as $category)
                    <a href="{{ route('categories.show', $category->slug) }}" class="nav-item">
                        {{ $category->name }}
                    </a>
                @endforeach
            </div>

            <!-- Search Form -->
            <div style="display: flex; align-items: center; gap: 16px;" x-data="{ searchOpen: false }">
                <form action="{{ route('search') }}" method="GET" class="search-form" x-show="searchOpen" x-transition style="display: flex; align-items: center;">
                    <input type="text" name="q" placeholder="Cari berita..." class="search-input" required autofocus>
                    <button type="submit" class="search-btn">
                        <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </button>
                </form>

                <!-- Search Toggle Button (Desktop) -->
                <button @click="searchOpen = !searchOpen" x-show="!searchOpen" style="background: transparent; border: none; color: var(--text-primary); cursor: pointer;">
                    <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </button>

                <!-- Mobile Menu Toggle -->
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="mobile-menu-btn">
                    <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path x-show="!mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        <path x-show="mobileMenuOpen" style="display: none;" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div class="mobile-menu" :class="{ 'open': mobileMenuOpen }">
        <form action="{{ route('search') }}" method="GET" class="search-form" style="margin-bottom: 16px; width: 100%;">
            <input type="text" name="q" placeholder="Cari berita..." class="search-input" style="flex: 1;" required>
            <button type="submit" class="search-btn">Cari</button>
        </form>
        
        @foreach($categories as $category)
            <a href="{{ route('categories.show', $category->slug) }}" class="nav-item text-black">
                {{ $category->name }}
            </a>
        @endforeach
    </div>
</nav>

