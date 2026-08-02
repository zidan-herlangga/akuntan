@extends('layouts.frontend')

@section('title')
Portofolio — Drs. Chaeroni & Rekan
@endsection

@section('meta_description')
Studi kasus & portofolio klien Drs. Chaeroni & Rekan di bidang audit & asurans, perpajakan, dan konsultasi bisnis beserta hasil yang dicapai.
@endsection

@section('active')
portofolio
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
        <span class="text-slate-200">Portofolio</span>
      </nav>
      <div class="max-w-3xl reveal">
        <p class="text-sm font-semibold text-blue-400 uppercase tracking-wider">Studi Kasus</p>
        <h1 class="mt-3 font-heading text-4xl sm:text-5xl font-extrabold text-white leading-tight">Hasil Nyata, Angka yang Bicara</h1>
        <p class="mt-5 text-slate-300 text-lg">Seleksi studi kasus dari klien kami. Seluruh nama telah disamarkan sesuai perjanjian kerahasiaan (NDA).</p>
      </div>
    </div>
  </section>

  <!-- ======= METRICS BAND ======= -->
  <section class="bg-slate-50 border-b border-slate-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14">
      <div class="grid grid-cols-2 lg:grid-cols-4 gap-8">
        <div class="text-center reveal">
          <p class="font-heading text-3xl sm:text-4xl font-extrabold text-blue-600"><span data-counter="48" data-prefix="Rp " data-suffix="M">0</span></p>
          <p class="mt-1 text-sm text-slate-500">rata-rata penghematan pajak/tahun</p>
        </div>
        <div class="text-center reveal">
          <p class="font-heading text-3xl sm:text-4xl font-extrabold text-blue-600"><span data-counter="250" data-suffix="+">0</span></p>
          <p class="mt-1 text-sm text-slate-500">studi kasus selesai</p>
        </div>
        <div class="text-center reveal">
          <p class="font-heading text-3xl sm:text-4xl font-extrabold text-blue-600"><span data-counter="98" data-suffix="%">0</span></p>
          <p class="mt-1 text-sm text-slate-500">klien memperbarui kontrak</p>
        </div>
        <div class="text-center reveal">
          <p class="font-heading text-3xl sm:text-4xl font-extrabold text-blue-600"><span data-counter="30" data-suffix="x">0</span></p>
          <p class="mt-1 text-sm text-slate-500">percepatan closing laporan</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ======= CASE STUDIES ======= -->
  <section class="py-24 bg-slate-50" id="case-studies">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex flex-wrap gap-3 reveal" id="case-filters" role="tablist">
        <button type="button" data-filter="all"
          class="case-filter rounded-full bg-brand-950 text-white text-sm font-semibold px-6 py-2.5 transition"
          aria-pressed="true">Semua <span class="opacity-70">({{ $caseStudies->count() }})</span></button>
        @forelse ($industries as $industry)
          <button type="button" data-filter="{{ $industry }}"
            class="case-filter rounded-full bg-white border border-slate-200 text-slate-600 text-sm font-semibold px-6 py-2.5 hover:border-blue-600 hover:text-blue-600 transition"
            aria-pressed="false">{{ $industry }}
            <span class="opacity-60">{{ $caseStudies->where('industry', $industry)->count() }}</span></button>
        @empty
          <button type="button" data-filter="Manufaktur"
            class="case-filter rounded-full bg-white border border-slate-200 text-slate-600 text-sm font-semibold px-6 py-2.5 hover:border-blue-600 hover:text-blue-600 transition">Manufaktur</button>
          <button type="button" data-filter="Ritel"
            class="case-filter rounded-full bg-white border border-slate-200 text-slate-600 text-sm font-semibold px-6 py-2.5 hover:border-blue-600 hover:text-blue-600 transition">Ritel</button>
          <button type="button" data-filter="Teknologi"
            class="case-filter rounded-full bg-white border border-slate-200 text-slate-600 text-sm font-semibold px-6 py-2.5 hover:border-blue-600 hover:text-blue-600 transition">Teknologi</button>
          <button type="button" data-filter="Ekspor-Impor"
            class="case-filter rounded-full bg-white border border-slate-200 text-slate-600 text-sm font-semibold px-6 py-2.5 hover:border-blue-600 hover:text-blue-600 transition">Ekspor-Impor</button>
          <button type="button" data-filter="Jasa"
            class="case-filter rounded-full bg-white border border-slate-200 text-slate-600 text-sm font-semibold px-6 py-2.5 hover:border-blue-600 hover:text-blue-600 transition">Jasa</button>
        @endforelse
      </div>

      @php
        $caseGradients = ['from-blue-800 to-slate-900', 'from-blue-700 to-slate-900', 'from-blue-600 to-slate-900', 'from-blue-900 to-slate-950', 'from-blue-800 to-slate-950', 'from-blue-700 to-slate-950'];
        $initials = fn (string $name): string => implode('', array_map(fn ($w) => mb_strtoupper(mb_substr($w, 0, 1)), preg_split('/[\s-]+/', trim($name))));
      @endphp

      <div class="mt-12 grid md:grid-cols-2 gap-8" id="case-grid">
        @forelse ($caseStudies as $index => $case)
          <article class="case-card reveal bg-white rounded-3xl border border-slate-100 overflow-hidden card-hover" data-industry="{{ $case->industry }}">
            <div class="h-44 relative overflow-hidden">
              @if ($case->getFirstMediaUrl('cover'))
                <img src="{{ $case->getFirstMediaUrl('cover') }}" alt="{{ $case->client_name }}" class="absolute inset-0 w-full h-full object-cover" loading="lazy" />
                <div class="absolute inset-0 bg-gradient-to-t from-slate-950/70 via-slate-950/20 to-transparent"></div>
              @else
                <div class="absolute inset-0 bg-gradient-to-br {{ $caseGradients[$index % count($caseGradients)] }}"></div>
                <span class="absolute inset-0 flex items-center justify-center font-heading text-white font-bold text-3xl tracking-widest">{{ $initials($case->client_name) }}</span>
              @endif
              @if ($case->industry)
                <span class="absolute top-4 left-4 bg-white/20 backdrop-blur text-white text-xs font-semibold px-3 py-1 rounded-full">{{ $case->industry }}</span>
              @endif
              @if ($case->is_featured)
                <span class="absolute top-4 right-4 bg-blue-600 text-white text-xs font-semibold px-3 py-1 rounded-full">Unggulan</span>
              @endif
            </div>
            <div class="p-8">
              <h3 class="font-heading text-xl font-bold text-slate-900">{{ $case->solution ?: $case->client_name }}</h3>
              <p class="mt-1 text-sm font-semibold text-blue-600">{{ $case->client_name }}</p>
              <p class="mt-3 text-sm text-slate-600 leading-relaxed">{{ $case->challenge }}</p>
              @if (is_array($case->metrics) && count($case->metrics))
                <div class="mt-6 grid grid-cols-3 gap-3">
                  @foreach ($case->metrics as $label => $value)
                    <div class="rounded-xl bg-slate-50 border border-slate-100 p-4">
                      <p class="font-heading text-lg font-bold text-blue-600">{{ $value }}</p>
                      <p class="text-xs text-slate-500 mt-1">{{ $label }}</p>
                    </div>
                  @endforeach
                </div>
              @endif
            </div>
          </article>
        @empty
          <article class="case-card reveal bg-white rounded-3xl border border-slate-100 overflow-hidden card-hover" data-industry="Manufaktur">
            <div class="h-44 bg-gradient-to-br from-blue-800 to-slate-900 relative flex items-center justify-center">
              <span class="font-heading text-white font-bold text-3xl tracking-widest">NT</span>
              <span class="absolute top-4 left-4 bg-white/20 backdrop-blur text-white text-xs font-semibold px-3 py-1 rounded-full">Manufaktur</span>
            </div>
            <div class="p-8">
              <h3 class="font-heading text-xl font-bold text-slate-900">Restrukturisasi Sistem Pembukuan & Implementasi ERP</h3>
              <p class="mt-1 text-sm font-semibold text-blue-600">Nusa Tex</p>
              <p class="mt-3 text-sm text-slate-600 leading-relaxed">Pembukuan manual menyulitkan rekonsiliasi dan closing memakan 2 minggu. Tim kami merancang ulang chart of accounts dan mengimplementasikan ERP keuangan.</p>
              <div class="mt-6 grid grid-cols-3 gap-3">
                <div class="rounded-xl bg-slate-50 border border-slate-100 p-4"><p class="font-heading text-lg font-bold text-blue-600">+35%</p><p class="text-xs text-slate-500 mt-1">Efisiensi biaya</p></div>
                <div class="rounded-xl bg-slate-50 border border-slate-100 p-4"><p class="font-heading text-lg font-bold text-blue-600">3x</p><p class="text-xs text-slate-500 mt-1">Closing lebih cepat</p></div>
                <div class="rounded-xl bg-slate-50 border border-slate-100 p-4"><p class="font-heading text-lg font-bold text-blue-600">100%</p><p class="text-xs text-slate-500 mt-1">Traceable</p></div>
              </div>
            </div>
          </article>

          <article class="case-card reveal bg-white rounded-3xl border border-slate-100 overflow-hidden card-hover" data-industry="Ritel">
            <div class="h-44 bg-gradient-to-br from-blue-700 to-slate-900 relative flex items-center justify-center">
              <span class="font-heading text-white font-bold text-3xl tracking-widest">GB</span>
              <span class="absolute top-4 left-4 bg-white/20 backdrop-blur text-white text-xs font-semibold px-3 py-1 rounded-full">Ritel</span>
            </div>
            <div class="p-8">
              <h3 class="font-heading text-xl font-bold text-slate-900">Penataan Laporan untuk Pembiayaan Ekspansi</h3>
              <p class="mt-1 text-sm font-semibold text-blue-600">Garda Bakti</p>
              <p class="mt-3 text-sm text-slate-600 leading-relaxed">Ritel 20 cabang ingin memperoleh kredit ekspansi namun laporan tidak bankable. Kami melakukan rekonstruksi pembukuan 2 tahun dan menyusun laporan bankable.</p>
              <div class="mt-6 grid grid-cols-3 gap-3">
                <div class="rounded-xl bg-slate-50 border border-slate-100 p-4"><p class="font-heading text-lg font-bold text-blue-600">Rp 25M</p><p class="text-xs text-slate-500 mt-1">Kredit disetujui</p></div>
                <div class="rounded-xl bg-slate-50 border border-slate-100 p-4"><p class="font-heading text-lg font-bold text-blue-600">6 bln</p><p class="text-xs text-slate-500 mt-1">Audit lulus</p></div>
                <div class="rounded-xl bg-slate-50 border border-slate-100 p-4"><p class="font-heading text-lg font-bold text-blue-600">20</p><p class="text-xs text-slate-500 mt-1">Cabang baru</p></div>
              </div>
            </div>
          </article>

          <article class="case-card reveal bg-white rounded-3xl border border-slate-100 overflow-hidden card-hover" data-industry="Teknologi">
            <div class="h-44 bg-gradient-to-br from-blue-600 to-slate-900 relative flex items-center justify-center">
              <span class="font-heading text-white font-bold text-3xl tracking-widest">ST</span>
              <span class="absolute top-4 left-4 bg-white/20 backdrop-blur text-white text-xs font-semibold px-3 py-1 rounded-full">Teknologi</span>
            </div>
            <div class="p-8">
              <h3 class="font-heading text-xl font-bold text-slate-900">Kepatuhan Pajak untuk Pendanaan Seri A</h3>
              <p class="mt-1 text-sm font-semibold text-blue-600">Segara Teknologi</p>
              <p class="mt-3 text-sm text-slate-600 leading-relaxed">Startup SaaS menghadapi potensi koreksi fiskal saat due diligence investor. Kami menormalisasi pencatatan dan menyusun tax provision.</p>
              <div class="mt-6 grid grid-cols-3 gap-3">
                <div class="rounded-xl bg-slate-50 border border-slate-100 p-4"><p class="font-heading text-lg font-bold text-blue-600">US$ 2J</p><p class="text-xs text-slate-500 mt-1">Pendanaan Seri A</p></div>
                <div class="rounded-xl bg-slate-50 border border-slate-100 p-4"><p class="font-heading text-lg font-bold text-blue-600">100%</p><p class="text-xs text-slate-500 mt-1">Compliance</p></div>
                <div class="rounded-xl bg-slate-50 border border-slate-100 p-4"><p class="font-heading text-lg font-bold text-blue-600">0</p><p class="text-xs text-slate-500 mt-1">Koreksi fiskal</p></div>
              </div>
            </div>
          </article>
        @endforelse
      </div>
    </div>
  </section>

  <!-- ======= CTA ======= -->
  <section class="relative bg-gradient-to-br from-blue-800 to-slate-900 overflow-hidden">
    <div class="blob w-96 h-96 bg-white/10 -top-24 -right-24"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 text-center reveal">
      <h2 class="font-heading text-3xl sm:text-4xl font-extrabold text-white leading-tight max-w-3xl mx-auto">Ingin Hasil Serupa untuk Bisnis Anda?</h2>
      <p class="mt-4 text-blue-50 max-w-xl mx-auto">Ceritakan tantangan Anda, dan kami akan tunjukkan bagaimana  Drs. Chaeroni &amp; Rekan bisa membantu.</p>
      <div class="mt-8 flex flex-col sm:flex-row justify-center gap-4">
        <a href="/reservasi" class="inline-flex items-center justify-center gap-2 rounded-full bg-white text-blue-700 font-semibold px-8 py-4 transition hover:bg-blue-50 shadow-xl">
          Konsultasi Gratis
          <i class="fa-solid fa-arrow-right text-[16px]"></i>
        </a>
        <a href="/kontak" class="inline-flex items-center justify-center gap-2 rounded-full border border-white/40 text-white font-semibold px-8 py-4 transition hover:bg-white/10">
          Hubungi Kami
        </a>
      </div>
    </div>
  </section>
@endsection
