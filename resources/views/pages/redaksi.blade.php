@extends('layouts.app')

@section('title', 'Susunan Redaksi - RADNEWS')

@section('content')
<div class="content-wrapper">
    <div class="main-content">
        <div class="article-hero" style="background: var(--white); padding: var(--spacing-8); border-radius: var(--radius-lg); box-shadow: var(--shadow-l1); border: 1px solid var(--border-medium);">
            <h1 class="text-h1" style="margin-bottom: var(--spacing-6); text-align: center;">Susunan Redaksi</h1>
            <div class="divider" style="margin: 0 auto var(--spacing-8) auto; width: 60px;"></div>

            <div class="article-body">
                <p><strong>Penerbit:</strong> PT Media Radaktif Digital</p>
                <p><strong>Pemimpin Umum / Pemimpin Redaksi:</strong> John Doe</p>
                <p><strong>Redaktur Pelaksana:</strong> Jane Smith</p>
                <p><strong>Tim Liputan:</strong></p>
                <ul>
                    <li>Ahmad Fulan</li>
                    <li>Budi Santoso</li>
                    <li>Siti Aminah</li>
                </ul>
                <br>
                <p><strong>Alamat Redaksi / Tata Usaha:</strong></p>
                <p>Gedung Radaktif Digital, Jl. Sudirman No. 123, Pekanbaru, Riau.</p>
                <p><strong>Email:</strong> redaksi@radaktifdigital.com</p>
                <p><strong>Telepon:</strong> (0761) 123456</p>
                <br>
                <p><em>*Seluruh wartawan RADNEWS dibekali tanda pengenal dan dilarang meminta atau menerima imbalan dalam bentuk apa pun dari narasumber.</em></p>
            </div>
        </div>
    </div>
    <div class="sidebar">
        <x-sidebar />
    </div>
</div>
@endsection
