@extends('layouts.app')

@section('title', 'Hasil Pencarian: ' . $query)

@section('content')
    <div style="margin-bottom: var(--spacing-8); border-bottom: 1px solid var(--border-medium); padding-bottom: var(--spacing-6);">
        <h1 class="text-h1" style="margin-bottom: var(--spacing-4);">Hasil Pencarian: <span style="color: var(--text-primary);">"{{ $query }}"</span></h1>
        <p class="text-body text-muted">{{ $posts->total() }} berita ditemukan untuk pencarian ini.</p>
    </div>

    <div class="content-wrapper">
        <div class="main-content">
            <div class="horizontal-post-list">
                @forelse($posts as $post)
                    <x-post-card :post="$post" :vertical="false" />
                @empty
                    <div style="background: var(--bg-secondary); border-radius: var(--radius-lg); padding: var(--spacing-10); text-align: center;">
                        <p class="text-body text-muted" style="font-style: italic; margin-bottom: var(--spacing-4);">Maaf, berita yang Anda cari tidak ditemukan.</p>
                        <a href="/" class="btn btn-primary" style="font-weight: 700;">Kembali ke Beranda</a>
                    </div>
                @endforelse
            </div>

            <div style="margin-top: var(--spacing-8);">
                {{ $posts->links() }}
            </div>
        </div>

        <div class="sidebar">
            <x-sidebar />
        </div>
    </div>
@endsection
