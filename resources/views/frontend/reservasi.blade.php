@extends('layouts.frontend')

@section('title')
Reservasi Konsultasi - Drs. Chaeroni & Rekan
@endsection

@section('meta_description')
Reservasi konsultasi gratis dengan Drs. Chaeroni & Rekan. Pilih layanan audit & asurans, perpajakan, atau konsultasi bisnis dalam hitungan menit.
@endsection

@section('active')
reservasi
@endsection

@section('content')

  @php
    $serviceIcons = [
      'audit' => '<i class="fa-solid fa-scale-balanced text-[24px] text-blue-600"></i>',
      'tax' => '<i class="fa-solid fa-file-invoice-dollar text-[24px] text-blue-600"></i>',
      'consulting' => '<i class="fa-solid fa-briefcase text-[24px] text-blue-600"></i>',
    ];
  @endphp

  <!-- ======= PAGE BANNER ======= -->
  <section class="relative bg-brand-950 overflow-hidden">
    <div class="absolute inset-0 z-0">
      <img src="{{ asset('assets/hero/reservasi.webp') }}" alt="Reservasi konsultasi  Drs. Chaeroni & Rekan" class="w-full h-full object-cover opacity-40" loading="lazy" />
      <div class="absolute inset-0 bg-brand-950/90"></div>
    </div>
    <div class="blob w-[420px] h-[420px] bg-blue-500/20 -top-32 -right-20"></div>
    <div class="blob w-[320px] h-[320px] bg-blue-500/10 bottom-0 -left-24"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-36 pb-16 lg:pt-44 lg:pb-20">
      <nav class="flex items-center gap-2 text-xs text-slate-400 mb-6">
        <a href="{{ route('home') }}" class="hover:text-blue-400 transition">Beranda</a>
        <i class="fa-solid fa-chevron-right text-[12px]"></i>
        <span class="text-slate-200">Reservasi</span>
      </nav>
      <div class="max-w-3xl reveal">
        <p class="text-sm font-semibold text-blue-400 uppercase tracking-wider">Reservasi Online</p>
        <h1 class="mt-3 font-heading text-4xl sm:text-5xl font-extrabold text-white leading-tight">Reservasi Konsultasi Gratis</h1>
        <p class="mt-5 text-slate-300 text-lg">Lengkapi 3 langkah sederhana berikut. Tim kami akan mengonfirmasi jadwal Anda via WhatsApp dalam beberapa jam.</p>
      </div>
    </div>
  </section>

  <!-- ======= BOOKING WIZARD ======= -->
  <section class="py-16 bg-slate-50">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

      <div id="booking-wizard" class="bg-white rounded-3xl border border-slate-100 shadow-xl shadow-slate-200/60 overflow-hidden">
        <!-- progress -->
        <div class="bg-white border-b border-slate-100 px-6 sm:px-10 py-6">
          <div class="flex items-center">
            <div class="step-indicator active" data-step-ind>
              <span class="step-dot">1</span>
              <span class="hidden sm:block text-sm font-semibold">Data Anda</span>
            </div>
            <div class="step-line" data-step-line></div>
            <div class="step-indicator" data-step-ind>
              <span class="step-dot">2</span>
              <span class="hidden sm:block text-sm font-semibold">Layanan & Jadwal</span>
            </div>
            <div class="step-line" data-step-line></div>
            <div class="step-indicator" data-step-ind>
              <span class="step-dot">3</span>
              <span class="hidden sm:block text-sm font-semibold">Konfirmasi</span>
            </div>
          </div>
        </div>

        <!-- STEP 1: CLIENT DATA -->
        <div data-step class="px-6 sm:px-10 py-10">
          <h2 class="font-heading text-xl font-bold text-slate-900">Isi Data Anda</h2>
          <p class="mt-1 text-sm text-slate-500">Data akan dienkripsi dan hanya digunakan untuk keperluan konsultasi.</p>

          <div class="mt-7 grid sm:grid-cols-2 gap-5">
            <div>
              <label class="block text-sm font-medium text-slate-700 mb-1.5">Nama Lengkap</label>
              <input type="text" name="client_name" required placeholder="Nama Anda" class="field-input" />
            </div>
            <div>
              <label class="block text-sm font-medium text-slate-700 mb-1.5">Nama Perusahaan <span class="text-slate-400">(opsional)</span></label>
              <input type="text" name="company_name" placeholder="PT Contoh Sejahtera" class="field-input" />
            </div>
            <div>
              <label class="block text-sm font-medium text-slate-700 mb-1.5">Email</label>
              <input type="email" name="email" required placeholder="nama@perusahaan.com" class="field-input" />
            </div>
            <div>
              <label class="block text-sm font-medium text-slate-700 mb-1.5">No. WhatsApp</label>
              <input type="tel" name="phone" required placeholder="+62 8xx xxxx xxxx" class="field-input" />
            </div>
            <div class="sm:col-span-2">
              <label class="block text-sm font-medium text-slate-700 mb-1.5">Deskripsi Singkat Permasalahan</label>
              <textarea name="problem" rows="4" placeholder="Contoh: ingin merapikan pembukuan sebelum audit tahunan..." class="field-input resize-none"></textarea>
            </div>
          </div>

          <div class="mt-6 rounded-2xl bg-slate-50 border border-slate-100 p-5">
            <label class="flex items-start gap-3 cursor-pointer">
              <input type="checkbox" required class="mt-1 accent-blue-600" />
              <span class="text-sm text-slate-600">Saya menyetujui <a href="#" class="text-blue-600 font-medium hover:underline">Kebijakan Privasi</a> dan menyatakan data yang saya berikan benar. Data sensitif akan dienkripsi dan tidak dibagikan kepada pihak lain.</span>
            </label>
          </div>

          <div class="mt-8 flex justify-end">
            <button type="button" data-next class="btn-primary">
              Pilih Layanan
              <i class="fa-solid fa-arrow-right text-[16px]"></i>
            </button>
          </div>
        </div>

        <!-- STEP 2: SERVICE, CONSULTANT & SCHEDULE -->
        <div data-step class="hidden px-6 sm:px-10 py-10">
          <h2 class="font-heading text-xl font-bold text-slate-900">Pilih Layanan & Jadwal</h2>
          <p class="mt-1 text-sm text-slate-500">Pilih layanan - konsultan yang sesuai akan langsung tampil. Setiap sesi berlangsung 45 menit via Google Meet atau tatap muka di kantor.</p>

          <div class="mt-7">
            <p class="text-sm font-semibold text-slate-700 mb-3">Layanan</p>
            <div id="service-list" class="grid sm:grid-cols-2 gap-4">
              <div class="select-card">
                <input type="radio" name="service" value="" checked disabled />
                <label>
                  <div class="flex items-center gap-3">
                    <span class="w-11 h-11 rounded-xl bg-blue-100 flex items-center justify-center shrink-0">
                      <i class="fa-solid fa-spinner text-[20px] text-blue-600 animate-spin"></i>
                    </span>
                    <div>
                      <p class="font-semibold text-slate-900 text-sm">Memuat layanan...</p>
                      <p class="text-xs text-slate-500 mt-0.5">Mengambil data dari server</p>
                    </div>
                  </div>
                </label>
              </div>
            </div>
          </div>

          <div class="mt-7">
            <p class="text-sm font-semibold text-slate-700 mb-3">Konsultan</p>
            <div id="consultant-list" class="grid sm:grid-cols-2 gap-4">
              <div class="select-card">
                <input type="radio" name="consultant" value="" disabled />
                <label>
                  <div class="flex items-center gap-3">
                    <span class="w-11 h-11 rounded-full bg-blue-700 flex items-center justify-center text-sm font-bold text-white shrink-0">...</span>
                    <div class="flex-1">
                      <p class="font-semibold text-slate-900 text-sm">Memuat konsultan...</p>
                      <p class="text-xs text-slate-500 mt-0.5">Mengambil data dari server</p>
                    </div>
                  </div>
                </label>
              </div>
            </div>
          </div>

          <div class="mt-7">
            <p class="text-sm font-semibold text-slate-700 mb-3">Tanggal</p>
            <div class="flex flex-col sm:flex-row sm:items-center gap-4">
              <input type="date" id="booking-date" class="field-input sm:max-w-xs" required />
              <p id="booking-date-label" class="text-sm text-slate-500"></p>
            </div>
            <div id="available-dates" class="mt-4 flex flex-wrap gap-2"></div>
          </div>

          <div class="mt-7">
            <p class="text-sm font-semibold text-slate-700 mb-3">Pilih Waktu (WIB)</p>
            <div id="slot-list" class="grid grid-cols-3 sm:grid-cols-5 gap-3">
              <p class="text-sm text-slate-400 col-span-full">Pilih tanggal dan konsultan terlebih dahulu untuk melihat slot waktu.</p>
            </div>
            <p class="mt-3 text-xs text-slate-400">Slot yang tersedia ditampilkan. Jumlah terbatas - segera konfirmasi.</p>
          </div>

          <div class="mt-8 flex items-center justify-between">
            <button type="button" data-prev class="inline-flex items-center gap-2 rounded-full border border-slate-200 text-slate-600 font-semibold px-6 py-3 text-sm hover:border-blue-600 hover:text-blue-600 transition">
              <i class="fa-solid fa-arrow-left text-[16px]"></i>
              Kembali
            </button>
            <button type="button" data-next class="btn-primary">
              Lanjut ke Konfirmasi
              <i class="fa-solid fa-arrow-right text-[16px]"></i>
            </button>
          </div>
        </div>

        <!-- STEP 4: SUMMARY -->
        <div data-step class="hidden px-6 sm:px-10 py-10">
          <h2 class="font-heading text-xl font-bold text-slate-900">Konfirmasi Reservasi</h2>
          <p class="mt-1 text-sm text-slate-500">Periksa kembali detail reservasi Anda sebelum mengirim.</p>

          <div class="mt-7 rounded-3xl border border-slate-100 overflow-hidden">
            <div class="grid sm:grid-cols-2">
              <div class="p-6 bg-slate-50 border-b sm:border-b-0 sm:border-r border-slate-100">
                <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Layanan</p>
                <p id="summary-service" class="mt-2 font-semibold text-slate-900">-</p>
                <p class="text-xs text-slate-400 mt-3">Konsultasi awal 30 menit · Gratis</p>
              </div>
              <div class="p-6 bg-slate-50">
                <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Konsultan</p>
                <p id="summary-consultant" class="mt-2 font-semibold text-slate-900">-</p>
              </div>
              <div class="p-6 bg-white border-b sm:border-b-0 sm:border-r border-slate-100">
                <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Tanggal</p>
                <p id="summary-date" class="mt-2 font-semibold text-slate-900">-</p>
              </div>
              <div class="p-6 bg-white">
                <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Waktu (WIB)</p>
                <p id="summary-time" class="mt-2 font-semibold text-slate-900">-</p>
              </div>
              <div class="p-6 bg-white border-t border-slate-100 sm:border-t-0 sm:border-r">
                <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Nama</p>
                <p id="summary-name" class="mt-2 font-semibold text-slate-900">-</p>
              </div>
              <div class="p-6 bg-white border-t border-slate-100">
                <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Perusahaan</p>
                <p id="summary-company" class="mt-2 font-semibold text-slate-900">-</p>
              </div>
              <div class="p-6 bg-slate-50 border-t border-slate-100 sm:border-r sm:col-span-1">
                <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Email</p>
                <p id="summary-email" class="mt-2 font-semibold text-slate-900 break-all">-</p>
              </div>
              <div class="p-6 bg-slate-50 border-t border-slate-100">
                <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider">No. WhatsApp</p>
                <p id="summary-phone" class="mt-2 font-semibold text-slate-900">-</p>
              </div>
            </div>
          </div>

          <div class="mt-6 rounded-2xl bg-blue-50 border border-blue-100 p-5 text-sm text-blue-800 leading-relaxed">
            <strong>Yang terjadi selanjutnya:</strong> Kami akan mengirimkan konfirmasi dan tautan Google Meet via WhatsApp dalam maksimal 1×24 jam kerja. Anda juga akan menerima email ringkasan reservasi.
          </div>

          <div id="booking-error" class="hidden mt-6 rounded-2xl bg-red-50 border border-red-200 p-5 text-sm text-red-700"></div>

          <div id="turnstile-widget" class="mt-6"></div>

          <div id="booking-actions" class="mt-8 flex items-center justify-between">
            <button type="button" data-prev class="inline-flex items-center gap-2 rounded-full border border-slate-200 text-slate-600 font-semibold px-6 py-3 text-sm hover:border-blue-600 hover:text-blue-600 transition">
              <i class="fa-solid fa-arrow-left text-[16px]"></i>
              Kembali
            </button>
            <form id="booking-form" novalidate>
              <button type="submit" class="btn-primary">
                Kirim Reservasi
                <i class="fa-solid fa-circle-check text-[16px]"></i>
              </button>
            </form>
          </div>

          <div id="booking-success" class="hidden mt-6 rounded-3xl bg-blue-50 border border-blue-200 p-8 text-center">
            <span class="mx-auto w-16 h-16 rounded-full bg-blue-500 flex items-center justify-center">
              <i class="fa-solid fa-check text-[32px] text-white"></i>
            </span>
            <h3 class="mt-4 font-heading text-xl font-bold text-blue-800">Reservasi Berhasil Dikirim!</h3>
            <p class="mt-2 text-sm text-blue-700">Terima kasih! Tim kami akan mengonfirmasi jadwal Anda melalui WhatsApp dalam 1×24 jam kerja.</p>
            <p class="mt-3 text-sm text-blue-700">Nomor reservasi Anda: <strong id="booking-number" class="text-blue-900">-</strong></p>
            <div class="mt-6 flex flex-col sm:flex-row justify-center gap-3">
              <a href="{{ route('home') }}" class="inline-flex justify-center items-center gap-2 rounded-full bg-white border border-blue-200 text-blue-700 font-semibold px-6 py-3 text-sm hover:bg-blue-100 transition">Kembali ke Beranda</a>
              <a href="{{ route('blog') }}" class="inline-flex justify-center items-center gap-2 rounded-full bg-blue-600 text-white font-semibold px-6 py-3 text-sm hover:bg-blue-500 transition">Baca Artikel Kami</a>
            </div>
          </div>
        </div>
      </div>

      <!-- reassurance -->
      <div class="mt-10 grid sm:grid-cols-3 gap-6 reveal">
        <div class="flex items-center gap-3">
          <span class="w-11 h-11 rounded-xl bg-blue-100 flex items-center justify-center shrink-0">
            <i class="fa-solid fa-shield-halved text-[20px] text-blue-600"></i>
          </span>
          <div>
            <p class="text-sm font-semibold text-slate-800">Data Terenkripsi</p>
            <p class="text-xs text-slate-500">Standar keamanan bank</p>
          </div>
        </div>
        <div class="flex items-center gap-3">
          <span class="w-11 h-11 rounded-xl bg-blue-100 flex items-center justify-center shrink-0">
            <i class="fa-solid fa-clock text-[20px] text-blue-600"></i>
          </span>
          <div>
            <p class="text-sm font-semibold text-slate-800">Konfirmasi Cepat</p>
            <p class="text-xs text-slate-500">Via WhatsApp dalam 24 jam</p>
          </div>
        </div>
        <div class="flex items-center gap-3">
          <span class="w-11 h-11 rounded-xl bg-blue-100 flex items-center justify-center shrink-0">
            <i class="fa-solid fa-star text-[20px] text-blue-600"></i>
          </span>
          <div>
            <p class="text-sm font-semibold text-slate-800">Gratis & Tanpa Komitmen</p>
            <p class="text-xs text-slate-500">Konsultasi awal 30 menit</p>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@push('scripts')
