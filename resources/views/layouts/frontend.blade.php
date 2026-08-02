<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
  <title>@yield('title', 'Drs. Chaeroni & Rekan — Kantor Akuntan Publik')</title>
  <meta name="description" content="@yield('meta_description', ' Drs. Chaeroni & Rekan — Kantor Akuntan Publik terdaftar di Kementerian Keuangan RI. Jasa audit & asurans, perpajakan, dan konsultasi bisnis. Reservasi konsultasi online mudah.')" />
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <link rel="icon" href="{{ asset('assets/logo/LOGO-KAP-Drs.-CHAERONI-REKAN-150x150.webp') }}" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.3.0/css/all.css" />
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            brand: {
              50: '#f5f8fb', 100: '#e8eef5', 200: '#cddce9', 300: '#a3bed3',
              400: '#7299b8', 500: '#527da0', 600: '#406587', 700: '#35526f',
              800: '#2f465d', 900: '#1f3348', 950: '#0f172a'
            }
          }
        }
      }
    };
  </script>
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
  @if(config('services.turnstile.site_key'))
    <script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>
  @endif
  @stack('head')
</head>
<body class="bg-slate-100 text-slate-800">

  @php($active = trim((string) view()->getSection('active')) ?: 'home')

  <!-- ======= HEADER ======= -->
  <header id="site-header" class="fixed top-0 inset-x-0 z-50 transition-all duration-300">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex items-center justify-between h-20">
      
      <!-- Brand Logo -->
      <a href="/" class="flex items-center gap-2.5 shrink-0">
        <span class="w-10 h-10 rounded-xl bg-white flex items-center justify-center shadow-lg shadow-blue-500/30">
          <img src="{{ asset('assets/logo/LOGO-KAP-Drs.-CHAERONI-REKAN-150x150.webp') }}" alt="Logo KAP Drs. Chaeroni &amp; Rekan" class="w-10 h-10 object-contain" loading="lazy" />
        </span>
        <div class="flex flex-col">
          <span class="text-base sm:text-lg font-bold text-white font-heading tracking-tight leading-tight">
            Drs. Chaeroni <span class="text-blue-400">&amp; </span>
          </span>
          <span class="text-[10px] text-white/70 font-normal">Registered Public Accountants</span>
        </div>
      </a>

      <!-- Desktop Navigation -->
      <nav class="hidden lg:flex items-center gap-8 text-sm font-medium">
        <a href="/" class="nav-link{{ $active === 'home' ? ' active' : '' }}">Beranda</a>
        <a href="/layanan" class="nav-link{{ $active === 'layanan' ? ' active' : '' }}">Layanan</a>
        <a href="/tentang" class="nav-link{{ $active === 'tentang' ? ' active' : '' }}">Tentang Kami</a>
        <a href="/portofolio" class="nav-link{{ $active === 'portofolio' ? ' active' : '' }}">Portofolio</a>
        <a href="/blog" class="nav-link{{ $active === 'blog' ? ' active' : '' }}">Blog</a>
        <a href="/karir" class="nav-link{{ $active === 'karir' ? ' active' : '' }}">Karir</a>
        <a href="/kontak" class="nav-link{{ $active === 'kontak' ? ' active' : '' }}">Kontak</a>
      </nav>

      <!-- Desktop Button -->
      <div class="hidden lg:flex items-center gap-3">
        <a href="/reservasi" class="inline-flex items-center gap-2 rounded-full bg-blue-500 hover:bg-blue-400 text-white text-sm font-semibold px-6 py-3 transition shadow-lg shadow-blue-500/25{{ $active === 'reservasi' ? ' ring-2 ring-white/30' : '' }}">
          Reservasi Konsultasi
          <i class="fa-solid fa-arrow-right text-[16px]"></i>
        </a>
      </div>

      <!-- Mobile Menu Button Trigger -->
      <button id="mobile-menu-btn" class="lg:hidden text-white p-2 rounded-lg hover:bg-white/10 focus:outline-none" aria-label="Buka Menu">
        <i class="fa-solid fa-bars text-[24px]"></i>
      </button>

    </div>
  </div>
