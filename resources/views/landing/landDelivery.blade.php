<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Deliveries – PopDelivery</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.cdnfonts.com/css/hk-groteks"> 
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --blue:         rgba(3, 3, 270, 0.85);
            --blue-dark:    rgba(8, 18, 131, 1);
            --blue-light:   rgba(3, 3, 270, 0.07);
            --blue-mid:     rgba(3, 3, 270, 0.14);
            --pending:      #d97706;
            --pending-bg:   #fffbeb;
            --pending-bd:   #fde68a;
            --completed:    #059669;
            --completed-bg: #ecfdf5;
            --completed-bd: #a7f3d0;
            --canceled:     #dc2626;
            --canceled-bg:  #fef2f2;
            --canceled-bd:  #fecaca;
            --bg:           #f3f5fa;
            --white:        #ffffff;
            --text:         #111827;
            --muted:        #6b7280;
            --border:       #e5e7eb;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--bg);
            color: var(--text);
            min-height: 100vh;
        }

        /* HEADER */
        .header {
            position: fixed;
            top: 0; left: 0; right: 0;
            height: 64px;
            background: var(--white);
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 32px;
            z-index: 100;
        }

        .brand {
            font-family: 'DM Serif Display', serif;
            font-size: 20px;
            color: var(--blue);
        }

        .driver-badge {
            display: flex;
            align-items: center;
            gap: 10px;
            background: var(--blue-light);
            border: 1px solid var(--blue-mid);
            padding: 5px 14px 5px 8px;
            border-radius: 30px;
        }

        .driver-avatar {
            width: 30px; height: 30px;
            border-radius: 50%;
            background: var(--blue);
            display: flex; align-items: center; justify-content: center;
            color: white; font-size: 12px; font-weight: 600;
            text-transform: uppercase;
        }

        .driver-name { font-size: 13px; font-weight: 500; color: var(--blue); }

        .online-dot {
            width: 7px; height: 7px;
            border-radius: 50%;
            background: var(--completed);
        }

        /* PAGE */
        .page {
            max-width: 1280px;
            margin: 0 auto;
            padding: 96px 32px 80px;
        }

        @keyframes up {
            from { opacity: 0; transform: translateY(14px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        /* TITLE */
        .page-title { margin-bottom: 28px; animation: up 0.5s ease both; }

        .page-title h1 {
            font-family: 'DM Serif Display', serif;
            font-size: clamp(26px, 4vw, 38px);
            font-weight: 400;
        }

        .page-title p { color: var(--muted); font-size: 14px; margin-top: 4px; font-weight: 300; }

        /* STATS */
        .stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 14px;
            margin-bottom: 28px;
            animation: up 0.5s 0.08s ease both;
        }

        .stat {
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 18px 20px;
            display: flex; flex-direction: column; gap: 6px;
            transition: box-shadow 0.2s;
        }

        .stat:hover { box-shadow: 0 6px 20px rgba(3,3,270,0.07); }

        .stat-label {
            font-size: 12px; color: var(--muted);
            text-transform: uppercase; letter-spacing: 0.06em; font-weight: 500;
        }

        .stat-value { font-size: 28px; font-weight: 600; line-height: 1; }
        .stat-value.blue      { color: var(--blue); }
        .stat-value.amber     { color: var(--pending); }
        .stat-value.green     { color: var(--completed); }
        .stat-value.red       { color: var(--canceled); }

        .stat-bar { height: 3px; border-radius: 2px; width: 32px; }
        .bar-blue  { background: var(--blue); }
        .bar-amber { background: var(--pending); }
        .bar-green { background: var(--completed); }
        .bar-red   { background: var(--canceled); }

        /* TOOLBAR */
        .toolbar {
            display: flex; align-items: center; gap: 10px;
            margin-bottom: 32px; flex-wrap: wrap;
            animation: up 0.5s 0.12s ease both;
        }

        .search-wrap { flex: 1; min-width: 200px; }

        .search-wrap input {
            width: 100%;
            padding: 9px 14px;
            border: 1px solid var(--border);
            border-radius: 8px;
            font-family: 'DM Sans', sans-serif;
            font-size: 14px;
            background: var(--white);
            color: var(--text);
            outline: none;
            transition: border-color 0.2s;
        }

        .search-wrap input:focus { border-color: var(--blue); }
        .search-wrap input::placeholder { color: #adb5bd; }

        .filter-btn {
            padding: 9px 18px;
            border: 1px solid var(--border);
            border-radius: 8px;
            background: var(--white);
            font-family: 'DM Sans', sans-serif;
            font-size: 13px; font-weight: 500;
            cursor: pointer; color: var(--muted);
            transition: 0.18s;
        }

        .filter-btn:hover { border-color: var(--blue); color: var(--blue); }
        .filter-btn.active { background: var(--blue); color: white; border-color: var(--blue); }

        /* SECTION */
        .section { margin-bottom: 40px; animation: up 0.5s ease both; }

        .section-head {
            display: flex; align-items: center;
            justify-content: space-between;
            margin-bottom: 16px;
        }

        .section-left { display: flex; align-items: center; gap: 12px; }

        .section-label { display: flex; align-items: center; gap: 8px; }

        .status-line { width: 3px; height: 22px; border-radius: 2px; }
        .line-pending   { background: var(--pending); }
        .line-completed { background: var(--completed); }
        .line-canceled  { background: var(--canceled); }

        .section-head h2 {
            font-family: 'DM Serif Display', serif;
            font-size: 20px; font-weight: 400;
        }

        .count-badge {
            font-size: 12px; font-weight: 600;
            padding: 2px 10px; border-radius: 20px;
        }

        .cb-pending   { background: var(--pending-bg);  color: var(--pending);   border: 1px solid var(--pending-bd); }
        .cb-completed { background: var(--completed-bg); color: var(--completed); border: 1px solid var(--completed-bd); }
        .cb-canceled  { background: var(--canceled-bg); color: var(--canceled);  border: 1px solid var(--canceled-bd); }

        .see-all {
            font-size: 13px; color: var(--blue);
            text-decoration: none; font-weight: 500;
            opacity: 0.8; transition: opacity 0.2s;
        }
        .see-all:hover { opacity: 1; }

        /* CARDS */
        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(290px, 1fr));
            gap: 14px;
        }

        .card {
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 18px;
            position: relative; overflow: hidden;
            transition: transform 0.18s, box-shadow 0.18s;
        }

        .card:hover { transform: translateY(-3px); box-shadow: 0 10px 28px rgba(3,3,270,0.08); }

        .card::before {
            content: '';
            position: absolute;
            left: 0; top: 0; bottom: 0;
            width: 3px;
        }

        .card-pending::before   { background: var(--pending); }
        .card-completed::before { background: var(--completed); }
        .card-canceled::before  { background: var(--canceled); }

        .card-top {
            display: flex; align-items: flex-start;
            justify-content: space-between;
            margin-bottom: 14px;
        }

        .order-id { font-size: 11px; color: var(--muted); margin-bottom: 3px; }
        .customer { font-size: 15px; font-weight: 600; }

        .pill {
            font-size: 10px; font-weight: 600;
            letter-spacing: 0.05em; text-transform: uppercase;
            padding: 3px 10px; border-radius: 20px; flex-shrink: 0;
        }

        .pill-pending   { background: var(--pending-bg);  color: var(--pending);   border: 1px solid var(--pending-bd); }
        .pill-completed { background: var(--completed-bg); color: var(--completed); border: 1px solid var(--completed-bd); }
        .pill-canceled  { background: var(--canceled-bg); color: var(--canceled);  border: 1px solid var(--canceled-bd); }

        /* Route */
        .route { display: flex; gap: 10px; margin-bottom: 14px; }

        .route-dots {
            display: flex; flex-direction: column;
            align-items: center; padding-top: 4px;
        }

        .dot { width: 9px; height: 9px; border-radius: 50%; flex-shrink: 0; }
        .dot-from { background: var(--blue); }
        .dot-to   { background: white; border: 2px solid var(--muted); }

        .route-line {
            width: 1px; flex: 1;
            background: repeating-linear-gradient(to bottom, var(--border) 0, var(--border) 4px, transparent 4px, transparent 8px);
            margin: 3px 0;
        }

        .route-info { flex: 1; display: flex; flex-direction: column; gap: 10px; }

        .route-label {
            font-size: 10px; color: var(--muted);
            text-transform: uppercase; letter-spacing: 0.07em; margin-bottom: 1px;
        }

        .route-addr { font-size: 13px; color: var(--text); line-height: 1.3; }

        /* Card footer */
        .card-footer {
            display: flex; align-items: center;
            justify-content: space-between;
            padding-top: 12px;
            border-top: 1px solid var(--border);
        }

        .meta { display: flex; gap: 14px; }
        .meta-item { font-size: 12px; color: var(--muted); }
        .cancel-reason { color: var(--canceled); }

        .amount { font-size: 15px; font-weight: 600; color: var(--blue); }
        .amount.struck { color: var(--muted); text-decoration: line-through; }

        /* Divider */
        .divider { border: none; border-top: 1px dashed var(--border); margin: 8px 0 40px; }

        /* Empty state */
        .empty-state {
            text-align: center;
            padding: 40px;
            color: var(--muted);
            font-size: 14px;
            background: var(--white);
            border: 1px dashed var(--border);
            border-radius: 12px;
            grid-column: 1 / -1;
        }

        /* RESPONSIVE */
        @media screen and (max-width: 300px) {
            .stats { grid-template-columns: 1fr 1fr; }
        }

        @media screen and (max-width: 500px) {
            .page { padding: 80px 16px 60px; }
            .header { padding: 0 16px; }
            .cards { grid-template-columns: 1fr; }
        }

        @media screen and (max-width: 380px) {
            .stats { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>

<div class="header">
    <span class="brand">PopDelivery</span>
    <div class="driver-badge">
        <div class="online-dot"></div>
        <div class="driver-avatar">
            {{ substr($deliveryMan->user->name ?? 'DM', 0, 2) }}
        </div>
        <span class="driver-name">{{ $deliveryMan->user->name ?? 'Delivery Man' }}</span>
    </div>
</div>

<div class="page">

    <div class="page-title">
        <h1>My Deliveries</h1>
        <p>{{ now()->format('l, F j, Y') }}</p>
    </div>

    <!-- STATS CARDS -->
    <div class="stats">
        <div class="stat">
            <div class="stat-label">Total</div>
            <div class="stat-value blue">{{ $allDeliveries->count() }}</div>
            <div class="stat-bar bar-blue"></div>
        </div>
        <div class="stat">
            <div class="stat-label">Pending</div>
            <div class="stat-value amber">{{ $pendingCount }}</div>
            <div class="stat-bar bar-amber"></div>
        </div>
        <div class="stat">
            <div class="stat-label">Completed</div>
            <div class="stat-value green">{{ $completedCount }}</div>
            <div class="stat-bar bar-green"></div>
        </div>
        <div class="stat">
            <div class="stat-label">Canceled</div>
            <div class="stat-value red">{{ $canceledCount }}</div>
            <div class="stat-bar bar-red"></div>
        </div>
    </div>

    <!-- TOOLBAR -->
    <div class="toolbar">
        <div class="search-wrap">
            <input type="text" id="searchInput" placeholder="Search by order, customer or address…" onkeyup="filterCards(this.value)">
        </div>
        <button class="filter-btn active" onclick="filterStatus('all', this)">All</button>
        <button class="filter-btn" onclick="filterStatus('pending', this)">Pending</button>
        <button class="filter-btn" onclick="filterStatus('completed', this)">Completed</button>
        <button class="filter-btn" onclick="filterStatus('canceled', this)">Canceled</button>
    </div>

    <!-- PENDING SECTION -->
    <div class="section" id="section-pending">
        <div class="section-head">
            <div class="section-left">
                <div class="section-label">
                    <div class="status-line line-pending"></div>
                    <h2>Pending</h2>
                </div>
                <span class="count-badge cb-pending">{{ $pendingCount }} active</span>
            </div>
        </div>
        <div class="cards" id="grid-pending">
            @forelse($allDeliveries->where('status', 'pending') as $delivery)
            <div class="card card-pending" 
                 data-status="pending" 
                 data-search="ord-{{ $delivery->id }} {{ strtolower($delivery->customer->user->name ?? '') }} {{ strtolower($delivery->departureAddress->name ?? '') }} {{ strtolower($delivery->destinationAddress->name ?? '') }}">
                <div class="card-top">
                    <div>
                        <div class="order-id">#ORD-{{ $delivery->id }}</div>
                        <div class="customer">{{ $delivery->customer->user->name ?? 'Unknown Customer' }}</div>
                    </div>
                    <span class="pill pill-pending">Pending</span>
                </div>
                <div class="route">
                    <div class="route-dots">
                        <div class="dot dot-from"></div>
                        <div class="route-line"></div>
                        <div class="dot dot-to"></div>
                    </div>
                    <div class="route-info">
                        <div>
                            <div class="route-label">Pickup</div>
                            <div class="route-addr">{{ $delivery->departureAddress->name ?? 'Address not specified' }}</div>
                        </div>
                        <div>
                            <div class="route-label">Drop-off</div>
                            <div class="route-addr">{{ $delivery->destinationAddress->name ?? 'Address not specified' }}</div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="meta">
                        <span class="meta-item">{{ $delivery->distance ?? '0' }} km</span>
                        <span class="meta-item">{{ $delivery->created_at->diffForHumans() }}</span>
                    </div>
                    <span class="amount">{{ number_format($delivery->fee, 0, ',', ' ') }} XAF</span>
                </div>
            </div>
            @empty
            <div class="empty-state">No pending deliveries</div>
            @endforelse
        </div>
    </div>

    <hr class="divider">

    <!-- COMPLETED SECTION -->
    <div class="section" id="section-completed">
        <div class="section-head">
            <div class="section-left">
                <div class="section-label">
                    <div class="status-line line-completed"></div>
                    <h2>Completed</h2>
                </div>
                <span class="count-badge cb-completed">{{ $completedCount }} completed</span>
            </div>
        </div>
        <div class="cards" id="grid-completed">
            @forelse($allDeliveries->where('status', 'completed') as $delivery)
            <div class="card card-completed" 
                 data-status="completed" 
                 data-search="ord-{{ $delivery->id }} {{ strtolower($delivery->customer->user->name ?? '') }} {{ strtolower($delivery->departureAddress->name ?? '') }} {{ strtolower($delivery->destinationAddress->name ?? '') }}">
                <div class="card-top">
                    <div>
                        <div class="order-id">#ORD-{{ $delivery->id }}</div>
                        <div class="customer">{{ $delivery->customer->user->name ?? 'Unknown Customer' }}</div>
                    </div>
                    <span class="pill pill-completed">Completed</span>
                </div>
                <div class="route">
                    <div class="route-dots">
                        <div class="dot dot-from"></div>
                        <div class="route-line"></div>
                        <div class="dot dot-to"></div>
                    </div>
                    <div class="route-info">
                        <div>
                            <div class="route-label">Pickup</div>
                            <div class="route-addr">{{ $delivery->departureAddress->name ?? 'Address not specified' }}</div>
                        </div>
                        <div>
                            <div class="route-label">Drop-off</div>
                            <div class="route-addr">{{ $delivery->destinationAddress->name ?? 'Address not specified' }}</div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="meta">
                        <span class="meta-item">{{ $delivery->distance ?? '0' }} km</span>
                        @if($delivery->delivered_on)
                        <span class="meta-item">{{ $delivery->delivered_on->diffForHumans() }}</span>
                        @endif
                    </div>
                    <span class="amount">{{ number_format($delivery->fee, 0, ',', ' ') }} XAF</span>
                </div>
            </div>
            @empty
            <div class="empty-state">No completed deliveries</div>
            @endforelse
        </div>
    </div>

    <hr class="divider">

    <!-- CANCELED SECTION -->
    <div class="section" id="section-canceled">
        <div class="section-head">
            <div class="section-left">
                <div class="section-label">
                    <div class="status-line line-canceled"></div>
                    <h2>Canceled</h2>
                </div>
                <span class="count-badge cb-canceled">{{ $canceledCount }} canceled</span>
            </div>
        </div>
        <div class="cards" id="grid-canceled">
            @forelse($allDeliveries->where('status', 'canceled') as $delivery)
            <div class="card card-canceled" 
                 data-status="canceled" 
                 data-search="ord-{{ $delivery->id }} {{ strtolower($delivery->customer->user->name ?? '') }} {{ strtolower($delivery->departureAddress->name ?? '') }} {{ strtolower($delivery->destinationAddress->name ?? '') }}">
                <div class="card-top">
                    <div>
                        <div class="order-id">#ORD-{{ $delivery->id }}</div>
                        <div class="customer">{{ $delivery->customer->user->name ?? 'Unknown Customer' }}</div>
                    </div>
                    <span class="pill pill-canceled">Canceled</span>
                </div>
                <div class="route">
                    <div class="route-dots">
                        <div class="dot dot-from"></div>
                        <div class="route-line"></div>
                        <div class="dot dot-to"></div>
                    </div>
                    <div class="route-info">
                        <div>
                            <div class="route-label">Pickup</div>
                            <div class="route-addr">{{ $delivery->departureAddress->name ?? 'Address not specified' }}</div>
                        </div>
                        <div>
                            <div class="route-label">Drop-off</div>
                            <div class="route-addr">{{ $delivery->destinationAddress->name ?? 'Address not specified' }}</div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="meta">
                        <span class="meta-item">{{ $delivery->distance ?? '0' }} km</span>
                        <span class="meta-item cancel-reason">Canceled</span>
                    </div>
                    <span class="amount struck">{{ number_format($delivery->fee, 0, ',', ' ') }} XAF</span>
                </div>
            </div>
            @empty
            <div class="empty-state">No canceled deliveries</div>
            @endforelse
        </div>
    </div>

    <!-- Home Link -->
    <div style="margin-top: 30px; text-align: center;">
        <a href="{{ route('landing.page.home') }}" style="color: var(--blue); text-decoration: none;">← Go to Home Page</a>
    </div>

</div>

<div class="toast" id="toast"></div>

<script>
    function filterStatus(status, btn) {
        document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        
        ['pending', 'completed', 'canceled'].forEach(s => {
            const section = document.getElementById('section-' + s);
            if (section) {
                section.style.display = (status === 'all' || status === s) ? '' : 'none';
            }
        });
        
        document.querySelectorAll('.divider').forEach(d => {
            d.style.display = status === 'all' ? '' : 'none';
        });
    }

    function filterCards(q) {
        q = q.toLowerCase().trim();
        document.querySelectorAll('.card').forEach(c => {
            const searchText = c.dataset.search || '';
            c.style.display = searchText.includes(q) || q === '' ? '' : 'none';
        });
    }

    // Initialize search
    document.getElementById('searchInput').addEventListener('keyup', function() {
        filterCards(this.value);
    });
</script>

</body>
</html>