@extends('layouts.frontend')

@section('title')
Syarat & Ketentuan - Drs. Chaeroni & Rekan
@endsection

@section('meta_description')
Syarat & Ketentuan penggunaan layanan Drs. Chaeroni & Rekan - ketentuan reservasi, jasa profesional, dan penggunaan situs web.
@endsection

@section('active')
kontak
@endsection

@section('content')

  <!-- ======= PAGE BANNER ======= -->
  <section class="relative bg-brand-950 overflow-hidden">
    <div class="absolute inset-0 z-0">
      <img src="{{ asset('assets/hero/syarat.webp') }}" alt="Syarat & Ketentuan  Drs. Chaeroni & Rekan" class="w-full h-full object-cover opacity-40" loading="lazy" />
      <div class="absolute inset-0 bg-brand-950/90"></div>
    </div>
    <div class="blob w-[420px] h-[420px] bg-blue-500/20 -top-32 -right-20"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-36 pb-16 lg:pt-44 lg:pb-20">
      <nav class="flex items-center gap-2 text-xs text-slate-400 mb-6">
        <a href="{{ route('home') }}" class="hover:text-blue-400 transition">Beranda</a>
        <i class="fa-solid fa-chevron-right text-[12px]"></i>
        <span class="text-slate-200">Syarat & Ketentuan</span>
      </nav>
      <div class="max-w-3xl reveal">
        <p class="text-sm font-semibold text-blue-400 uppercase tracking-wider">Syarat & Ketentuan</p>
        <h1 class="mt-3 font-heading text-4xl sm:text-5xl font-extrabold text-white leading-tight">Ketentuan Penggunaan Layanan</h1>
        <p class="mt-5 text-slate-300 text-lg">Dengan menggunakan situs dan layanan kami, Anda dianggap telah menyetujui syarat dan ketentuan berikut.</p>
      </div>
    </div>
  </section>

  <!-- ======= BODY ======= -->
  <section class="py-20 bg-slate-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="reveal bg-white rounded-3xl border border-slate-100 p-8 sm:p-12 shadow-sm space-y-10">

        <div>
          <h2 class="font-heading text-xl font-bold text-slate-900">1. Penerimaan Ketentuan</h2>
          <p class="mt-3 text-slate-600 leading-relaxed">Dengan mengakses situs web dan menggunakan layanan Drs. Chaeroni &amp; Rekan ("kami"), Anda menyatakan telah membaca, memahami, dan menyetujui seluruh syarat dan ketentuan ini. Jika Anda tidak setuju, mohon untuk tidak menggunakan layanan kami.</p>
        </div>

        <div>
          <h2 class="font-heading text-xl font-bold text-slate-900">2. Ruang Lingkup Layanan</h2>
          <p class="mt-3 text-slate-600 leading-relaxed">Kami menyediakan jasa akuntan publik, meliputi audit dan asurans, perpajakan, serta konsultasi bisnis. Penunjukan resmi atas jasa tersebut dituangkan dalam surat penugasan (engagement letter) tersendiri yang mengikat secara hukum dan menjadi acuan utama hubungan profesional kami.</p>
        </div>

        <div>
          <h2 class="font-heading text-xl font-bold text-slate-900">3. Reservasi Konsultasi</h2>
          <ul class="mt-4 space-y-3 text-slate-600">
            <li class="flex gap-3"><span class="text-blue-600 font-bold">•</span> Konsultasi awal bersifat gratis selama 30 menit dan tanpa komitmen.</li>
            <li class="flex gap-3"><span class="text-blue-600 font-bold">•</span> Slot reservasi terbatas dan dijadwalkan sesuai ketersediaan konsultan.</li>
            <li class="flex gap-3"><span class="text-blue-600 font-bold">•</span> Pembatalan atau penjadwalan ulang dapat dilakukan dengan menghubungi kami sebelum waktu yang dijadwalkan.</li>
            <li class="flex gap-3"><span class="text-blue-600 font-bold">•</span> Kami berhak menolak atau menjadwal ulang reservasi tanpa pemberitahuan lebih lanjut apabila diperlukan.</li>
          </ul>
        </div>

        <div>
          <h2 class="font-heading text-xl font-bold text-slate-900">4. Kerahasiaan Informasi</h2>
          <p class="mt-3 text-slate-600 leading-relaxed">Seluruh informasi yang Anda sampaikan kepada kami diperlakukan sebagai informasi rahasia sesuai kode etik akuntan publik dan peraturan perundang-undangan yang berlaku. Informasi tersebut hanya digunakan untuk tujuan penugasan dan tidak akan dibagikan kepada pihak lain tanpa persetujuan Anda, kecuali diwajibkan oleh hukum.</p>
        </div>

        <div>
          <h2 class="font-heading text-xl font-bold text-slate-900">5. Tanggung Jawab Pengguna</h2>
          <ul class="mt-4 space-y-3 text-slate-600">
            <li class="flex gap-3"><span class="text-blue-600 font-bold">•</span> Anda bertanggung jawab atas keakuratan dan kelengkapan data yang Anda berikan.</li>
            <li class="flex gap-3"><span class="text-blue-600 font-bold">•</span> Anda tidak diperkenankan menyalahgunakan situs ini untuk tujuan yang melanggar hukum.</li>
            <li class="flex gap-3"><span class="text-blue-600 font-bold">•</span> Anda dilarang mengganggu keamanan, integritas, atau ketersediaan situs kami.</li>
          </ul>
        </div>

        <div>
          <h2 class="font-heading text-xl font-bold text-slate-900">6. Batasan Tanggung Jawab</h2>
          <p class="mt-3 text-slate-600 leading-relaxed">Informasi yang tersedia di situs ini bersifat umum dan bukan merupakan nasihat profesional. Kami tidak bertanggung jawab atas kerugian yang timbul akibat keputusan yang diambil semata-mata berdasarkan informasi di situs ini tanpa konsultasi dengan kami.</p>
        </div>

        <div>
          <h2 class="font-heading text-xl font-bold text-slate-900">7. Perubahan Ketentuan</h2>
          <p class="mt-3 text-slate-600 leading-relaxed">Kami dapat memperbarui syarat dan ketentuan ini sewaktu-waktu. Perubahan akan diumumkan melalui halaman ini, dan penggunaan lanjutan atas layanan kami dianggap sebagai persetujuan terhadap ketentuan terbaru.</p>
        </div>

        <div>
          <h2 class="font-heading text-xl font-bold text-slate-900">8. Kontak</h2>
          <div class="mt-4 rounded-2xl bg-slate-50 border border-slate-100 p-5 text-sm text-slate-600">
            <p><strong class="text-slate-900">Drs. Chaeroni &amp; Rekan</strong></p>
            <p class="mt-1">Jl. Anggrek Nelimurni IIA/C-5, Slipi, Jakarta Barat 11480</p>
            <p class="mt-1"><a href="mailto:info@mci.co.id" class="text-blue-600 hover:underline">info@mci.co.id</a> · <a href="tel:+62215321037" class="text-blue-600 hover:underline">+62 21 532 1037</a></p>
          </div>
        </div>

      </div>
    </div>
  </section>
@endsection