<script>
(function () {
  'use strict';

  var BASE = '/api/booking';
  var SITE_KEY = @json(config('services.turnstile.site_key'));
  var SERVICE_ICONS = @json($serviceIcons);
  var SERVICE_SPECIALIZATION = {
    audit: 'Audit',
    tax: 'Perpajakan',
    consulting: 'Konsultasi Bisnis'
  };

  var wizard = document.getElementById('booking-wizard');
  var serviceList = document.getElementById('service-list');
  var consultantList = document.getElementById('consultant-list');
  var slotList = document.getElementById('slot-list');
  var dateInput = document.getElementById('booking-date');

  if (!wizard || !serviceList || !consultantList) return;

  var selectedConsultant = null;
  var allConsultants = null;
  var turnstileToken = '';

  function esc(s) {
    return String(s == null ? '' : s).replace(/[&<>"']/g, function (c) {
      return { '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;' }[c];
    });
  }

  function initials(name) {
    var cleaned = String(name || '').replace(/^(Drs\.|Dr\.|Ir\.|H\.)\s+/i, '');
    var parts = cleaned.split(/\s+/).slice(0, 2).map(function (w) { return w.charAt(0); });
    return (parts.join('') || 'KA').toUpperCase();
  }

  function formatTime(iso) {
    var parts = new Intl.DateTimeFormat('en-GB', {
      timeZone: 'Asia/Jakarta',
      hour: '2-digit',
      minute: '2-digit',
      hour12: false
    }).formatToParts(new Date(iso));
    var hh = '', mm = '';
    parts.forEach(function (p) {
      if (p.type === 'hour') hh = p.value;
      if (p.type === 'minute') mm = p.value;
    });
    return hh + '.' + mm;
  }

  function formatDateLabel(dateStr) {
    var d = new Date(dateStr + 'T00:00:00');
    if (isNaN(d.getTime())) return dateStr;
    return d.toLocaleDateString('id-ID', { weekday: 'long', day: 'numeric', month: 'long', year: 'numeric' });
  }

  function getVal(name) {
    var el = wizard.querySelector('[name="' + name + '"]');
    return el ? el.value.trim() : '';
  }

  function showError(msg) {
    var errorBox = document.getElementById('booking-error');
    if (!errorBox) return;
    errorBox.textContent = msg;
    errorBox.classList.remove('hidden');
    errorBox.scrollIntoView({ behavior: 'smooth', block: 'center' });
  }

  function renderServices(items) {
    if (!items.length) {
      serviceList.innerHTML = '<p class="text-sm text-slate-500 col-span-full">Belum ada layanan yang tersedia.</p>';
      return;
    }
    serviceList.innerHTML = items.map(function (s, i) {
      var icon = SERVICE_ICONS[s.icon] || SERVICE_ICONS['consulting'];
      var inputId = 'svc-' + s.id;
      return [
        '<div class="select-card">',
        '  <input type="radio" id="' + inputId + '" name="service" value="' + s.id + '" data-label="' + esc(s.title) + '" data-icon="' + esc(s.icon) + '"' + (i === 0 ? ' checked' : '') + ' />',
        '  <label for="' + inputId + '"><div class="flex items-center gap-3">',
        '    <span class="w-11 h-11 rounded-xl bg-blue-100 flex items-center justify-center shrink-0">' + icon + '</span>',
        '    <div><p class="font-semibold text-slate-900 text-sm">' + esc(s.title) + '</p>',
        '      <p class="text-xs text-slate-500 mt-0.5">' + esc(s.summary || '') + '</p></div>',
        '  </div></label>',
        '</div>'
      ].join('');
    }).join('');

    serviceList.querySelectorAll('input[name="service"]').forEach(function (input) {
      input.addEventListener('change', function () {
        selectedConsultant = null;
        if (dateInput) dateInput.value = '';
        var label = document.getElementById('booking-date-label');
        if (label) label.textContent = '';
        loadSlots();
        renderConsultantsForService();
      });
    });

    renderConsultantsForService();
  }

  function renderConsultantsForService() {
    var checked = serviceList.querySelector('input[name="service"]:checked');
    if (!checked || !allConsultants) return;

    var icon = checked.getAttribute('data-icon');
    var spec = SERVICE_SPECIALIZATION[icon];
    var filtered = spec ? allConsultants.filter(function (c) {
      return c.specialization === spec;
    }) : allConsultants;

    renderConsultants(filtered);
  }

  function renderConsultants(items) {
    if (!items.length) {
      consultantList.innerHTML = '<p class="text-sm text-slate-500 col-span-full">Belum ada konsultan yang tersedia.</p>';
      return;
    }
    consultantList.innerHTML = items.map(function (c) {
      var inputId = 'con-' + c.id;
      return [
        '<div class="select-card">',
        '  <input type="radio" id="' + inputId + '" name="consultant" value="' + c.id + '" data-label="' + esc(c.name) + '" required />',
        '  <label for="' + inputId + '"><div class="flex items-center gap-3">',
        '    <span class="w-11 h-11 rounded-full bg-blue-700 flex items-center justify-center text-sm font-bold text-white shrink-0">' + esc(initials(c.name)) + '</span>',
        '    <div class="flex-1"><p class="font-semibold text-slate-900 text-sm">' + esc(c.name) + '</p>',
        '      <p class="text-xs text-slate-500 mt-0.5">' + esc(c.specialization || '') + '</p></div>',
        '  </div></label>',
        '</div>'
      ].join('');
    }).join('');

    consultantList.querySelectorAll('input[name="consultant"]').forEach(function (input) {
      input.addEventListener('change', function () {
        selectedConsultant = input.value;
        loadSlots();
        loadAvailability();
      });
    });
  }

  function loadAvailability() {
    var wrap = document.getElementById('available-dates');
    if (!wrap) return;
    if (!selectedConsultant) {
      wrap.innerHTML = '';
      return;
    }
    fetch(BASE + '/availability/' + encodeURIComponent(selectedConsultant))
      .then(function (r) { return r.json(); })
      .then(function (res) {
        var days = res.data || [];
        if (!days.length) {
          wrap.innerHTML = '<p class="text-sm text-slate-400">Tidak ada tanggal dengan slot tersedia (14 hari ke depan).</p>';
          return;
        }
        wrap.innerHTML = days.map(function (d) {
          var label = new Date(d.date + 'T00:00:00').toLocaleDateString('id-ID', {
            weekday: 'short', day: 'numeric', month: 'short'
          });
          return '<button type="button" class="date-chip" data-date="' + d.date + '" title="' + d.count + ' slot tersedia">' +
            label + ' <span class="date-chip-count">' + d.count + '</span></button>';
        }).join('');

        if (!dateInput) return;

        wrap.querySelectorAll('.date-chip').forEach(function (btn) {
          btn.addEventListener('click', function () {
            dateInput.value = btn.getAttribute('data-date');
            dateInput.dispatchEvent(new Event('change'));
            wrap.querySelectorAll('.date-chip').forEach(function (c) {
              c.classList.toggle('active', c === btn);
            });
          });
        });

        var chosen = dateInput.value;
        var isChosenAvailable = days.some(function (d) { return d.date === chosen; });
        if (!chosen || !isChosenAvailable) {
          var first = days[0];
          dateInput.value = first.date;
          dateInput.dispatchEvent(new Event('change'));
          wrap.querySelector('.date-chip').classList.add('active');
        } else {
          var active = wrap.querySelector('.date-chip[data-date="' + chosen + '"]');
          if (active) active.classList.add('active');
        }
      })
      .catch(function () {
        wrap.innerHTML = '';
      });
  }

  function updateDateLabel() {
    var label = document.getElementById('booking-date-label');
    if (!label || !dateInput) return;
    label.textContent = dateInput.value ? formatDateLabel(dateInput.value) : '';
  }

  function loadSlots() {
    var date = dateInput ? dateInput.value : '';
    if (!date || !selectedConsultant) {
      slotList.innerHTML = '<p class="text-sm text-slate-400 col-span-full">Pilih tanggal dan konsultan terlebih dahulu untuk melihat slot waktu.</p>';
      return;
    }
    slotList.innerHTML = '<p class="text-sm text-slate-400 col-span-full">Memuat slot...</p>';
    fetch(BASE + '/slots/' + encodeURIComponent(selectedConsultant) + '/' + encodeURIComponent(date))
      .then(function (r) { return r.json(); })
      .then(function (res) {
        var slots = res.data || [];
        if (!slots.length) {
          slotList.innerHTML = '<p class="text-sm text-slate-400 col-span-full">Tidak ada slot tersedia pada tanggal tersebut. Silakan pilih tanggal lain.</p>';
          return;
        }
        slotList.innerHTML = slots.map(function (s) {
          var label = formatTime(s.starts_at);
          var inputId = 'slot-' + s.id;
          return '<div class="slot-chip relative">' +
            '<input type="radio" id="' + inputId + '" name="time" value="' + s.id + '" data-label="' + label + '" required />' +
            '<label for="' + inputId + '">' + label + '</label></div>';
        }).join('');
      })
      .catch(function () {
        slotList.innerHTML = '<p class="text-sm text-red-500 col-span-full">Gagal memuat slot. Periksa koneksi Anda.</p>';
      });
  }

  if (dateInput) {
    dateInput.addEventListener('change', function () {
      updateDateLabel();
      loadSlots();
    });
  }

  // ======= ISI RINGKASAN DI STEP 4 (dulu tidak pernah terisi) =======
  function setSummary(id, text) {
    var el = document.getElementById(id);
    if (el) el.textContent = text || '-';
  }

  function populateSummary() {
    var service = wizard.querySelector('[name="service"]:checked');
    var consultant = wizard.querySelector('[name="consultant"]:checked');
    var slot = wizard.querySelector('[name="time"]:checked');

    setSummary('summary-service', service ? service.getAttribute('data-label') : null);
    setSummary('summary-consultant', consultant ? consultant.getAttribute('data-label') : null);
    setSummary('summary-date', dateInput && dateInput.value ? formatDateLabel(dateInput.value) : null);
    setSummary('summary-time', slot ? slot.getAttribute('data-label') : null);
    setSummary('summary-name', getVal('client_name'));
    setSummary('summary-company', getVal('company_name'));
    setSummary('summary-email', getVal('email'));
    setSummary('summary-phone', getVal('phone'));
  }

  // Isi ulang ringkasan otomatis setiap kali step 4 ditampilkan,
  // terlepas dari mekanisme navigasi wizard (next/prev) yang dipakai.
  var allSteps = wizard.querySelectorAll('[data-step]');
  var summaryStep = allSteps[allSteps.length - 1];
  if (summaryStep) {
    var summaryObserver = new MutationObserver(function () {
      if (!summaryStep.classList.contains('hidden')) {
        populateSummary();
      }
    });
    summaryObserver.observe(summaryStep, { attributes: true, attributeFilter: ['class'] });
  }

  var turnstileWidget = document.getElementById('turnstile-widget');
  function renderTurnstile() {
    if (!SITE_KEY || !turnstileWidget || !window.turnstile) return false;
    window.turnstile.render(turnstileWidget, {
      sitekey: SITE_KEY,
      callback: function (token) { turnstileToken = token; },
      'expired-callback': function () { turnstileToken = ''; }
    });
    return true;
  }
  if (!renderTurnstile()) {
    var turnstileTries = 0;
    var turnstileTimer = setInterval(function () {
      if (renderTurnstile() || ++turnstileTries > 40) clearInterval(turnstileTimer);
    }, 300);
  }

  var bookingForm = document.getElementById('booking-form');
  if (bookingForm) {
    bookingForm.addEventListener('submit', function (e) {
      e.preventDefault();

      var errorBox = document.getElementById('booking-error');
      errorBox.classList.add('hidden');
      errorBox.textContent = '';

      var slot = wizard.querySelector('[name="time"]:checked');
      if (!slot) { showError('Pilih slot waktu terlebih dahulu.'); return; }

      var consultant = wizard.querySelector('[name="consultant"]:checked');
      if (!consultant) { showError('Pilih konsultan terlebih dahulu.'); return; }

      var service = wizard.querySelector('[name="service"]:checked');

      if (SITE_KEY && !turnstileToken) {
        showError('Selesaikan verifikasi captcha terlebih dahulu.');
        return;
      }

      var payload = {
        schedule_slot_id: slot.value,
        service_id: service ? service.value : null,
        client_name: getVal('client_name'),
        client_email: getVal('email'),
        client_phone: getVal('phone'),
        company_name: getVal('company_name') || null,
        financial_issue_description: getVal('problem') || null,
        source: 'web',
        turnstile_token: SITE_KEY ? turnstileToken : 'dev-test'
      };

      var btn = bookingForm.querySelector('[type="submit"]');
      var original = btn.innerHTML;
      btn.disabled = true;
      btn.innerHTML = 'Mengirim...';

      fetch(BASE, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'Accept': 'application/json',
          'X-CSRF-TOKEN': csrfToken()
        },
        body: JSON.stringify(payload)
      })
        .then(function (r) {
          return r.json().then(function (body) { return { ok: r.ok, body: body }; });
        })
        .then(function (res) {
          if (res.ok) {
            var num = document.getElementById('booking-number');
            if (num) num.textContent = res.body.data.booking_number;
            var success = document.getElementById('booking-success');
            var actions = document.getElementById('booking-actions');
            if (success) success.classList.remove('hidden');
            if (actions) actions.classList.add('hidden');
            if (turnstileWidget) turnstileWidget.classList.add('hidden');
            if (success) success.scrollIntoView({ behavior: 'smooth', block: 'center' });
          } else {
            var msg = (res.body && res.body.message) || 'Terjadi kesalahan. Silakan coba lagi.';
            if (res.body && res.body.errors) {
              var keys = Object.keys(res.body.errors);
              if (keys.length) msg = res.body.errors[keys[0]][0];
            }
            showError(msg);
          }
        })
        .catch(function () {
          showError('Gagal terhubung ke server. Silakan coba lagi.');
        })
        .finally(function () {
          btn.disabled = false;
          btn.innerHTML = original;
        });
    });
  }

  function csrfToken() {
    var meta = document.querySelector('meta[name="csrf-token"]');
    return meta ? meta.getAttribute('content') : '';
  }

  fetch(BASE + '/services')
    .then(function (r) { return r.json(); })
    .then(function (res) { renderServices(res.data || []); })
    .catch(function () {
      serviceList.innerHTML = '<p class="text-sm text-red-500 col-span-full">Gagal memuat layanan.</p>';
    });

  fetch(BASE + '/consultants')
    .then(function (r) { return r.json(); })
    .then(function (res) {
      allConsultants = res.data || [];
      renderConsultantsForService();
    })
    .catch(function () {
      consultantList.innerHTML = '<p class="text-sm text-red-500 col-span-full">Gagal memuat konsultan.</p>';
    });
})();
</script>
@endpush