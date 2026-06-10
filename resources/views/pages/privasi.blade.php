@extends('layouts.app')

@section('title', 'Kebijakan Privasi - RADNEWS')

@section('content')
<div class="content-wrapper">
    <div class="main-content">
        <div class="article-hero" style="background: var(--white); padding: var(--spacing-8); border-radius: var(--radius-lg); box-shadow: var(--shadow-l1); border: 1px solid var(--border-medium);">
            <h1 class="text-h1" style="margin-bottom: var(--spacing-6); text-align: center;">Kebijakan Privasi</h1>
            <div class="divider" style="margin: 0 auto var(--spacing-8) auto; width: 60px;"></div>

            <div class="article-body">
                <p>RADNEWS menghargai privasi pengguna. Kebijakan ini menjelaskan bagaimana kami mengumpulkan, menggunakan, dan melindungi informasi pribadi Anda saat menggunakan portal berita kami.</p>

                <h4>Informasi yang Kami Kumpulkan</h4>
                <p>Kami dapat mengumpulkan informasi pribadi seperti nama dan alamat email jika Anda mendaftar untuk layanan kami (misalnya, *Newsletter*), berpartisipasi dalam survei, atau memberikan komentar pada artikel kami.</p>

                <h4>Penggunaan Informasi</h4>
                <p>Informasi yang kami kumpulkan digunakan untuk memperbaiki kualitas layanan, mempersonalisasi konten, dan mengirimkan pemberitahuan terkait pembaruan berita (jika Anda berlangganan).</p>

                <h4>Perlindungan Data</h4>
                <p>Kami menerapkan langkah-langkah keamanan untuk menjaga kerahasiaan data pribadi Anda. Kami tidak akan menjual atau menyewakan informasi pribadi Anda kepada pihak ketiga tanpa persetujuan Anda, kecuali diwajibkan oleh hukum.</p>

                <h4>Cookies</h4>
                <p>Website kami menggunakan *cookies* untuk meningkatkan pengalaman pengguna. Anda dapat mengatur browser Anda untuk menolak *cookies*, tetapi hal ini mungkin memengaruhi fungsi beberapa bagian dari situs kami.</p>

                <p>Jika Anda memiliki pertanyaan mengenai kebijakan privasi ini, Anda dapat menghubungi kami melalui halaman redaksi.</p>
            </div>
        </div>
    </div>
    <div class="sidebar">
        <x-sidebar />
    </div>
</div>
@endsection
