@extends('dashboard.layout')

@section('title', 'Delivery Man')

@section('content')
        <h1>Delivery Men</h1>
    <button class="add">
       <a href="/delivery-man/create"> + Add DeliveryMan</a>
    </button>
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
            @foreach ( $delivery_men as $delivery_man )
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
                <td> <a href="/delivery-man/{{$delivery_man->id}}"> show </a></td>
                
            </tr>
                


      
        @endforeach
    
    </table>

        @foreach ( $delivery_men as $delivery_man )
            {{-- <div class="modal-cover">
    <div id="myModal" class="modal">
    
        <div  class="part">
            <span  class="exit">&times;</span>
            <p>{{ $delivery_man->id }}</p>
            <p>status:<input type="checkbox" checked="true">Active</p>
        </div>

        <div>
            <img class="image" src="{{ url('icons/successful-female-photographer-making-photos-modern-architecture (1).jpg') }}">
        </div>

        <p>Name: {{ $delivery_man->user->name }}</p>
        <div  class="part">
            <img class="images" src="{{ url('icons/542689.png') }}">
            <img class="images" src="{{ url('icons/2956149.png') }}">
        </div>


        <p>more information</p>
        <p>email: {{ $delivery_man->user->email }}</p>
        <p>address: {{ $delivery_man->user->address }}</p>
        <p>phone: {{ $delivery_man->user->mobile }}</p>
        <p>vehicle: {{ $delivery_man->vehicle_type}}</p>
        <p>licence number:{{ $delivery_man->license_number }}  </p>
        <p>plate number: {{ $delivery_man->number_plate }}</p>
        <p>last location : </p>
    </div>
</div>
</tr> --}}
        @endforeach
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
        #delivered{
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
             right:10px;
             top:100px;
        }
        .add:hover{
            font-weight:bold;
            color: rgba(3, 3, 270, 0.8);
            background-color:white;
            border:2px  rgba(3, 3, 270, 0.8) solid;
            cursor:pointer;
        }
           .image{
            width:50px;
            height:50px;
            object-fit:cover;
            border-radius: 100%;
        }
        .images{
           width:20px;
            height:20px;
            object-fit:cover;
            background-color:grey;
             border-radius: 100%;
            margin-left:
        }
        .exit{
             float: right;
            font-size: 20px;
            padding:1px 6px;
             border-radius:50%;
             margin-top:0px
        }
        .exit:hover{
             background-color:red;
             color:white;
             cursor:pointer; 
        }
        button{
            padding: 2px 5px;
            background-color:none;
            border:none;
        }
        .modal{
            display: none; 
            position: fixed; 
            z-index: 100;
            right:25px;
            top: 100px;
            width: 200px; 
            height:  420px; 
            overflow: auto;
            background-color:white;
            padding:2px 2px 2px 10px;
            border-radius:10px;
        }
        .modal-cover{
           background-color:rgba(0,0,0,0.5); 
           z-index: 100;
           
        }
        input{
            accent-color:green;
        }
          
    </style>
@endsection

@section('script')
    <script>
        var modal= document.getElementById("myModal");
        var btn = document.getElementById("myBtn");
        var span = document.getElementsByClassName("exit")[0];
        btn.onclick = function() {modal.style.display = "block";}
        span.onclick = function() {modal.style.display = "none";}
        window.onclick = function(event) {
            if (event.target == modal) {
                 modal.style.display = "none";
            }
        }

    </script>
@endsection