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
    </style>
</head>
<body style="font-family:Arial;
            font-size:12px;">
            
    <h1>Delivery List</h1>
    <button class="add">
        Add
    </button>
    <table style="border-spacing:10px;
            border: 2px black solid;
            border-radius: 5px">
        <tr>
            <th>Delivery</th>
            <th>Customer</th>
            <th>DeliveryMan</th>
            <th>Status</th>
            <th>Date</th>
        </tr>

        <tr>
            <td> #2001</td>
            <td> Akwa Palace</td>
            <td>  Mbeh</td>
            <td id="delivered"> delivered</td>
            <td> 19.07.2025</td>
        </tr>
        <tr>
            <td> #2001</td>
            <td>IUGET</td>
            <td> Kamga</td>
            <td id="canceled"> Canceled</td>
            <td> 19.07.2025</td>
        </tr>
           <tr>
            <td> #2001</td>
            <td>IUC </td>
            <td> Fernand</td>
            <td id="pending"> Pending</td>
            <td> 19.07.2025</td>
        </tr>
    </table>
</body>
</html>