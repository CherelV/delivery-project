@extends('dashboard.layout')

@section('title', 'Dashboard')

@section('content')

<div class="page-header">
    <div>
        <h1>Dashboard</h1>
        <p style="font-size:13px; color:var(--text-secondary); margin-top:2px;">Overview of your delivery operations</p>
    </div>
</div>

<!-- STAT CARDS ROW -->
<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-icon stat-icon--blue">
            <img src="{{ url('icons/deliveryman2.png') }}" alt="">
        </div>
        <div class="stat-body">
            <div class="stat-num">{{ $totalDeliveryMen }}</div>
            <div class="stat-label">Delivery Men</div>
        </div>
        <div class="stat-change stat-change--up">+2%</div>
    </div>

    <div class="stat-card">
        <div class="stat-icon stat-icon--purple">
            <img src="{{ url('icons/user4.png') }}" alt="">
        </div>
        <div class="stat-body">
            <div class="stat-num">{{ $totalCustomers }}</div>
            <div class="stat-label">Customers</div>
        </div>
        <div class="stat-change stat-change--up">+10%</div>
    </div>

    <div class="stat-card">
        <div class="stat-icon stat-icon--teal">
            <img src="{{ url('icons/delivery1.png') }}" alt="">
        </div>
        <div class="stat-body">
            <div class="stat-num">{{ $totalDeliveries }}</div>
            <div class="stat-label">Total Deliveries</div>
        </div>
        <div class="stat-change stat-change--up">+10%</div>
    </div>
</div>

<!-- DELIVERY STATUS BREAKDOWN -->
<div class="section-title">Delivery Status</div>
<div class="status-grid">
    <div class="status-card status-card--green">
        <div class="status-card-header">
            <img src="{{ url('icons/check.png') }}" alt="" class="status-icon">
            <span class="status-card-label">Completed</span>
        </div>
        <div class="status-card-num">{{ $completedDeliveries }}</div>
        <div class="status-bar-track">
            @php $pct = $totalDeliveries > 0 ? round(($completedDeliveries / $totalDeliveries) * 100) : 0; @endphp
            <div class="status-bar-fill status-bar-fill--green" style="width:{{ $pct }}%"></div>
        </div>
        <div class="status-pct">{{ $pct }}% of total</div>
    </div>

    <div class="status-card status-card--red">
        <div class="status-card-header">
            <img src="{{ url('icons/cancel1.png') }}" alt="" class="status-icon">
            <span class="status-card-label">Canceled</span>
        </div>
        <div class="status-card-num">{{ $canceledDeliveries }}</div>
        <div class="status-bar-track">
            @php $pct2 = $totalDeliveries > 0 ? round(($canceledDeliveries / $totalDeliveries) * 100) : 0; @endphp
            <div class="status-bar-fill status-bar-fill--red" style="width:{{ $pct2 }}%"></div>
        </div>
        <div class="status-pct">{{ $pct2 }}% of total</div>
    </div>

    <div class="status-card status-card--amber">
        <div class="status-card-header">
            <img src="{{ url('icons/pending.png') }}" alt="" class="status-icon">
            <span class="status-card-label">Pending</span>
        </div>
        <div class="status-card-num">{{ $pendingDeliveries }}</div>
        <div class="status-bar-track">
            @php $pct3 = $totalDeliveries > 0 ? round(($pendingDeliveries / $totalDeliveries) * 100) : 0; @endphp
            <div class="status-bar-fill status-bar-fill--amber" style="width:{{ $pct3 }}%"></div>
        </div>
        <div class="status-pct">{{ $pct3 }}% of total</div>
    </div>
</div>

@endsection

@section('style')
<style>
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 16px;
        margin-bottom: 28px;
    }

    .stat-card {
        background: var(--card-bg);
        border: 1px solid var(--border);
        border-radius: var(--radius);
        padding: 20px;
        display: flex;
        align-items: center;
        gap: 16px;
        box-shadow: var(--shadow);
        position: relative;
    }

    .stat-icon {
        width: 44px; height: 44px;
        border-radius: 10px;
        display: flex; align-items: center; justify-content: center;
        flex-shrink: 0;
    }
    .stat-icon img { width: 22px; height: 22px; object-fit: contain; filter: brightness(10); }
    .stat-icon--blue   { background: #3b6fea; }
    .stat-icon--purple { background: #7c3aed; }
    .stat-icon--teal   { background: #0d9488; }

    .stat-body { flex: 1; }
    .stat-num { font-size: 28px; font-weight: 700; line-height: 1; color: var(--text-primary); font-family: 'DM Mono', monospace; }
    .stat-label { font-size: 12px; color: var(--text-secondary); margin-top: 4px; font-weight: 500; }

    .stat-change {
        position: absolute;
        top: 16px; right: 16px;
        font-size: 11px;
        font-weight: 600;
        padding: 3px 8px;
        border-radius: 20px;
    }
    .stat-change--up { background: #f0fdf4; color: #16a34a; }
    .stat-change--down { background: #fef2f2; color: #dc2626; }

    .section-title {
        font-size: 13px;
        font-weight: 600;
        letter-spacing: 0.04em;
        text-transform: uppercase;
        color: var(--text-secondary);
        margin-bottom: 14px;
    }

    .status-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 16px;
    }

    .status-card {
        background: var(--card-bg);
        border: 1px solid var(--border);
        border-radius: var(--radius);
        padding: 20px;
        box-shadow: var(--shadow);
    }

    .status-card-header {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 14px;
    }

    .status-icon { width: 18px; height: 18px; object-fit: contain; opacity: 0.75; }

    .status-card-label { font-size: 12px; font-weight: 600; color: var(--text-secondary); text-transform: uppercase; letter-spacing: 0.05em; }

    .status-card-num { font-size: 32px; font-weight: 700; font-family: 'DM Mono', monospace; margin-bottom: 14px; }
    .status-card--green .status-card-num { color: #059669; }
    .status-card--red   .status-card-num { color: #dc2626; }
    .status-card--amber .status-card-num { color: #d97706; }

    .status-bar-track {
        height: 5px;
        background: #f0f2f5;
        border-radius: 99px;
        overflow: hidden;
        margin-bottom: 8px;
    }

    .status-bar-fill { height: 100%; border-radius: 99px; transition: width 600ms ease; }
    .status-bar-fill--green { background: #059669; }
    .status-bar-fill--red   { background: #dc2626; }
    .status-bar-fill--amber { background: #d97706; }

    .status-pct { font-size: 11px; color: var(--text-secondary); }
</style>
@endsection
