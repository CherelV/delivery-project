<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            background-color: white;
            position: fixed;
            left: 10px;
            bottom: 10px;
            top: 10px;
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
        .side-line-one:hover{
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
        }
        .header{
            background-color: white;
            color: white;
            position: fixed;
            left: 240px;
            top: 10px;
            height: 30px;
            right:10px;
            border-radius: 5px;
            padding: 10px;
            z-index:100;  
        }
        
    </style>
</head>
<body>
    <div class="side-bar">
        <div style="background-color:rgba(249, 246, 246, 0.69); width:160px;display:flex; justify-content:center; align-items:center;padding:20px;border-radius:5px 5px 0px 0px;margin-bottom:10px; ">
                <div>
                
                <img class="img" src="{{ url('icons/bik4.png') }}">
                
                </div>
                <p class="pop">PopDelivery <br> <span class="pop1">You tap We Deliver</span></p>
    
            </div>
          
           
            <div class="side-line-one">
            <img class="icon-side" src="{{ url('icons/dashboard3.png') }}">
            <div><a href="/dashboard-page">DashBoard</a></div>
           </div>
            <div class="side-line-one">
            <img class="icon-side" src="{{ url('icons/deliveryman2.png') }}">
            <div><a href="/dashboard-page">Delivery Men</a> </div>
           </div>
           <div class="side-line-one">
            <img class="icon-side" src="{{ url('icons/user4.png') }}">
            <div><a href="/dashboard-page">Customers</a></div>
           </div>
           <div class="side-line-one">
            <img class="icon-side" src="{{ url('icons/delivery1.png') }}">
            <div><a href="/dashboard-page">Deliveries</a></div>
           </div>
           <div class="side-line-one">
            <img class="icon-side" src="{{ url('icons/location.png') }}">
            <div><a href="/dashboard-page">Location</a></div>
           </div>
           <div class="side-line-one">
            <img class="icon-side" src="{{ url('icons/transaction.png') }}">
            <div><a href="/dashboard-page">Transaction</a></div>
           </div>
           <div class="side-line-one">
            <img class="icon-side" src="{{ url('icons/geocalisation.png') }}">
            <div><a href="/dashboard-page">Geocalisation</a></div>
           </div>
           <div class="side-line-one">
            <img class="icon-side" src="{{ url('icons/settings1.png') }}">
            <div><a href="/dashboard-page">Settings</a></div>
           </div>
           <div class="side-line-one" style="margin-bottom:20px">
            <img class="icon-side" src="{{ url('icons/user4.png') }}">
            <div><a href="/dashboard-page">Profile</a></div>
           </div>
           <div class="side-line-one">
            <img class="icon-side" src="{{ url('icons/logout.png') }}">
            <div><a href="/dashboard-page">Log Out</a></div>
           </div>
    </div>

    <div class="header">
        <div>
            <input type="search" name="search" placeholder=" search here">
        </div>

    </div>    
        
</body>

</html>