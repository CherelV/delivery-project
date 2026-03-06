<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivery Man Login - PopDelivery</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
       
    <style>
        body{
            font-family: 'Poppins', sans-serif;
            font-size:12px;
            background-color:rgba(100,100,100,0.2);
        }
        a{
            text-decoration:none;
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
        
        .p4, .p5{
            color:grey;
            margin: 2px 20px 10px 0px;
        }
        .p4:hover{
            color:rgba(3, 3, 270, 0.8);  
        }
        .p5{
            color:rgba(3, 3, 270, 0.8);
            margin: 2px 20px 10px 0px;
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
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
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
        .pop{
            color:white;
            font-size:25px;
            margin-top:0px;
            margin-bottom:0px;
            font-weight: 700;
        }
        .pop1{
            font-weight:normal;
            color:rgba(255, 255, 255, 0.66);
            font-size:14px;
            margin-top:0px;
            display: block;
        }
         
        .error{   
            margin-top:-10px;
            color:red;
            font-size:10px;
            margin-bottom: 10px;
        }
        
        .role-badge{
            background-color: rgba(3, 3, 270, 0.1);
            color: rgba(3, 3, 270, 0.8);
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 11px;
            font-weight: 700;
            display: inline-block;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div style="display:flex;justify-content:center; align-items:center">
        <div style="display:flex; background-color:white;margin-top:3%;border-radius:10px;">
            <div style="background-color:rgba(3, 3, 270, 0.8); width:400px;display:flex; justify-content:center; align-items:center;border-radius:10px 0px 0px 10px; flex-direction: column; padding: 20px;">
                <img class="img" src="{{ url('icons/bik4.png') }}" alt="Delivery Bike">
                <p class="pop">PopDelivery <br> <span class="pop1">You tap We Deliver</span></p>
                <div class="role-badge">DELIVERY PARTNER</div>
            </div>
         
            <div style="display:inline-block;padding:32px;">
                <div class="p0">
                    <p class="p1">Delivery Login</p>
                    <p class="p2">Please enter your credentials <br> to access your deliveries</p> 

                    @if($errors->any())
                        <div style="background-color: #ffebee; padding: 10px; border-radius: 5px; margin-bottom: 15px;">
                            @foreach($errors->all() as $error)
                                <p class="error" style="margin-top:0;">{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif

                    <form method="POST" action="{{ route('deliveryMan.login') }}">
                        @csrf
                        
                        <label>Email</label><br>
                        <input name="email" type="email" placeholder="delivery@example.com" value="{{ old('email') }}" required><br>
                        @error('email')
                            <p class="error">{{ $message }}</p>
                        @enderror

                        <label>Password</label><br>
                        <input name="password" type="password" placeholder="*********" required><br>
                        @error('password')
                            <p class="error">{{ $message }}</p>
                        @enderror
                        
                        <div style="display:flex; align-items: center;">
                            <input class="check" name="remember" type="checkbox" checked="true"> 
                            <p class="p4" style="margin-left: 5px;">Remember me</p>
                            <p class="p5"><a href="#" style="color:rgba(3, 3, 270, 0.8);">Forget Password?</a></p>
                        </div>
                        
                        <button type="submit">LOGIN AS DELIVERY MAN</button>
                        
                        <div style="text-align: center; margin-top: 15px;">
                            <a href="{{ route('landing.page.home') }}" style="color: grey;">← Back to Home</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>