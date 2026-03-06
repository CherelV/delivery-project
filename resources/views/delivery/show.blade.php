    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

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
            </tr>
      

    </table>
<button> <a href="/delivery-list/{{$delivery->id}}/edit">Edit</a> </button>   
</body>
</html>