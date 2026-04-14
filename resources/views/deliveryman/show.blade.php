<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivery Man #{{ $delivery_man->id }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg: #f0f4ff;
            --card: #ffffff;
            --navy: #0f1f5c;
            --accent: #2563eb;
            --accent-hover: #1d4ed8;
            --accent-light: #eff6ff;
            --text: #0f172a;
            --muted: #64748b;
            --border: #e2e8f0;
            --danger: #ef4444;
            --success: #10b981;
            --warning: #f59e0b;
            --radius: 1rem;
            --shadow: 0 4px 32px rgba(37,99,235,0.10);
        }
        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: var(--bg);
            background-image: radial-gradient(ellipse at 70% 10%, rgba(37,99,235,0.10) 0%, transparent 60%),
                              radial-gradient(ellipse at 10% 90%, rgba(99,102,241,0.08) 0%, transparent 50%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 1rem;
            color: var(--text);
        }

        .card {
            width: 100%;
            max-width: 560px;
            background: var(--card);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            overflow: hidden;
            animation: slideUp 0.4s cubic-bezier(.22,.68,0,1.2);
        }
        @keyframes slideUp {
            from { opacity: 0; transform: translateY(28px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        /* ── Header ── */
        .card-header {
            background: linear-gradient(135deg, var(--navy) 0%, #1e3a8a 60%, #2563eb 100%);
            padding: 2rem 2.25rem 1.75rem;
            position: relative;
            overflow: hidden;
        }
        .card-header::after {
            content: '';
            position: absolute;
            bottom: -40px; left: -20px;
            width: 160px; height: 160px;
            border-radius: 50%;
            background: rgba(99,102,241,0.15);
        }

        .header-top {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 1rem;
        }

        .avatar {
            width: 52px; height: 52px;
            border-radius: 50%;
            background: rgba(147,197,253,0.2);
            border: 2px solid rgba(147,197,253,0.35);
            color: #93c5fd;
            font-size: 1.35rem;
            font-weight: 800;
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
        }

        .header-info { flex: 1; }
        .card-header h1 { font-size: 1.45rem; font-weight: 800; color: #fff; margin-bottom: 0.1rem; }
        .card-header .sub { color: rgba(255,255,255,0.5); font-size: 0.8rem; }

        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.35rem;
            padding: 0.3rem 0.75rem;
            border-radius: 2rem;
            font-size: 0.72rem;
            font-weight: 700;
            letter-spacing: 0.04em;
            text-transform: uppercase;
            flex-shrink: 0;
            margin-top: 0.2rem;
        }
        .status-badge::before {
            content: '';
            display: inline-block;
            width: 7px; height: 7px;
            border-radius: 50%;
            background: currentColor;
        }
        .badge--approved { background: rgba(16,185,129,0.18); color: #34d399; }
        .badge--pending  { background: rgba(245,158,11,0.18);  color: #fbbf24; }
        .badge--rejected { background: rgba(239,68,68,0.18);   color: #f87171; }

        /* ── Body ── */
        .card-body { padding: 1.5rem 2.25rem 2rem; }

        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0.85rem;
            margin-bottom: 1.5rem;
        }

        .info-item {
            background: #f8fafc;
            border: 1px solid var(--border);
            border-radius: 0.75rem;
            padding: 0.85rem 1rem;
        }
        .info-item.full-width { grid-column: 1 / -1; }
        .info-item .ii-label {
            font-size: 0.65rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.07em;
            color: var(--muted);
            margin-bottom: 0.3rem;
        }
        .info-item .ii-value {
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--text);
        }
        .info-item .ii-value.mono {
            font-family: 'Courier New', monospace;
            font-size: 0.82rem;
            color: var(--accent);
        }
        .null-val { color: #cbd5e1; font-weight: 400; }

        /* ── Vehicle strip ── */
        .vehicle-strip {
            display: flex;
            align-items: center;
            gap: 0;
            padding: 1rem 2.25rem;
            background: var(--accent-light);
            border-top: 1px solid #dbeafe;
            border-bottom: 1px solid #dbeafe;
            margin: 0 -2.25rem 1.5rem;
        }
        .vehicle-strip .vs-item { flex: 1; }
        .vehicle-strip .vs-label {
            font-size: 0.62rem; font-weight: 700;
            text-transform: uppercase; letter-spacing: 0.07em;
            color: var(--accent); margin-bottom: 0.15rem;
        }
        .vehicle-strip .vs-value {
            font-size: 0.85rem; font-weight: 700; color: var(--navy);
        }
        .vs-divider { width: 1px; height: 36px; background: #bfdbfe; margin: 0 1.25rem; flex-shrink: 0; }

        .btn {
            display: block; width: 100%;
            padding: 0.85rem 1rem;
            border-radius: 0.75rem;
            border: none;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 0.9rem; font-weight: 700;
            cursor: pointer; transition: all 0.2s;
            text-align: center; text-decoration: none;
            color: #fff;
        }
        .btn-primary { background: var(--accent); }
        .btn-primary:hover {
            background: var(--accent-hover);
            box-shadow: 0 4px 18px rgba(37,99,235,0.38);
            transform: translateY(-1px);
        }
    </style>
</head>
<body>
<div class="card">
    <div class="card-header">
        <div class="header-top">
            <div class="avatar">{{ strtoupper(substr($delivery_man->user->name, 0, 1)) }}</div>
            <div class="header-info">
                <h1>{{ $delivery_man->user->name }}</h1>
                <p class="sub">{{ $delivery_man->user->email }}</p>
            </div>
            <span class="status-badge badge--{{ $delivery_man->status ?? 'pending' }}">
                {{ $delivery_man->status ?? 'pending' }}
            </span>
        </div>
    </div>

    <div class="vehicle-strip">
        <div class="vs-item">
            <div class="vs-label">Vehicle</div>
            <div class="vs-value">{{ $delivery_man->vehicle_type ?? '—' }}</div>
        </div>
        <div class="vs-divider"></div>
        <div class="vs-item">
            <div class="vs-label">Plate</div>
            <div class="vs-value">{{ $delivery_man->number_plate ?? '—' }}</div>
        </div>
        <div class="vs-divider"></div>
        <div class="vs-item">
            <div class="vs-label">Class</div>
            <div class="vs-value">{{ $delivery_man->license_class ?? '—' }}</div>
        </div>
    </div>

    <div class="card-body">
        <div class="info-grid">
            <div class="info-item">
                <div class="ii-label">Mobile</div>
                <div class="ii-value">
                    @if(filled($delivery_man->user->mobile))
                        {{ $delivery_man->user->mobile }}
                    @else
                        <span class="null-val">—</span>
                    @endif
                </div>
            </div>
            <div class="info-item">
                <div class="ii-label">National ID</div>
                <div class="ii-value">
                    @if(filled($delivery_man->user->national_id))
                        {{ $delivery_man->user->national_id }}
                    @else
                        <span class="null-val">—</span>
                    @endif
                </div>
            </div>
            <div class="info-item full-width">
                <div class="ii-label">Address</div>
                <div class="ii-value">
                    @if(filled($delivery_man->user->address))
                        {{ $delivery_man->user->address }}
                    @else
                        <span class="null-val">—</span>
                    @endif
                </div>
            </div>
            <div class="info-item full-width">
                <div class="ii-label">License Number</div>
                <div class="ii-value">{{ $delivery_man->license_number ?? '—' }}</div>
            </div>
        </div>

        <a href="/delivery-man/{{ $delivery_man->id }}/edit" class="btn btn-primary">Edit Delivery Man</a>
    </div>
</div>
</body>
</html>