</header>

  <!-- OFFCANVAS MOBILE MENU CONTAINER -->
  <div id="offcanvas-wrapper" class="relative z-[60] lg:hidden hidden">
    <!-- Backdrop Overlay -->
    <div id="offcanvas-backdrop" class="fixed inset-0 bg-slate-950/60 backdrop-blur-sm opacity-0 transition-opacity duration-300"></div>

    <!-- Offcanvas Drawer Panel -->
    <div id="offcanvas-panel" class="fixed inset-y-0 right-0 w-full max-w-xs bg-slate-900 border-l border-white/10 shadow-2xl p-6 flex flex-col justify-between translate-x-full transition-transform duration-300 ease-in-out">
      
      <!-- Top Section: Header Inside Drawer -->
      <div>
        <div class="flex items-center justify-between pb-6 border-b border-white/10">
          <!-- Logo Offcanvas -->
          <a href="{{ route('home') }}" class="flex items-center gap-2.5">
            <span class="w-9 h-9 rounded-lg bg-white flex items-center justify-center shadow-md">
              <img src="{{ asset('assets/logo/LOGO-KAP-Drs.-CHAERONI-REKAN-150x150.webp') }}" alt="Logo KAP Drs. Chaeroni &amp; Rekan" class="w-8 h-8 object-contain" />
            </span>
            <div class="flex flex-col">
              <span class="text-sm font-bold text-white font-heading leading-tight">Drs. Chaeroni <span class="text-blue-400">&amp; Rekan</span></span>
              <span class="text-[9px] text-white/60">Registered Public Accountants</span>
            </div>
          </a>

          <!-- Close Button -->
          <button id="offcanvas-close-btn" class="text-white/70 hover:text-white p-1.5 rounded-lg hover:bg-white/10 transition" aria-label="Tutup Menu">
            <i class="fa-solid fa-xmark text-[24px]"></i>
          </button>
        </div>

        <!-- Navigation Links -->
        <nav class="mt-6 flex flex-col gap-2">
          <a href="{{ route('home') }}" class="px-4 py-3 rounded-xl text-sm font-medium transition {{ $active === 'home' ? 'bg-blue-600 text-white font-semibold' : 'text-white/80 hover:bg-white/5 hover:text-white' }}">Beranda</a>
          <a href="{{ route('services') }}" class="px-4 py-3 rounded-xl text-sm font-medium transition {{ $active === 'layanan' ? 'bg-blue-600 text-white font-semibold' : 'text-white/80 hover:bg-white/5 hover:text-white' }}">Layanan</a>
          <a href="{{ route('about') }}" class="px-4 py-3 rounded-xl text-sm font-medium transition {{ $active === 'tentang' ? 'bg-blue-600 text-white font-semibold' : 'text-white/80 hover:bg-white/5 hover:text-white' }}">Tentang Kami</a>
          <a href="{{ route('case-studies') }}" class="px-4 py-3 rounded-xl text-sm font-medium transition {{ $active === 'portofolio' ? 'bg-blue-600 text-white font-semibold' : 'text-white/80 hover:bg-white/5 hover:text-white' }}">Portofolio</a>
          <a href="{{ route('blog') }}" class="px-4 py-3 rounded-xl text-sm font-medium transition {{ $active === 'blog' ? 'bg-blue-600 text-white font-semibold' : 'text-white/80 hover:bg-white/5 hover:text-white' }}">Blog</a>
          <a href="{{ route('career') }}" class="px-4 py-3 rounded-xl text-sm font-medium transition {{ $active === 'karir' ? 'bg-blue-600 text-white font-semibold' : 'text-white/80 hover:bg-white/5 hover:text-white' }}">Karir</a>
          <a href="{{ route('contact') }}" class="px-4 py-3 rounded-xl text-sm font-medium transition {{ $active === 'kontak' ? 'bg-blue-600 text-white font-semibold' : 'text-white/80 hover:bg-white/5 hover:text-white' }}">Kontak</a>
        </nav>
      </div>

      <!-- Bottom Section: CTA & Social Media -->
      <div class="pt-6 border-t border-white/10 space-y-5">
        <!-- CTA Button -->
        <a href="{{ route('booking') }}" class="w-full inline-flex justify-center items-center gap-2 rounded-xl bg-blue-500 hover:bg-blue-400 active:bg-blue-600 text-white text-sm font-semibold px-5 py-3 transition shadow-lg shadow-blue-500/20">
          <span>Reservasi Konsultasi</span>
          <i class="fa-solid fa-arrow-right text-[16px]"></i>
        </a>

        <!-- Social Media Icons -->
        <div class="flex items-center justify-center gap-4 text-white/60">
          <!-- LinkedIn -->
          <a href="https://www.linkedin.com/company/-drs-chaeroni-rekan/" target="_blank" rel="noopener" class="p-2 rounded-lg hover:bg-white/10 hover:text-white transition" aria-label="LinkedIn">
            <i class="fa-brands fa-linkedin"></i>
          </a>
          <!-- Instagram -->
          <a href="https://www.instagram.com/_mci/" target="_blank" rel="noopener" class="p-2 rounded-lg hover:bg-white/10 hover:text-white transition" aria-label="Instagram">
            <i class="fa-brands fa-instagram"></i>
          </a>
          <!-- Facebook -->
          <a href="https://www.facebook.com/mci" target="_blank" rel="noopener" class="p-2 rounded-lg hover:bg-white/10 hover:text-white transition" aria-label="Facebook">
            <i class="fa-brands fa-facebook"></i>
          </a>
          <!-- WhatsApp / Phone -->
          <a href="https://www.youtube.com/channel/UCHs9tXTGjmCj_5EisQW2Bxwi" target="_blank" rel="noopener noreferrer" class="p-2 rounded-lg hover:bg-white/10 hover:text-white transition" aria-label="YouTube">
            <i class="fa-brands fa-youtube"></i>
          </a>
        </div>
      </div>

    </div>
  </div>
  @yield('content')

  <!-- ======= FOOTER ======= -->
  <footer class="bg-brand-950 text-slate-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-16 pb-8">
      <div class="grid grid-cols-2 gap-x-6 gap-y-10 sm:gap-12 lg:grid-cols-4">
        <div class="col-span-2 lg:col-span-1">
          <a href="/" class="flex items-center gap-2.5">
            <img src="{{ asset('assets/logo/LOGO-KAP-Drs.-CHAERONI-REKAN-150x150.webp') }}" alt="Logo KAP Drs. Chaeroni &amp; Rekan" class="w-10 h-10 object-contain" />
            <span class="text-lg font-bold text-white font-heading tracking-tight"> Drs. Chaeroni <span class="text-blue-400">&amp; Rekan</span></span>
          </a>
          <p class="mt-5 text-sm leading-relaxed text-slate-400"> Layanan akuntan publik dan konsultasi independen (Audit, Assurance, &amp; Perpajakan) terpercaya untuk sektor swasta, BUMN/D, dan organisasi nirlaba.</p>
          <div class="mt-6 flex items-center gap-3">
            <a href="https://www.linkedin.com/company/-drs-chaeroni-rekan/" target="_blank" rel="noopener" class="w-9 h-9 rounded-lg bg-white/5 border border-white/10 flex items-center justify-center hover:bg-blue-500 transition" aria-label="LinkedIn">
              <i class="fa-brands fa-linkedin"></i>
            </a>
            <a href="https://www.instagram.com/_mci/" target="_blank" rel="noopener" class="w-9 h-9 rounded-lg bg-white/5 border border-white/10 flex items-center justify-center hover:bg-blue-500 transition" aria-label="Instagram">
              <i class="fa-brands fa-instagram"></i>
            </a>
            <a href="https://www.facebook.com/mci" target="_blank" rel="noopener" class="w-9 h-9 rounded-lg bg-white/5 border border-white/10 flex items-center justify-center hover:bg-blue-500 transition" aria-label="Facebook">
              <i class="fa-brands fa-facebook"></i>
            </a>
            <a href="https://www.youtube.com/channel/UCHs9tXTGjmCj_5EisQW2Bxwi" target="_blank" rel="noopener" class="w-9 h-9 rounded-lg bg-white/5 border border-white/10 flex items-center justify-center hover:bg-blue-500 transition" aria-label="YouTube">
              <i class="fa-brands fa-youtube"></i>
            </a>
          </div>
        </div>

        <div class="col-span-2 lg:col-span-3 grid grid-cols-2 gap-x-6 gap-y-10 sm:gap-12 lg:grid-cols-3">
          <div>
            <h4 class="text-sm font-semibold text-white uppercase tracking-wider">Perusahaan</h4>
            <ul class="mt-5 space-y-3 text-sm">
              <li><a href="{{ route('about') }}" class="text-slate-400 hover:text-blue-400 transition">Tentang Kami</a></li>
              <li><a href="{{ route('case-studies') }}" class="text-slate-400 hover:text-blue-400 transition">Portofolio</a></li>
              <li><a href="{{ route('blog') }}" class="text-slate-400 hover:text-blue-400 transition">Blog & Artikel</a></li>
              <li><a href="{{ route('career') }}" class="text-slate-400 hover:text-blue-400 transition">Karir</a></li>
              <li><a href="{{ route('booking') }}" class="text-slate-400 hover:text-blue-400 transition">Reservasi Konsultasi</a></li>
              <li><a href="{{ route('contact') }}" class="text-slate-400 hover:text-blue-400 transition">Kontak</a></li>
            </ul>
          </div>

          <div>
            <h4 class="text-sm font-semibold text-white uppercase tracking-wider">Layanan</h4>
            <ul class="mt-5 space-y-3 text-sm">
              <li><a href="{{ route('services') }}" class="text-slate-400 hover:text-blue-400 transition">Audit & Asurans</a></li>
              <li><a href="{{ route('services') }}" class="text-slate-400 hover:text-blue-400 transition">Perpajakan</a></li>
              <li><a href="{{ route('services') }}" class="text-slate-400 hover:text-blue-400 transition">Konsultasi Bisnis</a></li>
            </ul>
          </div>

          <div class="col-span-2 lg:col-span-1">
            <h4 class="text-sm font-semibold text-white uppercase tracking-wider">Kontak</h4>
            <ul class="mt-5 space-y-4 text-sm">
              <li class="flex gap-3">
                <i class="fa-solid fa-location-dot text-[20px] text-blue-400 shrink-0"></i>
                <span class="text-slate-400">Jl. Anggrek Nelimurni IIA/C-5, Slipi, Jakarta Barat 11480</span>
              </li>
              <li class="flex gap-3">
                <i class="fa-solid fa-phone text-[20px] text-blue-400 shrink-0"></i>
                <span class="text-slate-400">+62 21 532 1037</span>
              </li>
              <li class="flex gap-3">
                <i class="fa-solid fa-envelope text-[20px] text-blue-400 shrink-0"></i>
                <span class="text-slate-400">info@mci.co.id</span>
              </li>
              <li class="flex gap-3">
                <i class="fa-solid fa-clock text-[20px] text-blue-400 shrink-0"></i>
                <span class="text-slate-400">Senin–Jumat, 08.00–17.00</span>
              </li>
            </ul>
          </div>
        </div>
      </div>

      <div class="border-t border-white/10 mt-12 pt-6 flex flex-col sm:flex-row items-center justify-between gap-3 text-xs text-slate-500 text-center sm:text-left">
        <p>&copy; {{ date('Y') }} Drs. Chaeroni &amp; Rekan. Hak cipta dilindungi.</p>
        <div class="flex items-center gap-6">
          <a href="#" class="hover:text-slate-300 transition">Kebijakan Privasi</a>
          <a href="#" class="hover:text-slate-300 transition">Syarat & Ketentuan</a>
        </div>
      </div>
    </div>
  </footer>

  <script src="{{ asset('assets/js/main.js') }}"></script>
  @stack('scripts')
</body>
</html>
