@extends('layouts.frontend')

@section('title')
Tentang Kami - Drs. Chaeroni & Rekan
@endsection

@section('meta_description')
Kenali Drs. Chaeroni & Rekan - Kantor Akuntan Publik terdaftar di Kementerian Keuangan RI dengan tenaga profesional bersertifikat di Jakarta, Bekasi, dan Semarang.
@endsection

@section('active')
tentang
@endsection

@section('content')

  <!-- ======= PAGE BANNER ======= -->
  <section class="relative bg-brand-950 overflow-hidden">
    <div class="absolute inset-0 z-0">
      <img src="{{ asset('assets/hero/tentang.webp') }}" alt="Tim profesional  Drs. Chaeroni & Rekan" class="w-full h-full object-cover opacity-40" loading="lazy" />
      <div class="absolute inset-0 bg-brand-950/90"></div>
    </div>
    <div class="blob w-[420px] h-[420px] bg-blue-500/20 -top-32 -right-20"></div>
    <div class="blob w-[320px] h-[320px] bg-blue-500/10 bottom-0 -left-24"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-36 pb-20 lg:pt-44 lg:pb-24">
      <nav class="flex items-center gap-2 text-xs text-slate-400 mb-6">
        <a href="{{ route('home') }}" class="hover:text-blue-400 transition">Beranda</a>
        <i class="fa-solid fa-chevron-right text-[12px]"></i>
        <span class="text-slate-200">Tentang Kami</span>
      </nav>
      <div class="max-w-3xl reveal">
        <p class="text-sm font-semibold text-blue-400 uppercase tracking-wider">Tentang Kami</p>
        <h1 class="mt-3 font-heading text-4xl sm:text-5xl font-extrabold text-white leading-tight">Mitra Keuangan yang Dipercaya untuk Mencapai Tujuan Bisnis</h1>
        <p class="mt-5 text-slate-300 text-lg"> Drs. Chaeroni &amp; Rekan - kantor akuntan publik terdaftar di Kementerian Keuangan RI, dengan nilai Meaningful, Competent, dan Integrity.</p>
      </div>
    </div>
  </section>

  <!-- ======= STORY ======= -->
  <section class="py-24 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid lg:grid-cols-2 gap-16 items-center">
        <div class="reveal">
          <p class="text-sm font-semibold text-blue-600 uppercase tracking-wider">Perjalanan Kami</p>
          <h2 class="mt-3 font-heading text-3xl sm:text-4xl font-extrabold text-slate-900 leading-tight">Kantor Akuntan Publik dengan Komitmen Kualitas dan Profesionalisme</h2>
          <p class="mt-5 text-slate-600 leading-relaxed">Kantor Akuntan Publik Drs. Chaeroni & Rekan (MCI) adalah salah satu kantor akuntan publik dan konsultan terpercaya yang berlokasi di Jalan Anggrek Nelimurni, Jakarta Barat yang menyediakan jasa dibidang audit, assurance, non-assurance dan perpajakan untuk berbagai jenis klien seperti korporasi (swasta & BUMN/D), dana pensiun, organisasi nirlaba, rumah sakit, perguruan tinggi dan koperasi.</p>

          <div class="mt-8 grid grid-cols-3 gap-4">
            <div class="rounded-2xl bg-slate-50 border border-slate-100 p-5 text-center">
              <p class="font-heading text-2xl font-bold text-blue-600"><span data-counter="75" data-suffix="+">0</span></p>
              <p class="mt-1 text-xs text-slate-500">Tenaga Profesional</p>
            </div>
            <div class="rounded-2xl bg-slate-50 border border-slate-100 p-5 text-center">
              <p class="font-heading text-2xl font-bold text-blue-600"><span data-counter="14">0</span></p>
              <p class="mt-1 text-xs text-slate-500">Auditor Berpengalaman 5+ Tahun</p>
            </div>
            <div class="rounded-2xl bg-slate-50 border border-slate-100 p-5 text-center">
              <p class="font-heading text-2xl font-bold text-blue-600"><span data-counter="3">0</span></p>
              <p class="mt-1 text-xs text-slate-500">Kantor di Indonesia</p>
            </div>
          </div>
        </div>

        <div class="reveal relative">
          <div class="rounded-3xl bg-brand-900 p-8 sm:p-12">
            <i class="fa-solid fa-quote-left text-[40px] text-blue-400"></i>
            <blockquote class="mt-6 text-lg sm:text-xl text-slate-100 leading-relaxed">
              "Kami membantu klien mencapai tujuan bisnis mereka. Di atas segala keahlian dan pengalaman, integritas adalah fondasi yang tidak pernah kami tawar."
            </blockquote>
            <div class="mt-8 flex items-center gap-4">
              <span class="w-12 h-12 rounded-full bg-blue-700 flex items-center justify-center font-heading font-bold text-white">DC</span>
              <div>
                <p class="font-semibold text-white">Drs. Chaeroni, Ak., CPA</p>
                <p class="text-sm text-slate-400">Managing Partner</p>
              </div>
            </div>
          </div>
          <div class="absolute -bottom-5 -right-4 sm:-right-8 bg-white rounded-2xl shadow-2xl shadow-brand-950/20 p-4 flex items-center gap-3">
            <span class="w-11 h-11 rounded-xl bg-blue-100 flex items-center justify-center">
              <i class="fa-solid fa-book-open text-[20px] text-blue-600"></i>
            </span>
            <div>
              <p class="text-sm font-semibold text-slate-800">Terdaftar Resmi</p>
              <p class="text-xs text-slate-500">Kementerian Keuangan RI - Akuntan Publik Berizin</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="py-24 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <img src="{{ asset('assets/4-1536x864.webp') }}" alt="Gedung kantor  Drs. Chaeroni &amp; Rekan" class="w-full rounded-3xl object-cover" loading="lazy" />
    </div>
  </section>

  <!-- ======= MISSION / VISION / VALUES ======= -->
  <section class="py-24 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid lg:grid-cols-2 gap-6">
        <div class="reveal bg-white rounded-3xl border border-slate-100 overflow-hidden card-hover flex flex-col sm:flex-row items-stretch">
          <img src="{{ asset('assets/skyscraper-office-building-lamp-post-3196390.webp') }}" alt="Gedung kantor  Drs. Chaeroni &amp; Rekan" class="w-full sm:w-48 h-48 sm:h-auto object-cover shrink-0" loading="lazy" />
          <div class="p-8 flex flex-col justify-center">
            <h3 class="font-heading text-xl font-bold text-slate-900">Visi</h3>
            <p class="mt-3 text-slate-600 text-sm leading-relaxed">Menjadi  yang profesional yang bertumpu pada keahlian dan kejujuran serta memiliki kebebasan si mental (Independen).</p>
          </div>
        </div>
        <div class="reveal bg-white rounded-3xl border border-slate-100 overflow-hidden card-hover flex flex-col sm:flex-row items-stretch">
          <img src="{{ asset('assets/teamwork-cooperation-business-3309829.webp') }}" alt="Kerja sama tim profesional  Drs. Chaeroni &amp; Rekan" class="w-full sm:w-48 h-48 sm:h-auto object-cover shrink-0" loading="lazy" />
          <div class="p-8 flex flex-col justify-center">
            <h3 class="font-heading text-xl font-bold text-slate-900">Misi</h3>
            <ol class="mt-3 space-y-2 text-sm text-slate-600">
              <li class="flex items-start gap-2"><strong>1.</strong> Menjadi  yang berperan dalam pembangunan Indonesia serta</li>
              <li class="flex items-start gap-2"><strong>2.</strong> Menjunjung tinggi kebenaran yang tidak berpihak kepada siapapun (Independen) dan</li>
              <li class="flex items-start gap-2"><strong>3.</strong> Senantiasa mengembangkan SDM menjadi tenaga yang berkompeten, profesional, jujur dan ahli.</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ======= TEAM ======= -->
  <section class="py-24 bg-slate-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="max-w-2xl reveal">
        <p class="text-sm font-semibold text-blue-600 uppercase tracking-wider">Tim Kami</p>
        <h2 class="mt-3 font-heading text-3xl sm:text-4xl font-extrabold text-slate-900">Profesional di Balik  Drs. Chaeroni &amp; Rekan</h2>
        <p class="mt-4 text-slate-600">{{ $teamMembers->count() }} tenaga profesional - termasuk auditor senior berpengalaman - di tiga kantor, yang terus memperbarui kompetensinya di tengah perubahan regulasi.</p>
      </div>

      @php
        $bioLimit = 50;
      @endphp

      <div class="mt-12 grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse ($teamMembers as $index => $member)
          @php
            $initials = collect(str_word_count($member->name, 1))->take(2)->map(fn ($w) => strtoupper(mb_substr($w, 0, 1)))->join('');
            $chipStyle = $index % 2 === 0 ? 'bg-blue-100 text-blue-700' : 'bg-blue-50 text-blue-700';
            $bioFull = $member->bio ?? '';
            $bioShort = \Illuminate\Support\Str::limit($bioFull, $bioLimit);
            $bioTruncated = mb_strlen($bioFull) > $bioLimit;
          @endphp
          <div class="reveal group bg-slate-50 border border-slate-100 rounded-3xl p-8 card-hover text-center">
            <span class="mx-auto w-28 h-28 rounded-3xl bg-blue-700 flex items-center justify-center font-heading text-4xl font-bold text-white">{{ $initials }}</span>
            <h3 class="mt-6 font-heading text-xl font-bold text-slate-900">{{ $member->name }}</h3>
            <p class="text-sm text-slate-500 mt-1">{{ $member->position }}</p>
            <p class="mt-4 text-sm text-slate-600 leading-relaxed">{{ $bioShort }}</p>
            @if ($bioTruncated)
              <button
                type="button"
                class="team-bio-trigger mt-2 text-sm font-semibold text-blue-600 hover:text-blue-700 transition"
                data-name="{{ $member->name }}"
                data-position="{{ $member->position }}"
                data-initials="{{ $initials }}"
                data-bio="{{ $bioFull }}"
              >Baca selengkapnya</button>
            @endif
            @if (is_array($member->certifications) && count($member->certifications))
              <div class="mt-5 flex items-center justify-center gap-2 flex-wrap text-xs">
                @foreach ($member->certifications as $cert)
                  <span class="{{ $chipStyle }} px-3 py-1 rounded-full font-medium">{{ $cert }}</span>
                @endforeach
              </div>
            @endif
          </div>
        @empty
          @php
            $fallbackMembers = [
              [
                'initials' => 'DC',
                'name' => 'Drs. Chaeroni',
                'position' => 'Managing Partner · Ak., CPA',
                'bio' => 'Berpengalaman lebih dari 25 tahun di bidang audit, perpajakan, dan konsultasi bisnis. Berkomitmen menghadirkan layanan yang profesional, kompeten, dan berintegritas.',
                'certs' => ['Audit', 'Strategi'],
                'chip' => 'bg-blue-100 text-blue-700',
              ],
              [
                'initials' => 'SR',
                'name' => 'Siti Rahmawati',
                'position' => 'Partner Audit · CA',
                'bio' => 'Memimpin tim audit untuk 100+ klien korporasi, spesialis sektor manufaktur & properti.',
                'certs' => ['Audit', 'SAK'],
                'chip' => 'bg-blue-50 text-blue-700',
              ],
              [
                'initials' => 'BS',
                'name' => 'Budi Santoso',
                'position' => 'Kepala Perpajakan · BKP',
                'bio' => 'Ahli pajak dengan rekam jejak penanganan pemeriksaan & keberatan senilai miliaran rupiah.',
                'certs' => ['PPh', 'PPN', 'Sengketa'],
                'chip' => 'bg-blue-50 text-blue-700',
              ],
              [
                'initials' => 'DL',
                'name' => 'Dewi Lestari',
                'position' => 'Senior Auditor · CA',
                'bio' => 'Berpengalaman lebih dari 8 tahun menangani audit laporan keuangan berbagai sektor industri.',
                'certs' => ['Audit', 'SAK'],
                'chip' => 'bg-blue-50 text-blue-700',
              ],
              [
                'initials' => 'RH',
                'name' => 'Rizky Hidayat',
                'position' => 'Senior Konsultan Bisnis · CPA',
                'bio' => 'Spesialis financial modelling, valuasi, dan pendampingan pengembangan usaha.',
                'certs' => ['Strategi', 'Modelling'],
                'chip' => 'bg-blue-50 text-blue-700',
              ],
              [
                'initials' => 'MP',
                'name' => 'Maya Puspita',
                'position' => 'Konsultan Perpajakan · BKP',
                'bio' => 'Menangani kepatuhan pajak bulanan hingga SPT Tahunan untuk klien lintas sektor.',
                'certs' => ['PPh', 'PPN'],
                'chip' => 'bg-blue-50 text-blue-700',
              ],
            ];
          @endphp

          @foreach ($fallbackMembers as $member)
            @php
              $bioFull = $member['bio'];
              $bioShort = \Illuminate\Support\Str::limit($bioFull, $bioLimit);
              $bioTruncated = mb_strlen($bioFull) > $bioLimit;
            @endphp
            <div class="reveal group bg-slate-50 border border-slate-100 rounded-3xl p-8 card-hover text-center">
              <span class="mx-auto w-28 h-28 rounded-3xl bg-blue-700 flex items-center justify-center font-heading text-4xl font-bold text-white">{{ $member['initials'] }}</span>
              <h3 class="mt-6 font-heading text-xl font-bold text-slate-900">{{ $member['name'] }}</h3>
              <p class="text-sm text-slate-500 mt-1">{{ $member['position'] }}</p>
              <p class="mt-4 text-sm text-slate-600 leading-relaxed">{{ $bioShort }}</p>
              @if ($bioTruncated)
                <button
                  type="button"
                  class="team-bio-trigger mt-2 text-sm font-semibold text-blue-600 hover:text-blue-700 transition"
                  data-name="{{ $member['name'] }}"
                  data-position="{{ $member['position'] }}"
                  data-initials="{{ $member['initials'] }}"
                  data-bio="{{ $bioFull }}"
                >Baca selengkapnya</button>
              @endif
              <div class="mt-5 flex items-center justify-center gap-2 flex-wrap text-xs">
                @foreach ($member['certs'] as $cert)
                  <span class="{{ $member['chip'] }} px-3 py-1 rounded-full font-medium">{{ $cert }}</span>
                @endforeach
              </div>
            </div>
          @endforeach
        @endforelse
      </div>
    </div>
  </section>

  <!-- ======= TEAM BIO MODAL ======= -->
  <div id="team-bio-modal" class="hidden fixed inset-0 z-50">
    <div id="team-bio-backdrop" class="absolute inset-0 bg-slate-950/60 backdrop-blur-sm"></div>
    <div class="relative h-full flex items-end sm:items-center justify-center p-0 sm:p-4">
      <div class="relative bg-white w-full sm:max-w-md sm:rounded-3xl rounded-t-3xl shadow-2xl max-h-[85vh] flex flex-col">
        <button
          type="button"
          id="team-bio-close"
          class="absolute top-4 right-4 w-9 h-9 rounded-full bg-slate-100 hover:bg-slate-200 transition flex items-center justify-center text-slate-500"
          aria-label="Tutup"
        >
          <i class="fa-solid fa-xmark text-[16px]"></i>
        </button>
        <div class="p-8 pt-10 overflow-y-auto">
          <span id="team-bio-avatar" class="mx-auto w-20 h-20 rounded-3xl bg-blue-700 flex items-center justify-center font-heading text-2xl font-bold text-white"></span>
          <h3 id="team-bio-name" class="mt-5 font-heading text-xl font-bold text-slate-900 text-center"></h3>
          <p id="team-bio-position" class="text-sm text-slate-500 mt-1 text-center"></p>
          <p id="team-bio-full" class="mt-5 text-sm text-slate-600 leading-relaxed"></p>
        </div>
      </div>
    </div>
  </div>

  <!-- ======= CERTIFICATIONS ======= -->
  <section class="py-20 bg-brand-950 relative overflow-hidden">
    <div class="blob w-96 h-96 bg-blue-500/15 -top-24 right-0"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center reveal">
        <h2 class="font-heading text-3xl sm:text-4xl font-extrabold text-white">Terdaftar & Berlisensi Resmi</h2>
        <p class="mt-4 text-slate-400 max-w-xl mx-auto">Kepatuhan dan profesionalisme kami diakui oleh lembaga resmi.</p>
      </div>
      <div class="mt-12 flex justify-center flex-wrap gap-6 reveal">
        <div class="w-full sm:w-64 rounded-2xl bg-white/5 border border-white/10 p-6 text-center hover:bg-white/10 transition-colors">
          <div class="h-16 w-full flex items-center justify-center">
            <div class="bg-white rounded-xl shadow-sm px-5 py-3 inline-flex items-center justify-center max-h-16">
              <img src="{{ asset('assets/logo/logo-kemenkeu.webp') }}" alt="Logo Kementerian Keuangan RI" class="max-h-10 max-w-[140px] w-auto object-contain" loading="lazy" />
            </div>
          </div>
          <p class="mt-4 font-heading font-bold text-white">KEMENTERIAN KEUANGAN RI</p>
          <p class="mt-2 text-xs text-slate-400">Akuntan Publik Berizin</p>
        </div>
        <div class="w-full sm:w-64 rounded-2xl bg-white/5 border border-white/10 p-6 text-center hover:bg-white/10 transition-colors">
          <div class="h-16 w-full flex items-center justify-center">
            <div class="bg-white rounded-xl shadow-sm px-5 py-3 inline-flex items-center justify-center max-h-16">
              <img src="{{ asset('assets/logo/logo-ojk.webp') }}" alt="Logo OJK" class="max-h-10 max-w-[140px] w-auto object-contain" loading="lazy" />
            </div>
          </div>
          <p class="mt-4 font-heading font-bold text-white">OJK</p>
          <p class="mt-2 text-xs text-slate-400">Terdaftar di Otoritas Jasa Keuangan</p>
        </div>
        <div class="w-full sm:w-64 rounded-2xl bg-white/5 border border-white/10 p-6 text-center hover:bg-white/10 transition-colors">
          <div class="h-16 w-full flex items-center justify-center">
            <div class="bg-white rounded-xl shadow-sm px-5 py-3 inline-flex items-center justify-center max-h-16">
              <img src="{{ asset('assets/logo/logo-bpk.webp') }}" alt="Logo BPK" class="max-h-10 max-w-[140px] w-auto object-contain" loading="lazy" />
            </div>
          </div>
          <p class="mt-4 font-heading font-bold text-white">BPK</p>
          <p class="mt-2 text-xs text-slate-400">Rekanan Badan Pemeriksa Keuangan</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ======= CTA ======= -->
  <section class="relative bg-blue-800 overflow-hidden">
    <div class="blob w-96 h-96 bg-white/10 -top-24 -right-24"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 text-center reveal">
      <h2 class="font-heading text-3xl sm:text-4xl font-extrabold text-white leading-tight max-w-3xl mx-auto">Mari Berkenalan dengan Tim Kami</h2>
      <p class="mt-4 text-blue-50 max-w-xl mx-auto">Jadwalkan konsultasi gratis dan rasakan sendiri cara kerja kami.</p>
      <div class="mt-8 flex flex-col sm:flex-row justify-center gap-4">
        <a href="{{ route('booking') }}" class="inline-flex items-center justify-center gap-2 rounded-full bg-white text-blue-700 font-semibold px-8 py-4 transition hover:bg-blue-50 shadow-xl">
          Reservasi Gratis
          <i class="fa-solid fa-arrow-right text-[16px]"></i>
        </a>
      </div>
    </div>
  </section>

  @push('scripts')
  <script>
    (function () {
      'use strict';

      var modal = document.getElementById('team-bio-modal');
      var backdrop = document.getElementById('team-bio-backdrop');
      var closeBtn = document.getElementById('team-bio-close');
      if (!modal || !backdrop || !closeBtn) return;

      var avatarEl = document.getElementById('team-bio-avatar');
      var nameEl = document.getElementById('team-bio-name');
      var positionEl = document.getElementById('team-bio-position');
      var bioEl = document.getElementById('team-bio-full');

      function openModal(trigger) {
        avatarEl.textContent = trigger.getAttribute('data-initials') || '';
        nameEl.textContent = trigger.getAttribute('data-name') || '';
        positionEl.textContent = trigger.getAttribute('data-position') || '';
        bioEl.textContent = trigger.getAttribute('data-bio') || '';

        modal.classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
        closeBtn.focus();
      }

      function closeModal() {
        modal.classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
      }

      document.querySelectorAll('.team-bio-trigger').forEach(function (btn) {
        btn.addEventListener('click', function () {
          openModal(btn);
        });
      });

      closeBtn.addEventListener('click', closeModal);
      backdrop.addEventListener('click', closeModal);

      document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
          closeModal();
        }
      });
    })();
    </script>
  @endpush
@endsection