
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
            --delivered:    #059669;
            --delivered-bg: #ecfdf5;
            --delivered-bd: #a7f3d0;
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
        }

        .driver-name { font-size: 13px; font-weight: 500; color: var(--blue); }

        .online-dot {
            width: 7px; height: 7px;
            border-radius: 50%;
            background: var(--delivered);
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
        .stat-value.green     { color: var(--delivered); }
        .stat-value.red       { color: var(--canceled); }

        .stat-bar { height: 3px; border-radius: 2px; width: 32px; }
        .bar-blue  { background: var(--blue); }
        .bar-amber { background: var(--pending); }
        .bar-green { background: var(--delivered); }
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
        .section:nth-child(1) { animation-delay: 0.16s; }
        .section:nth-child(2) { animation-delay: 0.24s; }
        .section:nth-child(3) { animation-delay: 0.32s; }

        .section-head {
            display: flex; align-items: center;
            justify-content: space-between;
            margin-bottom: 16px;
        }

        .section-left { display: flex; align-items: center; gap: 12px; }

        .section-label { display: flex; align-items: center; gap: 8px; }

        .status-line { width: 3px; height: 22px; border-radius: 2px; }
        .line-pending   { background: var(--pending); }
        .line-delivered { background: var(--delivered); }
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
        .cb-delivered { background: var(--delivered-bg); color: var(--delivered); border: 1px solid var(--delivered-bd); }
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
        .card-delivered::before { background: var(--delivered); }
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
        .pill-delivered { background: var(--delivered-bg); color: var(--delivered); border: 1px solid var(--delivered-bd); }
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

        /* Actions */
        .card-actions { display: flex; gap: 8px; margin-top: 12px; }

        .btn-accept {
            flex: 1; padding: 8px;
            background: var(--blue); color: white;
            border: none; border-radius: 7px;
            font-family: 'DM Sans', sans-serif;
            font-size: 13px; font-weight: 500;
            cursor: pointer; transition: background 0.2s;
        }

        .btn-accept:hover { background: var(--blue-dark); }

        .btn-decline {
            flex: 1; padding: 8px;
            background: transparent; color: var(--canceled);
            border: 1px solid var(--canceled-bd); border-radius: 7px;
            font-family: 'DM Sans', sans-serif;
            font-size: 13px; font-weight: 500;
            cursor: pointer; transition: background 0.2s;
        }

        .btn-decline:hover { background: var(--canceled-bg); }

        /* Divider */
        .divider { border: none; border-top: 1px dashed var(--border); margin: 8px 0 40px; }

        /* Toast */
        .toast {
            position: fixed; bottom: 28px; right: 28px;
            background: var(--text); color: white;
            padding: 12px 20px; border-radius: 10px;
            font-size: 13px; font-weight: 500;
            opacity: 0; transform: translateY(14px);
            transition: 0.25s; z-index: 999; pointer-events: none;
        }

        .toast.show { opacity: 1; transform: translateY(0); }

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
        <div class="driver-avatar">MK</div>
        <span class="driver-name">Mohamed K.</span>
    </div>
</div>

<div class="page">

    <div class="page-title">
        <h1>CUSTOMER PAGE</h1>
        {{-- <p>Friday, February 20, 2026 &middot; Yaoundé, Cameroon</p> --}}
    </div>

    <div class="stats">
        <div class="stat">
            <div class="stat-label">Total Today</div>
            <div class="stat-value blue">12</div>
            <div class="stat-bar bar-blue"></div>
        </div>
        <div class="stat">
            <div class="stat-label">Pending</div>
            <div class="stat-value amber">4</div>
            <div class="stat-bar bar-amber"></div>
        </div>
        <div class="stat">
            <div class="stat-label">Delivered</div>
            <div class="stat-value green">6</div>
            <div class="stat-bar bar-green"></div>
        </div>
        <div class="stat">
            <div class="stat-label">Canceled</div>
            <div class="stat-value red">2</div>
            <div class="stat-bar bar-red"></div>
        </div>
    </div>

    <div class="toolbar">
        <div class="search-wrap">
            <input type="text" placeholder="Search by order, customer or address…" oninput="filterCards(this.value)">
        </div>
        <button class="filter-btn active" onclick="filterStatus('all', this)">All</button>
        <button class="filter-btn" onclick="filterStatus('pending', this)">Pending</button>
        <button class="filter-btn" onclick="filterStatus('delivered', this)">Delivered</button>
        <button class="filter-btn" onclick="filterStatus('canceled', this)">Canceled</button>
    </div>

    <!-- PENDING -->
    <div class="section" id="section-pending">
        <div class="section-head">
            <div class="section-left">
                <div class="section-label">
                    <div class="status-line line-pending"></div>
                    <h2>Pending</h2>
                </div>
                <span class="count-badge cb-pending">4 active</span>
            </div>
            <a href="#" class="see-all">See all</a>
        </div>
        <div class="cards" id="grid-pending">

            <div class="card card-pending" data-status="pending" data-search="ord-2841 alice dupont lilas kennedy">
                <div class="card-top">
                    <div>
                        <div class="order-id">#ORD-2841</div>
                        <div class="customer">Alice Dupont</div>
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
                            <div class="route-addr">14 Rue des Lilas, Bastos</div>
                        </div>
                        <div>
                            <div class="route-label">Drop-off</div>
                            <div class="route-addr">3 Av. Kennedy, Yaoundé Centre</div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="meta">
                        <span class="meta-item">3.2 km</span>
                        <span class="meta-item">~18 min</span>
                    </div>
                    <span class="amount">2 500 XAF</span>
                </div>
                <div class="card-actions">
                    <button class="btn-accept" onclick="accept(this,'#ORD-2841')">Accept</button>
                    <button class="btn-decline" onclick="decline(this,'#ORD-2841')">Decline</button>
                </div>
            </div>

          


        </div>
    </div>

    <hr class="divider">

    <!-- DELIVERED -->
    <div class="section" id="section-delivered">
        <div class="section-head">
            <div class="section-left">
                <div class="section-label">
                    <div class="status-line line-delivered"></div>
                    <h2>Delivered</h2>
                </div>
                <span class="count-badge cb-delivered">6 completed</span>
            </div>
            <a href="#" class="see-all">See all</a>
        </div>
        <div class="cards" id="grid-delivered">

            <div class="card card-delivered" data-status="delivered" data-search="ord-2835 marie mvog betsi">
                <div class="card-top">
                    <div>
                        <div class="order-id">#ORD-2835</div>
                        <div class="customer">Marie Mvog Betsi</div>
                    </div>
                    <span class="pill pill-delivered">Delivered</span>
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
                            <div class="route-addr">Mvog-Betsi Market, Yaoundé</div>
                        </div>
                        <div>
                            <div class="route-label">Drop-off</div>
                            <div class="route-addr">Av. Mongo, Yaoundé 2</div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="meta">
                        <span class="meta-item">2.8 km</span>
                        {{-- <span class="meta-item">Done at 08:42</span> --}}
                    </div>
                    <span class="amount">2 200 XAF</span>
                </div>
            </div>

           

        </div>
    </div>

    <hr class="divider">

    <!-- CANCELED -->
    <div class="section" id="section-canceled">
        <div class="section-head">
            <div class="section-left">
                <div class="section-label">
                    <div class="status-line line-canceled"></div>
                    <h2>Canceled</h2>
                </div>
                <span class="count-badge cb-canceled">2 canceled</span>
            </div>
            <a href="#" class="see-all">See all</a>
        </div>
        <div class="cards" id="grid-canceled">

            <div class="card card-canceled" data-status="canceled" data-search="ord-2833 ibrahim beti central biyem-assi">
                <div class="card-top">
                    <div>
                        <div class="order-id">#ORD-2833</div>
                        <div class="customer">Ibrahim Beti</div>
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
                            <div class="route-addr">Marché Central, Yaoundé</div>
                        </div>
                        <div>
                            <div class="route-label">Drop-off</div>
                            <div class="route-addr">Quartier Biyem-Assi II</div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="meta">
                        <span class="meta-item">5.0 km</span>
                        <span class="meta-item cancel-reason">Client unavailable</span>
                    </div>
                    <span class="amount struck">3 500 XAF</span>
                </div>
            </div>

            <a href="{{ route('landing.page.home') }}">Go to Home Page</a>
        </div>
    </div>

</div>

<div class="toast" id="toast"></div>
{{-- @foreach ( $deliveries as $delivery )
        <a href="/">
            <tr>
                <td> {{ $delivery['id'] }} </td>
                <td>{{ $delivery->customer->user->name}}</td>
                <td>{{ $delivery->deliveryMan->user->name }}</td>
                <td id="{{ $delivery['status'] }}">{{ $delivery['status'] }}</td>
                <td>{{ $delivery['fee'] }}</td>

                @if (filled($delivery->departureAddress))
                    <td>{{ $delivery->departureAddress->name }}</td>
                @else
                    <td> null</td>
                @endif

                @if (filled($delivery->destinationAddress))
                    <td>{{ $delivery->destinationAddress->name }}</td>
                @else
                    <td> null</td>
                @endif

                <td>{{ $delivery['delivered_on'] }}</td>
                <td> <a href="/delivery-list/{{$delivery->id}}"> show </a></td>
                
            </tr>
        </a>
        @endforeach --}}

<script>
    function toast(msg) {
        const t = document.getElementById('toast');
        t.textContent = msg;
        t.classList.add('show');
        setTimeout(() => t.classList.remove('show'), 3000);
    }

    function accept(btn, id) {
        const card = btn.closest('.card');
        card.style.transition = 'opacity 0.35s, transform 0.35s';
        card.style.opacity = '0';
        card.style.transform = 'scale(0.96)';
        setTimeout(() => card.remove(), 350);
        toast('Accepted ' + id);
    }

    function decline(btn, id) {
        const card = btn.closest('.card');
        card.style.transition = 'opacity 0.35s, transform 0.35s';
        card.style.opacity = '0';
        card.style.transform = 'scale(0.96)';
        setTimeout(() => card.remove(), 350);
        toast('Declined ' + id);
    }

    function filterStatus(status, btn) {
        document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        ['pending', 'delivered', 'canceled'].forEach(s => {
            document.getElementById('section-' + s).style.display =
                (status === 'all' || status === s) ? '' : 'none';
        });
        document.querySelectorAll('.divider').forEach(d => {
            d.style.display = status === 'all' ? '' : 'none';
        });
    }

    function filterCards(q) {
        q = q.toLowerCase();
        document.querySelectorAll('.card').forEach(c => {
            c.style.display = (c.dataset.search || '').includes(q) || q === '' ? '' : 'none';
        });
    }
</script>

</body>
</html>
