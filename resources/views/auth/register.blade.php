<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
       <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body{
            font-family: 'Poppins', sans-serif;
            font-size:12px;
            background-color:rgba(100,100,100,0.2)
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
        .p3{
            color:grey;
            margin: 0px 0px 10px 0px;
        }
        .p4{
            color:grey;
            font-size:8px;
            margin: 0px 0px 0px 0px;
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
            margin-top: 0px;
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
        .error
        {   margin-top:-10px;
            color:red;
            font-size:10px
        }
          
    </style>
</head>
<body >
    
    <div style="display:flex;justify-content:center; align-items:center; ">
    <div style="display:flex; background-color:white ;margin-top:3%;border-radius:10px;">
        <div  style=" display:inlie-block;padding:0px 28px;">
            <div class="p0" >
                <p class="p1">Create Account</p>
                <p class="p2"> Please enter the neccessary</p> 
                <p class="p3">information to create the account</p>

                <form form method="POST" action="{{ route('register.store') }}">
                     @csrf
                     
                    <label>Name</label><br>
                    <input name="name" type="text" placeholder="Emma"><br>
                    @error('name')
                        <p class="error">{{ $message }}</p>
                    @enderror

                    <label>Email</label><br>
                    <input name="email" type="email" placeholder="Emmagmail.com"><br>
                    @error('email')
                        <p class="error">{{ $message }}</p>
                    @enderror

                    <label>Mobile</label><br>
                    <input name="mobile" type="text" placeholder="+237 000 000 000"><br>
                    @error('mobile')
                        <p class="error">{{ $message }}</p>
                    @enderror

                    <label>Address</label><br>
                    <input name="address" type="text" placeholder="Bepanda Tonnerre"><br>
                    @error('address')
                        <p class="error">{{ $message }}</p>
                    @enderror

                    <label>Password</label><br>
                    <input name="password" type="password" placeholder="*********"><br>
                    @error('password')
                        <p class="error">{{ $message }}</p>
                    @enderror

                    <label>Confirm Password</label><br>
                    <input name="password_confirmation" type="password" placeholder="*********"><br>
                    @error('password_confirmation')
                        <p class="error">{{ $message }}</p>
                    @enderror
                    
                    <div style="display:flex; align-items: baseline;">
                    <input class="check" name="check" type="checkbox" checked="true"> 
                    <p class="p4"> I accept all the terms and conditions and agree to the privacy policy</p>
                    </div>
                    <button> Create Account </button>
                </form>
            </div>
        </div>
        <div style="background-color:rgba(3, 3, 270, 0.8); width:400px;display:flex; justify-content:center; align-items:center;border-radius:0px 10px 10px 0px;">
            <div>
            
            <img class="img" src="{{ url('icons/bik4.png') }}">
            
            </div>
            <p class="pop">PopDelivery <br> <span class="pop1">You tap We Deliver</span></p>
          
            
        </div>
    </div>
    </div>
</body>
</html>