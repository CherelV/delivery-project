@extends('dashboard.layout')

@section('title', 'DeliveryList')

@section('content')

            
    <h1>Deliveries</h1>
    <button class="add">
        <a href="/delivery-list/create">+ Add Delivery</a>
    </button>
    <table style="
            border-spacing:0px 2px;
            border-radius: 2px;
            background-color:white;
            padding:10px;
            margin-left: auto;
        margin-right: auto;">
        <tr>
            <th>Id</th>
            <th>Customer</th>
            <th>DeliveryMan</th>
            <th>Status</th>
            <th>Fee</th>
            <th>Departure Address</th>
            <th>Destination Address</th>
            <th>Delivered On</th>
        </tr>

        @foreach ( $deliveries as $delivery )
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
        @endforeach

    </table>

@endsection

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
         #completed{
            color:rgba(10,200,150);
        }
        #canceled{
           color:rgba(200,50,50);
        }
         #pending{
            color:rgba(200,150,50);
        }
        .add{
            font-weight:bold;
            padding:6px 13px;
            color:white;
            background-color: rgba(3, 3, 270, 0.8);
            border:2px  #2f2ff9 solid;
             border-radius:5px;
             position:absolute;
             right:80px;
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