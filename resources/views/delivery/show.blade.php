<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivery #{{ $delivery['id'] }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg: #f1f5f9;
            --card: #ffffff;
            --navy: #0f172a;
            --accent: #f97316;
            --accent-light: #fff7ed;
            --text: #0f172a;
            --muted: #64748b;
            --border: #e2e8f0;
            --danger: #ef4444;
            --success: #10b981;
            --warning: #f59e0b;
            --radius: 1rem;
            --shadow: 0 4px 32px rgba(0,0,0,0.09);
        }
        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: var(--bg);
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
            animation: slideUp 0.4s ease;
        }
        @keyframes slideUp {
            from { opacity: 0; transform: translateY(20px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        /* ── Dynamic header based on status ── */
        .card-header {
            background: var(--navy);
            padding: 2rem 2.25rem 1.75rem;
            position: relative;
            overflow: hidden;
        }
        .card-header::before {
            content: '';
            position: absolute;
            bottom: -30px; right: -30px;
            width: 120px; height: 120px;
            border-radius: 50%;
            opacity: 0.08;
        }
        .status--pending   .card-header::before { background: var(--warning); }
        .status--completed .card-header::before { background: var(--success); }
        .status--canceled  .card-header::before { background: var(--danger);  }

        .card-header-top {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 1rem;
        }
        .card-header h1 { font-size: 1.5rem; font-weight: 800; color: #fff; margin-bottom: 0.15rem; }
        .card-header p  { color: rgba(255,255,255,0.45); font-size: 0.8rem; }

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
        .badge--pending   { background: rgba(245,158,11,0.18); color: #fbbf24; }
        .badge--completed { background: rgba(16,185,129,0.18); color: #34d399; }
        .badge--canceled  { background: rgba(239,68,68,0.18);  color: #f87171; }

        /* ── Route strip ── */
        .route-strip {
            display: flex;
            align-items: center;
            gap: 0;
            padding: 1.1rem 2.25rem;
            background: #f8fafc;
            border-bottom: 1px solid var(--border);
        }
        .route-point {
            flex: 1;
        }
        .route-point .rp-label {
            font-size: 0.65rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.07em;
            color: var(--muted);
            margin-bottom: 0.2rem;
        }
        .route-point .rp-name {
            font-size: 0.88rem;
            font-weight: 600;
            color: var(--text);
        }
        .route-arrow {
            padding: 0 1rem;
            color: var(--accent);
            font-size: 1.25rem;
            flex-shrink: 0;
        }

        /* ── Body grid ── */
        .card-body { padding: 1.5rem 2.25rem 2rem; }

        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
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
        .info-item .ii-value.fee {
            font-size: 1.15rem;
            color: var(--accent);
            font-weight: 800;
        }

        .avatar-row {
            display: flex;
            align-items: center;
            gap: 0.6rem;
        }
        .mini-avatar {
            width: 30px; height: 30px;
            border-radius: 50%;
            background: var(--accent-light);
            color: var(--accent);
            font-size: 0.75rem;
            font-weight: 700;
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
        }

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
            background: #ea6c0a;
            box-shadow: 0 4px 14px rgba(249,115,22,0.38);
            transform: translateY(-1px);
        }
    </style>
</head>
<body>
<div class="card status--{{ $delivery['status'] }}">
    <div class="card-header">
        <div class="card-header-top">
            <div>
                <h1>Delivery {{ $delivery['id'] }}</h1>
                <p>{{ $delivery['delivered_on'] }}</p>
            </div>
            <span class="status-badge badge--{{ $delivery['status'] }}">{{ $delivery['status'] }}</span>
        </div>
    </div>

    <div class="route-strip">
        <div class="route-point">
            <div class="rp-label">From</div>
            <div class="rp-name">
                @if (filled($delivery->departureAddress))
                    {{ $delivery->departureAddress->name }}
                @else
                    —
                @endif
            </div>
        </div>
        <div class="route-arrow">→</div>
        <div class="route-point" style="text-align:right">
            <div class="rp-label">To</div>
            <div class="rp-name">
                @if (filled($delivery->destinationAddress))
                    {{ $delivery->destinationAddress->name }}
                @else
                    —
                @endif
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="info-grid">
            <div class="info-item">
                <div class="ii-label">Customer</div>
                <div class="ii-value">
                    <div class="avatar-row">
                        <div class="mini-avatar">{{ strtoupper(substr($delivery->customer->user->name, 0, 1)) }}</div>
                        {{ $delivery->customer->user->name }}
                    </div>
                </div>
            </div>
            <div class="info-item">
                <div class="ii-label">Delivery Man</div>
                <div class="ii-value">
                    <div class="avatar-row">
                        <div class="mini-avatar">{{ strtoupper(substr($delivery->deliveryMan->user->name, 0, 1)) }}</div>
                        {{ $delivery->deliveryMan->user->name }}
                    </div>
                </div>
            </div>
            <div class="info-item">
                <div class="ii-label">Fee</div>
                <div class="ii-value fee">{{ number_format($delivery['fee']) }} XAF</div>
            </div>
            <div class="info-item">
                <div class="ii-label">Status</div>
                <div class="ii-value">
                    <span class="status-badge badge--{{ $delivery['status'] }}" style="font-size:0.7rem;padding:0.2rem 0.6rem;">
                        {{ $delivery['status'] }}
                    </span>
                </div>
            </div>
        </div>

        <a href="/delivery-list/{{ $delivery->id }}/edit" class="btn btn-primary">Edit Delivery</a>
    </div>
</div>
</body>
</html>
