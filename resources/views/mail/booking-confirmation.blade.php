<x-mail::message>
# Konfirmasi Reservasi

Halo **{{ $booking->client_name }}**,

Reservasi konsultasi Anda telah kami terima dan sedang menunggu konfirmasi dari tim kami.

**Detail Reservasi**

- **Nomor Reservasi:** {{ $booking->booking_number }}
- **Konsultan:** {{ $consultant->name ?? '-' }}
- **Layanan:** {{ $service->title ?? 'Konsultasi Umum' }}
- **Tanggal:** {{ $booking->starts_at->timezone($consultant->timezone ?? 'Asia/Jakarta')->format('d M Y') }}
- **Waktu:** {{ $booking->starts_at->timezone($consultant->timezone ?? 'Asia/Jakarta')->format('H:i') }} – {{ $booking->ends_at->timezone($consultant->timezone ?? 'Asia/Jakarta')->format('H:i') }} WIB

Kami akan menghubungi Anda melalui WhatsApp untuk konfirmasi jadwal dan tautan meeting.

Salam,
** Drs. Chaeroni & Rekan**
</x-mail::message>
