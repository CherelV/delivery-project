{{-- <!DOCTYPE html>
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
</html> --}}


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Sign Up· PopDelivery</title>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        *, *::before, 
        *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --blue: #3B6FE8;
            --blue-dark: #2a5bd4;
            --text: #1a1a2e;
            --muted: #8a8fa8;
            --border: #e2e5f0;
            --bg: #f5f6fa;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--bg);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        a { text-decoration: none; }

        /* ── Card ── */
        .login-card {
            display: flex;
            width: 960px;
            min-height: 600px;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(0,0,0,0.12);
            margin: 20px;
        }

        /* ── Left Form Panel ── */
        .form-panel {
            flex: 0 0 55%;
            background: #fff;
            padding: 56px 52px 48px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 48px;
        }
        .brand-icon {
            width: 34px;
            height: 34px;
            background: var(--blue);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 16px;
        }
        .brand-name {
            font-size: 17px;
            font-weight: 700;
            color: var(--text);
            letter-spacing: -0.3px;
        }

        .form-header {
            margin-bottom: 36px;
        }
        .form-header .subtitle {
            font-size: 13px;
            color: var(--muted);
            font-weight: 400;
            margin-bottom: 6px;
        }
        .form-header h1 {
            font-size: 28px;
            font-weight: 700;
            color: var(--text);
            letter-spacing: -0.5px;
        }

        /* ── Floating Label Inputs ── */
        .field {
            position: relative;
            margin-bottom: 20px;
        }
        .field label {
            position: absolute;
            top: 50%;
            left: 16px;
            transform: translateY(-50%);
            font-size: 13px;
            color: var(--muted);
            background: #fff;
            padding: 0 4px;
            transition: all 0.2s ease;
            pointer-events: none;
        }
        .field input {
            width: 100%;
            height: 52px;
            border: 1.5px solid var(--border);
            border-radius: 10px;
            padding: 0 44px 0 16px;
            font-size: 14px;
            font-family: 'DM Sans', sans-serif;
            color: var(--text);
            outline: none;
            transition: border-color 0.2s;
            background: transparent;
        }
        .field input:focus,
        .field input:not(:placeholder-shown) {
            border-color: var(--blue);
        }
        .field input:focus ~ label,
        .field input:not(:placeholder-shown) ~ label {
            top: 0;
            font-size: 11px;
            color: var(--blue);
        }
        .field .field-icon {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--muted);
            font-size: 15px;
            cursor: pointer;
        }

        /* ── Extras Row ── */
        .extras {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 24px;
            font-size: 12.5px;
        }
        .remember {
            display: flex;
            align-items: center;
            gap: 8px;
            color: var(--muted);
        }
        .remember input[type="checkbox"] {
            width: 15px;
            height: 15px;
            accent-color: var(--blue);
            cursor: pointer;
        }
        .reg-links {
            display: flex;
            gap: 14px;
        }
        .reg-links a {
            color: var(--muted);
            transition: color 0.2s;
        }
        .reg-links a:hover { color: var(--blue); }
        .forgot { color: var(--blue); font-weight: 500; }
        .forgot:hover { text-decoration: underline; }

        /* ── Submit Button ── */
        .btn-submit {
            width: 100%;
            height: 52px;
            background: var(--blue);
            color: #fff;
            border: none;
            border-radius: 10px;
            font-size: 15px;
            font-weight: 600;
            font-family: 'DM Sans', sans-serif;
            cursor: pointer;
            transition: background 0.2s, transform 0.1s;
            letter-spacing: 0.2px;
        }
        .btn-submit:hover { background: var(--blue-dark); transform: translateY(-1px); }
        .btn-submit:active { transform: translateY(0); }

        /* ── Divider ── */
        .divider {
            display: flex;
            align-items: center;
            gap: 14px;
            margin: 24px 0;
            color: var(--muted);
            font-size: 12px;
        }
        .divider::before, .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: var(--border);
        }

        /* ── Social Buttons ── */
        .social-row {
            display: flex;
            gap: 14px;
        }
        .social-btn {
            flex: 1;
            height: 48px;
            border: 1.5px solid var(--border);
            border-radius: 10px;
            background: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: border-color 0.2s, box-shadow 0.2s;
            text-decoration: none;
        }
        .social-btn:hover {
            border-color: var(--blue);
            box-shadow: 0 2px 12px rgba(59,111,232,0.12);
        }
        .social-btn i { font-size: 20px; }
        .social-btn .fa-facebook-f { color: #1877F2; }
        .social-btn .fa-google     { color: #EA4335; }
        /* Apple icon — black */
        .social-btn .fa-apple      { color: #000; }

        /* ── Footer ── */
        .form-footer {
            margin-top: 32px;
            font-size: 13px;
            color: var(--muted);
        }
        .form-footer a { color: var(--blue); font-weight: 600; }
        .form-footer a:hover { text-decoration: underline; }

        /* ── Error ── */
        .error {
            color: #e53e3e;
            font-size: 11px;
            margin-top: -14px;
            margin-bottom: 10px;
        }

        /* ── Right Visual Panel ── */
        /* .visual-panel {
            flex: 1;
            background: linear-gradient(135deg,
                #a8c8f8 0%,
                #7aaef5 15%,
                #4d8fe8 30%,
                #6ab3f5 45%,
                #c4a8f0 60%,
                #f0b8d8 75%,
                #e8c8f0 90%,
                #b8d8f8 100%
            );
            position: relative;
            overflow: hidden;
        } */
        /* Layered fluid blobs */
        /* .visual-panel::before {
            content: '';
            position: absolute;
            inset: -20%;
            background:
                radial-gradient(ellipse 60% 40% at 30% 60%, rgba(255,255,255,0.25) 0%, transparent 60%),
                radial-gradient(ellipse 40% 60% at 70% 30%, rgba(180,120,255,0.3) 0%, transparent 55%),
                radial-gradient(ellipse 50% 50% at 50% 80%, rgba(255,180,220,0.35) 0%, transparent 60%),
                radial-gradient(ellipse 70% 40% at 20% 20%, rgba(100,160,255,0.4) 0%, transparent 55%);
            animation: blobShift 12s ease-in-out infinite alternate;
        } */
        /* .visual-panel::after {
            content: '';
            position: absolute;
            inset: 0;
            background:
                radial-gradient(circle at 55% 45%, rgba(255,255,255,0.15) 0%, transparent 40%),
                radial-gradient(circle at 25% 75%, rgba(120,180,255,0.2) 0%, transparent 35%);
        } */
        /* Floating orbs */
        .orb {
            position: absolute;
            border-radius: 50%;
            filter: blur(1px);
            animation: floatOrb 8s ease-in-out infinite;
        }
        .orb-1 {
            width: 12px; height: 12px;
            background: rgba(255,255,255,0.7);
            top: 20%; left: 55%;
            animation-delay: 0s;
        }
        .orb-2 {
            width: 8px; height: 8px;
            background: rgba(255,255,255,0.5);
            top: 45%; left: 75%;
            animation-delay: 2s;
        }
        .orb-3 {
            width: 6px; height: 6px;
            background: rgba(255,255,255,0.6);
            top: 65%; left: 40%;
            animation-delay: 4s;
        }
        .orb-4 {
            width: 10px; height: 10px;
            background: rgba(255,255,255,0.4);
            top: 30%; left: 30%;
            animation-delay: 1s;
        }
        .orb-5 {
            width: 5px; height: 5px;
            background: rgba(255,255,255,0.8);
            top: 75%; left: 65%;
            animation-delay: 3s;
        }

        @keyframes blobShift {
            0%   { transform: translate(0, 0) rotate(0deg); }
            50%  { transform: translate(3%, 2%) rotate(3deg); }
            100% { transform: translate(-2%, 4%) rotate(-2deg); }
        }
        @keyframes floatOrb {
            0%, 100% { transform: translateY(0) scale(1); opacity: 0.7; }
            50%       { transform: translateY(-18px) scale(1.2); opacity: 1; }
        }

        /* ── Responsive ── */
        @media (max-width: 768px) {
            .login-card { flex-direction: column; width: 95%; min-height: auto; }
            .visual-panel { height: 200px; }
            .form-panel { padding: 36px 28px; }
        }
    </style>
</head>
<body>
<div class="login-card">

    <!-- ── Left: Form ── -->
    <div class="form-panel">
        <div>
            <!-- Brand -->
            <div class="brand">
                <div class="brand-icon"><i class="fas fa-bolt"></i></div>
                <span class="brand-name">PopDelivery</span>
            </div>

            <!-- Header -->
            <div class="form-header">
                <p class="subtitle">Welcome back</p>
                <h1>Sign Up to PopDelivery</h1>
            </div>

            <!-- Form -->
           <form form method="POST" action="{{ route('register.store') }}">
                @csrf

                <!-- Username -->
                <div class="field">
                    <input name="name" type="text" placeholder=" " id="username">
                    <label for="username">User name</label>
                    <span class="field-icon"><i class="far fa-user"></i></span>
                </div>
                @error('name')
                    <p class="error">{{ $message }}</p>
                @enderror

                <!-- Email -->
                <div class="field">
                    <input name="email" type="email" placeholder=" " id="email">
                    <label for="email">E-mail</label>
                    <span class="field-icon"><i class="far fa-envelope"></i></span>
                </div>
                @error('email')
                    <p class="error">{{ $message }}</p>
                @enderror

                <div class="field">
                    <input name="mobile" type="text" placeholder="+237 674 38 79 44" id="mobile">
                    <label for="mobile">mobile</label>
                    <span class="field-icon"><i class="far fa-user"></i></span>
                </div>
                @error('mobile')
                    <p class="error">{{ $message }}</p>
                @enderror

                <div class="field">
                    <input name="address" type="text" placeholder=" " id="address">
                    <label for="address">address</label>
                    <span class="field-icon"><i class="far fa-user"></i></span>
                </div>
                @error('name')
                    <p class="error">{{ $message }}</p>
                @enderror

                  <!-- Password -->
                <div class="field">
                    <input name="password" type="password" placeholder=" " id="password">
                    <label for="password">Password</label>
                    <span class="field-icon" onclick="togglePwd()"><i class="far fa-eye" id="eye-icon"></i></span>
                </div>
                
                <div class="field">
                    <input name="password_confirmation" type="text" placeholder=" " id="password_confirmation">
                    <label for="password_confirmation">Confirm Password</label>
                    <span class="field-icon"><i class="far fa-user"></i></span>
                </div>
                @error('name')
                    <p class="error">{{ $message }}</p>
                @enderror


                

              

                <!-- Extras -->
                <div class="extras">
                    <label class="remember">
                        <input type="checkbox" name="remember" checked>
                        Remember me
                    </label>
                    {{-- <div class="reg-links">
                        <a href="#">Customer</a>
                        <a href="#">DeliveryMan</a>
                    </div> --}}
                    {{-- <a href="#" class="forgot">Forgot password?</a> --}}
                </div>

                <button type="submit" class="btn-submit">Sign Up</button>
            </form>

            <!-- Divider -->
            <div class="divider">or login with</div>

            <!-- Social -->
            <div class="social-row">
                <a href="#" class="social-btn" aria-label="Facebook">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" class="social-btn" aria-label="Google">
                    <i class="fab fa-google"></i>
                </a>
                <a href="#" class="social-btn" aria-label="Apple">
                    <i class="fab fa-apple"></i>
                </a>

            </div>
        </div>

        <!-- Footer -->
       
    </div>

    <!-- ── Right: Visual ── -->
    <div class="visual-panel">
        <div class="orb orb-1"></div>
        <div class="orb orb-2"></div>
        <div class="orb orb-3"></div>
        <div class="orb orb-4"></div>
        <div class="orb orb-5"></div>
    </div>

</div>

<script>
function togglePwd() {
    const input = document.getElementById('password');
    const icon  = document.getElementById('eye-icon');
    if (input.type === 'password') {
        input.type = 'text';
        icon.classList.replace('fa-eye', 'fa-eye-slash');
    } else {
        input.type = 'password';
        icon.classList.replace('fa-eye-slash', 'fa-eye');
    }
}
</script>
</body>
</html>