<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PopDelivery — @yield('title')</title>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;600&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet">

    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --sidebar-w: 220px;
            --header-h: 60px;
            --bg: #f4f5f7;
            --sidebar-bg: white;
            --sidebar-text: #140032;
            --sidebar-text-active: #ffffff;
            --sidebar-accent: #3b6fea;
            --sidebar-hover-bg: rgba(19, 71, 193, 0.12);
            --sidebar-active-bg: rgba(59,111,234,0.18);
            --card-bg: #ffffff;
            --border: #e4e7ed;
            --text-primary: #111827;
            --text-secondary: #6b7280;
            --accent: #3b6fea;
            --accent-light: #eef2fd;
            --radius: 8px;
            --shadow: 0 1px 3px rgba(0,0,0,0.07), 0 1px 2px rgba(0,0,0,0.04);
            --shadow-md: 0 4px 12px rgba(0,0,0,0.08);
        }

        body {
            font-family: 'DM Sans', sans-serif;
            font-size: 13.5px;
            background-color: var(--bg);
            color: var(--text-primary);
            margin-left: var(--sidebar-w);
            padding-top: calc(var(--header-h) + 28px);
            padding-right: 28px;
            padding-bottom: 60px;
            padding-left: 28px;
            min-height: 100vh;
        }

        a { color: inherit; text-decoration: none; outline: none; }

        /* ── SIDEBAR ── */
        .sidebar {
            position: fixed;
            left: 0; top: 0; bottom: 0;
            width: var(--sidebar-w);
            background: var(--sidebar-bg);
            display: flex;
            flex-direction: column;
            z-index: 200;
            overflow: hidden;
        }

        .sidebar-brand {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 20px 18px 18px;
            border-bottom: 1px solid rgba(255,255,255,0.06);
            margin-bottom: 8px;
        }
        .sidebar-brand-icon {
            width: 34px; height: 34px;
            background: var(--accent);
            border-radius: 8px;
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
        }
        .sidebar-brand-icon img { width: 20px; height: 20px; object-fit: contain; filter: brightness(10); }
        .sidebar-brand-name { font-size: 13.5px; font-weight: 600; color: #fff; line-height: 1.25; }
        .sidebar-brand-tagline { font-size: 10px; color: var(--sidebar-text); font-weight: 400; }

        .sidebar-section-label {
            font-size: 10px;
            font-weight: 600;
            letter-spacing: 0.08em;
            color: rgba(160,168,184,0.5);
            text-transform: uppercase;
            padding: 12px 18px 4px;
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 9px 18px;
            color: var(--sidebar-text);
            font-size: 13px;
            font-weight: 400;
            border-radius: 0;
            cursor: pointer;
            transition: background 150ms, color 150ms;
            margin: 1px 8px;
            border-radius: 6px;
            position: relative;
        }
        .nav-item:hover { background: var(--sidebar-hover-bg); color: #fff; }
        .nav-item.active {
            background: var(--sidebar-active-bg);
            color: var(--sidebar-text-active);
            font-weight: 500;
        }
        .nav-item.active::before {
            content: '';
            position: absolute;
            left: 0; top: 50%; transform: translateY(-50%);
            width: 3px; height: 18px;
            background: var(--accent);
            border-radius: 0 3px 3px 0;
            margin-left: -8px;
        }
        .nav-item img { width: 16px; height: 16px; object-fit: contain; opacity: 0.6; transition: opacity 150ms; }
        .nav-item:hover img, .nav-item.active img { opacity: 1; filter: brightness(10); }
        .nav-item.active img { filter: brightness(10); }

        .sidebar-footer {
            margin-top: auto;
            border-top: 1px solid rgba(255,255,255,0.06);
            padding: 10px 8px;
        }

        .sidebar-footer form { display: block; }
        .sidebar-footer button {
            width: 100%;
            display: flex; align-items: center; gap: 10px;
            padding: 9px 18px;
            color: #ef4444;
            font-size: 13px;
            font-family: 'DM Sans', sans-serif;
            background: none;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background 150ms;
            font-weight: 500;
        }
        .sidebar-footer button:hover { background: rgba(239,68,68,0.1); }
        .sidebar-footer button img { width: 16px; height: 16px; object-fit: contain; opacity: 0.8; }

        /* ── HEADER ── */
        .header {
            position: fixed;
            top: 0;
            left: var(--sidebar-w);
            right: 0;
            height: var(--header-h);
            background: var(--card-bg);
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            padding: 0 28px;
            z-index: 100;
            gap: 16px;
        }

        .header-search {
            display: flex;
            align-items: center;
            gap: 8px;
            background: var(--bg);
            border: 1px solid var(--border);
            border-radius: 6px;
            padding: 7px 12px;
            flex: 0 0 280px;
        }
        .header-search input {
            border: none;
            background: none;
            font-family: 'DM Sans', sans-serif;
            font-size: 13px;
            color: var(--text-primary);
            outline: none;
            width: 100%;
        }
        .header-search input::placeholder { color: var(--text-secondary); }
        .header-search-icon { width: 14px; height: 14px; opacity: 0.4; flex-shrink: 0; }

        .header-spacer { flex: 1; }

        .header-badge {
            width: 32px; height: 32px;
            background: var(--accent);
            color: white;
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: 0.01em;
        }

        /* ── SHARED TABLE STYLES ── */
        h1, h2 { font-size: 20px; font-weight: 600; margin-bottom: 20px; color: var(--text-primary); }
        h2.page-title { font-size: 20px; }

        .page-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 22px;
        }
        .page-header h1 { margin-bottom: 0; }

        .btn-add {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 16px;
            background: var(--accent);
            color: white;
            font-family: 'DM Sans', sans-serif;
            font-size: 13px;
            font-weight: 500;
            border: none;
            border-radius: var(--radius);
            cursor: pointer;
            transition: background 150ms, transform 100ms;
            text-decoration: none;
        }
        .btn-add:hover { background: #2a5bd4; transform: translateY(-1px); }

        .table-card {
            background: var(--card-bg);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            overflow: hidden;
            box-shadow: var(--shadow);
        }

        table { width: 100%; border-collapse: collapse; }

        thead tr { border-bottom: 1px solid var(--border); }

        th {
            padding: 11px 16px;
            text-align: left;
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            color: var(--text-secondary);
            background: #fafbfc;
            white-space: nowrap;
        }

        td {
            padding: 11px 16px;
            color: var(--text-primary);
            border-bottom: 1px solid #f0f2f5;
            font-size: 13px;
            vertical-align: middle;
        }

        tbody tr:last-child td { border-bottom: none; }

        tbody tr:hover { background: #f7f8fc; cursor: pointer; }

        .link-show {
            color: var(--accent);
            font-weight: 500;
            font-size: 12px;
            padding: 4px 10px;
            border: 1px solid var(--accent);
            border-radius: 5px;
            transition: background 150ms, color 150ms;
        }
        .link-show:hover { background: var(--accent); color: #fff; }

        .null-val { color: var(--text-secondary); font-style: italic; }

        .flash-success {
            background: #f0fdf4;
            color: #166534;
            border: 1px solid #bbf7d0;
            padding: 10px 16px;
            border-radius: var(--radius);
            margin-bottom: 16px;
            font-size: 13px;
            font-weight: 500;
        }

        @yield('extra-styles')
    </style>

    @yield('style')
</head>
<body>

    <!-- SIDEBAR -->
    <nav class="sidebar">
        <div class="sidebar-brand">
            <div class="sidebar-brand-icon">
                <img src="{{ url('icons/bik4.png') }}" alt="logo">
            </div>
            <div>
                <div class="sidebar-brand-name">PopDelivery</div>
                <div class="sidebar-brand-tagline">You tap, we deliver</div>
            </div>
        </div>

        <div class="sidebar-section-label">Main</div>

        <a href="{{ route('dashboard.page') }}">
            <div @class(['nav-item', 'active' => Route::currentRouteName() == 'dashboard.page'])>
                <img src="{{ url('icons/dashboard3.png') }}" alt="">
                Dashboard
            </div>
        </a>

        <a href="{{ route('dashboard.delivery-man') }}">
            <div @class(['nav-item', 'active' => Route::currentRouteName() == 'dashboard.delivery-man'])>
                <img src="{{ url('icons/deliveryman2.png') }}" alt="">
                Delivery Men
            </div>
        </a>

        <a href="{{ route('dashboard.customers') }}">
            <div @class(['nav-item', 'active' => Route::currentRouteName() == 'dashboard.customers'])>
                <img src="{{ url('icons/user4.png') }}" alt="">
                Customers
            </div>
        </a>

        <a href="{{ route('dashboard.delivery-list') }}">
            <div @class(['nav-item', 'active' => Route::currentRouteName() == 'dashboard.delivery-list'])>
                <img src="{{ url('icons/delivery1.png') }}" alt="">
                Deliveries
            </div>
        </a>

        <div class="sidebar-section-label">System</div>

        <a href="{{ route('dashboard.location') }}">
            <div @class(['nav-item', 'active' => Route::currentRouteName() == 'dashboard.location'])>
                <img src="{{ url('icons/location.png') }}" alt="">
                Locations
            </div>
        </a>

        <a href="{{ route('dashboard.location') }}">
            <div class="nav-item">
                <img src="{{ url('icons/transaction.png') }}" alt="">
                Transactions
            </div>
        </a>

        <a href="{{ route('dashboard.location') }}">
            <div class="nav-item">
                <img src="{{ url('icons/geocalisation.png') }}" alt="">
                Geolocation
            </div>
        </a>

        <a href="{{ route('dashboard.location') }}">
            <div class="nav-item">
                <img src="{{ url('icons/settings1.png') }}" alt="">
                Settings
            </div>
        </a>

        <a href="{{ route('dashboard.location') }}">
            <div class="nav-item">
                <img src="{{ url('icons/user4.png') }}" alt="">
                Profile
            </div>
        </a>

        @auth
        <div class="sidebar-footer">
            <form method="POST" action="/logout">
                @csrf
                <button type="submit">
                    <img src="{{ url('icons/logout.png') }}" alt="">
                    Sign Out
                </button>
            </form>
        </div>
        @endauth
    </nav>

    <!-- HEADER -->
    <header class="header">
        <div class="header-search">
            <svg class="header-search-icon" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="9" cy="9" r="6"/><path d="M15 15l-3.5-3.5"/>
            </svg>
            <input type="search" placeholder="Search...">
        </div>
        <div class="header-spacer"></div>
        <div class="header-badge">A</div>
    </header>

    <!-- PAGE CONTENT -->
    <main>
        @yield('content')
    </main>

    @yield('script')
</body>
</html>
