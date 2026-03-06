@extends('dashboard.layout')

@section('title', 'DashboardPage')
@section('content')
<body style="font-family:Arial;
            font-size:12px;
           margin-top:100px; ">


    <h2  style="font-size:30px;">
       Dashboard 
    </h2>
        <div style="display:flex">
                <div style="display:inline-block;
                margin-right:20px;
                        "> 
                    <div class="first-stat">
                        <div  style="display:flex; margin-bottom:10px;">
                            <img  class="imag" src="{{ url('icons/deliveryman2.png') }}">
                            <div><span class="first-num">{{$totalDeliveryMen}}</span><br><span class="first-total">Total DeliveryMen</span></div>
                        </div>
                        <div class="first-total1"> <span class="first-per">+2%</span> high</div>
                    </div>

                    <div class="first-stat">
                        <div  style="display:flex; margin-bottom:10px;">
                            <img  class="imag" src="{{ url('icons/user4.png') }}">
                            <div><span class="first-num">{{$totalCustomers}}</span><br><span class="first-total">Total Customers</span></div>
                        </div>
                        <div class="first-total1"> <span class="first-per">+10%</span> high</div>
                    </div>

                    <div class="first-stat">
                        <div  style="display:flex; margin-bottom:10px;">
                            <img  class="imag" src="{{ url('icons/delivery1.png') }}">
                            <div><span class="first-num">{{$totalDeliveries}}</span><br><span class="first-total">Total Deliveries</span></div>
                        </div>
                        <div class="first-total1"> <span class="first-per">+10%</span> high</div>
                    </div>
                
                </div>
            

            <div class="first-stat" >
                <div class="fisrt-delivery" >
                    <img  class="imeg" src="{{ url('icons/check.png') }}">
                    <div style=" display:inline-block;">
                        <div class="first-total2"> Delivery Completed</div>
                        <div class="first-num1"> {{ $completedDeliveries  }} </div>
                    </div>
                </div> <hr>
                <div style="
                            diplay:flex">
                    <img  class="imeg" src="{{ url('icons/cancel1.png') }}">
                    <div style=" display:inline-block;">
                        <div class="first-total2"> Delivery Canceled</div>
                        <div class="first-num1">  {{ $canceledDeliveries  }} </div>
                    </div>
                </div><hr>
                <div style="
                            diplay:flex">
                    <img  class="imeg" src="{{ url('icons/pending.png') }}">
                    <div style=" display:inline-block;">
                        <div class="first-total2"> Delivery Pending</div>
                        <div class="first-num1"> {{ $pendingDeliveries  }}</div>
                    </div>
                </div>
            </div>

    </div>
</body>
@endsection

@section('style')
    <style>
        .first-stat{
            background-color:white;
            display:inline-block;
            padding:15px;
            border-radius:5px;
            margin-left: 10px;
             margin-top:10px;
        }
        .first-total1{
            color:grey;
            margin-right:10px
        }
        .first-total{
            font-size:12px;
            margin:0px 0px 0px 12px;
            padding:0px;
        }
        .first-total2{
            font-size:12px;
            margin:0px 0px 0px 10px;
            padding:0px;
        }
        .first-num{
            font-size:30px;
            font-weight:bold;
            padding:0px;
            margin:15px 0px 0px 20px;
        }
        .first-num1{
            font-size:20px;
            font-weight:bold;
            padding:0px;
            margin:8px 0px 0px 15px;
        }
        .first-per{
            color:green;
        }
        .first-delivery{
            display:flex;
            width:200px;
            justify-content: space-between;
            align-items:center;
            
        }
        .imag{
            width:50px;
            height:50px;
            object-fit:cover;
            filter: brightness(90%);
        }
        .imeg{
            width:30px;
            height:30px;
            object-fit:cover;
            filter: brightness(90%);
        }
    </style>

@endsection