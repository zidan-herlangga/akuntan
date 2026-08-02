@extends('layouts.frontend')

@section('title')
Kontak - Drs. Chaeroni & Rekan
@endsection

@section('meta_description')
Hubungi Drs. Chaeroni & Rekan untuk konsultasi audit & asurans, perpajakan, dan bisnis. Telepon, email, atau kunjungi kantor kami di Jakarta, Bekasi, dan Semarang.
@endsection

@section('active')
kontak
@endsection

@section('content')

  <!-- ======= PAGE BANNER ======= -->
  <section class="relative bg-brand-950 overflow-hidden">
    <div class="absolute inset-0 z-0">
      <img src="{{ asset('assets/hero/kontak.webp') }}" alt="Kantor  Drs. Chaeroni & Rekan" class="w-full h-full object-cover opacity-40" loading="lazy" />
      <div class="absolute inset-0 bg-brand-950/90"></div>
    </div>
    <div class="blob w-[420px] h-[420px] bg-blue-500/20 -top-32 -right-20"></div>
    <div class="blob w-[320px] h-[320px] bg-blue-500/10 bottom-0 -left-24"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-36 pb-16 lg:pt-44 lg:pb-20">
      <nav class="flex items-center gap-2 text-xs text-slate-400 mb-6">
        <a href="{{ route('home') }}" class="hover:text-blue-400 transition">Beranda</a>
        <i class="fa-solid fa-chevron-right text-[12px]"></i>
        <span class="text-slate-200">Kontak</span>
      </nav>
      <div class="max-w-3xl reveal">
        <p class="text-sm font-semibold text-blue-400 uppercase tracking-wider">Hubungi Kami</p>
        <h1 class="mt-3 font-heading text-4xl sm:text-5xl font-extrabold text-white leading-tight">Mari Bicara tentang Keuangan Bisnis Anda</h1>
        <p class="mt-5 text-slate-300 text-lg">Tim kami siap menjawab pertanyaan Anda - atau jadwalkan konsultasi gratis 30 menit dengan konsultan ahli.</p>
      </div>
    </div>
  </section>

  <!-- ======= CONTACT ======= -->
  <section class="py-20 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid lg:grid-cols-5 gap-8">

        <!-- info -->
        <div class="lg:col-span-2">
          <div class="reveal bg-white rounded-3xl border border-slate-100 p-8 sm:p-10">
            <h2 class="font-heading text-xl font-bold text-slate-900">Info Kontak</h2>
            <p class="mt-2 text-sm text-slate-500">Hubungi kami melalui kanal di bawah ini.</p>

            <ul class="mt-8 space-y-6">
              <li class="flex gap-4">
                <span class="w-11 h-11 shrink-0 rounded-xl bg-blue-100 flex items-center justify-center">
                  <i class="fa-solid fa-phone text-lg text-blue-600"></i>
                </span>
                <div>
                  <h3 class="font-heading text-sm font-bold text-slate-900">Telepon & WhatsApp</h3>
                  <p class="mt-1 text-sm text-slate-600 leading-relaxed">
                    <a href="tel:+62215321037" class="hover:text-blue-600 transition">+62 21 532 1037</a> (Jakarta)<br />
                    <a href="tel:+6285179588486" class="hover:text-blue-600 transition">+62 851 7958 8486</a> (Bekasi)<br />
                    <a href="tel:+622470044067" class="hover:text-blue-600 transition">+62 24 7004 4067</a> (Semarang)
                  </p>
                </div>
              </li>
              <li class="flex gap-4">
                <span class="w-11 h-11 shrink-0 rounded-xl bg-blue-100 flex items-center justify-center">
                  <i class="fa-solid fa-envelope text-lg text-blue-600"></i>
                </span>
                <div>
                  <h3 class="font-heading text-sm font-bold text-slate-900">Email</h3>
                  <p class="mt-1 text-sm text-slate-600 leading-relaxed">
                    <a href="mailto:info@mci.co.id" class="hover:text-blue-600 transition">info@mci.co.id</a> (Jakarta)<br />
                    <a href="mailto:office.bks@mci.co.id" class="hover:text-blue-600 transition">office.bks@mci.co.id</a> (Bekasi)<br />
                    <a href="mailto:office.smg@mci.co.id" class="hover:text-blue-600 transition">office.smg@mci.co.id</a> (Semarang)
                  </p>
                </div>
              </li>
              <li class="flex gap-4">
                <span class="w-11 h-11 shrink-0 rounded-xl bg-blue-100 flex items-center justify-center">
                  <i class="fa-solid fa-location-dot text-lg text-blue-600"></i>
                </span>
                <div>
                  <h3 class="font-heading text-sm font-bold text-slate-900">Kantor Pusat</h3>
                  <p class="mt-1 text-sm text-slate-600 leading-relaxed">Jl. Anggrek Nelimurni IIA/C-5, Slipi<br />Jakarta Barat 11480</p>
                </div>
              </li>
              <li class="flex gap-4">
                <span class="w-11 h-11 shrink-0 rounded-xl bg-blue-100 flex items-center justify-center">
                  <i class="fa-solid fa-clock text-lg text-blue-600"></i>
                </span>
                <div>
                  <h3 class="font-heading text-sm font-bold text-slate-900">Jam Operasional</h3>
                  <p class="mt-1 text-sm text-slate-600 leading-relaxed">Senin - Jumat: 08.00 - 17.00<br />Sabtu &amp; Minggu: tutup</p>
                </div>
              </li>
            </ul>
          </div>
        </div>

        <!-- form -->
        <div class="lg:col-span-3">
          <div class="reveal bg-white rounded-3xl border border-slate-100 p-8 sm:p-10 h-full">
            <h2 class="font-heading text-xl font-bold text-slate-900">Kirim Pesan</h2>
            <p class="mt-2 text-sm text-slate-500">Isi formulir di bawah dan tim kami akan merespons dalam 1×24 jam kerja.</p>

            <form id="contact-form" class="mt-8 grid sm:grid-cols-2 gap-5" novalidate>
              <div>
                <label class="block text-sm font-medium text-slate-700 mb-1.5">Nama Lengkap</label>
                <input type="text" name="name" required placeholder="Nama Anda" class="field-input" />
              </div>
              <div>
                <label class="block text-sm font-medium text-slate-700 mb-1.5">Email</label>
                <input type="email" name="email" required placeholder="nama@perusahaan.com" class="field-input" />
              </div>
              <div>
                <label class="block text-sm font-medium text-slate-700 mb-1.5">No. Telepon / WhatsApp</label>
                <input type="tel" name="phone" required placeholder="+62 8xx xxxx xxxx" class="field-input" />
              </div>
              <div>
                <label class="block text-sm font-medium text-slate-700 mb-1.5">Perusahaan</label>
                <input type="text" name="company" placeholder="Nama perusahaan" class="field-input" />
              </div>
              <div class="sm:col-span-2">
                <label class="block text-sm font-medium text-slate-700 mb-1.5">Topik</label>
                <select name="topic" class="field-input" required>
                  <option value="" selected disabled>Pilih topik...</option>
                  <option>Audit & Asurans</option>
                  <option>Perpajakan</option>
                  <option>Konsultasi Bisnis</option>
                  <option>Lainnya</option>
                </select>
              </div>
              <div class="sm:col-span-2">
                <label class="block text-sm font-medium text-slate-700 mb-1.5">Pesan</label>
                <textarea name="message" rows="5" required placeholder="Ceritakan kebutuhan Anda..." class="field-input resize-none"></textarea>
              </div>
              <div class="sm:col-span-2 flex flex-col sm:flex-row items-center justify-between gap-4">
                <label class="flex items-start gap-2 text-xs text-slate-500 cursor-pointer">
                  <input type="checkbox" name="consent" required class="mt-0.5 accent-blue-600" />
                  <span>Saya menyetujui kebijakan privasi dan kerahasiaan data.</span>
                </label>
                <button type="submit" class="btn-primary shrink-0">
                  Kirim Pesan
                  <i class="fa-solid fa-paper-plane text-[16px]"></i>
                </button>
              </div>
            </form>

            <p id="contact-error" class="hidden mt-6 rounded-2xl bg-red-50 border border-red-200 p-5 text-sm text-red-700 font-medium"></p>

            <p id="contact-success" class="hidden mt-6 rounded-2xl bg-blue-50 border border-blue-200 p-5 text-sm text-blue-700 font-medium">
              Terima kasih! Pesan Anda telah terkirim. Tim kami akan menghubungi Anda segera.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ======= MAP ======= -->
  <section class="bg-slate-50 pb-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="reveal rounded-3xl overflow-hidden border border-slate-100 shadow-sm bg-white">
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 p-6">
          <div>
            <h2 class="font-heading text-xl font-bold text-slate-900">Lokasi Kantor Pusat</h2>
            <p class="mt-1 text-sm text-slate-500">Drs. Chaeroni &amp; Rekan - Jl. Anggrek Nelimurni IIA/C-5, Slipi, Jakarta Barat 11480</p>
          </div>
          <a href="https://www.google.com/maps/place/+Drs+Chaeroni+dan+Rekan/@-6.187779,106.794833,20z/data=!4m5!3m4!1s0x0:0x1e0b48b830d1c5f!8m2!3d-6.1877789!4d106.7948333?hl=en-US" target="_blank" rel="noopener" class="inline-flex items-center gap-2 rounded-full bg-blue-600 text-white font-semibold px-5 py-2.5 text-sm hover:bg-blue-500 transition shrink-0">
            Buka di Google Maps
            <i class="fa-solid fa-arrow-up-right-from-square text-[14px]"></i>
          </a>
        </div>
        <iframe
          src="https://www.google.com/maps?q=Drs.+Chaeroni+dan+Rekan,+Jl.+Anggrek+Nelimurni+IIA%2FC-5,+Slipi,+Jakarta+Barat+11480&hl=id&z=17&output=embed"
          title="Peta lokasi Drs. Chaeroni &amp; Rekan"
          class="w-full h-[420px] block"
          style="border:0;"
          allowfullscreen
          loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </div>
  </section>
@endsection
