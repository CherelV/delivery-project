<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Dashboard - @yield('title')
    </title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
  

    <style>
          body{
            font-family: 'Roboto', sans-serif;
            font-size:13px;
            background-color:rgba(100,100,100,0.2);
            margin-left:250px;
            margin-top:100px;
            margin-bottom:1000px;
            }
        .img{
            width:60px;
            height:60px;
            object-fit:cover;
        }
        .pop
        {
            color:rgba(3, 3, 270, 0.8);
            font-size:20px;
            margin-top:0px;
            margin-bottom:0px
        }
         .pop1
        {
            font-weight:normal;
            color:rgba(3, 3, 270, 0.66);
            font-size:12px;
            margin-top:0px;
        } 
        .side-bar{
            z-index:100;
            background-color: white;
            position: fixed;
            left: 0px;
            bottom: 0px;
            top: 0px;
            width: 200px;
            border-radius: 5px;
            padding: 10px;
        }
       
        .side-line-one{
             color:black;
             display: flex;
              margin:2px 0px 0px 0px;
              padding: 10px;
           
        }
        .side-line-one:hover, .side-line-one-hover {
            cursor: pointer;
            background-color:rgba(126, 69, 241, 0.24);
            border-radius:5px;
            transform:scale(1.08);
            transition:500ms;
            

        }
        .icon-side{
            margin-right: 10px;
            width:20px;
            height:20px;
            object-fit:cover;
        }
       
        a{
            color: inherit;
            outline: 0;
            text-decoration: none;
            margin:5px 0px 0px 1px;
            
        }
        .header{
            background-color: white;
            color: white;
            position: absolute;
            left: 240px;
            top: 10px;
            height: 30px;
            right:10px;
            border-radius: 5px;
            padding: 10px;
            z-index:99;  
        }

            <style>
        th{
        border-bottom:2px rgba(100,100,100,0.4) solid;
    }
      th, td {
             padding:10px;
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
             position:fixed;
             right:100px;
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
    @yield('style')

</head>
<body>
    <div class="side-bar">
        <div style="background-color:rgba(249, 246, 246, 0.69); width:160px;display:flex; justify-content:center; align-items:center;padding:20px;border-radius:5px 5px 0px 0px;margin-bottom:10px; ">
                <div>
                <img class="img" src="{{ url('icons/bik4.png') }}">
                
                </div>
                <p class="pop">PopDelivery <br> <span class="pop1">You tap We Deliver</span></p>
    
            </div>
          
            <a href="{{ route('dashboard.page') }}">
                <div
                    @class([
                        'side-line-one',
                        'side-line-one-hover' => Route::currentRouteName() == 'dashboard.page'
                    ])
                >
                
                    <img class="icon-side" src="{{ url('icons/dashboard3.png') }}">
                    <div>DashBoard</div>
                </div>
            </a>

            <a href="{{ route('dashboard.delivery-man') }}">
                <div
                    @class([
                        'side-line-one',
                        'side-line-one-hover' => Route::currentRouteName() == 'dashboard.delivery-man'
                    ])
                >
                    <img class="icon-side" src="{{ url('icons/deliveryman2.png') }}">
                    <div>Delivery Men </div>
                 </div>
            </a>

            <a href="{{ route('dashboard.customers') }}">
                <div 
                        @class([
                            'side-line-one',
                            'side-line-one-hover' => Route::currentRouteName() == 'dashboard.customers'
                        ])
                >
                        <img class="icon-side" src="{{ url('icons/user4.png') }}">
                        <div>Customers</div>
                </div>
            </a>

            <a href="{{ route('dashboard.delivery-list') }}">
                <div 
                        @class([
                            'side-line-one',
                            'side-line-one-hover' => Route::currentRouteName() == 'dashboard.delivery-list'
                        ])
                >
                        <img class="icon-side" src="{{ url('icons/delivery1.png') }}">  
                        <div>Deliveries</div>
                </div>
            </a>

            <a href="{{ route('dashboard.location') }}">
                <div 
                    @class([
                            'side-line-one',
                            'side-line-one-hover' => Route::currentRouteName() == 'dashboard.location'
                        ])
                >
                        <img class="icon-side" src="{{ url('icons/location.png') }}">
                        <div>Location</div>
                </div>
            </a>

            <a href="{{ route('dashboard.location') }}">
                <div 
                    @class([
                            'side-line-one',
                            'side-line-one-hover' => Route::currentRouteName() == 'dashboard.'
                        ])
                >
                        <img class="icon-side" src="{{ url('icons/transaction.png') }}">
                        <div>Transaction</div>
                </div>
            </a>

            <a href="{{ route('dashboard.location') }}">
                <div 
                    @class([
                            'side-line-one',
                            'side-line-one-hover' => Route::currentRouteName() == 'dashboard.'
                        ])
                >
                        <img class="icon-side" src="{{ url('icons/geocalisation.png') }}">
                        <div>Geocalisation</div>
                </div>
            </a>

            <a href="{{ route('dashboard.location') }}">
                <div 
                    @class([
                            'side-line-one',
                            'side-line-one-hover' => Route::currentRouteName() == 'dashboard.'
                        ])
                >
                        <img class="icon-side" src="{{ url('icons/settings1.png') }}">
                        <div>Settings</div>
                </div>
            </a>

            <a href="{{ route('dashboard.location') }}">
                <div style="margin-bottom:20px";
                    @class([
                            'side-line-one',
                            'side-line-one-hover' => Route::currentRouteName() == 'dashboard.'
                        ])
                >
                        <img class="icon-side" src="{{ url('icons/user4.png') }}">
                        <div>Profile</div>
                </div>
            </a>

           
                
            
           @auth
                <form method="POST" action="/logout">
                @csrf
                <button>
                    <div class="side-line-one">
                        <img class="icon-side" src="{{ url('icons/logout.png') }}">
                        <div>
                            Log Out
                        </div>
                    </div>
                </button>               
                </form>
            @endauth
    </div>

    <div class="header">
        <div>
            <input type="search" name="search" placeholder=" search here">
        </div>

    </div>
    @yield('content')

    @yield('script')
        
</body>

</html>