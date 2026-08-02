@extends('layouts.frontend')

@section('title')
Karir - Drs. Chaeroni & Rekan
@endsection

@section('meta_description')
Bergabunglah bersama tim Drs. Chaeroni & Rekan sebagai Junior Auditor. Kami mencari individu bersemangat dan berorientasi target. Penempatan Jakarta Pusat.
@endsection

@section('active')
karir
@endsection

@section('content')

  <!-- ======= PAGE BANNER ======= -->
  <section class="relative bg-brand-950 overflow-hidden">
    <div class="absolute inset-0 z-0">
      <img src="{{ asset('assets/hero/karir.webp') }}" alt="Karir di  Drs. Chaeroni & Rekan" class="w-full h-full object-cover opacity-40" loading="lazy" />
      <div class="absolute inset-0 bg-brand-950/90"></div>
    </div>
    <div class="blob w-[420px] h-[420px] bg-blue-500/20 -top-32 -right-20"></div>
    <div class="blob w-[320px] h-[320px] bg-blue-500/10 bottom-0 -left-24"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-36 pb-20 lg:pt-44 lg:pb-24">
      <nav class="flex items-center gap-2 text-xs text-slate-400 mb-6">
        <a href="{{ route('home') }}" class="hover:text-blue-400 transition">Beranda</a>
        <i class="fa-solid fa-chevron-right text-[12px]"></i>
        <span class="text-slate-200">Karir</span>
      </nav>
      <div class="max-w-3xl reveal">
        <p class="text-sm font-semibold text-blue-400 uppercase tracking-wider">Career Opportunities</p>
        <h1 class="mt-3 font-heading text-4xl sm:text-5xl font-extrabold text-white leading-tight">Bergabunglah dengan Tim Kami</h1>
        <p class="mt-5 text-slate-300 text-lg">Saat ini kami sedang mencari individu-individu yang bersemangat dan berorientasi target untuk bergabung dalam tim kami sebagai Junior Auditor.</p>
      </div>
    </div>
  </section>

  <!-- ======= JOB DETAIL ======= -->
  <section class="py-20 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid lg:grid-cols-[1fr_360px] gap-10">

        <!-- Kualifikasi -->
        <div class="reveal bg-white rounded-3xl border border-slate-100 p-6 sm:p-10 shadow-sm">
          <span class="inline-flex items-center gap-2 rounded-full bg-blue-100 text-blue-700 text-xs font-semibold px-4 py-1.5">
            <i class="fa-solid fa-briefcase"></i>
            Junior Auditor
          </span>
          <h2 class="mt-4 font-heading text-2xl sm:text-3xl font-bold text-slate-900">Kualifikasi</h2>
          <p class="mt-3 text-slate-600 leading-relaxed">Kami mengundang kandidat terbaik untuk melamar dan tumbuh bersama kami. Berikut persyaratan yang kami butuhkan:</p>

          <ul class="mt-8 space-y-4">
            <li class="flex gap-4">
              <span class="w-9 h-9 shrink-0 rounded-full bg-blue-600 text-white flex items-center justify-center mt-0.5">
                <i class="fa-solid fa-check text-[14px]"></i>
              </span>
              <p class="text-slate-700 leading-relaxed pt-1.5">Pendidikan minimal D3/D4/S1 Akuntansi</p>
            </li>
            <li class="flex gap-4">
              <span class="w-9 h-9 shrink-0 rounded-full bg-blue-600 text-white flex items-center justify-center mt-0.5">
                <i class="fa-solid fa-check text-[14px]"></i>
              </span>
              <p class="text-slate-700 leading-relaxed pt-1.5">Memahami standar akuntansi keuangan yang berlaku umum</p>
            </li>
            <li class="flex gap-4">
              <span class="w-9 h-9 shrink-0 rounded-full bg-blue-600 text-white flex items-center justify-center mt-0.5">
                <i class="fa-solid fa-check text-[14px]"></i>
              </span>
              <p class="text-slate-700 leading-relaxed pt-1.5">Memahami standar audit beserta prosedurnya</p>
            </li>
            <li class="flex gap-4">
              <span class="w-9 h-9 shrink-0 rounded-full bg-blue-600 text-white flex items-center justify-center mt-0.5">
                <i class="fa-solid fa-check text-[14px]"></i>
              </span>
              <p class="text-slate-700 leading-relaxed pt-1.5">Pengalaman minimal satu tahun / fresh graduate dipersilahkan</p>
            </li>
            <li class="flex gap-4">
              <span class="w-9 h-9 shrink-0 rounded-full bg-blue-600 text-white flex items-center justify-center mt-0.5">
                <i class="fa-solid fa-check text-[14px]"></i>
              </span>
              <p class="text-slate-700 leading-relaxed pt-1.5">Mampu untuk teliti, rinci, dan kritis dalam pelaksanaan audit</p>
            </li>
            <li class="flex gap-4">
              <span class="w-9 h-9 shrink-0 rounded-full bg-blue-600 text-white flex items-center justify-center mt-0.5">
                <i class="fa-solid fa-check text-[14px]"></i>
              </span>
              <p class="text-slate-700 leading-relaxed pt-1.5">Mampu bekerja sama dan berkomunikasi yang baik dalam tim</p>
            </li>
            <li class="flex gap-4">
              <span class="w-9 h-9 shrink-0 rounded-full bg-blue-600 text-white flex items-center justify-center mt-0.5">
                <i class="fa-solid fa-check text-[14px]"></i>
              </span>
              <p class="text-slate-700 leading-relaxed pt-1.5">Mampu untuk belajar dan bersedia bekerja dengan deadline ketat</p>
            </li>
            <li class="flex gap-4">
              <span class="w-9 h-9 shrink-0 rounded-full bg-blue-600 text-white flex items-center justify-center mt-0.5">
                <i class="fa-solid fa-check text-[14px]"></i>
              </span>
              <p class="text-slate-700 leading-relaxed pt-1.5">Membantu senior auditor melakukan proses audit</p>
            </li>
            <li class="flex gap-4">
              <span class="w-9 h-9 shrink-0 rounded-full bg-blue-600 text-white flex items-center justify-center mt-0.5">
                <i class="fa-solid fa-check text-[14px]"></i>
              </span>
              <p class="text-slate-700 leading-relaxed pt-1.5">Membuat kertas kerja pemeriksaan sebagai dokumentasi pekerjaan audit</p>
            </li>
          </ul>
        </div>

        <!-- Sidebar -->
        <aside class="space-y-6 order-first lg:order-none">
          <div class="reveal bg-white rounded-3xl border border-slate-100 p-8 shadow-sm">
            <span class="w-14 h-14 rounded-2xl bg-blue-100 flex items-center justify-center">
              <i class="fa-solid fa-location-dot text-[28px] text-blue-600"></i>
            </span>
            <h3 class="mt-5 font-heading text-xl font-bold text-slate-900">Area Penempatan</h3>
            <p class="mt-3 text-slate-600 leading-relaxed">Lowongan ini ditempatkan di:</p>
            <p class="mt-2 font-semibold text-slate-900">Jakarta (Pusat)</p>
          </div>

          <div class="reveal bg-brand-950 rounded-3xl p-8 text-white shadow-lg shadow-blue-900/20">
            <span class="w-14 h-14 rounded-2xl bg-blue-500/20 flex items-center justify-center">
              <i class="fa-solid fa-paper-plane text-[28px] text-blue-300"></i>
            </span>
            <h3 class="mt-5 font-heading text-xl font-bold">Tertarik Melamar?</h3>
            <p class="mt-3 text-sm text-slate-300 leading-relaxed">Kirim CV dan surat lamaran Anda melalui email berikut:</p>
            <a href="mailto:info@mci.co.id" class="mt-4 inline-flex items-center gap-2 text-blue-300 hover:text-blue-200 transition font-semibold">
              info@mci.co.id
              <i class="fa-solid fa-arrow-right text-[14px]"></i>
            </a>
            <a href="{{ route('contact') }}" class="mt-6 inline-flex w-full items-center justify-center gap-2 rounded-full bg-blue-500 hover:bg-blue-400 text-white text-sm font-semibold px-6 py-3 transition shadow-lg shadow-blue-500/25">
              Hubungi Kami
              <i class="fa-solid fa-phone text-[14px]"></i>
            </a>
          </div>
        </aside>

      </div>
    </div>
  </section>

@endsection
