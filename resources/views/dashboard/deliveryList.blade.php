@extends('dashboard.layout')

@section('title', 'Deliveries')

@section('content')

<div class="page-header">
    <div>
        <h1>Deliveries</h1>
        <p style="font-size:13px; color:var(--text-secondary); margin-top:2px;">Track all delivery assignments</p>
    </div>
    <a href="/delivery-list/create" class="btn-add">
        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2.2">
            <path d="M7 1v12M1 7h12"/>
        </svg>
        Add Delivery
    </a>
</div>

@if(session('added'))
    <div class="flash flash--blue">{{ session('added') }}</div>
@endif
@if(session('success'))
    <div class="flash flash--green">{{ session('success') }}</div>
@endif
@if(session('delete'))
    <div class="flash flash--red">{{ session('delete') }}</div>
@endif
<div class="table-card">
     <h2>Pending</h2>
    <table>
        <thead>
            <tr>
                <th>N°</th>
                <th>Customer</th>
                <th>Delivery Man</th>
                <th>Status</th>
                <th>Fee</th>
                <th>Departure</th>
                <th>Destination</th>
                <th>Delivered On</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($deliveries as $delivery)
             @if($delivery['status'] === 'pending')
                        {{-- <span class="badge badge--green">Completed</span> --}}
            <tr>
                <td style="font-family:'DM Mono',monospace; color:var(--text-secondary); font-size:12px;">{{ $delivery['id'] }}</td>
                <td style="font-weight:500;">{{ $delivery->customer->user->name }}</td>
                <td>{{ $delivery->deliveryMan->user->name }}</td>
                <td>
                    @if($delivery['status'] === 'completed')
                        <span class="badge badge--green">Completed</span>
                    @elseif($delivery['status'] === 'canceled')
                        <span class="badge badge--red">Canceled</span>
                    @elseif($delivery['status'] === 'pending')
                        <span class="badge badge--amber">Pending</span>
                    @else
                        <span class="badge">{{ $delivery['status'] }}</span>
                    @endif
                </td>
                <td style="font-family:'DM Mono',monospace;">{{ $delivery['fee'] }}</td>
                <td>
                    @if(filled($delivery->departureAddress))
                        {{ $delivery->departureAddress->name }}
                    @else
                        <span class="null-val">—</span>
                    @endif
                </td>
                <td>
                    @if(filled($delivery->destinationAddress))
                        {{ $delivery->destinationAddress->name }}
                    @else
                        <span class="null-val">—</span>
                    @endif
                </td>
                <td style="color:var(--text-secondary); white-space:nowrap;">{{ $delivery['delivered_on'] ?? '—' }}</td>
                <td>
                    <a href="/delivery-list/{{ $delivery->id }}" class="link-show">View</a>
                </td>
            </tr>
             @endif
            @endforeach
        </table>
            <h2>Completed</h2>
                <table>
        <thead>
            <tr>
                <th>N°</th>
                <th>Customer</th>
                <th>Delivery Man</th>
                <th>Status</th>
                <th>Fee</th>
                <th>Departure</th>
                <th>Destination</th>
                <th>Delivered On</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
              @foreach ($deliveries as $delivery)
             @if($delivery['status'] === 'completed')
                        {{-- <span class="badge badge--green">Completed</span> --}}
            <tr>
                <td style="font-family:'DM Mono',monospace; color:var(--text-secondary); font-size:12px;">{{ $delivery['id'] }}</td>
                <td style="font-weight:500;">{{ $delivery->customer->user->name }}</td>
                <td>{{ $delivery->deliveryMan->user->name }}</td>
                <td>
                    @if($delivery['status'] === 'completed')
                        <span class="badge badge--green">Completed</span>
                    @elseif($delivery['status'] === 'canceled')
                        <span class="badge badge--red">Canceled</span>
                    @elseif($delivery['status'] === 'pending')
                        <span class="badge badge--amber">Pending</span>
                    @else
                        <span class="badge">{{ $delivery['status'] }}</span>
                    @endif
                </td>
                <td style="font-family:'DM Mono',monospace;">{{ $delivery['fee'] }}</td>
                <td>
                    @if(filled($delivery->departureAddress))
                        {{ $delivery->departureAddress->name }}
                    @else
                        <span class="null-val">—</span>
                    @endif
                </td>
                <td>
                    @if(filled($delivery->destinationAddress))
                        {{ $delivery->destinationAddress->name }}
                    @else
                        <span class="null-val">—</span>
                    @endif
                </td>
                <td style="color:var(--text-secondary); white-space:nowrap;">{{ $delivery['delivered_on'] ?? '—' }}</td>
                <td>
                    <a href="/delivery-list/{{ $delivery->id }}" class="link-show">View</a>
                </td>
            </tr>
             @endif
            @endforeach
               </table>
            <h2>Canceled</h2>
                <table>
        <thead>
            <tr>
                <th>N°</th>
                <th>Customer</th>
                <th>Delivery Man</th>
                <th>Status</th>
                <th>Fee</th>
                <th>Departure</th>
                <th>Destination</th>
                <th>Delivered On</th>
                <th></th>
            </tr>
        </thead>
        <tbody>

            @foreach ($deliveries as $delivery)
             @if($delivery['status'] === 'canceled')
                        {{-- <span class="badge badge--green">Completed</span> --}}
            <tr>
                <td style="font-family:'DM Mono',monospace; color:var(--text-secondary); font-size:12px;">{{ $delivery['id'] }}</td>
                <td style="font-weight:500;">{{ $delivery->customer->user->name }}</td>
                <td>{{ $delivery->deliveryMan->user->name }}</td>
                <td>
                    @if($delivery['status'] === 'completed')
                        <span class="badge badge--green">Completed</span>
                    @elseif($delivery['status'] === 'canceled')
                        <span class="badge badge--red">Canceled</span>
                    @elseif($delivery['status'] === 'pending')
                        <span class="badge badge--amber">Pending</span>
                    @else
                        <span class="badge">{{ $delivery['status'] }}</span>
                    @endif
                </td>
                <td style="font-family:'DM Mono',monospace;">{{ $delivery['fee'] }}</td>
                <td>
                    @if(filled($delivery->departureAddress))
                        {{ $delivery->departureAddress->name }}
                    @else
                        <span class="null-val">—</span>
                    @endif
                </td>
                <td>
                    @if(filled($delivery->destinationAddress))
                        {{ $delivery->destinationAddress->name }}
                    @else
                        <span class="null-val">—</span>
                    @endif
                </td>
                <td style="color:var(--text-secondary); white-space:nowrap;">{{ $delivery['delivered_on'] ?? '—' }}</td>
                <td>
                    <a href="/delivery-list/{{ $delivery->id }}" class="link-show">View</a>
                </td>
            </tr>
             @endif
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

    .flash {
    padding: 10px 16px;
    border-radius: 7px;
    font-size: 13.5px;
    font-weight: 500;
    margin-bottom: 16px;
}
.flash--green {
    background: #f0fdf4;
    color: #15803d;
    border: 1px solid #bbf7d0;
}
.flash--blue {
    background: #f0f0fd;
    color: #211580;
    border: 1px solid #bbbbf7;
}
.flash--red {
    background: #ffefef;
    color: #d81d1d;
    border: 1px solid #febfbf;
}

</style>
@endsection
