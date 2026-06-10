<footer class="footer">
    <div class="container">
        <div class="footer-content">
            <div>
                <a href="/" class="footer-logo" style="display: flex; align-items: center; justify-content: center; background: white; padding: 10px; border-radius: 8px; width: fit-content; margin-bottom: 16px;">
                    <img src="/logo/logo.png" alt="RADNEWS" style="height: 40px; width: auto; filter: grayscale(100%) contrast(200%);">
                </a>
                <p class="footer-text">
                    Portal berita terkini, terpercaya, dan tercepat. Menyajikan informasi dari seluruh pelosok negeri dan mancanegara dengan standar jurnalistik tinggi.
                </p>
                <div style="display: flex; gap: 12px; margin-top: 24px;">
                    <a href="https://facebook.com" style="width: 36px; height: 36px; background: var(--bg-secondary); border: 1px solid var(--border-medium); border-radius: var(--radius-full); display: flex; align-items: center; justify-content: center; color: var(--text-primary); transition: var(--transition-smooth);" onmouseover="this.style.background='var(--text-primary)'; this.style.color='var(--white)';" onmouseout="this.style.background='var(--bg-secondary)'; this.style.color='var(--text-primary)';">
                        <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24"><path d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.95c5.05-.5 9-4.76 9-9.95z"></path></svg>
                    </a>
                    <a href="https://instagram.com" style="width: 36px; height: 36px; background: var(--bg-secondary); border: 1px solid var(--border-medium); border-radius: var(--radius-full); display: flex; align-items: center; justify-content: center; color: var(--text-primary); transition: var(--transition-smooth);" onmouseover="this.style.background='var(--text-primary)'; this.style.color='var(--white)';" onmouseout="this.style.background='var(--bg-secondary)'; this.style.color='var(--text-primary)';">
                        <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                    </a>
                    <a href="https://wa.me/?text={{ urlencode(url()->current()) }}" target="_blank" style="width: 36px; height: 36px; background: var(--bg-secondary); border: 1px solid var(--border-medium); border-radius: var(--radius-full); display: flex; align-items: center; justify-content: center; color: var(--text-primary); transition: var(--transition-smooth);" onmouseover="this.style.background='var(--text-primary)'; this.style.color='var(--white)';" onmouseout="this.style.background='var(--bg-secondary)'; this.style.color='var(--text-primary)';">
                        <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a5.8 5.8 0 0 0-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.015-1.04 2.476 1.065 2.873 1.213 3.071c.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.82 9.82 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.81 11.81 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.88 11.88 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.82 11.82 0 0 0-3.48-8.413Z"/></svg>
                    </a>
                </div>
            </div>
            
            <div>
                <h4 class="footer-heading">Kategori</h4>
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px;">
                    @php $cats = \App\Models\Category::limit(8)->get(); @endphp
                    @foreach($cats as $cat)
                        <a href="{{ route('categories.show', $cat->slug) }}" class="meta-link" style="color: var(--text-secondary); transition: var(--transition-fast);" onmouseover="this.style.color='var(--text-primary)'" onmouseout="this.style.color='var(--text-secondary)'">{{ $cat->name }}</a>
                    @endforeach
                </div>
            </div>

            <div>
                <h4 class="footer-heading">Informasi</h4>
                <ul class="footer-links">
                    <li><a href="#" onclick="alert('Coming Soon!'); return false;">Tentang Kami</a></li>
                </ul>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p>&copy; {{ date('Y') }} RADNEWS PORTAL. All rights reserved.</p>
        </div>
    </div>
</footer>
