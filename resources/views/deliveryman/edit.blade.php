
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
   <style>
        body{
            font-family: 'Poppins', sans-serif;
            font-size:12px;
            background-color:rgba(100,100,100,0.2);
            }
        .p1{
            font-size:32px;
            margin: 0px 0px 0px 0px;
            font-weight:700;
        }
        
        .p2{
            color:grey;
            margin: 0px 0px 0px 0px;
            line-height:20.4px;

        }
        
        .p4,.p5{
            color:grey;
            margin: 2px 20px 10px 0px;
        }
        .p5{
            color:rgba(3, 3, 270, 0.8);
        }
        .p0{
            display:inline-block;
            border:2px white solid;
            padding: 20px 30px;
            border-radius:6px;
        }
        
        input{
            padding:5px;
            padding-left:20px;
            font-size:12px;
            height:20px;
            width:92%;
            margin-top: 8px;
            margin-bottom: 20px;
            border-radius:3px;
            border:2px rgba(100,100,100,0.3) solid;
        }
        button{
            height:40px;
            width:100%;
            background-color:rgba(3, 3, 270, 0.8);
            color:white;
            border-radius:5px;
            border:2px white solid;
            margin-top: 10px;
            margin-bottom: 10px;


        }
        button:hover{
            border:2px rgba(3, 3, 270, 0.8) solid;
            background-color:white;
            color:rgba(3, 3, 270, 0.8);
            cursor:pointer
        }
        .check{
            height:15px;
            width:15px; 
        }
        .img{
            width:100px;
            height:100px;
            object-fit:cover;
        }
        .pop
        {
            color:white;
            font-size:25px;
            margin-top:0px;
            margin-bottom:0px
        }
         .pop1
        {
            font-weight:normal;
            color:rgba(255, 255, 255, 0.66);
            font-size:14px;
            margin-top:0px
        }
        a{
            text-decoration:none;
        }   
    </style>
</style>

<body>
    <div class="p0" >
                <p class="p1">Create DeliveryMan </p>
                <p class="p2"> Please enter the neccessary <br> information to create a customer</p> 
                <p class="p3"></p>
    <form method="POST" action="/delivery-man/{{$delivery_man->id}}">
        {{-- //delivery-man/{{$delivery_man->id}} --}}
                    @csrf
                    @method('PATCH')

                    <label>User name</label><br>
                    <input name="name" type="text" placeholder="Emma" value="{{ $delivery_man ->user->name }}" ><br>
                    @error('name') <div>{{ $message }}</div> @enderror
                    <label>Email</label><br>
                    <input name="email" type="email" placeholder="Emmagmail.com" value="{{ $delivery_man ->user->email }}"><br>
                    @error('email') <div>{{ $message }}</div> @enderror
                    
                    <label>Address</label><br>
                    <input name="address" type="text" placeholder="Douala ancient depot" value="{{ $delivery_man ->user->address }}"><br>
                    @error('address') <div>{{ $message }}</div> @enderror
                    <label>Password</label><br>
                    <input name="password" type="password" placeholder="*********" value="{{ $delivery_man ->user->password }}"><br>
                    @error('password') <div>{{ $message }}</div> @enderror
                    
                    <label>Mobile</label><br>
                    <input name="mobile" type="text" placeholder="+237 672727272" value="{{ $delivery_man ->user->mobile }}"><br>
                    @error('mobile') <div>{{ $message }}</div> @enderror

                    <label>National ID</label><br>
                    <input name="national_id" type="text" placeholder="###########" value="{{ $delivery_man ->user->national_id }}"><br>
                    @error('national_id') <div>{{ $message }}</div> @enderror

                    <label>License Number</label><br>
                    <input name="license_number" type="text" placeholder="###########" value="{{ $delivery_man ->license_number }}"><br>
                    @error('license_number') <div>{{ $message }}</div> @enderror

                    <label>License Class</label><br>
                    <input name="license_class" type="text" placeholder="###########" value="{{ $delivery_man ->license_class }}"><br>
                    @error('license_class') <div>{{ $message }}</div> @enderror

                    <label>Vehicle Type</label><br>
                    <input name="vehicle_type" type="text" placeholder="###########" value="{{ $delivery_man ->vehicle_type}}"><br>
                    @error('vehicle_type') <div>{{ $message }}</div> @enderror

                    <label>Plate Number</label><br>
                    <input name="number_plate" type="text" placeholder="###########" value="{{ $delivery_man ->number_plate}}"><br>
                    @error('number-plate') <div>{{ $message }}</div> @enderror

                
            <button type="submit" >Update</button>
            
            <button form="delete-form">Delete</button>
                </form>

                <a href="/delivery-man/{{$delivery_man->id}}"><button>Cancel</button> </a>
           
                <form method="POST" action="/delivery-man/{{$delivery_man->id}}" id="delete-form"  >
                    @csrf
                    @method('DELETE')
                </form>
    </div>

</body>

</html>