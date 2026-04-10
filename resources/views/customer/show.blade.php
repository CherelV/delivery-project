<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer #{{ $customer->id }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg: #f5f3ff;
            --card: #ffffff;
            --navy: #1e1250;
            --accent: #7c3aed;
            --accent-light: #ede9fe;
            --text: #1e1250;
            --muted: #6b7280;
            --border: #e5e7eb;
            --radius: 1rem;
            --shadow: 0 4px 32px rgba(124,58,237,0.10);
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
            max-width: 520px;
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

        .card-header {
            background: var(--navy);
            padding: 2rem 2.25rem 1.75rem;
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            gap: 1.25rem;
        }
        .card-header::after {
            content: '';
            position: absolute;
            right: -20px; bottom: -20px;
            width: 110px; height: 110px;
            border-radius: 50%;
            background: var(--accent);
            opacity: 0.12;
        }

        .avatar {
            width: 56px; height: 56px;
            border-radius: 50%;
            background: rgba(167,139,250,0.2);
            color: #a78bfa;
            font-size: 1.3rem;
            font-weight: 800;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            position: relative;
            z-index: 1;
        }

        .header-info { position: relative; z-index: 1; }
        .header-info h1 { font-size: 1.35rem; font-weight: 800; color: #fff; margin-bottom: 0.15rem; }
        .header-info p { color: rgba(255,255,255,0.45); font-size: 0.8rem; }

        .id-badge {
            display: inline-block;
            background: rgba(167,139,250,0.2);
            color: #a78bfa;
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 0.06em;
            border-radius: 0.4rem;
            padding: 0.15rem 0.55rem;
            margin-top: 0.35rem;
        }

        .card-body { padding: 1.5rem 2.25rem 2rem; }

        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .info-item {
            background: #f8f5ff;
            border: 1px solid #ede9fe;
            border-radius: 0.75rem;
            padding: 0.85rem 1rem;
        }
        .info-item.full { grid-column: 1 / -1; }

        .ii-label {
            font-size: 0.65rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.07em;
            color: var(--muted);
            margin-bottom: 0.3rem;
        }
        .ii-value {
            font-size: 0.88rem;
            font-weight: 600;
            color: var(--text);
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
            background: var(--accent);
        }
        .btn:hover {
            background: #6d28d9;
            box-shadow: 0 4px 14px rgba(124,58,237,0.35);
            transform: translateY(-1px);
        }
    </style>
</head>
<body>
<div class="card">
    <div class="card-header">
        <div class="avatar">{{ strtoupper(substr($customer->user->name, 0, 1)) }}</div>
        <div class="header-info">
            <h1>{{ $customer->user->name }}</h1>
            <p>Customer profile</p>
            <span class="id-badge">ID #{{ $customer->id }}</span>
        </div>
    </div>

    <div class="card-body">
        <div class="info-grid">
            <div class="info-item full">
                <div class="ii-label">Email</div>
                <div class="ii-value">{{ $customer->user->email }}</div>
            </div>

            <div class="info-item">
                <div class="ii-label">Mobile</div>
                <div class="ii-value">
                    @if (filled($customer->user->mobile))
                        {{ $customer->user->mobile }}
                    @else
                        —
                    @endif
                </div>
            </div>

            <div class="info-item">
                <div class="ii-label">National ID</div>
                <div class="ii-value">
                    @if (filled($customer->user->national_id))
                        {{ $customer->user->national_id }}
                    @else
                        —
                    @endif
                </div>
            </div>

            <div class="info-item full">
                <div class="ii-label">Address</div>
                <div class="ii-value">
                    @if (filled($customer->user->address))
                        {{ $customer->user->address }}
                    @else
                        —
                    @endif
                </div>
            </div>
        </div>

        <a href="/customers/{{ $customer->id }}/edit" class="btn">Edit Customer</a>
    </div>
</div>
</body>
</html>
