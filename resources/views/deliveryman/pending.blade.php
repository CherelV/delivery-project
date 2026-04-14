<!DOCTYPE html>
<html lang="en">
<head>
    <title>Account Pending · PopDelivery</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: sans-serif;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            min-height: 100vh;
            padding: 2rem 1rem;
            background: #f5f6fa;
        }
        .card { background: #fff; border-radius: 16px; padding: 2.5rem 2rem; max-width: 520px; width: 100%; box-shadow: 0 10px 40px rgba(0,0,0,0.08); }
        .icon-circle { display: inline-flex; align-items: center; justify-content: center; width: 56px; height: 56px; border-radius: 50%; background: #e8f5e9; margin-bottom: 1rem; }
        .section-header { font-size: 12px; font-weight: 600; color: #185FA5; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 0.75rem; }
        .info-box { background: #e8f2fc; border: 1px solid #b5d4f4; border-radius: 10px; padding: 1rem 1.25rem; margin-bottom: 1.5rem; }
        .info-row { display: flex; gap: 10px; align-items: flex-start; margin-bottom: 10px; }
        .info-row:last-child { margin-bottom: 0; }
        .info-row svg { flex-shrink: 0; margin-top: 2px; }
        .info-title { font-size: 13px; font-weight: 600; color: #1a1a1a; margin-bottom: 2px; }
        .info-sub { font-size: 12px; color: #6b7280; }
        .doc-list { display: flex; flex-direction: column; gap: 8px; margin-bottom: 1.5rem; }
        .doc-item { display: flex; align-items: flex-start; gap: 10px; padding: 10px 12px; background: #f9fafb; border-radius: 8px; }
        .doc-item svg { flex-shrink: 0; margin-top: 2px; }
        .doc-name { font-size: 13px; font-weight: 600; color: #1a1a1a; margin-bottom: 2px; }
        .doc-hint { font-size: 12px; color: #6b7280; }
        .warning-box { background: #fffbeb; border: 1px solid #fcd34d; border-radius: 8px; padding: 10px 12px; margin-bottom: 1.5rem; display: flex; gap: 8px; align-items: flex-start; }
        .warning-box p { font-size: 12px; color: #92400e; line-height: 1.6; }
        .btn { display: inline-block; background: #3B6FE8; color: #fff; padding: 10px 28px; border-radius: 8px; text-decoration: none; font-size: 14px; font-weight: 500; }
    </style>
</head>
<body>
<div class="card">

    {{-- Header --}}
    <div style="text-align:center; margin-bottom:1.5rem;">
        <div class="icon-circle">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M20 6L9 17l-5-5" stroke="#3B6D11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </div>
        <h2 style="font-size:18px; font-weight:600; margin-bottom:0.5rem;">Registration received</h2>
        <p style="font-size:14px; color:#6b7280; line-height:1.6;">Your application has been submitted. You are invited for an interview before your account is activated.</p>
    </div>

    {{-- Interview details --}}
    <div class="info-box">
        <p class="section-header">Interview details</p>
        <div class="info-row">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z" stroke="#185FA5" stroke-width="1.5"/><circle cx="12" cy="9" r="2.5" stroke="#185FA5" stroke-width="1.5"/></svg>
            <div>
                <p class="info-title">Glotelho office</p>
                <p class="info-sub">Akwa Carrefour Soudanaise, Glotelho, Douala</p>
            </div>
        </div>
        <div class="info-row">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none"><rect x="3" y="4" width="18" height="18" rx="2" stroke="#185FA5" stroke-width="1.5"/><path d="M16 2v4M8 2v4M3 10h18" stroke="#185FA5" stroke-width="1.5" stroke-linecap="round"/></svg>
            <div>
                <p class="info-title">Date &amp; time</p>
                <p class="info-sub">On the 09 - 05 - 2026 at 08 am</p>
            </div>
        </div>
    </div>

    {{-- Documents --}}
    <p class="section-header">Documents to bring on interview day</p>
    <div class="doc-list">
        @php
        $documents = [
            ['name' => 'National ID card or  passport',    'hint' => 'Valid, non-expired — original + 1 photocopy'],
            ['name' => "Driver's license",                'hint' => 'Category A or B — valid and non-expired'],
            ['name' => 'Vehicle registration (grey card)','hint' => 'For motorcycle or vehicle used for deliveries'],
            ['name' => 'Vehicle insurance certificate',   'hint' => 'Current and valid insurance for your delivery vehicle'],
            ['name' => 'Proof of address',                'hint' => 'Utility bill or official mail dated within last 3 months'],
            ['name' => 'Recent picture',           'hint' => '2 identical 4x4 photos, white background'],
            ['name' => 'Criminal record certificate',     'hint' => 'Issued by competent authority, dated within 3 months'],
        ];
        @endphp
        @foreach($documents as $doc)
        <div class="doc-item">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z" stroke="#185FA5" stroke-width="1.5"/><polyline points="14 2 14 8 20 8" stroke="#185FA5" stroke-width="1.5"/></svg>
            <div>
                <p class="doc-name">{{ $doc['name'] }}</p>
                <p class="doc-hint">{{ $doc['hint'] }}</p>
            </div>
        </div>
        @endforeach
    </div>

    {{-- Warning --}}
    <div class="warning-box">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" style="flex-shrink:0; margin-top:2px;"><path d="M12 9v4M12 17h.01M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z" stroke="#854F0B" stroke-width="1.5" stroke-linecap="round"/></svg>
        <p>Missing documents will delay your onboarding. Please bring originals and photocopies of all items listed above.</p>
    </div>

    {{-- CTA --}}
    <div style="text-align:center;">
        <a href="{{ route('login') }}" class="btn">Back to login</a>
    </div>

</div>
</body>
</html>

