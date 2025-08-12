<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    th{
        border-bottom:2px black solid;
    }
      th, td {
             padding:10px;
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
            padding:6px 13px;
            color:white;
            background-color:green;
            border:none;
             border-radius:5px;
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
             background-color:white;
             color:black;
             cursor:pointer; 
        }
        button{
            padding: 2px 5px;
            color:grey;
            background-color:white;
            border:none;
        }
        .modal{
            display: none; 
            position: fixed; 
            z-index: 1;
            right:30px;
            top: 30px;
            width: 200px; 
            height:  420px; 
            overflow: auto;
            color:white;
            background-color:black;
            box-shadow: 2px 3px 3px rgba(0,0,0,0.7) ;
            padding:2px 2px 2px 10px;
            border-radius:10px;
        }
    </style>
   
    
</head>
<body style="font-family:Arial;
            font-size:12px;">
    <h1>Delivery Men List</h1>
    <button class="add">
        Add
    </button>
    <table style="border-spacing:0px;
            border: 2px black solid;
            border-radius: 5px">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>email</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Vehicle</th>
            <th>Balance</th>
            <th>Status</th>
            <th>More</th>
        </tr>
        <tr>
            <td> #1</td>
            <td>Mbeh</td>
            <td>mbeh@gmail.com</td>
            <td>Deido</td>
            <td>674-25-35-10</td>
            <td>Taxi</td>
            <td>-----</td>
            <td><input type="checkbox"> Active</td>
            <td><button id="myBtn">more...</button></td>
        </tr>
         <tr>
            <td> #2</td>
            <td>Kamga</td>
            <td>kamga@gmail.com</td>
            <td>Bonandjo</td>
            <td>671-11-35-10</td>
            <td>Taxi</td>
            <td>-----</td>
            <td><input type="checkbox"> Active</td>
            <td><button id="myBtn">more...</button></td>
       <tr>
            <td> #1</td>
            <td>Fernand</td>
            <td>fernand@gmail.com</td>
            <td>Makepe</td>
            <td>674-25-35-10</td>
            <td>Moto-bike</td>
            <td>-----</td>
            <td><input type="checkbox"> Active</td>
            <td><button id="myBtn">more...</button></td>
        </tr>
    </table>

    <div id="myModal" class="modal">
       
        <div  class="part">
             <span  class="exit">&times;</span>
            <p>id: #1</p>
            <p>status:<input type="checkbox">Active</p>
        </div>
        <div>
            <img class="image" src="{{ url('icons/successful-female-photographer-making-photos-modern-architecture (1).jpg') }}">
        </div>
        <p>Name: Mbeh</p>
        <div  class="part">
            <img class="images" src="{{ url('icons/542689.png') }}">
            <img class="images" src="{{ url('icons/2956149.png') }}">
        </div>

        <p>more information</p>
        <p>email: mbeh@gmail.com</p>
        <p>address: Deido</p>
        <p>phone: 674-35-45-10</p>
        <p>vehicle: taxi</p>
        <p>licence number:  </p>
        <p>plate number: CMR CE 128 BC</p>
        <p>last location : </p>
    </div>

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
</body>
</html>