@extends('dashboard.layout')

@section('title',  'Location')

@section('style')
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
    </style>
@endsection

@section('content')

    <h1>Location</h1>
    <button class="add">
        Add
    </button>
    <table style="border-spacing:0px 2px; 
            border-radius: 2px;
            background-color:white;
            padding:10px;
            margin-left: auto;
        margin-right: auto;">
        <tr>
            <th>Id</th>
            <th>City</th>
            <th>Zone</th>
            <th>Quartier</th>

           
        </tr>
        <tr>
            <td> #1</td>
            <td>Douala</td>
            <td>Douala I</td>
            <td>Bali</td>

        </tr>
         
    </table>

@endsection

