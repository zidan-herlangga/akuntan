@extends('layouts.frontend')

@section('title')
Drs. Chaeroni & Rekan - Kantor Akuntan Publik
@endsection

@section('meta_description')
Drs. Chaeroni & Rekan - Kantor Akuntan Publik terdaftar di Kementerian Keuangan RI. Jasa audit & asurans, perpajakan, dan konsultasi bisnis. Reservasi konsultasi online mudah.
@endsection

@section('active')
home
@endsection

@section('content')

  @php
    $serviceIcons = [
      'audit' => '<i class="fa-solid fa-calendar-days text-blue-600 text-[28px]"></i>',
      'tax' => '<i class="fa-solid fa-file-invoice-dollar text-blue-600 text-[28px]"></i>',
      'consulting' => '<i class="fa-solid fa-handshake text-blue-600 text-[28px]"></i>',
    ];
    $caseGradients = [
      'bg-brand-900',
      'bg-blue-800',
      'bg-slate-800',
    ];
  @endphp

  <!-- ======= HERO ======= -->
  <section class="relative bg-brand-950 overflow-hidden">
    {{-- Background image + overlay gelap agar teks tetap kontras --}}
    <div class="absolute inset-0 z-0">
      <img src="{{ asset('assets/skyscraper-office-building-lamp-post-3196390.webp') }}" alt="Gedung kantor  Drs. Chaeroni & Rekan" class="w-full h-full object-cover opacity-78" loading="lazy" />
      <div class="absolute inset-0 bg-brand-950/90"></div>
      <div class="absolute inset-0 bg-brand-950/40"></div>
    </div>

    {{-- Blob dekoratif di atas overlay --}}
    <div class="blob z-[1] w-[480px] h-[480px] bg-blue-500/20 -top-40 -right-24"></div>
    <div class="blob z-[1] w-[420px] h-[420px] bg-blue-500/15 top-64 -left-40"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-36 pb-24 lg:pt-44 lg:pb-32">
      <div class="grid lg:grid-cols-2 gap-14 items-center">
        <div class="reveal">
          <div class="inline-flex items-center gap-2 rounded-full bg-white/5 border border-white/10 px-4 py-1.5 text-xs font-medium text-blue-300 mb-6">
            <span class="w-2 h-2 rounded-full bg-blue-400 animate-pulse"></span>
             Terdaftar di Kementerian Keuangan RI
          </div>
          <h1 class="font-heading text-4xl sm:text-5xl lg:text-[3.4rem] font-extrabold leading-[1.15] text-white">
            Kantor Akuntan Publik <br><span class="text-gradient">
              Drs. Chaeroni & Rekan</span>
          </h1>
          <p class="mt-6 text-slate-300 text-lg leading-relaxed max-w-xl">
            Kami membantu Anda mencapai tujuan bisnis melalui audit, perpajakan, dan konsultasi yang akurat dan dapat diandalkan.
          </p>
          <div class="mt-9 flex flex-col sm:flex-row gap-4">
            <a href="{{ route('booking') }}" class="btn-primary">
              Reservasi Konsultasi Gratis
              <i class="fa-solid fa-arrow-right text-[16px]"></i>
            </a>
            <a href="{{ route('about') }}" class="btn-outline">Tentang Kami</a>
          </div>
          <div class="mt-10 flex items-center gap-4 text-sm text-slate-300">
            <div class="flex -space-x-3">
              <span class="w-10 h-10 rounded-full bg-blue-500 flex items-center justify-center text-xs font-bold text-white ring-2 ring-brand-950">AP</span>
              <span class="w-10 h-10 rounded-full bg-blue-600 flex items-center justify-center text-xs font-bold text-white ring-2 ring-brand-950">SR</span>
              <span class="w-10 h-10 rounded-full bg-blue-600 flex items-center justify-center text-xs font-bold text-white ring-2 ring-brand-950">BS</span>
              <span class="w-10 h-10 rounded-full bg-blue-600 flex items-center justify-center text-xs font-bold text-white ring-2 ring-brand-950">+</span>
            </div>
            <div>
              <div class="flex items-center gap-1 text-amber-400">
                <i class="fa-solid fa-star text-[16px]"></i>
                <i class="fa-solid fa-star text-[16px]"></i>
                <i class="fa-solid fa-star text-[16px]"></i>
                <i class="fa-solid fa-star text-[16px]"></i>
                <i class="fa-solid fa-star text-[16px]"></i>
              </div>
              <p class="mt-1"><strong class="text-white">4.9/5</strong> rating dari 98% klien puas</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Stats -->
      <div class="mt-20 grid grid-cols-2 lg:grid-cols-4 gap-6 reveal">
        @foreach ($stats as $stat)
          <div class="rounded-2xl bg-white/5 border border-white/10 p-6 text-center backdrop-blur-sm">
            <p class="font-heading text-3xl font-bold text-white"><span data-counter="{{ $stat['value'] }}" data-suffix="{{ $stat['suffix'] }}">0</span></p>
            <p class="mt-1 text-sm text-slate-400">{{ $stat['label'] }}</p>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- ======= TRUSTED LOGOS ======= -->
  <section class="border-b border-slate-200 bg-slate-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 sm:py-20">
      <div class="grid lg:grid-cols-12 gap-12 items-center">
        <div class="lg:col-span-5 reveal">
          <p class="text-xs font-semibold tracking-widest text-slate-400 uppercase">Rekanan & Lembaga Resmi</p>
          <h2 class="mt-3 font-heading text-2xl sm:text-3xl font-extrabold text-slate-900 leading-tight">Dipercaya Bekerja dengan Bank dan Lembaga Negara</h2>
          <p class="mt-4 text-sm text-slate-500 leading-relaxed">Terdaftar sebagai kantor akuntan publik di Kementerian Keuangan RI dan menjadi mitra kerja sejumlah bank serta lembaga pembiayaan nasional.</p>
        </div>
        <div class="lg:col-span-7 reveal">
          <div class="grid grid-cols-2 gap-4 sm:gap-6">
            <div class="space-y-4 sm:space-y-6">
              <div class="rounded-2xl border border-slate-200 bg-slate-50 flex items-center justify-center px-4 py-8">
                <img src="{{ asset('assets/logo/bi-b.webp') }}" height="50px" alt="Logo Bank Indonesia" class="max-h-9 sm:max-h-10 max-w-[150px] w-auto object-contain" loading="lazy" />
              </div>
              <div class="rounded-2xl border border-slate-200 bg-slate-50 flex items-center justify-center px-4 py-6">
                <img src="{{ asset('assets/logo/logo-bsi.webp') }}" alt="Logo BSI" class="max-h-8 sm:max-h-9 max-w-[130px] w-auto object-contain" loading="lazy" />
              </div>
              <div class="rounded-2xl border border-slate-200 bg-slate-50 flex items-center justify-center px-4 py-6">
                <img src="{{ asset('assets/logo/logo-mandiri.webp') }}" alt="Logo Bank Mandiri" class="max-h-8 sm:max-h-9 max-w-[130px] w-auto object-contain" loading="lazy" />
              </div>
              <div class="rounded-2xl border border-slate-200 bg-slate-50 flex items-center justify-center px-4 py-6">
                <img src="{{ asset('assets/logo/logo-eximbank.webp') }}" alt="Logo Bank Eximbank" class="max-h-8 sm:max-h-9 max-w-[130px] w-auto object-contain" loading="lazy" />
              </div>
            </div>
            <div class="space-y-4 sm:space-y-6 mt-8 sm:mt-12">
              <div class="rounded-2xl border border-slate-200 bg-slate-50 flex items-center justify-center px-4 py-6">
                <img src="{{ asset('assets/logo/logo-bri.webp') }}" alt="Logo BRI" class="max-h-8 sm:max-h-9 max-w-[130px] w-auto object-contain" loading="lazy" />
              </div>
              <div class="rounded-2xl border border-slate-200 bg-slate-50 flex items-center justify-center px-4 py-8">
                <img src="{{ asset('assets/logo/logo-ojk.webp') }}" alt="Logo OJK" class="max-h-10 sm:max-h-12 max-w-[150px] w-auto object-contain" loading="lazy" />
              </div>
              <div class="rounded-2xl border border-slate-200 bg-slate-50 flex items-center justify-center px-4 py-6">
                <img src="{{ asset('assets/logo/logo-bpk.webp') }}" alt="Logo BPK" class="max-h-8 sm:max-h-9 max-w-[130px] w-auto object-contain" loading="lazy" />
              </div>
              <div class="rounded-2xl border border-slate-200 bg-slate-50 flex items-center justify-center px-4 py-6">
                <img src="{{ asset('assets/logo/logo-kemenkeu.webp') }}" alt="Logo Kementerian Keuangan RI" class="max-h-8 sm:max-h-9 max-w-[130px] w-auto object-contain" loading="lazy" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ======= SERVICES ======= -->
  <section class="py-24 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="max-w-2xl reveal">
        <p class="text-sm font-semibold text-blue-600 uppercase tracking-wider">Layanan Kami</p>
        <h2 class="mt-3 font-heading text-3xl sm:text-4xl font-extrabold text-slate-900 leading-tight">Jasa Profesional Audit, Perpajakan, dan Konsultasi Bisnis</h2>
        <p class="mt-4 text-slate-600">Kami menyediakan jasa profesional di bidang audit &amp; asurans, perpajakan, dan konsultasi bisnis - dikerjakan tim berpengalaman dan disesuaikan dengan kebutuhan perusahaan Anda.</p>
      </div>

      <div class="mt-14 grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse ($services as $service)
          <div class="reveal group bg-white rounded-2xl border border-slate-100 card-hover p-8">
            <div class="flex items-start justify-between sm:block">
              <span class="w-14 h-14 rounded-2xl bg-blue-100 inline-flex items-center justify-center shrink-0 order-2 sm:order-1">
                {!! $serviceIcons[$service->icon] ?? $serviceIcons['consulting'] !!}
              </span>
              <h3 class="font-heading text-xl font-bold text-slate-900 order-1 sm:order-2 sm:mt-6">{{ $service->title }}</h3>
            </div>
            <p class="mt-3 text-slate-600 text-sm leading-relaxed">{{ $service->summary }}</p>
            <a href="{{ route('services') }}" class="mt-5 inline-flex items-center gap-1.5 text-sm font-semibold text-blue-600 hover:text-blue-500">
              Selengkapnya
              <i class="fa-solid fa-arrow-right text-[16px]"></i>
            </a>
          </div>
        @empty
          <div class="col-span-full text-center py-12">
            <p class="text-sm text-slate-500">Tidak ada layanan yang tersedia saat ini.</p>
          </div>
        @endforelse
      </div>
    </div>
  </section>

  <!-- ======= WHY US ======= -->
  <section class="py-24 bg-slate-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid lg:grid-cols-2 gap-16 items-center">
        <div class="reveal relative order-2 lg:order-1">
          <div class="rounded-3xl bg-brand-950 p-2 overflow-hidden">
            <div class="rounded-2xl p-10">
              <p class="text-sm text-slate-400">Nilai Kami (MCI)</p>
              <ul class="mt-8 space-y-6">
                <li class="flex gap-4">
                  <span class="w-10 h-10 shrink-0 rounded-xl bg-blue-500/15 border border-blue-500/30 flex items-center justify-center">
                    <i class="fa-solid fa-wand-magic-sparkles text-blue-400 text-[20px]"></i>
                  </span>
                  <div>
                    <p class="font-semibold text-white">Meaningful</p>
                    <p class="mt-1 text-sm text-slate-400">Setiap pekerjaan dihadirkan dengan hasil yang baik, berkualitas, efektif, efisien, dan sesuai kebutuhan Anda.</p>
                  </div>
                </li>
                <li class="flex gap-4">
                  <span class="w-10 h-10 shrink-0 rounded-xl bg-blue-500/15 border border-blue-500/30 flex items-center justify-center">
                    <i class="fa-solid fa-user text-blue-400 text-[20px]"></i>
                  </span>
                  <div>
                    <p class="font-semibold text-white">Competent</p>
                    <p class="mt-1 text-sm text-slate-400">Personel kami berpikiran terbuka dan terus mengembangkan keahlian demi hasil yang bermakna.</p>
                  </div>
                </li>
                <li class="flex gap-4">
                  <span class="w-10 h-10 shrink-0 rounded-xl bg-blue-500/15 border border-blue-500/30 flex items-center justify-center">
                    <i class="fa-solid fa-shield-halved text-blue-400 text-[20px]"></i>
                  </span>
                  <div>
                    <p class="font-semibold text-white">Integrity</p>
                    <p class="mt-1 text-sm text-slate-400">Kami memegang teguh nilai, keyakinan, dan prinsip - jujur, independen, dan berkarakter.</p>
                  </div>
                </li>
              </ul>
            </div>
          </div>
          <div class="absolute -top-5 -right-3 sm:-right-6 bg-blue-500 text-white rounded-2xl px-5 py-3 shadow-xl shadow-blue-500/30 rotate-3">
            <p class="font-heading text-lg font-bold">100%</p>
            <p class="text-xs text-blue-100">Komitmen Akurasi</p>
          </div>
        </div>

        <div class="reveal order-1 lg:order-2">
          <p class="text-sm font-semibold text-blue-600 uppercase tracking-wider">Nilai Kami (MCI)</p>
          <h2 class="mt-3 font-heading text-3xl sm:text-4xl font-extrabold text-slate-900 leading-tight">Kami Berkomitmen Mengerjakan Setiap Pekerjaan - dengan Cara yang Benar</h2>
          <p class="mt-5 text-slate-600 leading-relaxed">Sebagai Kantor Akuntan Publik terdaftar, kami membantu klien mencapai tujuan bisnis melalui keahlian, kejujuran, dan si mental yang independen.</p>
          <div class="mt-8 grid sm:grid-cols-2 gap-6">
            <div class="rounded-2xl bg-slate-50 border border-slate-100 p-6">
              <p class="font-heading text-3xl font-bold text-blue-600">{{ $stats[0]['value'] }}<span class="text-xl">{{ $stats[0]['suffix'] }}</span></p>
              <p class="mt-1 text-sm text-slate-600">tenaga profesional tetap di bidang audit, pajak, dan konsultasi</p>
            </div>
            <div class="rounded-2xl bg-slate-50 border border-slate-100 p-6">
              <p class="font-heading text-3xl font-bold text-blue-600">{{ $stats[2]['value'] }}</p>
              <p class="mt-1 text-sm text-slate-600">layanan utama: audit, perpajakan, dan konsultasi bisnis</p>
            </div>
          </div>
          <a href="{{ route('about') }}" class="mt-8 inline-flex items-center gap-2 text-sm font-semibold text-blue-600 hover:text-blue-500">
            Pelajari tentang kami
            <i class="fa-solid fa-arrow-right text-[16px]"></i>
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- ======= HOW IT WORKS ======= -->
  <section class="py-24 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="max-w-2xl mx-auto text-center reveal">
        <p class="text-sm font-semibold text-blue-600 uppercase tracking-wider">Cara Kerja</p>
        <h2 class="mt-3 font-heading text-3xl sm:text-4xl font-extrabold text-slate-900">Mulai Konsultasi dalam 4 Langkah Mudah</h2>
      </div>

      <div class="mt-14 grid md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="reveal relative bg-white rounded-2xl border border-slate-100 p-8 card-hover">
          <div class="flex items-center justify-between md:block">
            <span class="font-heading text-5xl font-extrabold text-slate-100">01</span>
            <span class="w-12 h-12 rounded-2xl bg-blue-100 flex items-center justify-center md:mt-4">
              <i class="fa-solid fa-clipboard-list text-blue-600 text-[24px]"></i>
            </span>
          </div>
          <h3 class="mt-5 font-heading text-lg font-bold text-slate-900">Pilih Layanan</h3>
          <p class="mt-2 text-sm text-slate-600 leading-relaxed">Tentukan layanan yang Anda butuhkan melalui form reservasi online.</p>
        </div>
        <div class="reveal relative bg-white rounded-2xl border border-slate-100 p-8 card-hover">
          <div class="flex items-center justify-between md:block">
            <span class="font-heading text-5xl font-extrabold text-slate-100">02</span>
            <span class="w-12 h-12 rounded-2xl bg-blue-100 flex items-center justify-center md:mt-4">
              <i class="fa-solid fa-calendar-days text-blue-600 text-[24px]"></i>
            </span>
          </div>
          <h3 class="mt-5 font-heading text-lg font-bold text-slate-900">Atur Jadwal</h3>
          <p class="mt-2 text-sm text-slate-600 leading-relaxed">Pilih konsultan dan slot waktu yang sesuai - konfirmasi dalam hitungan jam.</p>
        </div>
        <div class="reveal relative bg-white rounded-2xl border border-slate-100 p-8 card-hover">
          <div class="flex items-center justify-between md:block">
            <span class="font-heading text-5xl font-extrabold text-slate-100">03</span>
            <span class="w-12 h-12 rounded-2xl bg-blue-100 flex items-center justify-center md:mt-4">
              <i class="fa-solid fa-comments text-blue-600 text-[24px]"></i>
            </span>
          </div>
          <h3 class="mt-5 font-heading text-lg font-bold text-slate-900">Diskusi & Analisis</h3>
          <p class="mt-2 text-sm text-slate-600 leading-relaxed">Konsultasi tatap muka atau online via Google Meet untuk memahami kebutuhan Anda.</p>
        </div>
        <div class="reveal relative bg-white rounded-2xl border border-slate-100 p-8 card-hover">
          <div class="flex items-center justify-between md:block">
            <span class="font-heading text-5xl font-extrabold text-slate-100">04</span>
            <span class="w-12 h-12 rounded-2xl bg-blue-100 flex items-center justify-center md:mt-4">
              <i class="fa-solid fa-pen text-blue-600 text-[24px]"></i>
            </span>
          </div>
          <h3 class="mt-5 font-heading text-lg font-bold text-slate-900">Terima Solusi</h3>
          <p class="mt-2 text-sm text-slate-600 leading-relaxed">Dapatkan rekomendasi, proposal, dan laporan yang siap dipakai.</p>
        </div>
      </div>

      <div class="mt-12 text-center reveal">
        <a href="{{ route('booking') }}" class="btn-primary">
          Reservasi Sekarang
          <i class="fa-solid fa-arrow-right text-[16px]"></i>
        </a>
      </div>
    </div>
  </section>

  <!-- ======= CASE STUDIES PREVIEW ======= -->
  <section class="py-24 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-6 reveal">
        <div class="max-w-xl">
          <p class="text-sm font-semibold text-blue-600 uppercase tracking-wider">Portofolio</p>
          <h2 class="mt-3 font-heading text-3xl sm:text-4xl font-extrabold text-slate-900">Hasil Nyata yang Kami Berikan</h2>
        </div>
        <a href="{{ route('case-studies') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-blue-600 hover:text-blue-500 shrink-0">
          Lihat semua studi kasus
          <i class="fa-solid fa-arrow-right text-[16px]"></i>
        </a>
      </div>

      <div class="mt-12 grid md:grid-cols-3 gap-6">
        @forelse ($caseStudies as $index => $caseStudy)
          @php $metrics = is_array($caseStudy->metrics) ? array_slice($caseStudy->metrics, 0, 2, true) : []; @endphp
          <div class="reveal group rounded-3xl {{ $caseGradients[$index % 3] }} p-8 card-hover relative overflow-hidden">
            <div class="blob w-40 h-40 bg-blue-500/20 -top-10 -right-10"></div>
            <p class="text-xs font-semibold text-blue-400 uppercase tracking-wider">{{ $caseStudy->industry }}</p>
            <h3 class="mt-4 font-heading text-xl font-bold text-white">{{ $caseStudy->client_name }}</h3>
            <p class="mt-3 text-sm text-slate-400 leading-relaxed">{{ $caseStudy->challenge }}</p>
            <div class="mt-6 grid grid-cols-2 gap-4">
              @foreach ($metrics as $label => $value)
                <div class="rounded-xl bg-white/5 border border-white/10 p-4">
                  <p class="font-heading text-2xl font-bold text-blue-400">{{ $value }}</p>
                  <p class="text-xs text-slate-400 mt-1">{{ $label }}</p>
                </div>
              @endforeach
            </div>
          </div>
        @empty
          <div class="col-span-full text-center py-12">
            <p class="text-sm text-slate-500">Tidak ada studi kasus yang tersedia saat ini.</p>
          </div>
        @endforelse
      </div>
    </div>
  </section>

  <!-- ======= TESTIMONIALS ======= -->
  <section class="py-24 bg-brand-950 relative overflow-hidden">
    <div class="blob w-[500px] h-[500px] bg-blue-500/15 -bottom-48 -left-24"></div>
    <div class="relative max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center reveal">
        <p class="text-sm font-semibold text-blue-400 uppercase tracking-wider">Testimoni</p>
        <h2 class="mt-3 font-heading text-3xl sm:text-4xl font-extrabold text-white">Apa Kata Klien Kami</h2>
      </div>

      <div class="mt-14 relative reveal">
        <div class="overflow-hidden">
          <div class="testimonial-track" data-testimonial-track>
            <div class="testimonial-slide px-2">
              <figure class="bg-white/5 border border-white/10 rounded-3xl p-8 sm:p-10 text-center">
                <div class="flex items-center justify-center gap-1 text-amber-400">
                  <i class="fa-solid fa-star text-[20px]"></i>
                  <i class="fa-solid fa-star text-[20px]"></i>
                  <i class="fa-solid fa-star text-[20px]"></i>
                  <i class="fa-solid fa-star text-[20px]"></i>
                  <i class="fa-solid fa-star text-[20px]"></i>
                </div>
                <blockquote class="mt-6 text-lg sm:text-xl text-slate-200 leading-relaxed max-w-2xl mx-auto">
                  "Sejak dibantu  Drs. Chaeroni &amp; Rekan, laporan keuangan kami selalu selesai tepat waktu dan kami berhasil menghemat pajak secara legal hingga 30%. Sangat merekomendasikan!"
                </blockquote>
                <figcaption class="mt-8 flex items-center justify-center gap-4">
                  <span class="w-12 h-12 rounded-full bg-blue-500 flex items-center justify-center text-sm font-bold text-white">HN</span>
                  <div class="text-left">
                    <p class="font-semibold text-white">Hendra Nugroho</p>
                    <p class="text-sm text-slate-400">Direktur PT Nusa Tex</p>
                  </div>
                </figcaption>
              </figure>
            </div>

            <div class="testimonial-slide px-2">
              <figure class="bg-white/5 border border-white/10 rounded-3xl p-8 sm:p-10 text-center">
                <div class="flex items-center justify-center gap-1 text-amber-400">
                  <i class="fa-solid fa-star text-[20px]"></i>
                  <i class="fa-solid fa-star text-[20px]"></i>
                  <i class="fa-solid fa-star text-[20px]"></i>
                  <i class="fa-solid fa-star text-[20px]"></i>
                  <i class="fa-solid fa-star text-[20px]"></i>
                </div>
                <blockquote class="mt-6 text-lg sm:text-xl text-slate-200 leading-relaxed max-w-2xl mx-auto">
                  "Proses audit tahunan yang dulu memakan berminggu-minggu kini tuntas dalam seminggu. Tim  sangat sistematis dan komunikatif."
                </blockquote>
                <figcaption class="mt-8 flex items-center justify-center gap-4">
                  <span class="w-12 h-12 rounded-full bg-blue-600 flex items-center justify-center text-sm font-bold text-white">LW</span>
                  <div class="text-left">
                    <p class="font-semibold text-white">Lia Wulandari</p>
                    <p class="text-sm text-slate-400">CFO Garda Bakti Retail</p>
                  </div>
                </figcaption>
              </figure>
            </div>

            <div class="testimonial-slide px-2">
              <figure class="bg-white/5 border border-white/10 rounded-3xl p-8 sm:p-10 text-center">
                <div class="flex items-center justify-center gap-1 text-amber-400">
                  <i class="fa-solid fa-star text-[20px]"></i>
                  <i class="fa-solid fa-star text-[20px]"></i>
                  <i class="fa-solid fa-star text-[20px]"></i>
                  <i class="fa-solid fa-star text-[20px]"></i>
                  <i class="fa-solid fa-star text-[20px]"></i>
                </div>
                <blockquote class="mt-6 text-lg sm:text-xl text-slate-200 leading-relaxed max-w-2xl mx-auto">
                  "Sebagai startup, kami butuh kepastian pajak sebelum fundraising.  membuat kami 100% compliance dan investor pun percaya. Terima kasih!"
                </blockquote>
                <figcaption class="mt-8 flex items-center justify-center gap-4">
                  <span class="w-12 h-12 rounded-full bg-blue-600 flex items-center justify-center text-sm font-bold text-white">RP</span>
                  <div class="text-left">
                    <p class="font-semibold text-white">Raka Pradana</p>
                    <p class="text-sm text-slate-400">Co-founder Segara Teknologi</p>
                  </div>
                </figcaption>
              </figure>
            </div>
          </div>
        </div>

        <div class="mt-8 flex items-center justify-center gap-6">
          <button data-testimonial-prev class="w-11 h-11 rounded-full border border-white/20 flex items-center justify-center text-white hover:bg-white/10 transition" aria-label="Sebelumnya">
            <i class="fa-solid fa-arrow-left text-[20px]"></i>
          </button>
          <div class="flex items-center gap-2" data-testimonial-dots></div>
          <button data-testimonial-next class="w-11 h-11 rounded-full border border-white/20 flex items-center justify-center text-white hover:bg-white/10 transition" aria-label="Berikutnya">
            <i class="fa-solid fa-arrow-right text-[20px]"></i>
          </button>
        </div>

        <div class="mt-14 grid gap-4 sm:grid-cols-3">
          <figure class="rounded-2xl border border-white/10 bg-white/5 p-6">
            <p class="font-heading text-4xl font-extrabold text-blue-400/70">"</p>
            <p class="mt-2 text-sm text-slate-300 leading-relaxed">Responsnya cepat, laporannya rapi, dan yang penting semua sesuai regulasi.</p>
            <figcaption class="mt-4 text-xs text-slate-400">Owner, Trading Surabaya</figcaption>
          </figure>
          <figure class="rounded-2xl border border-white/10 bg-white/5 p-6 sm:mt-8">
            <p class="font-heading text-4xl font-extrabold text-blue-400/70">"</p>
            <p class="mt-2 text-sm text-slate-300 leading-relaxed">Pendampingan pemeriksaan pajaknya membuat tim kami tenang bekerja.</p>
            <figcaption class="mt-4 text-xs text-slate-400">Finance Manager, Manufaktur</figcaption>
          </figure>
          <figure class="rounded-2xl border border-white/10 bg-white/5 p-6">
            <p class="font-heading text-4xl font-extrabold text-blue-400/70">"</p>
            <p class="mt-2 text-sm text-slate-300 leading-relaxed">Konsultasinya praktis, langsung bisa dieksekusi tanpa istilah rumit.</p>
            <figcaption class="mt-4 text-xs text-slate-400">Direktur, Jasa</figcaption>
          </figure>
        </div>
      </div>
    </div>
  </section>

  <!-- ======= TEAM PREVIEW ======= -->
  <section class="py-24 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-6 reveal">
        <div class="max-w-xl">
          <p class="text-sm font-semibold text-blue-600 uppercase tracking-wider">Tim Kami</p>
          <h2 class="mt-3 font-heading text-3xl sm:text-4xl font-extrabold text-slate-900">Konsultan Berpengalaman & Bersertifikasi</h2>
        </div>
        <a href="{{ route('about') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-blue-600 hover:text-blue-500 shrink-0">
          Kenali seluruh tim
          <i class="fa-solid fa-arrow-right text-[16px]"></i>
        </a>
      </div>

      <div class="mt-12 grid grid-cols-2 lg:grid-cols-4 gap-6">
        @forelse ($teamMembers as $member)
          @php $initials = collect(str_word_count($member->name, 1))->take(2)->map(fn ($w) => strtoupper(mb_substr($w, 0, 1)))->join(''); @endphp
          <div class="reveal group bg-white rounded-2xl border border-slate-100 p-6 text-center card-hover">
            <span class="mx-auto w-24 h-24 rounded-2xl bg-blue-700 flex items-center justify-center font-heading text-3xl font-bold text-white">{{ $initials }}</span>
            <h3 class="mt-5 font-heading font-bold text-slate-900">{{ $member->name }}</h3>
            <p class="text-sm text-slate-500 mt-1">{{ $member->position }}</p>
            <div class="mt-4 flex items-center justify-center gap-1 text-amber-400">
              <i class="fa-solid fa-star text-[16px]"></i>
              <span class="text-xs text-slate-500">{{ $member->certifications[0] ?? 'Bersertifikasi' }}</span>
            </div>
          </div>
        @empty
          <div class="col-span-4 text-center py-12">
            <p class="text-sm text-slate-500">Tidak ada anggota tim yang tersedia saat ini.</p>
          </div>          
        @endforelse
      </div>
    </div>
  </section>

  <!-- ======= CTA ======= -->
  <section class="relative bg-blue-800 overflow-hidden">
    <div class="blob w-96 h-96 bg-white/10 -top-24 -right-24"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 text-center reveal">
      <h2 class="font-heading text-3xl sm:text-4xl font-extrabold text-white leading-tight max-w-3xl mx-auto">Siap Membuat Keuangan Bisnis Anda Lebih Rapi dan Terpercaya?</h2> 
      <div class="mt-8 flex flex-col sm:flex-row justify-center gap-4">
        <a href="{{ route('contact') }}" class="inline-flex items-center justify-center gap-2 rounded-full border border-white/40 text-white font-semibold px-8 py-4 transition hover:bg-white/10">
          Hubungi Kami
        </a>
      </div>
    </div>
  </section>
@endsection
