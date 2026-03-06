<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table style="border-spacing:0px 2px; 
            border-radius: 2px;
            background-color:white;
            padding:10px;
            margin-left: auto;
            margin-right: auto;">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>email</th>
            <th>Address</th>
            <th>Mobile</th>
            <th>license Number</th>
            <th>Number Plate</th>
            <th>license Class</th>
            <th>Vehicle Type</th>
            <th>Status</th>
            <th>Info</th>
        </tr>
            <tr>
                <td> {{ $customer->id }} </td>
                <td>{{ $customer->user->name }}</td>
                <td>{{ $customer->user->email}}</td>
                {{-- <td>{{$delivery_man->user->address }}</td> --}}
                @if (filled($customer->user->address))
                    <td>{{ $customer->user->address }}</td>
                @else
                    <td> null</td>
                @endif
                {{-- <td>{{ $delivery_man->user->mobile }}</td> --}}
                @if (filled($customer->user->mobile))
                    <td>{{ $customer->user->mobile }}</td>
                @else
                    <td> null</td>
                @endif
            </tr>
    
 </table>
 <button> <a href="/customers/{{ $customer->id }}/edit">Edit</a> </button>
 </body>
 </html>