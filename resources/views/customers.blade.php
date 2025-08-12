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
<body  style="font-family:Arial;
            font-size:12px;">
    <h1>Customers</h1>
    <button class="add">
        Add
    </button>
    <table style="border-spacing:0px;
            border: 2px black solid;
            border-radius: 5px">
        <tr>
            <th>Id</th>
            <th>Akwa Palace</th>
            <th>email</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Balance</th>
            <th>DepartureAddress</th>
            <th>DeliveryAddress</th>
        </tr>
        <tr>
            <td> #1</td>
            <td>Akwa Palace</td>
            <td>akwaPalace@gmail.com</td>
            <td>Akwa</td>
            <td>674-25-35-10</td>
            <td>-----</td>
            <td>Akwa-palace</td>
            <td>Rondpoint-Deido</td>
        </tr>
         <tr>
            <td> #2</td>
            <td>IUGET</td>
            <td>iuget@gmail.com</td>
            <td>Bonamoussadi</td>
            <td>671-11-35-10</td>
            <td>-----</td>
            <td>IUGET-Bonamoussadi</td>
            <td>Zepol-Akwa</td>
       <tr>
            <td> #3</td>
            <td>Fernand</td>
            <td>iuc@gmail.com</td>
            <td>logbessou</td>
            <td>674-25-35-10</td>
            <td>-----</td>
            <td>IUC-logbessou</td>
            <td>Makepe-petitpays</td>
        </tr>
    </table>
</body>
</html>