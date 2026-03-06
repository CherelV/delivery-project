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
                <td> {{ $delivery_man->id }} </td>
                <td>{{ $delivery_man->user->name }}</td>
                <td>{{ $delivery_man->user->email}}</td>
                {{-- <td>{{$delivery_man->user->address }}</td> --}}
                @if (filled($delivery_man->user->address))
                    <td>{{ $delivery_man->user->address }}</td>
                @else
                    <td> null</td>
                @endif
                {{-- <td>{{ $delivery_man->user->mobile }}</td> --}}
                @if (filled($delivery_man->user->mobile))
                    <td>{{ $delivery_man->user->mobile }}</td>
                @else
                    <td> null</td>
                @endif
                <td>{{ $delivery_man->license_number }}</td>
                <td>{{ $delivery_man->number_plate }}</td>
                <td>{{ $delivery_man->license_class}}</td>
                <td>{{ $delivery_man->vehicle_type }}</td>
                <td><input type="checkbox" checked="true"> Active</td>
                <td><button id="myBtn">...</button></td>
            </tr>
    
 </table>
 <button> <a href="/delivery-man/{{$delivery_man->id}}/edit">Edit</a> </button>
 </body>
 </html>