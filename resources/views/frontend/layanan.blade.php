@extends('layouts.frontend')

@section('title')
Layanan — Drs. Chaeroni & Rekan
@endsection

@section('meta_description')
Jasa audit & asurans, perpajakan, dan konsultasi bisnis dari Drs. Chaeroni & Rekan — Kantor Akuntan Publik terdaftar di Kementerian Keuangan RI.
@endsection

@section('active')
layanan
@endsection

@section('content')

  <!-- ======= PAGE BANNER ======= -->
  <section class="relative bg-brand-950 overflow-hidden">
    <div class="blob w-[420px] h-[420px] bg-blue-500/20 -top-32 -right-20"></div>
    <div class="blob w-[320px] h-[320px] bg-blue-500/10 bottom-0 -left-24"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-36 pb-20 lg:pt-44 lg:pb-24">
      <nav class="flex items-center gap-2 text-xs text-slate-400 mb-6">
        <a href="/" class="hover:text-blue-400 transition">Beranda</a>
        <i class="fa-solid fa-chevron-right text-[12px]"></i>
        <span class="text-slate-200">Layanan</span>
      </nav>
      <div class="max-w-3xl reveal">
        <p class="text-sm font-semibold text-blue-400 uppercase tracking-wider">Layanan Kami</p>
        <h1 class="mt-3 font-heading text-4xl sm:text-5xl font-extrabold text-white leading-tight">Jasa Profesional di Bidang Audit, Perpajakan, dan Konsultasi Bisnis</h1>
        <p class="mt-5 text-slate-300 text-lg">Tiga pilar layanan utama Drs. Chaeroni &amp; Rekan — ditangani tim profesional yang berpengalaman dan independen.</p>
      </div>
    </div>
  </section>

  <!-- ======= SERVICES DETAIL ======= -->
  @php
    $serviceIcons = [
      'audit' => '<i class="fa-solid fa-file-circle-check text-[28px] text-blue-600"></i>',
      'tax' => '<i class="fa-solid fa-file-invoice-dollar text-[28px] text-blue-600"></i>',
      'consulting' => '<i class="fa-solid fa-chart-line text-[28px] text-blue-600"></i>',
    ];
    $serviceGradients = ['from-blue-700 to-slate-900', 'from-blue-600 to-slate-800', 'from-blue-800 to-slate-950'];
  @endphp

  <section class="py-24 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10">
      @forelse ($services as $index => $service)
        <div class="reveal bg-white rounded-3xl border border-slate-100 overflow-hidden grid lg:grid-cols-5">
          <div class="lg:col-span-3 p-8 sm:p-12">
            <span class="w-14 h-14 rounded-2xl bg-blue-100 flex items-center justify-center">
              {!! $serviceIcons[$service->icon] ?? $serviceIcons['consulting'] !!}
            </span>
            <h2 class="mt-6 font-heading text-2xl font-bold text-slate-900">{{ $service->title }}</h2>
            <div class="mt-4 text-slate-600 leading-relaxed
              [&_ul]:mt-6 [&_ul]:grid [&_ul]:sm:grid-cols-2 [&_ul]:gap-3 [&_ul]:text-sm [&_ul]:text-slate-600 [&_ul]:list-none [&_ul]:p-0
              [&_li]:flex [&_li]:items-center [&_li]:gap-2 [&_li]:before:content-['✓'] [&_li]:before:text-blue-500 [&_li]:before:font-bold">
              {!! $service->content !!}
            </div>
            {{-- <a href="{{ route('booking') }}" class="mt-8 inline-flex items-center gap-2 text-sm font-semibold text-blue-600 hover:text-blue-500">
              Reservasi layanan ini
              <i class="fa-solid fa-arrow-right text-[16px]"></i>
            </a> --}}
          </div>
          <div class="lg:col-span-2 bg-gradient-to-br {{ $serviceGradients[$index % count($serviceGradients)] }} p-8 sm:p-12 text-white flex flex-col justify-center">
            <p class="text-sm text-blue-100">Konsultasi dulu</p>
            <p class="mt-2 font-heading text-3xl font-bold">Harga Custom</p>
            <p class="mt-4 text-sm text-blue-50 leading-relaxed">Disusun berdasarkan skala bisnis, kompleksitas, dan kebutuhan Anda.</p>
            <a href="{{ route('contact') }}" class="mt-6 inline-flex justify-center items-center gap-2 rounded-full bg-white text-blue-700 font-semibold px-6 py-3 text-sm hover:bg-blue-50 transition">Minta Penawaran</a>
          </div>
        </div>
      @empty
        <div class="text-center py-12">
          <p class="text-sm text-slate-500">Tidak ada layanan yang tersedia saat ini.</p>
        </div>
      @endforelse
    </div>
  </section>

  <!-- ======= FAQ ======= -->
  <section class="py-24 bg-slate-50">
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
  <section class="relative bg-gradient-to-br from-blue-800 to-slate-900 overflow-hidden">
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
