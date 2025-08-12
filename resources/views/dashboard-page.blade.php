<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .first-stat{
            display:inline-block;
            padding:15px;
            border: 2px black solid;
            border-radius:5px;
            margin-left: 10px;
             margin-top:10px
        }
        .first-total{
            color:grey;
        }
        .first-num{
          
            font-size:20px;
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
    </style>
</head>
<body style="font-family:Arial;
            font-size:12px;">

    <h2  style="font-size:20px;">
       Dashboard 
    </h2>

        <div style="display:inline-block
                    margin-top:0px;
                   "> 
            <div class="first-stat">
                <div class="first-total"> Total Number of deliveryMan</div>
                <div class="first-num">50</div>
                <div class="first-total"> <span class="first-per">+2%</span> since last week</div>
            </div>
        
    
            <div class="first-stat">
                <div class="first-total"> Total Number of Customers</div>
                <div class="first-num"> 100 </div>
                <div class="first-total"> <span class="first-per">+5%</span> since last week</div>
            </div>
        
            <div class="first-stat">
                <div class="first-total"> Total Number of Deliveries</div>
                <div class="first-num"> 100 </div>
                <div class="first-total"> <span class="first-per">+1%</span> since last week</div>
            </div>
        </div>
       

    <div class="first-stat" >
        <div class="fisrt-delivery" >
            <img src="resources/views/hamburger-menu.svg">
            <div style=" display:inline-block;">
                <div class="first-total"> Delivery Completed</div>
                <div class="first-num"> 80 </div>
            </div>
        </div> <hr>
         <div style="
                    diplay:flex">
            <img src="resources/views/hamburger-menu.svg">
            <div style=" display:inline-block;">
                <div class="first-total"> Delivery Canceled</div>
                <div class="first-num"> 80 </div>
            </div>
        </div><hr>
         <div style="
                    diplay:flex">
            <img src="resources/views/hamburger-menu.svg">
            <div style=" display:inline-block;">
                <div class="first-total"> Delivery Pending</div>
                <div class="first-num"> 80 </div>
            </div>
        </div>
    </div>

</body>
</html>