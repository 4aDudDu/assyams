@extends('root.app')

@section('title', 'Beranda - Pondok As-Syams')

@section('content')

<style>
    .reveal {
        opacity: 0;
        transform: translateY(30px);
        transition: all 1s cubic-bezier(0.5, 0, 0, 1);
    }

    .reveal.active {
        opacity: 1;
        transform: translateY(0);
    }
</style>

    <!-- HERO SECTION (SPMB) - FULL IMAGE BACKGROUND -->
    <div class="relative text-white overflow-hidden min-h-screen flex items-center">
        
        <!-- Background Image dari Filament - FULL COVERAGE -->
        <div class="absolute inset-0 z-0">
            @if($bgUrl)
                <img src="{{ $bgUrl }}" class="w-full h-full object-cover" alt="Hero Background">
            @else
                <!-- Fallback Gradient jika admin belum upload gambar -->
                <div class="w-full h-full bg-gradient-to-br from-emerald-700 via-green-700 to-emerald-900"></div>
            @endif
            <!-- Overlay Gradient untuk kontras teks (lebih gelap) -->
            <div class="absolute inset-0 bg-gradient-to-r from-emerald-900/85 via-emerald-800/70 to-transparent"></div>
            <!-- Layer tambahan untuk mobile responsiveness -->
            <div class="absolute inset-0 bg-black/20"></div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 md:py-32 lg:py-48 min-h-screen flex items-center">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center w-full">
                
                <!-- Text Section (Kiri) -->
                <div class="text-center md:text-left space-y-2 fade-in-section order-2 md:order-1">
                    <p class="text-xl md:text-2xl font-light italic font-serif text-emerald-100">Selamat Datang di</p>
                    <h1 class="text-6xl md:text-8xl lg:text-9xl font-extrabold tracking-tighter text-white leading-none drop-shadow-xl">
                        SPMB
                    </h1>
                    <h2 class="text-lg md:text-2xl font-bold uppercase tracking-widest text-emerald-50">
                        Sistem Penerimaan Murid Baru
                    </h2>
                    <p class="text-md md:text-lg text-emerald-100 pb-6">
                        SIT AS-SYAMS PEKANBARU TA. 2026/2027
                    </p>
                    
                    <a href="{{ route('register') }}" class="inline-block px-8 py-4 bg-orange-700 hover:bg-orange-800 text-white font-bold rounded-full shadow-2xl transform transition hover:scale-110 text-lg tracking-wide">
                        DAFTAR SEKARANG
                    </a>
                </div>

                <!-- Image Section (Kanan - Ilustrasi Santri) -->
                <div class="hidden md:block relative fade-in-section order-1 md:order-2">
                    <!-- Dekorasi Koin/Elemen melayang -->
                    <div class="absolute top-0 right-0 animate-bounce delay-700">
                        <div class="w-16 h-16 bg-yellow-400 rounded-full blur-xl opacity-50"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- COUNTDOWN SECTION -->
    <div class="bg-white border-b-4 border-emerald-700 shadow-lg relative z-20 -mt-8 mx-4 md:mx-auto max-w-6xl rounded-xl p-6 md:p-10 flex flex-col md:flex-row items-center justify-between gap-8 fade-in-section">
        
        <!-- Text Description -->
        <div class="md:w-1/2">
            <p class="text-gray-600 leading-relaxed text-sm md:text-base">
                Bergabunglah bersama kami di Sekolah Islam Terpadu (SIT) <span class="font-bold text-emerald-700">Pondok As-Syams</span>. 
                Sistem Penerimaan Peserta Didik Baru (SPMB) kini telah dibuka. Dapatkan pendidikan berkualitas berbasis Al-Qur'an, Akhlak, dan Prestasi.
            </p>
        </div>

        <!-- Timer Logic (AlpineJS) -->
        <!-- UPDATE DISINI: Menggunakan variabel $deadline dari Database -->
        <div class="md:w-1/2 w-full" 
             x-data="countdown('{{ $deadline }}')" 
             x-init="init()">
            
            <h3 class="text-lg font-bold text-gray-900 mb-4 text-center md:text-left">SPMB Akan Berakhir Pada:</h3>
            <!-- Tampilkan Tanggal Manusiawi -->
            <p class="text-xs text-gray-500 mb-2 text-center md:text-left">
                Batas Akhir: {{ \Carbon\Carbon::parse($deadline)->translatedFormat('d F Y, H:i') }} WIB
            </p>
            
            <div class="flex justify-center md:justify-start gap-4 text-center">
                <!-- Days -->
                <div class="flex flex-col">
                    <span class="text-4xl font-mono font-bold text-gray-800" x-text="days">00</span>
                    <span class="text-xs text-gray-500 uppercase tracking-wide">Hari</span>
                </div>
                <div class="text-2xl font-bold text-gray-300 self-start mt-1">:</div>

                <!-- Hours -->
                <div class="flex flex-col">
                    <span class="text-4xl font-mono font-bold text-gray-800" x-text="hours">00</span>
                    <span class="text-xs text-gray-500 uppercase tracking-wide">Jam</span>
                </div>
                <div class="text-2xl font-bold text-gray-300 self-start mt-1">:</div>

                <!-- Minutes -->
                <div class="flex flex-col">
                    <span class="text-4xl font-mono font-bold text-gray-800" x-text="minutes">00</span>
                    <span class="text-xs text-gray-500 uppercase tracking-wide">Menit</span>
                </div>
                <div class="text-2xl font-bold text-gray-300 self-start mt-1">:</div>

                <!-- Seconds -->
                <div class="flex flex-col">
                    <span class="text-4xl font-mono font-bold text-gray-800" x-text="seconds">00</span>
                    <span class="text-xs text-gray-500 uppercase tracking-wide">Detik</span>
                </div>
            </div>
        </div>
    </div>

    <!-- STATS SECTION (Sisa halaman ke bawah sama seperti sebelumnya) -->
    <section class="bg-white py-12 fade-in-section">
        <!-- ... (Isi konten Program Unggulan/Stats yang lama biarkan di sini atau copy ulang dari file sebelumnya) ... -->
         <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center pt-10">
            <h2 class="text-3xl font-extrabold text-emerald-800">Kenapa Memilih As-Syams?</h2>
            <div class="mt-10 grid gap-8 grid-cols-1 md:grid-cols-3">
                 <!-- Card 1 -->
                <div class="bg-emerald-50 rounded-lg p-6 hover:shadow-lg transition border-l-4 border-emerald-700">
                    <h3 class="text-xl font-bold text-emerald-700">Tahfiz Al-Qur'an</h3>
                    <p class="mt-2 text-gray-600">Program unggulan hafalan mutqin bersanad.</p>
                </div>
                <!-- Card 2 -->
                <div class="bg-emerald-50 rounded-lg p-6 hover:shadow-lg transition border-l-4 border-emerald-700">
                    <h3 class="text-xl font-bold text-emerald-700">Adab & Akhlak</h3>
                    <p class="mt-2 text-gray-600">Pembentukan karakter islami sejak dini.</p>
                </div>
                <!-- Card 3 -->
                <div class="bg-emerald-50 rounded-lg p-6 hover:shadow-lg transition border-l-4 border-emerald-700">
                    <h3 class="text-xl font-bold text-emerald-700">Prestasi Akademik</h3>
                    <p class="mt-2 text-gray-600">Kurikulum terpadu nasional & kepondokan.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- SEJARAH YAYASAN & VIDEO -->
    <section class="py-16 bg-white fade-in-section">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                
                <!-- BAGIAN TEKS (KIRI) -->
                <div class="space-y-6">
                    <h2 class="text-3xl md:text-4xl font-bold text-emerald-700 leading-tight">
                    Rumah Qur'an Asy-Syams
                    </h2>
                    
                    <p class="text-gray-600 text-justify leading-relaxed">
                    Rumah Qur’an Asy-Syams adalah sebuah fasilitator Pembelajaran yang berfokus pada pembinaan Tahsin, Tahfizh dan Seni Baca Al-Qur’an dengan 7 Irama Al-Qur’an, baik dengan Murottal dan Mujawwad. Serta mencetak kader-kader Juara MTQ & MHQ
                    </p>

                </div>

                <!-- BAGIAN VIDEO (KANAN) -->
                <div class="relative w-full aspect-video rounded-2xl overflow-hidden shadow-2xl border-4 border-white ring-1 ring-gray-200">
                    <!-- Ganti ID Youtube di src: https://www.youtube.com/embed/{ID_VIDEO} -->
                    <iframe 
                        class="absolute top-0 left-0 w-full h-full"
                        src="https://www.youtube.com/embed/jKpZRSv3Z6g" 
                        title="Profile Pondok As-Syams" 
                        frameborder="0" 
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                        allowfullscreen>
                    </iframe>
                </div>

            </div>
        </div>
    </section>

    <section class="py-16 bg-gray-50 fade-in-section" id="kelas">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Header Section -->
            <div class="text-center mb-12">
                <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
                    Kelas di <span class="text-green-600">RQ Asy-Syams</span>
                </h2>
                <p class="mt-4 text-gray-500">Pilihan program pembelajaran Al-Qur'an sesuai kebutuhan Anda.</p>
                <div class="mt-4 w-24 h-1 bg-yellow-400 mx-auto rounded-full"></div>
            </div>

            <!-- Grid Kartu -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

                <!-- 1. KELAS TAHSIN -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-all duration-300 border-t-4 border-green-500 group hover:-translate-y-1">
                    <div class="p-8">
                        <div class="w-14 h-14 bg-green-100 rounded-full flex items-center justify-center text-green-600 mb-6 group-hover:bg-green-600 group-hover:text-white transition">
                            <!-- Icon Buku -->
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Kelas Tahsin</h3>
                        <p class="text-gray-600 leading-relaxed text-sm">
                            Program pembelajaran yang fokus pada memperbaiki cara membaca Al-Qur’an sesuai kaidah tajwid dan makharijul huruf (tempat keluarnya huruf) agar bacaan menjadi fasih dan benar.
                        </p>
                    </div>
                </div>

                <!-- 2. KELAS MUROTTAL -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-all duration-300 border-t-4 border-yellow-500 group hover:-translate-y-1">
                    <div class="p-8">
                        <div class="w-14 h-14 bg-yellow-100 rounded-full flex items-center justify-center text-yellow-600 mb-6 group-hover:bg-yellow-500 group-hover:text-white transition">
                            <!-- Icon Nada -->
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Kelas Murottal</h3>
                        <p class="text-gray-600 leading-relaxed text-sm">
                            Kelas yang fokus pada melatih cara membaca Al-Qur’an dengan irama (lagu) dan tartil yang indah sesuai kaidah tajwid, dengan penekanan pada keindahan suara, irama, dan tempo bacaan.
                        </p>
                    </div>
                </div>

                <!-- 3. KELAS TILAWAH / NAGHAM -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-all duration-300 border-t-4 border-blue-500 group hover:-translate-y-1">
                    <div class="p-8">
                        <div class="w-14 h-14 bg-blue-100 rounded-full flex items-center justify-center text-blue-600 mb-6 group-hover:bg-blue-600 group-hover:text-white transition">
                            <!-- Icon Mic -->
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Kelas Tilawah / Nagham</h3>
                        <p class="text-gray-600 leading-relaxed text-sm">
                            Kelas khusus mendalami berbagai jenis irama (lagu) qira’ah dan seni baca Al-Qur'an. Fokus pada penerapan naghom (Bayati, Hijaz, dll) pada ayat-ayat Al-Qur'an secara profesional.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- NEWS & ARTICLE SECTION -->
    <section class="py-16 bg-gray-50 fade-in-section" id="berita">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
                    Berita & <span class="text-emerald-600">Artikel</span> Yayasan
                </h2>
                <p class="mt-4 text-gray-500">Informasi terbaru seputar kegiatan dan prestasi Pondok As-Syams.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @forelse($posts as $post)
                    <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300 group">
                        
                        <!-- Image Thumb -->
                        <div class="relative h-48 overflow-hidden">
                            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full h-full object-cover transform group-hover:scale-110 transition duration-500">
                            <!-- Category Badge -->
                            <div class="absolute top-4 left-4">
                                <span class="bg-emerald-600 text-white text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wide">
                                    {{ $post->category }}
                                </span>
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-900 leading-tight mb-2 group-hover:text-emerald-600 transition">
                                <a href="{{ route('post.show', $post->slug) }}">
                                    {{ Str::limit($post->title, 60) }}
                                </a>
                            </h3>
                            
                            <!-- Meta Info -->
                            <div class="flex items-center text-sm text-gray-500 mt-4 space-x-4">
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    {{ $post->published_at ? $post->published_at->diffForHumans() : '-' }}
                                </div>
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                    {{ $post->author->name }}
                                </div>
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                    {{ $post->views }}
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center py-10">
                        <p class="text-gray-500 italic">Belum ada berita terbaru.</p>
                    </div>
                @endforelse
            </div>

            @if($posts->count() > 0)
                <div class="mt-10 text-center">
                    <a href="#" class="inline-block bg-emerald-600 text-white font-bold py-3 px-8 rounded hover:bg-emerald-700 transition">
                        Load More News
                    </a>
                </div>
            @endif
        </div>
    </section>

    <!-- CONTACT & LOCATION SECTION -->
    <section id="contact" class="py-20 bg-gray-50 fade-in-section">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="text-center mb-12">
                <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
                    Hubungi <span class="text-emerald-600">Kami</span>
                </h2>
                <p class="mt-4 text-gray-500 text-lg">
                    Punya pertanyaan seputar pendaftaran atau program pondok? <br> 
                    Silakan datang langsung atau kirim pesan kepada kami.
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">
                
                <!-- KOLOM KIRI: INFO & PETA -->
                <div class="space-y-8">
                    
                    <!-- Info Cards -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Alamat -->
                        <div class="bg-white p-6 rounded-xl shadow-sm border-l-4 border-green-600 hover:shadow-md transition">
                            <div class="flex items-center mb-3">
                                <div class="p-2 bg-green-100 rounded-lg text-green-600 mr-3">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                </div>
                                <h4 class="font-bold text-gray-800">Alamat Kantor</h4>
                            </div>
                            <p class="text-gray-600 text-sm leading-relaxed">
                            Alamat : Jl. Tegal Sari <br> Gg. Kemuning No. 9 kel. Umban sari Kec. Rumbai kota Pekanbaru
                            </p>
                        </div>

                        <!-- Kontak -->
                        <div class="bg-white p-6 rounded-xl shadow-sm border-l-4 border-green-600 hover:shadow-md transition">
                            <div class="flex items-center mb-3">
                                <div class="p-2 bg-green-100 rounded-lg text-green-600 mr-3">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                                </div>
                                <h4 class="font-bold text-gray-800">Layanan Informasi</h4>
                            </div>
                            <p class="text-gray-600 text-sm">
                                <span class="block mb-1">WA:  +62 853-7637-4040</span>
                                <!-- <span class="block">Telp: (0761) 123456</span> -->
                            </p>
                        </div>
                    </div>

                    <!-- Google Maps Embed -->
                    <div class="bg-white p-2 rounded-xl shadow-sm border border-gray-200 h-80 relative overflow-hidden group">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127643.57373716064!2d101.36690262797602!3d0.5262668730479014!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d5abb7e269c709%3A0x184054230052062c!2sPekanbaru%2C%20Kota%20Pekanbaru%2C%20Riau!5e0!3m2!1sid!2sid!4v1698765432100!5m2!1sid!2sid" 
                            width="100%" 
                            height="100%" 
                            style="border:0;" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade"
                            class="rounded-lg grayscale group-hover:grayscale-0 transition duration-500">
                        </iframe>
                    </div>

                </div>

                    
    <!-- KOLOM KANAN: FORM PESAN -->
    <div class="bg-white rounded-2xl shadow-lg p-8 border-t-4 border-orange-700 relative">
                        <h3 class="text-2xl font-bold text-gray-800 mb-6">Kirim Pesan</h3>
                        
                        <!-- Pesan Sukses -->
                        @if(session('success'))
                            <div class="mb-6 p-4 bg-emerald-100 border border-emerald-400 text-emerald-700 rounded">
                                {{ session('success') }}
                            </div>
                        @endif

                        <!-- Form Backend -->
                        <form action="{{ route('contact.send') }}" method="POST">
                            @csrf <!-- Token Keamanan Wajib -->
                            
                            <div class="space-y-5">
                                
                                <!-- Nama -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                                    <input type="text" name="name" required class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition outline-none" placeholder="Contoh: Abdullah">
                                    @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                </div>

                                <!-- Email/WA -->
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                                        <input type="email" name="email" required class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition outline-none" placeholder="email@contoh.com">
                                        @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">No. WhatsApp</label>
                                        <input type="number" name="phone" required class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition outline-none" placeholder="0812xxx">
                                        @error('phone') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                <!-- Pesan -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Isi Pesan</label>
                                    <textarea name="message" rows="4" required class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition outline-none" placeholder="Tulis pertanyaan Anda di sini..."></textarea>
                                    @error('message') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                </div>

                                <!-- Tombol Kirim -->
                                <button type="submit" class="w-full bg-orange-700 text-white font-bold py-3 px-6 rounded-lg hover:bg-orange-800 transition transform hover:-translate-y-1 shadow-lg flex justify-center items-center gap-2">
                                    <span>Kirim Pesan Sekarang</span>
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                </button>

                            </div>
                        </form>

                        <!-- Dekorasi -->
                        <div class="absolute top-0 right-0 -mt-4 -mr-4 w-20 h-20 bg-yellow-100 rounded-full blur-2xl opacity-50 pointer-events-none"></div>
                    </div>

                        <!-- Dekorasi -->
                        <div class="absolute top-0 right-0 -mt-4 -mr-4 w-20 h-20 bg-yellow-100 rounded-full blur-2xl opacity-50 pointer-events-none"></div>
                    </div>

                </div>
            </div>
        </section>
    </div>

    <!-- Script Countdown AlpineJS -->
    <script>
        function countdown(expiry) {
            return {
                expiry: new Date(expiry).getTime(),
                remaining: null,
                days: '00',
                hours: '00',
                minutes: '00',
                seconds: '00',
                init() {
                    this.setRemaining();
                    setInterval(() => {
                        this.setRemaining();
                    }, 1000);
                },
                setRemaining() {
                    const diff = this.expiry - new Date().getTime();
                    if (diff >= 0) {
                        this.days = String(Math.floor(diff / (1000 * 60 * 60 * 24))).padStart(2, '0');
                        this.hours = String(Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60))).padStart(2, '0');
                        this.minutes = String(Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60))).padStart(2, '0');
                        this.seconds = String(Math.floor((diff % (1000 * 60)) / 1000)).padStart(2, '0');
                    }
                }
            }
        }
    </script>
@endsection