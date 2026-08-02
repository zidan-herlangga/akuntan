@extends('layouts.frontend')

@php
  $articleTitle = $article ? $article->title : 'Cara Menghitung PPh 21 Terbaru 2026: Panduan Lengkap untuk HR & Finance';
  $articleMeta = $article ? $article->excerpt : 'Panduan lengkap menghitung PPh 21 dengan metode tarif efektif, contoh kasus, dan kesalahan umum yang sering terjadi.';
  $formatBlogDate = fn ($date) => $date ? $date->isoFormat('D MMMM YYYY') : '';
  $blogInitials = fn ($text) => collect(str_word_count($text, 1))->take(2)->map(fn ($w) => strtoupper(mb_substr($w, 0, 1)))->join('');
  $readingMinutes = fn ($body) => max(1, (int) round(str_word_count(strip_tags($body ?? '')) / 200));
@endphp

@section('title')
{{ $articleTitle }} — Blog Drs. Chaeroni & Rekan
@endsection

@section('meta_description')
{{ $articleMeta }}
@endsection

@section('active')
blog
@endsection

@section('content')

  <!-- ======= ARTICLE HERO ======= -->
  <section class="relative bg-brand-950 overflow-hidden">
    <div class="blob w-[420px] h-[420px] bg-blue-500/20 -top-32 -right-20"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-36 pb-16 lg:pt-44 lg:pb-20">
      <nav class="flex items-center gap-2 text-xs text-slate-400 mb-6">
        <a href="/" class="hover:text-blue-400 transition">Beranda</a>
        <i class="fa-solid fa-chevron-right text-[12px]"></i>
        <a href="/blog" class="hover:text-blue-400 transition">Blog</a>
        <i class="fa-solid fa-chevron-right text-[12px]"></i>
        <span class="text-slate-200">Artikel</span>
      </nav>
      <div class="max-w-3xl reveal">
        <div class="flex flex-wrap items-center gap-3 text-xs">
          @if ($article?->category)
            <span class="bg-blue-500/15 border border-blue-500/30 text-blue-300 px-3 py-1 rounded-full font-semibold">{{ $article->category }}</span>
          @endif
          <span class="text-slate-400">{{ $formatBlogDate($article?->published_at) }}</span>
          @if ($article)
            <span class="text-slate-400">· {{ $readingMinutes($article->body) }} menit baca</span>
          @endif
        </div>
        <h1 class="mt-5 font-heading text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white leading-tight">{{ $articleTitle }}</h1>
      </div>
    </div>
  </section>

  <!-- ======= ARTICLE BODY ======= -->
  <section class="py-20 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid lg:grid-cols-3 gap-10">

        <div class="lg:col-span-2">
          @if ($article)
            <div class="rounded-3xl bg-white border border-slate-100 p-6 sm:p-10 lg:p-12 shadow-sm">
            @if ($article->image_url)
              <figure class="mb-10 reveal">
                <img src="{{ $article->image_url }}" alt="{{ $article->title }}" class="w-full h-64 sm:h-80 lg:h-96 object-cover rounded-3xl shadow-lg shadow-slate-900/10" />
              </figure>
            @endif

            <article class="prose prose-lg max-w-none
              [&_h2]:mt-12 [&_h2]:mb-4 [&_h2]:font-heading [&_h2]:text-2xl [&_h2]:font-bold [&_h2]:text-slate-900 sm:[&_h2]:text-3xl
              [&_h3]:mt-10 [&_h3]:mb-3 [&_h3]:font-heading [&_h3]:text-xl [&_h3]:font-bold [&_h3]:text-slate-900 sm:[&_h3]:text-2xl
              [&_h4]:mt-8 [&_h4]:mb-3 [&_h4]:font-heading [&_h4]:text-lg [&_h4]:font-bold [&_h4]:text-slate-900
              [&_p]:mt-4 [&_p]:text-slate-700 [&_p]:leading-relaxed
              [&_ul]:mt-5 [&_ul]:list-none [&_ul]:pl-0 [&_ul]:space-y-3 [&_ul]:text-slate-700
              [&_ul_li]:relative [&_ul_li]:pl-7 [&_ul_li]:before:absolute [&_ul_li]:before:left-0 [&_ul_li]:before:top-[0.15em] [&_ul_li]:before:content-['✓'] [&_ul_li]:before:text-blue-500 [&_ul_li]:before:font-bold
              [&_ul_ul]:mt-3 [&_ul_ul]:space-y-2 [&_ul_ul]:pl-6
              [&_ul_ul_li]:before:content-['•'] [&_ul_ul_li]:before:font-normal [&_ul_ul_li]:before:text-slate-400
              [&_ol]:mt-5 [&_ol]:list-decimal [&_ol]:pl-5 [&_ol]:space-y-2 [&_ol]:text-slate-700
              [&_ol_li]:marker:font-bold [&_ol_li]:marker:text-blue-600
              [&_strong]:font-semibold [&_strong]:text-slate-900
              [&_a]:font-semibold [&_a]:text-blue-600 [&_a]:underline [&_a]:underline-offset-4 [&_a:hover]:text-blue-700
              [&_img]:h-auto [&_img]:w-full [&_img]:object-cover [&_img]:rounded-2xl [&_img]:shadow-lg [&_img]:shadow-slate-900/5
              [&_blockquote]:mt-6 [&_blockquote]:rounded-r-2xl [&_blockquote]:border-l-4 [&_blockquote]:border-blue-500 [&_blockquote]:bg-slate-50 [&_blockquote]:px-6 [&_blockquote]:py-5 [&_blockquote]:text-slate-600
              [&_blockquote_p]:mt-0
              [&_code]:rounded-md [&_code]:bg-slate-100 [&_code]:px-1.5 [&_code]:py-0.5 [&_code]:font-mono [&_code]:text-[0.875em] [&_code]:text-rose-600
              [&_pre]:relative [&_pre]:mt-6 [&_pre]:overflow-x-auto [&_pre]:rounded-2xl [&_pre]:bg-slate-950 [&_pre]:p-5 [&_pre]:pt-11 [&_pre]:text-sm [&_pre]:leading-relaxed
              [&_pre_code]:bg-transparent [&_pre_code]:p-0 [&_pre_code]:text-slate-100
              [&_table]:mt-6 [&_table]:block [&_table]:w-full [&_table]:overflow-x-auto [&_table]:whitespace-nowrap [&_table]:text-sm [&_table]:text-slate-700
              [&_th]:border [&_th]:border-slate-200 [&_th]:bg-slate-50 [&_th]:px-4 [&_th]:py-3 [&_th]:font-heading [&_th]:font-bold [&_th]:text-left [&_th]:text-slate-900
              [&_td]:border [&_td]:border-slate-200 [&_td]:px-4 [&_td]:py-3 [&_td]:align-top
              [&_hr]:my-10 [&_hr]:border-slate-200">
              {!! $article->body !!}
            </article>

            <div class="mt-10 rounded-3xl bg-gradient-to-br from-blue-800 to-slate-900 p-8 flex flex-col sm:flex-row items-center justify-between gap-6">
              <div>
                <p class="font-heading text-xl font-bold text-white">Butuh bantuan pajak?</p>
                <p class="mt-1 text-sm text-blue-50">Konsultasikan kebutuhan pajak Anda secara gratis.</p>
              </div>
              <a href="/reservasi" class="inline-flex items-center gap-2 rounded-full bg-white text-blue-700 font-semibold px-6 py-3 text-sm hover:bg-blue-50 transition shrink-0">
                Reservasi Konsultasi
                <i class="fa-solid fa-arrow-right text-[16px]"></i>
              </a>
            </div>

            <div class="mt-10 flex items-center gap-4 rounded-2xl bg-slate-50 border border-slate-100 p-6">
              <span class="w-14 h-14 rounded-2xl bg-gradient-to-br from-blue-700 to-slate-900 flex items-center justify-center text-white">
                <i class="fa-solid fa-landmark text-xl"></i>
              </span>
              <div>
                <p class="font-heading font-bold text-slate-900">Tim Drs. Chaeroni & Rekan</p>
                <p class="text-sm text-slate-500">Kantor Akuntan Publik — Audit, Perpajakan, dan Konsultasi Bisnis</p>
              </div>
            </div>
            </div>
          @else
            <div class="rounded-3xl bg-white border border-slate-100 p-6 sm:p-10 lg:p-12 shadow-sm">
              <article class="prose prose-lg max-w-none
              [&_h2]:mt-12 [&_h2]:mb-4 [&_h2]:font-heading [&_h2]:text-2xl [&_h2]:font-bold [&_h2]:text-slate-900 sm:[&_h2]:text-3xl
              [&_h3]:mt-10 [&_h3]:mb-3 [&_h3]:font-heading [&_h3]:text-xl [&_h3]:font-bold [&_h3]:text-slate-900 sm:[&_h3]:text-2xl
              [&_p]:mt-4 [&_p]:text-slate-700 [&_p]:leading-relaxed
              [&_ul]:mt-5 [&_ul]:list-none [&_ul]:pl-0 [&_ul]:space-y-3 [&_ul]:text-slate-700
              [&_ul_li]:relative [&_ul_li]:pl-7 [&_ul_li]:before:absolute [&_ul_li]:before:left-0 [&_ul_li]:before:top-[0.15em] [&_ul_li]:before:content-['✓'] [&_ul_li]:before:text-blue-500 [&_ul_li]:before:font-bold
              [&_strong]:font-semibold [&_strong]:text-slate-900
              [&_a]:font-semibold [&_a]:text-blue-600 [&_a]:underline [&_a]:underline-offset-4 [&_a:hover]:text-blue-700">
                <p>Panduan lengkap menghitung PPh 21 dengan metode tarif efektif rata-rata (TER) terbaru untuk karyawan. Artikel ini membahas langkah demi langkah perhitungan beserta contoh kasus yang mudah dipahami.</p>
                <h2>Dasar Pengenaan PPh 21</h2>
                <p>PPh 21 dihitung berdasarkan penghasilan bruto yang telah dikurangi biaya jabatan, iuran pensiun, dan penghasilan tidak kena pajak (PTKP). Pastikan data status dan tanggungan karyawan selalu diperbarui.</p>
                <h2>Metode Tarif Efektif Rata-rata (TER)</h2>
                <p>Dengan skema tarif efektif rata-rata, perhitungan PPh 21 menjadi lebih sederhana. Gunakan kategori TER yang sesuai dengan golongan penghasilan serta status dan jumlah tanggungan karyawan.</p>
                <h2>Kesalahan Umum yang Sering Terjadi</h2>
                <ul>
                  <li>Salah menentukan kategori TER karyawan</li>
                  <li>Tidak memperbarui status PTKP</li>
                  <li>Keliru menghitung biaya jabatan dan iuran pensiun</li>
                </ul>
                <p>Untuk hasil perhitungan yang akurat, konsultasikan dengan konsultan pajak kami.</p>
              </article>

              <div class="mt-10 flex items-center gap-4 rounded-2xl bg-slate-50 border border-slate-100 p-6">
                <span class="w-14 h-14 rounded-2xl bg-gradient-to-br from-blue-700 to-slate-900 flex items-center justify-center text-white">
                  <i class="fa-solid fa-landmark text-xl"></i>
                </span>
                <div>
                  <p class="font-heading font-bold text-slate-900">Tim Drs. Chaeroni & Rekan</p>
                  <p class="text-sm text-slate-500">Kantor Akuntan Publik — Audit, Perpajakan, dan Konsultasi Bisnis</p>
                </div>
              </div>
            </div>
          @endif
        </div>

        <!-- ======= SIDEBAR ======= -->
        <aside class="space-y-8">
          <div class="reveal rounded-3xl bg-white border border-slate-100 p-8">
            <h3 class="font-heading font-bold text-slate-900">Kategori</h3>
            <ul class="mt-5 space-y-3 text-sm">
              @forelse ($categories as $category)
                <li><a href="{{ route('blog', ['category' => $category['name']]) }}" class="flex items-center justify-between text-slate-600 hover:text-blue-600 transition"><span>{{ $category['name'] }}</span><span class="text-xs text-slate-400">{{ $category['count'] }}</span></a></li>
              @empty
                <li class="text-slate-500 text-center">Belum ada kategori yang tersedia.</li>
              @endforelse
            </ul>
          </div>

          <div class="reveal rounded-3xl bg-white border border-slate-100 p-8">
            <h3 class="font-heading font-bold text-slate-900">Artikel Terbaru</h3>
            <ul class="mt-5 space-y-5">
              @forelse ($latest as $item)
                <li>
                  <a href="/blog/{{ $item->slug }}" class="group block">
                    <p class="text-xs text-slate-400">{{ $formatBlogDate($item->published_at) }}</p>
                    <p class="mt-1 text-sm font-semibold text-slate-800 group-hover:text-blue-600 transition leading-snug">{{ $item->title }}</p>
                  </a>
                </li>
              @empty
                <li class="text-sm text-slate-500">Belum ada artikel terbaru.</li>
              @endforelse
            </ul>
          </div>

          <div class="reveal rounded-3xl bg-brand-950 p-8 text-center">
            <p class="font-heading text-lg font-bold text-white">Konsultasi Gratis 30 Menit</p>
            <p class="mt-2 text-sm text-slate-400">Bahas masalah pajak atau akuntansi Anda bersama ahli kami.</p>
            <a href="{{ route('booking') }}" class="mt-5 inline-flex justify-center items-center gap-2 rounded-full bg-blue-600 hover:bg-blue-500 text-white font-semibold px-6 py-3 text-sm transition">
              Reservasi
              <i class="fa-solid fa-arrow-right text-[16px]"></i>
            </a>
          </div>
        </aside>
      </div>
    </div>
  </section>

  <!-- ======= RELATED ======= -->
  <section class="py-20 bg-slate-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <h2 class="font-heading text-2xl sm:text-3xl font-extrabold text-slate-900 reveal">Artikel Terkait</h2>
      <div class="mt-10 grid md:grid-cols-3 gap-6">
        @forelse ($related as $item)
          <a href="/blog/{{ $item->slug }}" class="reveal group bg-white rounded-3xl border border-slate-100 overflow-hidden card-hover flex flex-col">
            <div class="h-40 relative overflow-hidden">
              @if ($item->image_url)
                <img src="{{ $item->image_url }}" alt="{{ $item->title }}" class="absolute inset-0 w-full h-full object-cover transition duration-500 group-hover:scale-105" />
              @else
                <div class="absolute inset-0 bg-gradient-to-br from-blue-600 to-slate-900"></div>
                <span class="absolute inset-0 flex items-center justify-center font-heading text-white font-bold text-xl tracking-wide">{{ $blogInitials($item->title) }}</span>
              @endif
            </div>
            <div class="p-7 flex flex-col flex-1">
              <div class="flex flex-wrap items-center gap-3 text-xs text-slate-500">
                <span class="bg-blue-50 text-blue-700 px-3 py-1 rounded-full font-semibold">{{ $item->category }}</span>
                <span>{{ $formatBlogDate($item->published_at) }}</span>
              </div>
              <h3 class="mt-4 font-heading text-base font-bold text-slate-900 leading-snug group-hover:text-blue-600 transition">{{ $item->title }}</h3>
            </div>
          </a>
        @empty
          <p class="text-slate-500 text-center col-span-full">Belum ada artikel terkait.</p>
        @endforelse
      </div>
    </div>
  </section>

  <!-- ======= COPY BUTTON UNTUK CODE BLOCK ======= -->
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      document.querySelectorAll('article pre').forEach(function (pre) {
        var button = document.createElement('button');
        button.type = 'button';
        button.textContent = 'Salin';
        button.className = 'copy-code-btn absolute top-3 right-3 text-xs font-semibold px-3 py-1.5 rounded-lg bg-white/10 text-slate-200 hover:bg-white/20 transition';
        pre.appendChild(button);

        button.addEventListener('click', function () {
          var codeEl = pre.querySelector('code');
          var text = codeEl ? codeEl.innerText : pre.innerText;

          navigator.clipboard.writeText(text).then(function () {
            var original = button.textContent;
            button.textContent = 'Tersalin!';
            button.classList.add('bg-blue-600', 'text-white');
            setTimeout(function () {
              button.textContent = original;
              button.classList.remove('bg-blue-600', 'text-white');
            }, 2000);
          }).catch(function () {
            button.textContent = 'Gagal menyalin';
            setTimeout(function () {
              button.textContent = 'Salin';
            }, 2000);
          });
        });
      });
    });
  </script>
@endsection