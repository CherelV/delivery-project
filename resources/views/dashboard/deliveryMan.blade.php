@extends('dashboard.layout')

@section('title', 'Delivery Men')

@section('content')

<div class="page-header">
    <div>
        <h1>Delivery Men</h1>
        <p style="font-size:13px; color:var(--text-secondary); margin-top:2px;">Manage and approve delivery staff</p>
    </div>
    <a href="/delivery-man/create" class="btn-add">
        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2.2">
            <path d="M7 1v12M1 7h12"/>
        </svg>
        Add Delivery Man
    </a>
</div>

@if(session('success'))
    <div class="flash-success">{{ session('success') }}</div>
@endif

<div class="table-card">
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>License No.</th>
                <th>Plate</th>
                <th>Class</th>
                <th>Vehicle</th>
                <th>Status</th>
                <th>Actions</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($delivery_men as $delivery_man)
            <tr>
                <td style="font-family:'DM Mono',monospace; color:var(--text-secondary); font-size:12px;">{{ $delivery_man->id }}</td>
                <td style="font-weight:500;">{{ $delivery_man->user->name }}</td>
                <td style="color:var(--text-secondary);">{{ $delivery_man->user->email }}</td>
                <td>
                    @if(filled($delivery_man->user->mobile))
                        {{ $delivery_man->user->mobile }}
                    @else
                        <span class="null-val">—</span>
                    @endif
                </td>
                <td style="font-family:'DM Mono',monospace; font-size:12px;">{{ $delivery_man->license_number }}</td>
                <td style="font-family:'DM Mono',monospace; font-size:12px;">{{ $delivery_man->number_plate }}</td>
                <td>{{ $delivery_man->license_class }}</td>
                <td>{{ $delivery_man->vehicle_type }}</td>

                <td>
                    @if($delivery_man->status === 'pending')
                        <span class="badge badge--amber">Pending</span>
                    @elseif($delivery_man->status === 'approved')
                        <span class="badge badge--green">Approved</span>
                    @elseif($delivery_man->status === 'rejected')
                        <span class="badge badge--red">Rejected</span>
                    @else
                        <span class="null-val">—</span>
                    @endif
                </td>

                <td>
                    <div class="action-group">
                        @if($delivery_man->status === 'pending')
                            <form method="POST" action="{{ route('delivery-man.approve', $delivery_man) }}" style="display:inline;">
                                @csrf @method('PATCH')
                                <button type="submit" class="action-btn action-btn--approve">Approve</button>
                            </form>
                            <form method="POST" action="{{ route('delivery-man.reject', $delivery_man) }}" style="display:inline;">
                                @csrf @method('PATCH')
                                <button type="submit" class="action-btn action-btn--reject">Reject</button>
                            </form>
                        @elseif($delivery_man->status === 'rejected')
                            <form method="POST" action="{{ route('delivery-man.approve', $delivery_man) }}" style="display:inline;">
                                @csrf @method('PATCH')
                                <button type="submit" class="action-btn action-btn--reapprove">Re-approve</button>
                            </form>
                        @else
                            <span class="null-val">—</span>
                        @endif
                    </div>
                </td>

                <td>
                    <a href="/delivery-man/{{ $delivery_man->id }}" class="link-show">View</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection

@section('style')
<style>
    .badge {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 3px 10px;
        border-radius: 20px;
        font-size: 11.5px;
        font-weight: 600;
        letter-spacing: 0.02em;
    }
    .badge::before {
        content: '';
        width: 5px; height: 5px;
        border-radius: 50%;
        background: currentColor;
        flex-shrink: 0;
    }
    .badge--green { background: #f0fdf4; color: #15803d; }
    .badge--red   { background: #fef2f2; color: #b91c1c; }
    .badge--amber { background: #fffbeb; color: #b45309; }

    .action-group { display: flex; gap: 6px; align-items: center; }

    .action-btn {
        padding: 5px 11px;
        font-size: 12px;
        font-family: 'DM Sans', sans-serif;
        font-weight: 600;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: opacity 150ms, transform 100ms;
        white-space: nowrap;
    }
    .action-btn:hover { opacity: 0.85; transform: translateY(-1px); }

    .action-btn--approve   { background: #15803d; color: white; }
    .action-btn--reject    { background: #b91c1c; color: white; }
    .action-btn--reapprove { background: #1d4ed8; color: white; }
</style>
@endsection

@section('script')
<script>
    // Modal removed — the "..." button modal relied on a single ID for multiple rows.
    // Replace with per-row drawer or redirect to the show page via the View button.
</script>
@endsection
