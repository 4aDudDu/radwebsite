@extends('layouts.app')

@section('title', 'Pedoman Media Siber - RADNEWS')

@section('content')
<div class="content-wrapper">
    <div class="main-content">
        <div class="article-hero" style="background: var(--white); padding: var(--spacing-8); border-radius: var(--radius-lg); box-shadow: var(--shadow-l1); border: 1px solid var(--border-medium);">
            <h1 class="text-h1" style="margin-bottom: var(--spacing-6); text-align: center;">Pedoman Media Siber</h1>
            <div class="divider" style="margin: 0 auto var(--spacing-8) auto; width: 60px;"></div>

            <div class="article-body">
                <p>Kemerdekaan berpendapat, kemerdekaan berekspresi, dan kemerdekaan pers adalah hak asasi manusia yang dilindungi Pancasila, Undang-Undang Dasar 1945, dan Deklarasi Universal Hak Asasi Manusia PBB. Keberadaan media siber di Indonesia juga merupakan bagian dari kemerdekaan berpendapat, kemerdekaan berekspresi, dan kemerdekaan pers.</p>
                
                <h4>1. Ruang Lingkup</h4>
                <p>Media Siber adalah segala bentuk media yang menggunakan wahana internet dan melaksanakan kegiatan jurnalistik, serta memenuhi persyaratan Undang-Undang Pers dan Standar Perusahaan Pers yang ditetapkan Dewan Pers.</p>
                
                <h4>2. Verifikasi dan keberimbangan berita</h4>
                <p>Pada prinsipnya setiap berita harus melalui verifikasi. Berita yang dapat merugikan pihak lain memerlukan verifikasi pada berita yang sama untuk memenuhi prinsip akurasi dan keberimbangan.</p>

                <h4>3. Isi Buatan Pengguna (User Generated Content)</h4>
                <p>Media siber wajib mencantumkan syarat dan ketentuan mengenai Isi Buatan Pengguna yang tidak bertentangan dengan Undang-Undang No. 40 tahun 1999 tentang Pers dan Kode Etik Jurnalistik, yang ditempatkan secara terang dan jelas.</p>

                <p><em>Untuk pedoman selengkapnya, silakan merujuk pada pedoman resmi yang diterbitkan oleh Dewan Pers Indonesia.</em></p>
            </div>
        </div>
    </div>
    <div class="sidebar">
        <x-sidebar />
    </div>
</div>
@endsection
