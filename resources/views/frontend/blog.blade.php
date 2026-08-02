@extends('layouts.frontend')

@section('title')
    Blog & Artikel — Drs. Chaeroni & Rekan
@endsection

@section('meta_description')
    Artikel seputar audit, perpajakan, dan pengelolaan keuangan bisnis dari tim profesional Drs. Chaeroni & Rekan.
@endsection

@section('active')
    blog
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
                <span class="text-slate-200">Blog</span>
            </nav>
            <div class="max-w-3xl reveal">
                <p class="text-sm font-semibold text-blue-400 uppercase tracking-wider">Blog & Artikel</p>
                <h1 class="mt-3 font-heading text-4xl sm:text-5xl font-extrabold text-white leading-tight">Wawasan Akuntansi
                    & Pajak Terkini</h1>
                <p class="mt-5 text-slate-300 text-lg">Informasi praktis dari konsultan kami untuk membantu Anda mengambil
                    keputusan keuangan yang lebih baik.</p>
            </div>
        </div>
    </section>

    <!-- ======= FEATURED + GRID ======= -->
    @php
        use Illuminate\Support\Str;
        $featured = $articles->first();
        $gridArticles = $articles->slice(1);
        $gradients = [
            'from-blue-700 to-slate-900',
            'from-blue-600 to-slate-900',
            'from-blue-900 to-slate-950',
            'from-blue-800 to-slate-950',
            'from-blue-700 to-slate-950',
            'from-slate-600 to-slate-900',
        ];
        $formatBlogDate = fn($date) => $date ? $date->isoFormat('D MMMM YYYY') : '';
        $blogInitials = fn($text) => collect(str_word_count($text, 1))
            ->take(2)
            ->map(fn($w) => strtoupper(mb_substr($w, 0, 1)))
            ->join('');
        $readingMinutes = fn($body) => max(1, (int) round(str_word_count(strip_tags($body ?? '')) / 200));
    @endphp

    <section class="py-20 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-[1fr_340px] gap-10">

                <div class="order-2 lg:order-1">
                    @if ($activeCategory)
                        <div class="mb-6 flex items-center justify-between gap-4 reveal">
                            <h2 class="font-heading text-xl font-bold text-slate-900">Kategori: <span
                                    class="text-blue-600">{{ $activeCategory }}</span></h2>
                            <a href="{{ route('blog') }}"
                                class="shrink-0 inline-flex items-center gap-2 text-sm font-semibold text-blue-600 hover:text-blue-700 transition">Tampilkan
                                semua<i class="fa-solid fa-arrow-right text-[12px]"></i></a>
                        </div>
                    @endif

                    @if ($featured)
                        <a href="/blog/{{ $featured->slug }}"
                            class="reveal group bg-white rounded-3xl border border-slate-100 overflow-hidden card-hover grid lg:grid-cols-2">
                            <div class="h-64 lg:h-auto relative overflow-hidden">
                                @if ($featured->image_url)
                                    <img src="{{ $featured->image_url }}" alt="{{ $featured->title }}"
                                        class="absolute inset-0 w-full h-full object-cover transition duration-500 group-hover:scale-105" />
                                    <div class="absolute inset-0 bg-gradient-to-br from-blue-950/60 to-slate-950/70"></div>
                                @else
                                    <div class="absolute inset-0 bg-gradient-to-br from-blue-700 to-slate-900"></div>
                                    <span
                                        class="absolute inset-0 flex items-center justify-center font-heading text-white font-bold text-3xl tracking-wide">{{ $blogInitials($featured->title) }}</span>
                                @endif
                                <span
                                    class="absolute top-5 left-5 bg-white/20 backdrop-blur text-white text-xs font-semibold px-3 py-1 rounded-full">Terbaru</span>
                            </div>
                            <div class="p-8 sm:p-12 flex flex-col justify-center">
                                <div class="flex flex-wrap items-center gap-3 text-xs text-slate-500">
                                    <span
                                        class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full font-semibold">{{ $featured->category }}</span>
                                    <span>{{ $formatBlogDate($featured->published_at) }}</span>
                                    <span>· {{ $readingMinutes($featured->body) }} menit baca</span>
                                </div>
                                <h2
                                    class="mt-5 font-heading text-2xl sm:text-3xl font-extrabold text-slate-900 leading-tight group-hover:text-blue-600 transition">
                                    {{ $featured->title }}</h2>
                                <p class="mt-4 text-slate-600 leading-relaxed">{{ Str::limit($featured->excerpt, 50) }}</p>
                                <span class="mt-6 inline-flex items-center gap-2 text-sm font-semibold text-blue-600">
                                    Baca selengkapnya
                                    <i class="fa-solid fa-arrow-right text-[16px] transition group-hover:translate-x-1"></i>
                                </span>
                            </div>
                        </a>
                    @elseif (! $activeCategory)
                        <a href="/blog/contoh-artikel"
                            class="reveal group bg-white rounded-3xl border border-slate-100 overflow-hidden card-hover grid lg:grid-cols-2">
                            <div class="h-64 lg:h-auto relative overflow-hidden">
                                <div class="absolute inset-0 bg-gradient-to-br from-blue-700 to-slate-900"></div>
                                <span
                                    class="absolute inset-0 flex items-center justify-center font-heading text-white font-bold text-3xl tracking-wide">{{ $blogInitials('Cara Menghitung PPh 21 Terbaru 2026') }}</span>
                                <span
                                    class="absolute top-5 left-5 bg-white/20 backdrop-blur text-white text-xs font-semibold px-3 py-1 rounded-full">Terbaru</span>
                            </div>
                            <div class="p-8 sm:p-12 flex flex-col justify-center">
                                <div class="flex flex-wrap items-center gap-3 text-xs text-slate-500">
                                    <span
                                        class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full font-semibold">Perpajakan</span>
                                    <span>1 Januari 2026</span>
                                    <span>· 7 menit baca</span>
                                </div>
                                <h2
                                    class="mt-5 font-heading text-2xl sm:text-3xl font-extrabold text-slate-900 leading-tight group-hover:text-blue-600 transition">
                                    Cara Menghitung PPh 21 Terbaru 2026</h2>
                                <p class="mt-4 text-slate-600 leading-relaxed">Panduan lengkap menghitung PPh 21 dengan
                                    metode tarif efektif rata-rata (TER) terbaru untuk karyawan.</p>
                                <span class="mt-6 inline-flex items-center gap-2 text-sm font-semibold text-blue-600">
                                    Baca selengkapnya
                                    <i class="fa-solid fa-arrow-right text-[16px] transition group-hover:translate-x-1"></i>
                                </span>
                            </div>
                        </a>
                    @endif

                    <div class="mt-10 grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @forelse ($gridArticles as $index => $article)
                            <article
                                class="reveal group bg-white rounded-3xl border border-slate-100 overflow-hidden card-hover flex flex-col">
                                <div class="h-44 relative overflow-hidden">
                                    @if ($article->image_url)
                                        <img src="{{ $article->image_url }}" alt="{{ $article->title }}"
                                            class="absolute inset-0 w-full h-full object-cover transition duration-500 group-hover:scale-105" />
                                    @else
                                        <div
                                            class="absolute inset-0 bg-gradient-to-br {{ $gradients[$index % count($gradients)] }}">
                                        </div>
                                        <span
                                            class="absolute inset-0 flex items-center justify-center font-heading text-white font-bold text-xl tracking-wide">{{ $blogInitials($article->title) }}</span>
                                    @endif
                                </div>
                                <div class="p-7 flex flex-col flex-1">
                                    <div class="flex flex-wrap items-center gap-3 text-xs text-slate-500">
                                        <span
                                            class="bg-blue-50 text-blue-700 px-3 py-1 rounded-full font-semibold">{{ $article->category }}</span>
                                        <span>{{ $formatBlogDate($article->published_at) }}</span>
                                        <span>· {{ $readingMinutes($article->body) }} menit baca</span>
                                    </div>
                                    <a href="/blog/{{ $article->slug }}"
                                        class="mt-4 font-heading text-lg font-bold text-slate-900 leading-snug group-hover:text-blue-600 transition">{{ $article->title }}</a>
                                    <p class="mt-3 text-sm text-slate-600 leading-relaxed">{{ Str::limit($article->excerpt, 40) }}</p>
                                    <a href="/blog/{{ $article->slug }}"
                                        class="mt-auto pt-5 inline-flex items-center gap-1.5 text-sm font-semibold text-blue-600">Baca
                                        artikel
                                        <i class="fa-solid fa-arrow-right text-[16px]"></i>
                                    </a>
                                </div>
                            </article>
                        @empty
                            <p class="text-slate-500 text-center col-span-full">Belum ada artikel yang tersedia.</p>
                        @endforelse
                    </div>

                    <div class="mt-12 text-center reveal">
                        <button
                            class="inline-flex items-center gap-2 rounded-full border-2 border-slate-200 text-slate-700 font-semibold px-8 py-3.5 transition hover:border-blue-600 hover:text-blue-600">
                            Muat Artikel Lainnya
                            <i class="fa-solid fa-chevron-down text-[16px]"></i>
                        </button>
                    </div>
                </div>

                <aside class="order-1 lg:order-2 space-y-8">
                    <div class="reveal rounded-3xl bg-white border border-slate-100 p-8">
                        <h3 class="font-heading font-bold text-slate-900">Kategori</h3>
                        <ul class="mt-5 space-y-3 text-sm">
                            <li>
                                <a href="{{ route('blog') }}"
                                    class="flex items-center justify-between {{ $activeCategory ? 'text-slate-600 hover:text-blue-600' : 'text-blue-600 font-semibold' }} transition"><span>Semua</span><span
                                        class="text-xs text-slate-400">{{ $totalArticles }}</span></a>
                            </li>
                            @forelse ($categories as $category)
                                <li><a href="{{ route('blog', ['category' => $category['name']]) }}"
                                        class="flex items-center justify-between {{ $activeCategory === $category['name'] ? 'text-blue-600 font-semibold' : 'text-slate-600 hover:text-blue-600' }} transition"><span>{{ $category['name'] }}</span><span
                                            class="text-xs text-slate-400">{{ $category['count'] }}</span></a></li>
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
                                        <p
                                            class="mt-1 text-sm font-semibold text-slate-800 group-hover:text-blue-600 transition leading-snug">
                                            {{ $item->title }}</p>
                                    </a>
                                </li>
                            @empty
                                <li class="text-sm text-slate-500">Belum ada artikel.</li>
                            @endforelse
                        </ul>
                    </div>

                    <div class="reveal rounded-3xl bg-brand-950 p-8 text-center">
                        <p class="font-heading text-lg font-bold text-white">Konsultasi Gratis 30 Menit</p>
                        <p class="mt-2 text-sm text-slate-400">Bahas masalah pajak atau akuntansi Anda bersama ahli kami.
                        </p>
                        <a href="{{ route('booking') }}"
                            class="mt-5 inline-flex justify-center items-center gap-2 rounded-full bg-blue-600 hover:bg-blue-500 text-white font-semibold px-6 py-3 text-sm transition">
                            Reservasi
                            <i class="fa-solid fa-arrow-right text-[16px]"></i>
                        </a>
                    </div>
                </aside>

            </div>
        </div>
    </section>

    <!-- ======= NEWSLETTER ======= -->
    <section class="py-24 bg-brand-950 relative overflow-hidden">
        <div class="blob w-96 h-96 bg-blue-500/15 -top-24 left-1/4"></div>
        <div class="relative max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center reveal">
            <h2 class="font-heading text-3xl sm:text-4xl font-extrabold text-white">Dapatkan Wawasan Keuangan Tiap Bulan
            </h2>
            <p class="mt-4 text-slate-400">Ringkasan regulasi pajak terbaru dan tips akuntansi praktis langsung ke inbox
                Anda.</p>
            <form class="mt-8 flex flex-col sm:flex-row gap-3 max-w-lg mx-auto" data-fake-submit="newsletter-success">
                <label for="newsletter-email" class="sr-only">Alamat email</label>
                <input id="newsletter-email" type="email" name="email" required placeholder="Alamat email Anda"
                    class="field-input bg-white/10 border-white/20 text-white placeholder-slate-400 flex-1" />
                <button type="submit"
                    class="rounded-full bg-blue-600 hover:bg-blue-500 text-white font-semibold px-8 py-3.5 transition shrink-0">Berlangganan</button>
            </form>
            <p id="newsletter-success" class="hidden mt-4 text-sm text-blue-400">Terima kasih! Anda berhasil berlangganan.
            </p>
        </div>
    </section>
@endsection