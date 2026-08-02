<x-mail::message>
# Reservasi Dikonfirmasi

Halo **{{ $booking->client_name }}**,

Kabar baik! Reservasi konsultasi Anda telah **dikonfirmasi** oleh tim Drs. Chaeroni & Rekan.

<x-mail::panel>
### Detail Reservasi

* **Nomor Reservasi:** `{{ $booking->booking_number }}`
* **Konsultan:** {{ $consultant->name ?? '-' }}
* **Layanan:** {{ $service->title ?? 'Konsultasi Umum' }}
* **Tanggal:** {{ $booking->starts_at->timezone($consultant->timezone ?? 'Asia/Jakarta')->translatedFormat('d F Y') }}
* **Waktu:** {{ $booking->starts_at->timezone($consultant->timezone ?? 'Asia/Jakarta')->format('H:i') }} - {{ $booking->ends_at->timezone($consultant->timezone ?? 'Asia/Jakarta')->format('H:i') }} {{ $consultant->timezone_abbr ?? 'WIB' }}
</x-mail::panel>

@if ($booking->meeting_link)
Tautan pertemuan (Google Meet) untuk konsultasi Anda:
[{{ $booking->meeting_link }}]({{ $booking->meeting_link }})
@else
Tautan pertemuan (Google Meet) akan kami kirimkan melalui WhatsApp menjelang jadwal konsultasi.
@endif

Jika Anda memiliki pertanyaan mendesak, silakan balas email ini.

<x-mail::panel>
Salam hangat,<br>
**Drs. Chaeroni & Rekan**
</x-mail::panel>
</x-mail::message>
