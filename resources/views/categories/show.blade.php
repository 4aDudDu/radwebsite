@extends('layouts.app')

@section('title', $category->name . ' - RADNEWS')

@section('content')
    <div style="margin-bottom: var(--spacing-8); border-bottom: 1px solid var(--border-medium); padding-bottom: var(--spacing-6); display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 16px;">
        <div>
            <nav class="meta-link" style="margin-bottom: var(--spacing-4); text-transform: uppercase; letter-spacing: 0.1em;">
                <a href="/">Home</a>
                <span style="margin: 0 var(--spacing-2);">/</span>
                <span style="color: var(--text-primary);">Category</span>
            </nav>
            <h1 class="text-h1" style="text-transform: uppercase; margin: 0;">
                {{ $category->name }}
            </h1>
        </div>
        <div class="text-body text-muted" style="background: var(--bg-primary); padding: 8px 16px; border-radius: var(--radius-full); border: 1px solid var(--border-medium);">
            {{ $posts->total() }} Berita ditemukan
        </div>
    </div>

    <div class="content-wrapper">
        <div class="main-content">
            <div class="post-grid" style="grid-template-columns: repeat(2, 1fr);">
                @forelse($posts as $post)
                    <x-post-card :post="$post" />
                @empty
                    <p class="text-body text-muted" style="grid-column: span 2; font-style: italic; padding: var(--spacing-8) 0; text-align: center; background: var(--bg-secondary); border-radius: 12px;">Belum ada berita di kategori ini.</p>
                @endforelse
            </div>

            <div style="margin-top: var(--spacing-10); padding-top: var(--spacing-6); border-top: 1px solid var(--border-medium);">
                {{ $posts->links() }}
            </div>
        </div>

        <div class="sidebar">
            <x-sidebar />
        </div>
    </div>
@endsection
