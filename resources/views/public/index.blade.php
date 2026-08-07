<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Spidey Jastip | Your Friendly Neighborhood Shopper</title>

    <!-- Kembali menggunakan CDN agar sangat simpel, tidak perlu terminal/NPM -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
</head>

<!-- UBAH BACKGROUND DI TAG BODY INI -->
<body class="min-h-screen font-sans antialiased text-slate-100 pb-20 relative overflow-x-hidden" 
      style="background-image: url('{{ asset('images/windah.jpeg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat; background-attachment: fixed;">

    <!-- Lapisan Gelap (Overlay) agar teks tetap terbaca jelas -->
    <div class="fixed inset-0 bg-slate-950/80 z-0"></div>

    <!-- Dekorasi Jaring Laba-laba Abstrak (Top Right) -->
    <div class="absolute -top-16 -right-16 opacity-20 pointer-events-none z-10">
        <svg width="300" height="300" viewBox="0 0 24 24" fill="none" stroke="#ef4444" stroke-width="0.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2v20M2 12h20M19.07 4.93l-14.14 14.14M4.93 4.93l14.14 14.14M12 2a10 10 0 0 1 10 10 10 10 0 0 1-10 10A10 10 0 0 1 2 12 10 10 0 0 1 12 2zM12 6a6 6 0 0 1 6 6 6 6 0 0 1-6 6 6 6 0 0 1-6-6 6 6 0 0 1 6-6z"/></svg>
    </div>

    <main class="max-w-md mx-auto pt-12 px-4 flex flex-col items-center relative z-10">

        <!-- Profile Section -->
        <div class="relative mb-6 group cursor-pointer">
            <div class="w-24 h-24 rounded-full border-4 border-red-600 overflow-hidden shadow-[4px_4px_0px_0px_#991b1b] bg-slate-900 group-hover:-translate-y-1 group-hover:shadow-[6px_6px_0px_0px_#991b1b] transition-all">
                
                <!-- Panggil gambar jastiper.jpg di sini -->
                <img src="{{ asset('images/jastiper.jpg') }}" alt="Profile Avatar" class="w-full h-full object-cover">

            </div>
            <!-- Notif Badge -->
            <div class="absolute top-0 right-0 w-6 h-6 bg-blue-600 border-2 border-slate-950 rounded-full flex items-center justify-center animate-bounce">
                <i data-lucide="zap" class="w-3 h-3 text-white fill-white"></i>
            </div>
        </div>

        <h1 class="text-2xl font-black mb-2 text-center tracking-tight text-white uppercase drop-shadow-[2px_2px_0px_#991b1b]">@spidey.jastip</h1>

        <p class="text-center text-sm font-extrabold px-6 mb-6 text-slate-300">
            Your Friendly Neighborhood Shopper! 🕸️ <br>
            <span class="text-red-500 font-black">SUKABUMI</span> SKBM •
            <span class="text-blue-500 font-black">JEPANG</span> JPG •
            <span class="text-white font-black">INGGRIS</span> ING 
        </p>

        <!-- Social Channels Links -->
        <div class="flex items-center gap-4 mb-8">
            <a href="#" aria-label="WhatsApp Profile" class="p-2 bg-slate-900 text-white rounded-full border-2 border-red-600 shadow-[2px_2px_0px_0px_#991b1b] hover:-translate-y-1 transition-transform"><i data-lucide="message-circle" class="w-5 h-5"></i></a>
            <a href="#" aria-label="Instagram Profile" class="p-2 bg-slate-900 text-white rounded-full border-2 border-blue-600 shadow-[2px_2px_0px_0px_#1e3a8a] hover:-translate-y-1 transition-transform"><i data-lucide="instagram" class="w-5 h-5"></i></a>
            <a href="#" aria-label="Direct Email" class="p-2 bg-slate-900 text-white rounded-full border-2 border-red-600 shadow-[2px_2px_0px_0px_#991b1b] hover:-translate-y-1 transition-transform"><i data-lucide="mail" class="w-5 h-5"></i></a>
        </div>

        <!-- Links Container -->
        <div class="w-full space-y-4">

            <!-- Modal Trigger Card -->
            <button onclick="openModal()" class="w-full relative group text-left">
                <div class="absolute inset-0 bg-red-900 rounded-3xl translate-y-1.5 translate-x-1.5 transition-transform group-active:translate-y-0.5 group-active:translate-x-0.5"></div>
                <div class="relative w-full bg-slate-900 border-2 border-red-600 rounded-3xl p-4 flex flex-col items-center justify-center transition-transform group-active:translate-y-1.5 group-active:translate-x-1.5">
                    <span class="font-black text-white text-lg uppercase tracking-wide">Contact Tracker</span>
                    <span class="text-xs font-bold text-red-400 flex items-center gap-1 mt-1">
                        <i data-lucide="box" class="w-3 h-3"></i> Hubungi Admin PO
                    </span>
                </div>
            </button>

            <!-- Dynamic Links Rendering Loop -->
            @foreach($links as $link)
                <a href="{{ route('public.redirect', $link->id) }}"
                   target="_blank"
                   rel="noopener noreferrer"
                   class="w-full block relative group">

                    <div class="absolute inset-0 bg-blue-900 rounded-3xl translate-y-1.5 translate-x-1.5 transition-transform group-active:translate-y-0.5 group-active:translate-x-0.5"></div>
                    <div class="relative w-full bg-slate-900 border-2 border-blue-600 rounded-3xl p-4 flex items-center transition-transform group-active:translate-y-1.5 group-active:translate-x-1.5 hover:bg-slate-800">

                        <!-- Render Logo / Placeholder Icon -->
                        @if($link->image)
                            <img src="{{ asset('storage/' . $link->image) }}"
                                 alt="{{ $link->title }}"
                                 class="w-10 h-10 object-cover rounded-xl border-2 border-blue-600 absolute left-4 bg-slate-800">
                        @else
                            <div class="w-10 h-10 bg-slate-800 border-2 border-blue-600 rounded-xl flex items-center justify-center absolute left-4 shadow-[2px_2px_0px_0px_#1e3a8a]">
                                <i data-lucide="link" class="w-5 h-5 text-blue-400 stroke-[3]"></i>
                            </div>
                        @endif

                        <span class="w-full text-center font-black text-white text-base px-12 truncate uppercase tracking-tight">
                            {{ $link->title }}
                        </span>
                        <i data-lucide="arrow-right" class="w-5 h-5 text-red-500 absolute right-4 group-hover:translate-x-1 transition-transform"></i>
                    </div>
                </a>
            @endforeach
        </div>

        @if($links->hasPages())
            <div class="mt-8 w-full flex justify-center relative z-10">
                {{ $links->links('vendor.pagination.custom-pagination') }}
            </div>
        @endif

    </main>

    <!-- Modal Component: Bottom Sheet Overlay -->
    <div id="contact-modal" class="fixed inset-0 z-50 hidden opacity-0 transition-opacity duration-300" aria-modal="true" role="dialog">

        <!-- Backdrop Blur Element -->
        <div class="absolute inset-0 bg-slate-950/80 backdrop-blur-sm" onclick="closeModal()"></div>

        <!-- Sheet Container -->
        <div id="modal-content" class="absolute bottom-0 left-0 right-0 bg-slate-900 border-t-4 border-red-600 rounded-t-[2rem] p-6 max-w-md mx-auto h-auto max-h-[85vh] overflow-y-auto pb-10 flex flex-col shadow-[0px_-8px_20px_0px_rgba(220,38,38,0.2)] translate-y-full transition-transform duration-300">

            <!-- Drawer Indicator Bar -->
            <div class="w-12 h-1.5 bg-red-600 rounded-full mx-auto mb-6 shrink-0 shadow-[0_0_8px_#dc2626]"></div>

            <div class="text-center mb-6">
                <h2 class="text-sm font-extrabold text-blue-500 uppercase tracking-widest">HQ Tracker</h2>
                <h3 class="text-2xl font-black text-white mt-2 drop-shadow-[1px_1px_0px_#dc2626]">Spidey Jastip</h3>
                <p class="text-xs font-bold text-slate-400 mt-1">Layanan Titip Barang Internasional</p>
            </div>

            <!-- Detail Information Card -->
            <div class="bg-slate-950 border-2 border-blue-600 rounded-2xl p-5 mb-6 space-y-4 shadow-[4px_4px_0px_0px_#1e3a8a]">
                <div class="flex items-center gap-3 border-b-2 border-dashed border-slate-800 pb-4">
                    <div class="p-2 bg-slate-800 border-2 border-red-600 rounded-lg"><i data-lucide="mail" class="w-4 h-4 text-red-500"></i></div>
                    <p class="font-extrabold text-sm truncate text-white">gisaldapa@spideyjastip.com</p>
                </div>
                <div class="flex items-center gap-3 border-b-2 border-dashed border-slate-800 pb-4">
                    <div class="p-2 bg-slate-800 border-2 border-blue-600 rounded-lg"><i data-lucide="message-circle" class="w-4 h-4 text-blue-400"></i></div>
                    <p class="font-extrabold text-sm truncate text-white">+62 857 954 072 (WA Only)</p>
                </div>
                <div class="flex items-start gap-3">
                    <div class="p-2 bg-slate-800 border-2 border-red-600 rounded-lg mt-1"><i data-lucide="plane" class="w-4 h-4 text-red-500"></i></div>
                    <div>
                        <p class="font-extrabold text-sm text-white">Jadwal Pengiriman</p>
                        <p class="font-extrabold text-xs text-slate-400 mt-0.5">Setiap Akhir Bulan (Estimasi tiba maksimal 1 detik)</p>
                    </div>
                </div>
            </div>

            <!-- Disclaimer Banner -->
            <div class="bg-red-950/30 border-2 border-red-600 p-4 rounded-xl flex gap-3 mb-6 shadow-[2px_2px_0px_0px_#991b1b]">
                <i data-lucide="alert-triangle" class="w-5 h-5 shrink-0 mt-0.5 text-red-500"></i>
                <p class="text-[11px] font-bold text-slate-300 leading-relaxed">
                    Perhatian: Harga sudah termasuk bea cukai. Jasa kami anti pajak pemerintah.
                </p>
            </div>

            <!-- Action Buttons -->
            <div class="mt-auto flex gap-3">
                <button class="flex-1 bg-gradient-to-r from-red-700 to-red-500 text-white font-black py-4 rounded-xl hover:from-red-600 hover:to-red-400 transition-colors border-2 border-red-900 shadow-[3px_3px_0px_0px_#7f1d1d] uppercase tracking-wide">
                    Tanya Admin
                </button>
                <button onclick="closeModal()" aria-label="Tutup Modal" class="w-14 h-14 shrink-0 bg-slate-800 border-2 border-blue-600 rounded-xl flex items-center justify-center shadow-[3px_3px_0px_0px_#1e3a8a] hover:translate-x-1 hover:translate-y-1 hover:shadow-none transition-all">
                    <i data-lucide="x" class="w-6 h-6 stroke-[3] text-blue-400"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Modal Controller Script -->
    <script>
        lucide.createIcons();

        const modal = document.getElementById('contact-modal');
        const modalContent = document.getElementById('modal-content');

        function openModal(){
            modal.classList.remove('hidden');
            requestAnimationFrame(() => {
                modal.classList.remove('opacity-0');
                modalContent.classList.remove('translate-y-full');
            });
            document.body.style.overflow = 'hidden'; 
        }

        function closeModal(){
            modal.classList.add('opacity-0');
            modalContent.classList.add('translate-y-full');

            setTimeout(() => {
                modal.classList.add('hidden');
                document.body.style.overflow = 'auto'; 
            }, 300);
        }
    </script>
</body>
</html>