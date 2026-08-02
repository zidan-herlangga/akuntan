@extends('layouts.frontend')

@section('title')
Kebijakan Privasi - Drs. Chaeroni & Rekan
@endsection

@section('meta_description')
Kebijakan Privasi Drs. Chaeroni & Rekan - bagaimana kami mengumpulkan, menggunakan, melindungi, dan menjaga kerahasiaan data Anda.
@endsection

@section('active')
kontak
@endsection

@section('content')

  <!-- ======= PAGE BANNER ======= -->
  <section class="relative bg-brand-950 overflow-hidden">
    <div class="absolute inset-0 z-0">
      <img src="{{ asset('assets/hero/privasi.webp') }}" alt="Kebijakan Privasi  Drs. Chaeroni & Rekan" class="w-full h-full object-cover opacity-40" loading="lazy" />
      <div class="absolute inset-0 bg-brand-950/90"></div>
    </div>
    <div class="blob w-[420px] h-[420px] bg-blue-500/20 -top-32 -right-20"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-36 pb-16 lg:pt-44 lg:pb-20">
      <nav class="flex items-center gap-2 text-xs text-slate-400 mb-6">
        <a href="{{ route('home') }}" class="hover:text-blue-400 transition">Beranda</a>
        <i class="fa-solid fa-chevron-right text-[12px]"></i>
        <span class="text-slate-200">Kebijakan Privasi</span>
      </nav>
      <div class="max-w-3xl reveal">
        <p class="text-sm font-semibold text-blue-400 uppercase tracking-wider">Kebijakan Privasi</p>
        <h1 class="mt-3 font-heading text-4xl sm:text-5xl font-extrabold text-white leading-tight">Privasi dan Keamanan Data Anda</h1>
        <p class="mt-5 text-slate-300 text-lg">Kami menjaga kerahasiaan seluruh informasi klien sesuai standar profesi akuntan publik dan peraturan perundang-undangan.</p>
      </div>
    </div>
  </section>

  <!-- ======= BODY ======= -->
  <section class="py-20 bg-slate-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="reveal bg-white rounded-3xl border border-slate-100 p-8 sm:p-12 shadow-sm space-y-10">

        <div>
          <h2 class="font-heading text-xl font-bold text-slate-900">1. Pendahuluan</h2>
          <p class="mt-3 text-slate-600 leading-relaxed">Drs. Chaeroni &amp; Rekan ("kami") menghormati privasi Anda dan berkomitmen melindungi data pribadi yang Anda percayakan kepada kami. Kebijakan ini menjelaskan cara kami mengumpulkan, menggunakan, menyimpan, dan melindungi informasi Anda saat menggunakan situs web dan layanan kami.</p>
        </div>

        <div>
          <h2 class="font-heading text-xl font-bold text-slate-900">2. Data yang Kami Kumpulkan</h2>
          <p class="mt-3 text-slate-600 leading-relaxed">Kami dapat mengumpulkan data berikut dari Anda:</p>
          <ul class="mt-4 space-y-3 text-slate-600">
            <li class="flex gap-3"><span class="text-blue-600 font-bold">•</span> Informasi identitas: nama lengkap, perusahaan, dan jabatan.</li>
            <li class="flex gap-3"><span class="text-blue-600 font-bold">•</span> Informasi kontak: alamat email, nomor telepon, dan WhatsApp.</li>
            <li class="flex gap-3"><span class="text-blue-600 font-bold">•</span> Informasi yang Anda berikan melalui formulir reservasi, formulir kontak, atau konsultasi.</li>
            <li class="flex gap-3"><span class="text-blue-600 font-bold">•</span> Data teknis: alamat IP, jenis perangkat, dan data aktivitas saat mengunjungi situs kami.</li>
          </ul>
        </div>

        <div>
          <h2 class="font-heading text-xl font-bold text-slate-900">3. Penggunaan Data</h2>
          <p class="mt-3 text-slate-600 leading-relaxed">Data yang kami kumpulkan digunakan untuk:</p>
          <ul class="mt-4 space-y-3 text-slate-600">
            <li class="flex gap-3"><span class="text-blue-600 font-bold">•</span> Memproses permintaan reservasi dan konsultasi Anda.</li>
            <li class="flex gap-3"><span class="text-blue-600 font-bold">•</span> Menanggapi pertanyaan dan permintaan informasi.</li>
            <li class="flex gap-3"><span class="text-blue-600 font-bold">•</span> Memberikan layanan audit, perpajakan, dan konsultasi bisnis.</li>
            <li class="flex gap-3"><span class="text-blue-600 font-bold">•</span> Memenuhi kewajiban hukum dan kepatuhan profesi.</li>
          </ul>
        </div>

        <div>
          <h2 class="font-heading text-xl font-bold text-slate-900">4. Keamanan Data</h2>
          <p class="mt-3 text-slate-600 leading-relaxed">Kami menerapkan langkah-langkah teknis dan organisasi yang memadai untuk melindungi data Anda, termasuk enkripsi data sensitif, sistem otorisasi berjenjang, dan perjanjian kerahasiaan (NDA) untuk setiap klien. Seluruh informasi klien diakses hanya oleh personel yang berwenang dan memiliki kepentingan profesional.</p>
        </div>

        <div>
          <h2 class="font-heading text-xl font-bold text-slate-900">5. Pembagian Data kepada Pihak Ketiga</h2>
          <p class="mt-3 text-slate-600 leading-relaxed">Kami tidak menjual, menyewakan, atau membagikan data pribadi Anda kepada pihak ketiga, kecuali: (a) atas persetujuan Anda; (b) untuk memenuhi kewajiban hukum; atau (c) kepada penyedia layanan yang bekerja untuk kami dengan perjanjian kerahasiaan yang sama ketatnya.</p>
        </div>

        <div>
          <h2 class="font-heading text-xl font-bold text-slate-900">6. Hak Anda</h2>
          <p class="mt-3 text-slate-600 leading-relaxed">Anda berhak mengakses, memperbaiki, atau meminta penghapusan data pribadi Anda. Anda juga dapat menarik persetujuan penggunaan data kapan saja dengan menghubungi kami melalui kanal kontak yang tersedia.</p>
        </div>

        <div>
          <h2 class="font-heading text-xl font-bold text-slate-900">7. Kontak</h2>
          <p class="mt-3 text-slate-600 leading-relaxed">Jika Anda memiliki pertanyaan mengenai kebijakan privasi ini, silakan hubungi kami:</p>
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
