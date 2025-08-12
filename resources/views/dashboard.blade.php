<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

        .side-bar{
            background-color: black;
            color: white;
            position: fixed;
            left: 10px;
            bottom: 10px;
            top: 10px;
            width: 150px;
            border-radius: 5px;
            padding: 10px;
        }
        .side-line{
            display: flex;
            margin:20px 0px;
            justify-content:center;
            align-items:center
           
        }
        .side-line-one{
             display: flex;
              margin:10px 0px;
              padding: 10px;
           
        }
        .side-line-one:hover{
            cursor: pointer;
            color:black;
            background-color:white;
            border-radius:5px;
        }
        .icon-side{
            margin-right: 10px;
        }
    </style>
</head>
<body style="font-family:Arial;
            font-size:12px;
            margin-left:200px">
    <div class="side-bar">
           <div class="side-line">
            <img class="icon-side" src="hamburger-menu.svg">
            <div >POP-D</div>
           </div>
            <div class="side-line-one">
            <img class="icon-side" src="hamburger-menu.svg">
            <div>Dashboard</div>
           </div>
            <div class="side-line-one">
            <img class="icon-side" src="hamburger-menu.svg">
            <div>Delivery Men </div>
           </div>
           <div class="side-line-one">
            <img class="icon-side" src="hamburger-menu.svg">
            <div>Customers</div>
           </div>
           <div class="side-line-one">
            <img class="icon-side" src="hamburger-menu.svg">
            <div>Deliveries</div>
           </div>
           <div class="side-line-one">
            <img class="icon-side" src="hamburger-menu.svg">
            <div>Location</div>
           </div>
           <div class="side-line-one">
            <img class="icon-side" src="hamburger-menu.svg">
            <div>Transactions</div>
           </div>
           <div class="side-line-one">
            <img class="icon-side" src="hamburger-menu.svg">
            <div>Geocalisation</div>
           </div>
           <div class="side-line-one">
            <img class="icon-side" src="hamburger-menu.svg">
            <div>Settings</div>
           </div>
           <div class="side-line-one">
            <img class="icon-side" src="hamburger-menu.svg">
            <div>Profile</div>
           </div>
           <div class="side-line-one" 
           style="position: fixed;
            bottom: 10px;
           ">
            <img class="icon-side" src="hamburger-menu.svg">
            <div>Log Out</div>
           </div>
    </div>

     
   
</body>
</html>