@extends('dashboard.layout')

@section('title', 'Customers')

@section('style')
    <style>
        th{
        border-bottom:2px rgba(100,100,100,0.4) solid;
    }
      th, td {
             padding:10px;
             text-align:left;
            }
        tr:hover{
            background-color:rgba(98, 74, 9, 0.31);
            border-radius:5px;
            cursor:pointer;
        }
       
         .add{
            font-weight:bold;
            padding:6px 13px;
            color:white;
            background-color: rgba(3, 3, 270, 0.8);
            border:2px  #2f2ff9 solid;
             border-radius:5px;
            position:absolute;
             right:70px;
             top:100px;
        }
        .add:hover{
            font-weight:bold;
            color: rgba(3, 3, 270, 0.8);
            background-color:white;
            border:2px  rgba(3, 3, 270, 0.8) solid;
            cursor:pointer;
        }
    </style>
@endsection

@section('content')
    <h1>Customers</h1>
    <button class="add">
       <a href="/customers/create"> + Add Customer</a>
    </button>

    <table style="border-spacing:0px 2px;
            border-radius: 2px;
            background-color:white;
            padding:10px;
            margin-left: auto;
        margin-right: auto;">
        <tr>
            <th>Id</th>
            <th>name</th>
            <th>email</th>
            <th>Address</th>
            <th>Mobile</th>
        </tr>
        @foreach ( $customers as $customer )
            <tr>
                <td> {{ $customer->id }} </td>
                <td>{{ $customer->user->name }}</td>
                <td>{{ $customer->user->email }}</td>
                @if (filled($customer->user->address))
                    <td>{{ $customer->user->address }}</td>
                @else
                    <td> null</td>
                @endif
                {{-- <td>{{ $customer->user->address }}</td> --}}
                @if (filled($customer->user->mobile))
                    <td>{{ $customer->user->mobile }}</td>
                @else
                    <td> null</td>
                @endif
                {{-- <td>{{$customer->user->mobile }}</td> --}}
                
                <td> <a href="/customers/{{$customer->id}}"> show </a></td>
            </tr>
        @endforeach
       
    </table>
@endsection