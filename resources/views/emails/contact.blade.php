<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan Kontak Baru</title>
    <style>
        /* Mobile Breakpoint Optimizations */
        @media screen and (max-width: 600px) {
            .email-container { width: 100% !important; padding: 12px !important; }
            .card-body { padding: 20px 16px !important; }
            .col-half { display: block !important; width: 100% !important; padding-right: 0 !important; }
        }
    </style>
</head>
<body style="margin: 0; padding: 0; background-color: #f1f5f9; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%;">

    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="background-color: #f1f5f9; padding: 40px 0;">
        <tr>
            <td align="center">
                <!-- Wrapper Container (Max-Width 640px untuk proporsi Desktop yang Pas) -->
                <table class="email-container" border="0" cellpadding="0" cellspacing="0" width="640" style="width: 640px; max-width: 640px; background-color: #ffffff; border-radius: 12px; border: 1px solid #e2e8f0; border-top: 5px solid #2563eb; overflow: hidden; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);">
                    
                    <!-- Header -->
                    <tr>
                        <td class="card-body" style="padding: 28px 32px 20px 32px; border-bottom: 1px solid #f1f5f9;">
                            <div style="font-size: 12px; font-weight: 700; color: #2563eb; text-transform: uppercase; letter-spacing: 0.08em; margin-bottom: 4px;">Notifikasi Inbound</div>
                            <h1 style="margin: 0; font-size: 20px; font-weight: 700; color: #0f172a; line-height: 1.2;">Pesan Kontak Baru dari Website</h1>
                        </td>
                    </tr>
                    
                    <!-- Content Body -->
                    <tr>
                        <td class="card-body" style="padding: 28px 32px;">
                            
                            <!-- Grid 2 Kolom untuk Data Pengirim (Efisien di Desktop) -->
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td class="col-half" width="50%" valign="top" style="padding-right: 12px; padding-bottom: 20px;">
                                        <div style="font-size: 11px; font-weight: 700; color: #64748b; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 4px;">Nama Lengkap</div>
                                        <div style="font-size: 14px; color: #0f172a; font-weight: 600;">{{ $data['name'] }}</div>
                                    </td>
                                    <td class="col-half" width="50%" valign="top" style="padding-bottom: 20px;">
                                        <div style="font-size: 11px; font-weight: 700; color: #64748b; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 4px;">Perusahaan</div>
                                        <div style="font-size: 14px; color: #0f172a; font-weight: 500;">{{ $data['company'] ?: '-' }}</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-half" width="50%" valign="top" style="padding-right: 12px; padding-bottom: 20px;">
                                        <div style="font-size: 11px; font-weight: 700; color: #64748b; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 4px;">Email</div>
                                        <div style="font-size: 14px;">
                                            <a href="mailto:{{ $data['email'] }}" style="color: #2563eb; text-decoration: none; font-weight: 500;">{{ $data['email'] }}</a>
                                        </div>
                                    </td>
                                    <td class="col-half" width="50%" valign="top" style="padding-bottom: 20px;">
                                        <div style="font-size: 11px; font-weight: 700; color: #64748b; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 4px;">No. Telepon / WhatsApp</div>
                                        <div style="font-size: 14px;">
                                            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $data['phone']) }}" target="_blank" style="color: #0d9488; text-decoration: none; font-weight: 500;">{{ $data['phone'] }} ↗</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="padding-bottom: 24px;">
                                        <div style="font-size: 11px; font-weight: 700; color: #64748b; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 4px;">Topik</div>
                                        <div style="font-size: 14px; color: #0f172a; font-weight: 600;">{{ $data['topic'] }}</div>
                                    </td>
                                </tr>
                            </table>

                            <!-- Section Pesan -->
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td>
                                        <div style="font-size: 11px; font-weight: 700; color: #64748b; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 8px;">Pesan dari Pengirim</div>
                                        <div style="font-size: 14px; color: #334155; background-color: #f8fafc; border-left: 4px solid #2563eb; border-top: 1px solid #e2e8f0; border-right: 1px solid #e2e8f0; border-bottom: 1px solid #e2e8f0; border-radius: 0 6px 6px 0; padding: 16px; line-height: 1.6;">{!! nl2br(e($data['message'])) !!}</div>
                                    </td>
                                </tr>
                            </table>

                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="padding: 20px 32px; background-color: #f8fafc; border-top: 1px solid #f1f5f9; text-align: center;">
                            <p style="margin: 0; font-size: 12px; color: #64748b;">Email otomatis ini dikirim oleh sistem formulir kontak website.</p>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>

</body>
</html>