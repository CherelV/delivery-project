
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
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
    <script src="https://code.jquery.com/jquery-3.7.1.js" 
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" 
        crossorigin="anonymous"
    ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.js" 
        integrity="sha512-eSeh0V+8U3qoxFnK3KgBsM69hrMOGMBy3CNxq/T4BArsSQJfKVsKb5joMqIPrNMjRQSTl4xG8oJRpgU2o9I7HQ==" 
        crossorigin="anonymous" referrerpolicy="no-referrer"
    ></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css" 
        integrity="sha512-yVvxUQV0QESBt1SyZbNJMAwyKvFTLMyXSyBHDO4BG5t7k/Lw34tyqlSDlKIrIENIzCl+RVUNjmCPG+V/GMesRw==" 
        crossorigin="anonymous" referrerpolicy="no-referrer" 
    />
</head>

<body>
    <div class="p0" >
                <p class="p1">Create Delivery </p>
                <p class="p2"> Please enter the neccessary <br> information to create a Delivery</p> 
                <p class="p3"></p>
    @dump($errors)
    <form method="POST" action="{{ route('delivery-list.storeDel') }}">
        @csrf
        <div>
            <label>Customer Name</label><br>
            <input type="hidden" name="customer_id" value="{{ $selectedCustomer->id }}">
            <div class="customer-info">
                <strong>{{ $selectedCustomer->user->name }}</strong>
                <small>(ID: {{ $selectedCustomer->id }})</small>
            </div>
        </div>

        <div>
            <label>DeliveryMan Name</label><br>
            <input type="hidden" name="delivery_man_id" value="{{ $selectedDeliveryMan->id }}">
            <div class="deliveryman-info">
                <strong>{{ $selectedDeliveryMan->user->name }}</strong>
                 <small>{{ $selectedDeliveryMan->pending_count ?? 0 }} pending deliveries</small>
            </div>

        </div>
        <div >

        <label >Departure Address:</label><br>
        <select name="departure_address_id" class="ch" required>
            <option value="">-- Choose Departure Address --</option>
            @foreach ($quarters as $quarter)
                <option value="{{ $quarter->id }}">{{ $quarter->name }}</option>
            @endforeach
        </select>
        @error('') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
    </div>



    <div >
        <label >Destination Quarter:</label><br>
        <select name="destination_address_id" id="destination_quarter_id" class="ch" required>
            <option value="">-- Choose Destination Quarter --</option>
            @foreach ($quarters as $quarter)
                <option value="{{ $quarter->id }}">{{ $quarter->name }}</option>
            @endforeach
        </select>
        @error('') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
    </div>
                    <label>Item Description</label><br>
                    <input name="item_description" type="text" placeholder="Douala ancient depot"><br>
                    @error('name') <div>{{ $message }}</div> @enderror
                    <div >
        <label >Status</label><br>
        <select name="status" required>
            <option value="">     </option>
                <option value="pending">pending</option>
                <option value="canceled">canceled</option>
                <option value="completed">completed</option>
           
        </select>
        @error('destination_quarter_id') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
    </div>
                    <label>Fee </label><br>
                    <input name="fee" type="text" placeholder="###########"><br>
                    @error('name') <div>{{ $message }}</div> @enderror

                    <label>Delivered On</label><br>
                    <input name="delivered_on" type="datetime-local" placeholder="###########"><br>
                    @error('name') <div>{{ $message }}</div> @enderror

                    <button type="submit"> Save Delivery </button>
                </form>
    </div>
    <script>
        $(document).ready(function (){
           $('.ch').chosen();
        });
    </script>
</body>

</html>