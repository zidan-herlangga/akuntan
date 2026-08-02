@extends('layouts.frontend')

@section('title')
Layanan - Drs. Chaeroni & Rekan
@endsection

@section('meta_description')
Jasa audit & asurans, perpajakan, dan konsultasi bisnis dari Drs. Chaeroni & Rekan - Kantor Akuntan Publik terdaftar di Kementerian Keuangan RI.
@endsection

@section('active')
layanan
@endsection

@section('content')

  <!-- ======= PAGE BANNER ======= -->
  <section class="relative bg-brand-950 overflow-hidden">
    <div class="absolute inset-0 z-0">
      <img src="{{ asset('assets/hero/layanan.webp') }}" alt="Jasa layanan  Drs. Chaeroni & Rekan" class="w-full h-full object-cover opacity-40" loading="lazy" />
      <div class="absolute inset-0 bg-brand-950/90"></div>
    </div>
    <div class="blob w-[420px] h-[420px] bg-blue-500/20 -top-32 -right-20"></div>
    <div class="blob w-[320px] h-[320px] bg-blue-500/10 bottom-0 -left-24"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-36 pb-16 lg:pt-44 lg:pb-20">
      <nav class="flex items-center gap-2 text-xs text-slate-400 mb-6">
        <a href="{{ route('home') }}" class="hover:text-blue-400 transition">Beranda</a>
        <i class="fa-solid fa-chevron-right text-[12px]"></i>
        <span class="text-slate-200">Layanan</span>
      </nav>
      <div class="max-w-3xl reveal">
        <p class="text-sm font-semibold text-blue-400 uppercase tracking-wider">Layanan Kami</p>
        <h1 class="mt-3 font-heading text-4xl sm:text-5xl font-extrabold text-white leading-tight">Jasa Profesional di Bidang Audit, Perpajakan, dan Konsultasi Bisnis</h1>
        <p class="mt-5 text-slate-300 text-lg">Tiga pilar layanan utama Drs. Chaeroni &amp; Rekan - ditangani tim profesional yang berpengalaman dan independen.</p>
      </div>
    </div>
  </section>

  <!-- ======= SERVICES ======= -->
  @php
    $serviceIcons = [
      'audit' => '<i class="fa-solid fa-file-circle-check text-[28px] text-blue-600"></i>',
      'tax' => '<i class="fa-solid fa-file-invoice-dollar text-[28px] text-blue-600"></i>',
      'consulting' => '<i class="fa-solid fa-chart-line text-[28px] text-blue-600"></i>',
    ];
    $serviceGradients = ['bg-blue-700', 'bg-blue-600', 'bg-blue-800'];
  @endphp

  <section class="py-20 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid md:grid-cols-3 gap-6">
        @forelse ($services as $index => $service)
          <div class="reveal bg-white rounded-3xl border border-slate-100 overflow-hidden card-hover flex flex-col">
            <div class="h-1.5 {{ $serviceGradients[$index % count($serviceGradients)] }}"></div>
            <div class="p-8 flex flex-col grow">
              <span class="w-14 h-14 rounded-2xl bg-blue-100 flex items-center justify-center">
                {!! $serviceIcons[$service->icon] ?? $serviceIcons['consulting'] !!}
              </span>
              <h2 class="mt-5 font-heading text-xl font-bold text-slate-900">{{ $service->title }}</h2>
              <div class="mt-4 text-sm text-slate-600 leading-relaxed
                [&_p]:text-slate-500
                [&_ul]:mt-5 [&_ul]:space-y-2.5 [&_ul]:list-none [&_ul]:p-0
                [&_li]:flex [&_li]:items-start [&_li]:gap-2.5 [&_li]:text-slate-600
                [&_li]:before:content-['✓'] [&_li]:before:text-blue-500 [&_li]:before:font-bold [&_li]:before:mt-0.5">
                {!! $service->content !!}
              </div>
              <div class="mt-auto pt-6 border-t border-slate-100 flex items-center justify-between gap-3">
                <div>
                  <p class="text-xs text-slate-400">Konsultasi dulu</p>
                  <p class="font-heading text-base font-bold text-slate-900">Harga Custom</p>
                </div>
                <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 rounded-full bg-blue-600 text-white font-semibold px-5 py-2.5 text-sm hover:bg-blue-500 transition shrink-0">
                  Minta Penawaran
                  <i class="fa-solid fa-arrow-right text-[14px]"></i>
                </a>
              </div>
            </div>
          </div>
        @empty
          <div class="md:col-span-3 text-center py-12">
            <p class="text-sm text-slate-500">Tidak ada layanan yang tersedia saat ini.</p>
          </div>
        @endforelse
      </div>
    </div>
  </section>

  <!-- ======= FAQ ======= -->
  <section class="py-20 bg-slate-50">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center reveal">
        <p class="text-sm font-semibold text-blue-600 uppercase tracking-wider">FAQ</p>
        <h2 class="mt-3 font-heading text-3xl sm:text-4xl font-extrabold text-slate-900">Pertanyaan yang Sering Diajukan</h2>
      </div>

      <div class="mt-12 space-y-4 reveal">
        <details class="faq-item bg-white border border-slate-100 rounded-2xl p-6">
          <summary class="flex items-center justify-between gap-4">
            <span class="font-semibold text-slate-900">Apakah data keuangan kami aman?</span>
            <span class="faq-icon shrink-0 w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center">
              <i class="fa-solid fa-plus text-[16px] text-blue-600"></i>
            </span>
          </summary>
          <p class="mt-4 text-sm text-slate-600 leading-relaxed">Ya. Seluruh data finansial Anda disimpan terenkripsi, diakses dengan sistem otorisasi berjenjang, dan kami menandatangani perjanjian kerahasiaan (NDA) untuk setiap klien.</p>
        </details>

        <details class="faq-item bg-white border border-slate-100 rounded-2xl p-6">
          <summary class="flex items-center justify-between gap-4">
            <span class="font-semibold text-slate-900">Berapa lama laporan keuangan selesai?</span>
            <span class="faq-icon shrink-0 w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center">
              <i class="fa-solid fa-plus text-[16px] text-blue-600"></i>
            </span>
          </summary>
          <p class="mt-4 text-sm text-slate-600 leading-relaxed">Laporan bulanan kami selesaikan maksimal tanggal 5 bulan berikutnya. Untuk laporan tahunan dan audit, timeline disepakati di awal sesuai kompleksitas bisnis Anda.</p>
        </details>

        <details class="faq-item bg-white border border-slate-100 rounded-2xl p-6">
          <summary class="flex items-center justify-between gap-4">
            <span class="font-semibold text-slate-900">Apakah konsultasi awal benar-benar gratis?</span>
            <span class="faq-icon shrink-0 w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center">
              <i class="fa-solid fa-plus text-[16px] text-blue-600"></i>
            </span>
          </summary>
          <p class="mt-4 text-sm text-slate-600 leading-relaxed">Ya, 100% gratis tanpa komitmen. Anda bisa berkonsultasi 30 menit untuk menilai kebutuhan dan mengenal konsultan Anda sebelum memutuskan.</p>
        </details>

        <details class="faq-item bg-white border border-slate-100 rounded-2xl p-6">
          <summary class="flex items-center justify-between gap-4">
            <span class="font-semibold text-slate-900">Bagaimana cara kerja konsultasi online?</span>
            <span class="faq-icon shrink-0 w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center">
              <i class="fa-solid fa-plus text-[16px] text-blue-600"></i>
            </span>
          </summary>
          <p class="mt-4 text-sm text-slate-600 leading-relaxed">Anda memesan slot melalui form reservasi, lalu kami kirim tautan Google Meet dan konfirmasi via WhatsApp. Cukup siapkan pertanyaan atau dokumen yang ingin dibahas.</p>
        </details>

        <details class="faq-item bg-white border border-slate-100 rounded-2xl p-6">
          <summary class="flex items-center justify-between gap-4">
            <span class="font-semibold text-slate-900">Apakah melayani perusahaan luar kota / luar negeri?</span>
            <span class="faq-icon shrink-0 w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center">
              <i class="fa-solid fa-plus text-[16px] text-blue-600"></i>
            </span>
          </summary>
          <p class="mt-4 text-sm text-slate-600 leading-relaxed">Tentu. Lebih dari 40% klien kami berada di luar Jakarta dan dilayani penuh secara online tanpa mengurangi kualitas.</p>
        </details>
      </div>
    </div>
  </section>

  <!-- ======= CTA ======= -->
  <section class="relative bg-blue-800 overflow-hidden">
    <div class="blob w-96 h-96 bg-white/10 -top-24 -right-24"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 text-center reveal">
      <h2 class="font-heading text-3xl sm:text-4xl font-extrabold text-white leading-tight max-w-3xl mx-auto">Butuh Layanan yang Tidak Ada di Daftar?</h2>
      <p class="mt-4 text-blue-50 max-w-xl mx-auto">Ceritakan kebutuhan spesifik bisnis Anda, tim kami akan menyusun solusi yang tepat.</p>
      <div class="mt-8 flex flex-col sm:flex-row justify-center gap-4">
        <a href="{{ route('contact') }}" class="inline-flex items-center justify-center gap-2 rounded-full border border-white/40 text-white font-semibold px-8 py-4 transition hover:bg-white/10">
          Hubungi Kami
        </a>
      </div>
    </div>
  </section>
@endsection
