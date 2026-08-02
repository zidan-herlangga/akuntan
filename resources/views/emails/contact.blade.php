<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Pesan Kontak Baru</title>
    <style>
        body { font-family: Arial, Helvetica, sans-serif; color: #1e293b; line-height: 1.6; }
        .box { max-width: 600px; margin: 0 auto; padding: 24px; border: 1px solid #e2e8f0; border-radius: 12px; }
        h1 { font-size: 18px; color: #0f172a; margin-top: 0; }
        .row { margin-bottom: 12px; }
        .label { font-size: 12px; font-weight: bold; color: #64748b; text-transform: uppercase; letter-spacing: .05em; }
        .value { font-size: 14px; margin-top: 2px; }
    </style>
</head>
<body>
    <div class="box">
        <h1>Pesan Kontak Baru dari Website</h1>
        <div class="row">
            <div class="label">Nama Leng</div>
            <div class="value">{{ $data['name'] }}</div>
        </div>
        <div class="row">
            <div class="label">Email</div>
            <div class="value">{{ $data['email'] }}</div>
        </div>
        <div class="row">
            <div class="label">No. Telepon / WhatsApp</div>
            <div class="value">{{ $data['phone'] }}</div>
        </div>
        <div class="row">
            <div class="label">Perusahaan</div>
            <div class="value">{{ $data['company'] ?: '-' }}</div>
        </div>
        <div class="row">
            <div class="label">Topik</div>
            <div class="value">{{ $data['topic'] }}</div>
        </div>
        <div class="row">
            <div class="label">Pesan</div>
            <div class="value">{!! nl2br(e($data['message'])) !!}</div>
        </div>
    </div>
</body>
</html>
