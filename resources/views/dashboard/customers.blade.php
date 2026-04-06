@extends('dashboard.layout')

@section('title', 'Customers')

@section('content')

<div class="page-header">
    <div>
        <h1>Customers</h1>
        <p style="font-size:13px; color:var(--text-secondary); margin-top:2px;">Manage all registered customers</p>
    </div>
    <a href="/customers/create" class="btn-add">
        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2.2">
            <path d="M7 1v12M1 7h12"/>
        </svg>
        Add Customer
    </a>
</div>

<div class="table-card">
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Mobile</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $customer)
            <tr>
                <td style="font-family:'DM Mono',monospace; color:var(--text-secondary); font-size:12px;">{{ $customer->id }}</td>
                <td style="font-weight:500;">{{ $customer->user->name }}</td>
                <td style="color:var(--text-secondary);">{{ $customer->user->email }}</td>
                <td>
                    @if(filled($customer->user->address))
                        {{ $customer->user->address }}
                    @else
                        <span class="null-val">—</span>
                    @endif
                </td>
                <td>
                    @if(filled($customer->user->mobile))
                        {{ $customer->user->mobile }}
                    @else
                        <span class="null-val">—</span>
                    @endif
                </td>
                <td>
                    <a href="/customers/{{ $customer->id }}" class="link-show">View</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
