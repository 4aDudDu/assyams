@php
    use App\Models\SiteSetting;
    
    // Ambil gambar dari database (Filament)
    try {
        $footerBg = SiteSetting::where('key', 'bg_footer')->value('value');
    } catch (\Exception $e) {
        $footerBg = null;
    }

    $bgUrl = $footerBg ? asset('storage/' . $footerBg) : 'https://img.freepik.com/free-photo/aerial-view-large-building-with-green-grass_1127-3367.jpg'; // Gambar default jika belum upload
@endphp

<!-- BAGIAN CTA (Call To Action) -->
<div class="relative bg-cover bg-center bg-no-repeat" style="background-image: url('{{ $bgUrl }}');">
    
    <!-- Overlay Gelap (Agar teks terbaca) -->
    <div class="absolute inset-0 bg-black/40"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row items-center justify-between min-h-[400px]">
            
            <!-- Kiri: Teks & Tombol -->
            <div class="w-full md:w-1/2 text-white py-10 md:py-0 text-center md:text-left fade-in-section">
                <h3 class="text-xl font-medium text-yellow-300 mb-2">Ayo Bergabung Bersama Kami</h3>
                <h2 class="text-4xl md:text-5xl font-extrabold leading-tight mb-6">
                    Dapatkan Pendidikan <br> Terbaik Untuk Ananda
                </h2>
                
                <a href="{{ route('register') }}" class="inline-flex items-center gap-2 bg-yellow-500 hover:bg-yellow-600 text-black font-bold py-3 px-8 rounded shadow-lg transition transform hover:scale-105">
                    Daftar Sekarang
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </a>
            </div>

            <!-- Kanan: Ilustrasi Siswa -->
            <!-- Gambar ini posisinya absolute di desktop biar bisa 'nempel' bawah -->
            <div class="w-full md:w-1/2 flex justify-center md:justify-end mt-8 md:mt-0 relative fade-in-section">
                <!-- Gunakan gambar siswa transparan (PNG) -->
                <!-- <img src="https://png.pngtree.com/png-vector/20230906/ourmid/pngtree-moslem-student-indonesia-uniform-png-image_9999263.png" 
                     alt="Siswa As-Syams" 
                     class="max-w-[300px] md:max-w-[450px] object-contain drop-shadow-2xl hover:scale-105 transition duration-500"> -->
            </div>

        </div>
    </div>
</div>

<!-- BAGIAN BAWAH (Hijau Solid) -->
<div class="bg-green-600 py-8 border-t-4 border-yellow-500">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col items-center">
        
        <!-- Logo Center -->
        <div class="flex items-center gap-3 mb-4">
        <img src="{{ asset('images/logo.PNG') }}" alt="Logo Pondok As-Syams" class="w-12 h-12 object-contain shadow-lg rounded-full">
            <div class="text-center text-white">
                <h4 class="font-bold text-2xl tracking-widest font-serif uppercase">RQ AS-SYAMS</h4>
                <p class="text-xs text-green-100 tracking-[0.3em] uppercase">Al-Qur'an | Akhlak | Prestasi</p>
            </div>
        </div>

        <!-- Copyright -->
        <p class="text-white text-sm opacity-80 mt-4">
            &copy; {{ date('Y') }} Yayasan Pendidikan Islam As-Syams Pekanbaru. All rights reserved.
        </p>

    </div>
</div>