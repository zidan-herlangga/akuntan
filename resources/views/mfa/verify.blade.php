<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Verifikasi 2FA -  Drs. Chaeroni & Rekan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { background-color: #0f172a; }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center px-4">
    <div class="w-full max-w-md bg-white rounded-2xl shadow-xl p-8">
        <h1 class="font-heading text-2xl font-bold text-slate-900">Verifikasi Dua Faktor</h1>
        <p class="mt-2 text-sm text-slate-600">Masukkan kode 6 digit dari aplikasi authenticator Anda.</p>

        @if ($errors->any())
            <div class="mt-4 rounded-lg bg-red-50 border border-red-100 p-4 text-sm text-red-700">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('mfa.verify.submit') }}" class="mt-6 space-y-4">
            @csrf
            <input
                type="text"
                name="code"
                inputmode="numeric"
                autocomplete="one-time-code"
                placeholder="000000"
                required
                class="w-full rounded-xl border border-slate-200 px-4 py-3 text-center text-2xl tracking-[0.5em] focus:border-blue-600 focus:outline-none"
            />
            <button type="submit" class="w-full rounded-full bg-blue-600 hover:bg-blue-500 text-white font-semibold py-3 transition">
                Verifikasi
            </button>
        </form>

        <a href="{{ route('mfa.setup') }}" class="mt-4 inline-block text-xs text-blue-600 hover:text-blue-500">
            Belum mengatur 2FA? Setup di sini
        </a>
    </div>
</body>
</html>
