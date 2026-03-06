<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.cdnfonts.com/css/hk-groteks"> 
    <style>
        body {
            font-family: 'HK Grotesk', sans-serif;
            margin-top: 70px;
            background-color: rgba(230, 233, 234, 0.23);
        }

        /* ===== HEADER ===== */
        .header {
            z-index: 99;
            position: fixed;
            top: 0px;
            left: 0px;
            right: 0px;
            height: 70px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: rgba(255,255,255,1);
            padding: 0 10px;
        }
        .semi-header {
            display: flex;
            justify-content: space-evenly;
            align-items: center;
            flex-wrap: wrap;
        }
        .img { width: 70px; height: 70px; object-fit: cover; }
        .left-header {
            margin: 10px 10px 10px 5px;
            padding: 8px 10px;
            border: 2px solid white;
            border-radius: 45px;
            background-color: white;
            font-size: 14px;
        }
        .left-header:hover, .left-header-hover {
            cursor: pointer;
            color: rgba(3,3,270,0.8);
        }
        .left-auth, .left-reg {
            font-weight: bold;
            padding: 8px 16px;
            background-color: rgba(255,255,255,0.8);
            border: 1px solid rgba(0,0,0,0.8);
            border-radius: 45px;
            margin-left: 10px;
            font-size: 13px;
        }
        .left-reg { background-color: rgba(0,0,0,0.8); color: white; }
        .left-auth:hover, .left-reg:hover {
            color: white;
            background-color: rgba(3,3,270,0.8);
            border: 1px solid rgba(3,3,270,0.8);
            cursor: pointer;
        }

        /* Hamburger */
        .hamburger {
            display: none;
            flex-direction: column;
            cursor: pointer;
            gap: 5px;
            padding: 8px;
            margin-right: 10px;
        }
        .hamburger span {
            display: block;
            width: 25px;
            height: 2px;
            background: #333;
            transition: 0.3s;
        }
        .nav-open .hamburger span:nth-child(1) { transform: rotate(45deg) translate(5px, 5px); }
        .nav-open .hamburger span:nth-child(2) { opacity: 0; }
        .nav-open .hamburger span:nth-child(3) { transform: rotate(-45deg) translate(5px, -5px); }

        @media screen and (max-width: 768px) {
            .hamburger { display: flex; }
            .semi-header {
                display: none;
                position: absolute;
                top: 70px;
                left: 0; right: 0;
                background: white;
                flex-direction: column;
                padding: 10px 0 20px;
                box-shadow: 0 4px 10px rgba(0,0,0,0.1);
                z-index: 98;
            }
            .semi-header.open { display: flex; }
            .left-header { margin: 5px 0; }
            .left-auth, .left-reg { margin: 5px 0; }
        }

        /* ===== HERO ===== */
        .parentImg {
            position: relative;
            display: flex;
            flex-direction: column;
            width: 100%;
            min-height: 600px;
            height: auto;
            background-image: url('/images/new.jpg');
            background-size: cover;
            background-position: center;
            overflow: hidden;
        }
        .parentImg::before {
            content: '';
            position: absolute;
            top: 0; left: 0;
            height: 100%; width: 100%;
            background: linear-gradient(to right, rgba(8,18,131,0.1) 50%, rgba(33,43,237,0.17) 100%);
            z-index: 0;
        }
        .text-overlay {
            position: relative;
            top: 0; left: 0;
            width: 100%;
            max-width: 700px;
            display: flex;
            flex-direction: column;
            color: rgba(0,0,0,1);
            padding: 20px;
            text-align: left;
            z-index: 2;
            margin: 0 auto 0 160px;
        }
        .experience {
            font-size: clamp(40px, 7vw, 90px);
            line-height: 1.05;
            margin-top: 80px;
        }
        .get {
            margin-bottom: -50px;
            font-size: clamp(18px, 3vw, 34px);
            line-height: 1.3;
            display: block;
            font-weight: 300;
        }
        .button-right, .button-left {
            margin: -10px 10px 10px 0px;
            padding: 12px 24px;
            border: 1px solid rgba(3,3,270,0.8);
            border-radius: 45px;
            background-color: rgba(3,3,270,0.8);
            color: white;
            font-size: 11px;
            cursor: pointer;
            transition: 0.3s;
        }
        .button-right { background-color: transparent; color: black; border: 1px solid black; }
        .button-right:hover, .button-left:hover {
            color: white;
            background-color: black;
            border: 1px solid black;
        }
        .hero-buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 5px;
            margin-top: 30px;
            margin-bottom: 40px;
        }

        @media screen and (max-width: 768px) {
            .text-overlay { margin: 0 20px; max-width: 100%; }
            .experience { margin-top: 50px; }
            .hero-buttons { flex-direction: column; }
            .button-left, .button-right { text-align: center; }
        }

        /* ===== OUR SERVICES ===== */
        .our-services {
            max-width: 1200px;
            margin: -100px auto 100px;
            width: 90%;
            background: white;
            position: relative;
            z-index: 2;
            border-radius: 20px;
            padding: 20px;
        }
        .advantage-name {
            margin-top: 10px;
            font-size: clamp(24px, 5vw, 45px);
            margin-bottom: 20px;
            text-align: center;
        }
        .advantage-all {
            display: flex;
            justify-content: space-evenly;
            align-items: flex-start;
            flex-wrap: wrap;
            gap: 20px;
        }
        .advantage-box {
            width: 220px;
            text-align: center;
            padding: 15px;
            border: 1px solid rgba(100,100,100,0.1);
            border-radius: 12px;
        }
        .img1 { width: 130px; height: 130px; object-fit: cover; }

        @media screen and (max-width: 768px) {
            .our-services { margin-top: -40px; }
            .advantage-box { width: 100%; max-width: 350px; }
        }

        /* ===== COUNTERS ===== */
        .counter-all { background-color: rgba(3,3,270,0.8); }
        .counter-sub {
            max-width: 1100px;
            margin: 0 auto;
            padding: 0 20px 50px;
        }
        .counter-title {
            text-align: center;
            padding: 50px 20px 20px;
            margin: 0;
            color: white;
            font-size: clamp(24px, 4vw, 40px);
        }
        .counters {
            padding: 1em 2em;
            color: white;
            text-align: center;
        }
        .counters > div {
            max-width: 900px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 4em 2em;
        }
        .counter { position: relative; }
        .counter h1 { font-size: 3em; margin-bottom: 0.5em; }
        .counter:not(:last-child)::before {
            content: '';
            background: #fff;
            position: absolute;
            width: 2px;
            height: 3em;
            top: 50%;
            transform: translateY(-50%);
            right: -1em;
        }

        @media screen and (max-width: 900px) and (min-width: 501px) {
            .counters > div { grid-template-columns: 1fr 1fr; }
            .counter:nth-child(2)::before { display: none; }
        }
        @media screen and (max-width: 500px) {
            .counters > div { grid-template-columns: 1fr; row-gap: 5em; }
            .counter:not(:last-child)::before {
                width: 90%; height: 2px;
                top: initial; bottom: -3em;
                left: 50%; transform: translateX(-50%);
            }
        }

        /* ===== GRID SECTION ===== */
        .grid-body {
            max-width: 1200px;
            margin: 0 auto 100px;
            padding: 0 20px;
            box-sizing: border-box;
        }
        .grid-title {
            font-size: clamp(24px, 5vw, 45px);
            color: rgba(3,3,270,0.8);
            font-weight: bold;
            text-align: center;
            margin: 60px 0 30px;
            padding: 0 20px;
        }
        .grid-container {
            display: grid;
            gap: 1.5rem;
            grid-template-columns: repeat(3, 1fr);
            grid-template-areas:
                "box-1 box-2 box-2"
                "box-1 box-3 box-4"
                "box-5 box-6 box-4";
        }
        .box-1 { grid-area: box-1; }
        .box-2 { grid-area: box-2; }
        .box-3 { grid-area: box-3; }
        .box-4 { grid-area: box-4; }
        .box-5 { grid-area: box-5; }
        .box-6 { grid-area: box-6; }
        .box {
            background-color: white;
            padding: 20px;
            border-radius: 12px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        }
        .img-grid1, .img-grid2, .img-grid5 {
            width: 100%;
            height: 100%;
            min-height: 150px;
            object-fit: cover;
            border-radius: 8px;
            margin: 0;
        }
        .flex-grid1 { display: flex; flex-direction: column; align-items: center; justify-content: center; }
        .flex-grid5 { display: flex; align-items: center; justify-content: center; gap: 20px; }
        .h2-grid5 { text-align: left; margin: 0 0 10px 0; font-size: clamp(14px, 2vw, 18px); }
        .p-grid5 { text-align: left; width: 100%; max-width: 400px; margin: 0; font-size: clamp(12px, 1.5vw, 15px); }

        @media screen and (max-width: 900px) {
            .grid-container {
                grid-template-columns: repeat(2, 1fr);
                grid-template-areas:
                    "box-1 box-1"
                    "box-2 box-2"
                    "box-3 box-4"
                    "box-5 box-6";
            }
        }
        @media screen and (max-width: 600px) {
            .grid-container { display: flex; flex-direction: column; }
            .flex-grid5 { flex-direction: column; text-align: center; }
            .h2-grid5, .p-grid5 { text-align: center; }
            .img-grid1, .img-grid2, .img-grid5 { max-height: 220px; }
        }

        /* ===== DELIVERY SECTION ===== */
        .deliveryman-all {
            max-width: 1200px;
            margin: 0 auto 100px;
            padding: 0 20px;
        }
        .deliveryman-sub {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 40px;
            flex-wrap: wrap;
        }
        .deliveryman-img-div {
            position: relative;
            flex: 1;
            min-width: 280px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .deliveryman-img {
            position: relative;
            border-radius: 10px;
            width: 100%;
            max-width: 700px;
            height: auto;
            aspect-ratio: 7/6;
            object-fit: cover;
            z-index: 10;
        }
        .procedure-h1 {
            font-size: clamp(24px, 4vw, 45px);
            color: rgba(3,3,270,0.8);
            font-weight: bold;
            text-align: left;
            margin-bottom: 20px;
        }
        .procedure-p { color: black; text-align: left; margin: 0; padding: 10px 0; }
        .procedure-box { flex: 1; display: flex; flex-direction: column; }
        .deliveryman-procedure { flex: 1; min-width: 280px; }

        .blob {
            position: absolute;
            top: 50%; left: 50%;
            transform: translate(-50%, -50%);
            width: 90%; height: 90%;
            border-radius: 42% 56% 72% 28% / 42% 42% 56% 48%;
            background-color: rgba(3,3,253,0.7);
            animation: morph 3.75s linear infinite;
            z-index: 0;
        }
        @keyframes morph {
            0%, 100% { border-radius: 42% 56% 72% 28% / 42% 42% 56% 48%; }
            33% { border-radius: 72% 28% 48% 48% / 28% 28% 72% 72%; }
            66% { border-radius: 100% 56% 56% 100% / 100% 100% 56% 56%; }
        }

        .ball {
            width: clamp(70px, 10vw, 120px);
            height: clamp(70px, 10vw, 120px);
            border-radius: 50%;
            background-color: white;
            position: absolute;
            left: 5%;
            animation: bounce 1.5s ease-in-out infinite;
            z-index: 10;
            display: flex; justify-content: center; align-items: center;
        }
        @keyframes bounce { 0%, 100% { top: 0; } 50% { top: 60px; } }

        .message-ball { width: 80%; height: 80%; object-fit: cover; }

        .ball2 {
            width: clamp(70px, 10vw, 120px);
            height: clamp(70px, 10vw, 120px);
            border-radius: 10%;
            background-color: white;
            position: absolute;
            top: 80%;
            animation: shake 1.5s ease-in-out infinite;
            z-index: 12;
            display: flex; justify-content: center; align-items: center;
        }
        @keyframes shake { 0%, 100% { right: 0; } 50% { right: 80px; } }

        .ball3 {
            width: clamp(120px, 15vw, 200px);
            height: clamp(90px, 12vw, 150px);
            border-radius: 10%;
            background-color: black;
            color: white;
            position: absolute;
            top: 80px; right: -30px;
            z-index: 12;
            display: flex; flex-direction: column;
            justify-content: center; align-items: center;
            transition: 0.8s;
        }
        .ball3:hover { background-color: white; color: rgba(3,3,270,0.8); transform: rotate(360deg); }
        .message-ball1 { font-size: clamp(30px, 5vw, 60px); font-weight: bold; margin: 0; padding: 0; }
        .message-ball2 { margin: 0; font-size: clamp(12px, 2vw, 16px); }

        @media screen and (max-width: 768px) {
            .deliveryman-sub { flex-direction: column; }
            .procedure-h1, .procedure-p { text-align: center; }
            .my-custom-list li { text-align: left; max-width: 400px; margin-inline: auto; }
            .ball3 { right: -10px; top: 10px; }
        }

        /* LIST */
        .my-custom-list { list-style-type: none; padding: 10px; margin-top: 0; }
        .my-custom-list li {
            position: relative;
            margin: 10px 0 0;
            padding-left: 40px;
            line-height: 1.2;
            font-size: 15px;
            color: black;
        }
        .my-custom-list li::before {
            content: '✔';
            position: absolute;
            left: 0; top: -4px;
            width: 25px; height: 25px;
            color: rgba(3,3,270,0.8);
            font-size: 14px; font-weight: bold;
            border: 3px solid rgba(3,3,270,0.8);
            display: flex; justify-content: center; align-items: center;
            border-radius: 20px;
        }

        /* ===== FAQ ===== */
        .faq-container {
            max-width: 1100px;
            margin: 0 auto 60px;
            padding: 30px 20px;
        }
        h2 { text-align: center; color: rgba(3,3,270,0.8); margin-bottom: 40px; }
        .faq-item {
            margin-bottom: 20px;
            border: 1px solid rgba(3,3,270,0.2);
            border-radius: 8px;
            overflow: hidden;
            transition: all 0.3s ease;
        }
        .faq-question {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 18px 25px;
            font-weight: bold;
            cursor: pointer;
            background-color: rgba(3,3,270,0.1);
            user-select: none;
        }
        .faq-question:hover { background-color: #eaf1f7; }
        .faq-question::after { content: '+'; font-size: 25px; color: rgba(3,3,270,0.8); transition: 0.3s; }
        .faq-item[open] .faq-question::after { content: '−'; }
        .faq-answer { padding: 20px 25px; color: #555; background-color: white; border-top: 1px solid #e0e6ed; }

        /* ===== SLIDER ===== */
        .slider-wrapper {
            max-width: 1100px;
            margin: 0 auto 60px;
            padding: 0 20px;
        }
        .slider {
            height: 150px;
            position: relative;
            overflow: hidden;
            display: grid;
            place-items: center;
        }
        .slide-track {
            display: flex;
            width: calc(400px * 8);
            animation: scroll 40s linear infinite;
        }
        .slide-track:hover { animation-play-state: paused; }
        @keyframes scroll {
            0% { transform: translateX(0); }
            100% { transform: translateX(calc(-400px * 4)); }
        }
        .img-star { width: 120px; height: auto; }
        .img-star img { width: 100%; }
        .text-review { font-style: italic; font-size: 13px; line-height: 1.4; color: #979797; padding: 15px 0; }
        .slidee { width: 380px; display: flex; flex-direction: column; margin: 10px 15px; }
        .slide-sub {
            border-radius: 10px;
            border: 2px solid white;
            padding: 10px;
            background-color: white;
            transition: transform 0.5s;
            height: 130px;
            overflow: hidden;
        }
        .slide-sub:hover { transform: scale(1.02); }

        /* ===== FOOTER ===== */
        .modern-footer {
            background-color: white;
            font-family: 'HK Grotesk', sans-serif;
            padding: 0 40px;
            margin-top: 100px;
        }
        .footer-cta {
            background: linear-gradient(135deg, rgba(3,3,270,0.9), rgba(8,18,131,1));
            border-radius: 20px;
            padding: 40px 60px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transform: translateY(-50%);
            color: white;
            flex-wrap: wrap;
            gap: 20px;
        }
        .footer-cta h2 { color: white; margin: 0; text-align: left; font-size: clamp(20px, 3vw, 32px); }
        .footer-cta p { margin: 5px 0 0; opacity: 0.8; }
        .footer-main {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr;
            gap: 40px;
            padding-bottom: 60px;
        }
        .footer-logo-text { font-size: 28px; font-weight: bold; color: rgba(3,3,270,0.8); margin-bottom: 20px; }
        .footer-logo-text span { color: #000; }
        .brand-col p { color: #666; line-height: 1.6; max-width: 300px; margin-bottom: 25px; }
        .footer-column h3 { font-size: 18px; margin-bottom: 25px; color: #000; }
        .footer-column a { display: block; text-decoration: none; color: #666; margin-bottom: 12px; transition: 0.3s; }
        .footer-column a:hover { color: rgba(3,3,270,0.8); padding-left: 5px; }
        .social-wrapper { display: flex; gap: 10px; }
        .social-circle {
            width: 35px; height: 35px;
            border-radius: 50%;
            border: 1px solid #ddd;
            display: flex; align-items: center; justify-content: center;
            font-size: 12px; text-decoration: none; color: #333;
            transition: 0.3s;
        }
        .social-circle:hover { background: rgba(3,3,270,0.8); color: white; border-color: rgba(3,3,270,0.8); }
        .footer-bottom-bar {
            border-top: 1px solid #eee;
            padding: 30px 0;
            display: flex;
            justify-content: space-between;
            font-size: 14px;
            color: #999;
            flex-wrap: wrap;
            gap: 10px;
        }
        .legal-links a { margin-left: 20px; color: #999; text-decoration: none; }

        @media screen and (max-width: 900px) {
            .modern-footer { padding: 0 20px; }
            .footer-cta { flex-direction: column; text-align: center; padding: 30px; }
            .footer-cta h2 { text-align: center; }
            .footer-main { grid-template-columns: 1fr 1fr; }
        }
        @media screen and (max-width: 500px) {
            .footer-main { grid-template-columns: 1fr; text-align: center; }
            .brand-col p { margin: 0 auto 25px; }
            .social-wrapper { justify-content: center; }
            .footer-bottom-bar { flex-direction: column; text-align: center; }
        }
    </style>
</head>
<body>
    <div class="header"> 
        <div style="background-color:rgba(249,246,246,0.69); width:160px; display:flex; justify-content:center; align-items:center; padding:10px; border-radius:5px 5px 0px 0px; margin-bottom:10px;">
            <img class="img" src="{{ url('/icons/bik4.png') }}">
            <p class="pop">PopDelivery</p>
        </div>

        <div class="hamburger" onclick="toggleNav()" id="hamburger">
            <span></span><span></span><span></span>
        </div>

        <div class="semi-header" id="navMenu">


            <a href="{{ route('landing.page.home') }}">
                <button @class(['left-header', 'left-header-hover' => Route::currentRouteName() == 'landingPage.home'])>Home</button>
            </a>
           {{-- Delivery Man button --}}
<a href="{{ Auth::guard('deliveryMan')->check() ? route('deliveryMan.myDeliveries') : route('customer.login')}}">
    <button>My Deliveries</button>
</a>

{{-- Customer button --}}
<a href="{{ Auth::guard('customer')->check() ? route('customer.schedule') : route('customer.login') }}">
    <button>Schedule</button>
</a>

{{-- Logout forms --}}
@if(Auth::guard('deliveryMan')->check())
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Logout ({{ Auth::guard('deliveryMan')->user()->name }})</button>
    </form>
@elseif(Auth::guard('customer')->check())
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Logout ({{ Auth::guard('customer')->user()->name }})</button>
    </form>
@else
    <a href="{{ route('login') }}">Login</a>
@endif




        </div>
    </div>

    <div class="parentImg">
        <div class="text-overlay">
            <h1 class="experience">Experience<br> More than <br>just a Delivery
                <span class="get">Get it delivered in no time!</span> 
            </h1>
            <div class="hero-buttons">
                <a href="{{ route('login') }}"><button class="button-left">COMMANDER UNE LIVRAISON</button></a>
                <a href="{{ route('login') }}"><button class="button-right">POSTULER EN TANT QUE LIVREUR</button></a>
            </div>
        </div>
    </div> 

    <div class="our-services">
        <h1 class="advantage-name"><center>Our delivery services?</center></h1>
        <div class="advantage-all">
            <div class="advantage-box">
                <div class="img1-div"><img class="img1" src="{{ url('/illustrations/4867780-removebg-preview.png') }}"></div>
                <p class="advantage-title">Time-Saving</p>
                <p class="advantage">Save time by ordering what you need and let the delivery app handle the rest</p>
            </div>
            <div class="advantage-box">
                <div class="img1-div"><img class="img1" src="{{ url('/illustrations/20945974.jpg') }}"></div>
                <p class="advantage-title">Real-Time Tracking</p>
                <p class="advantage">See your order on a live map, from pickup to your door.</p>
            </div>
            <div class="advantage-box">
                <div class="img1-div"><img class="img1" src="{{ url('/illustrations/2295967-removebg-preview.png') }}"></div>
                <p class="advantage-title">Fair Earnings</p>
                <p class="advantage">You get paid for every delivery you complete.</p>
            </div>
            <div class="advantage-box">
                <div class="img1-div"><img class="img1" src="{{ url('/illustrations/3895360-removebg-preview (1).png') }}"></div>
                <p class="advantage-title">Flexible Schedule</p>
                <p class="advantage">Drivers can choose their own hours, making it a flexible job.</p>
            </div>
        </div>
    </div>

    <div class="counter-all">
        <div class="counter-sub">
            <h1 class="counter-title">Impact your bottom line with same-day delivery</h1>
            <div class="counters">
                <div>
                    <div class="counter">
                        <h1><span data-count="186">0</span></h1>
                        <h3>Delivery completed</h3>
                    </div>
                    <div class="counter">
                        <h1><span data-count="127">0</span></h1>
                        <h3>Client Satisfied</h3>
                    </div>
                    <div class="counter">
                        <h1><span data-count="91">0</span>%</h1>
                        <h3>Success Rate</h3>
                    </div>
                    <div class="counter">
                        <h1><span data-count="2">0</span>+</h1>
                        <h3>Years Experience</h3>
                    </div>
                </div>
            </div>
            <div style="min-height: 50px;"></div>
        </div>
    </div>

    <div class="grid-title">PopDelivery Features</div>
    <div class="grid-body">
        <div class="grid-container">
            <div class="box box-1">
                <div class="flex-grid1">
                    <div><img class="img-grid1" src="{{ url('/images/trackImg.png') }}"></div>
                    <div>
                        <h2 class="h2-grid5">Live Tracking</h2>
                        <p class="p-grid5">Follow your delivery with real-time tracking, live maps, and dynamic ETAs. Get full transparency from pickup to drop-off.</p>
                    </div>
                </div>
            </div>
            <div class="box box-2">
                <div class="flex-grid5">
                    <div>
                        <h2 class="h2-grid5">Pick Your Trip</h2>
                        <p class="p-grid5">Take control of your trips. Select the deliveries that work for you and earn on your schedule.</p>
                    </div>
                    <div><img class="img-grid2" src="{{ url('/images/young-adult-traveling-using-sustainable-mobility-removebg-preview.png') }}"></div>
                </div>
            </div>
            <div class="box box-3">
                <div class="flex-grid5">
                    <div>
                        <h2 class="h2-grid5">Proactive Delivery Alerts</h2>
                        <p class="p-grid5">Stay in the loop with automated notifications at every stage of the delivery journey.</p>
                    </div>
                    <div><img class="img-grid5" src="{{ url('/images/Gemini_Generated_Image_uf4s9suf4s9suf4s1.png') }}"></div>
                </div>
            </div>
            <div class="box box-4">
                <div class="flex-grid1">
                    <div>
                        <h2 class="h2-grid5">Postulate as Delivery man</h2>
                        <p class="p-grid5">Deliver on your own terms. Choose your orders and set your schedule for ultimate flexibility and control.</p>
                    </div>
                    <div><img class="img-grid1" src="{{ url('/images/african-american-female-deliverer-carrying-packages-talking-mobile-phone-city-removebg-preview (1)-pica.png') }}"></div>
                </div>
            </div>
            <div class="box box-5">
                <div class="flex-grid5">
                    <div>
                        <h2 class="h2-grid5">Freshness Guaranteed</h2>
                        <p class="p-grid5">Our system dispatches a courier the moment your order is ready, so it's delivered hot and fast.</p>
                    </div>
                    <div><img class="img-grid5" src="{{ url('/images/happy-client-with-their-box-delivered (1).jpg') }}"></div>
                </div>
            </div>
            <div class="box box-6">
                <div class="flex-grid5">
                    <div>
                        <h2 class="h2-grid5">Cost-Efficient</h2>
                        <p class="p-grid5">Save money with smart routing optimizations. No hidden fees.</p>
                    </div>
                    <div><img class="img-grid5" src="{{ url('/images/close-up-hourglass-with-dollar-signs-falling-inside-it-isolated-white-wall_339569-381.jpg') }}"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="deliveryman-all">
        <div class="deliveryman-sub">
            <div class="deliveryman-procedure">
                <h1 class="procedure-h1">How to Become a Delivery Driver?</h1>
                <div class="procedure-box">
                    <h2 class="procedure-p">How it Works</h2>
                    <h3 class="procedure-p">Enter your personal information such as:</h3>
                    <ol class="my-custom-list">
                        <li>Name, email, password, address, mobile, Id number</li><br>
                        <li>Front and back picture of your id</li><br>
                        <li>A picture of you holding your Id card</li>
                    </ol>
                    <h3 class="procedure-p">Enter your vehicle information such as:</h3>
                    <ol class="my-custom-list">
                        <li>License number, license class, vehicle type, plate number</li>
                    </ol>
                </div>
            </div>
            <div class="deliveryman-img-div">
                <div class="ball">
                    <img class="message-ball" src="{{ url('/images/icons8-trophy-50.png') }}">
                </div>
                <div class="ball2">
                    <img class="message-ball" src="{{ url('/images/icons8-truck-100.png') }}">
                </div>
                <div class="ball3">
                    <h1 class="message-ball1">+3</h1>
                    <h1 class="message-ball2">years</h1>
                    <h1 class="message-ball2">Experience</h1>
                </div>
                <div class="blob"></div>
                <img class="deliveryman-img" src="{{ url('/images/pleased-young-afro-american-delivery-man-holding-cardboard-box-clipboard-isolated-orange-wall-with-copy-space.png') }}">
            </div>
        </div>
    </div>

    <div class="faq-container">
        <h2 style="text-align: left;">Frequently Asked Questions</h2>
        <details class="faq-item">
            <summary class="faq-question">How do I create an account?</summary>
            <div class="faq-answer">
                <p>You can create an account by clicking the "Sign Up" button in the top right corner of the page and filling out the registration form.</p>
            </div>
        </details>
        <details class="faq-item">
            <summary class="faq-question">How can I track my order?</summary>
            <div class="faq-answer">
                You can track your order in real time on the "My Orders" page. Once the delivery person is on the way, you'll see their location on the map.
            </div>
        </details>
    </div>

    <div class="slider-wrapper">
        <div class="slider">
            <div class="slide-track">
                <div class="slidee">
                    <div class="slide-sub">
                        <div style="display:flex; justify-content:space-between; align-items:center;">
                            <div class="img-star"><img src="{{ url('/images/stars-gold.2cc45585.svg') }}"></div>
                            <span class="date">13/05/2025</span>
                        </div>
                        <div class="text-review">"Really happy with Easy-Delivery overall. Just have hiccups here and there on delayed shipments…"</div>
                        <div style="display:flex; justify-content:space-between; align-items:center;">
                            Anonymous <span class="place">Réexpédition Portugal</span>
                        </div>
                    </div>
                </div>
                <div class="slidee">
                    <div class="slide-sub">
                        <div style="display:flex; justify-content:space-between; align-items:center;">
                            <div class="img-star"><img src="{{ url('/images/stars-gold.2cc45585.svg') }}"></div>
                            <span class="date">13/05/2025</span>
                        </div>
                        <div class="text-review">"Really happy with Easy-Delivery overall. Just have hiccups here and there on delayed shipments…"</div>
                        <div style="display:flex; justify-content:space-between; align-items:center;">
                            Anonymous <span class="place">Réexpédition Portugal</span>
                        </div>
                    </div>
                </div>
                <div class="slidee">
                    <div class="slide-sub">
                        <div style="display:flex; justify-content:space-between; align-items:center;">
                            <div class="img-star"><img src="{{ url('/images/stars-gold.2cc45585.svg') }}"></div>
                            <span class="date">13/05/2025</span>
                        </div>
                        <div class="text-review">"Really happy with Easy-Delivery overall. Just have hiccups here and there on delayed shipments…"</div>
                        <div style="display:flex; justify-content:space-between; align-items:center;">
                            Anonymous <span class="place">Réexpédition Portugal</span>
                        </div>
                    </div>
                </div>
                <div class="slidee">
                    <div class="slide-sub">
                        <div style="display:flex; justify-content:space-between; align-items:center;">
                            <div class="img-star"><img src="{{ url('/images/stars-gold.2cc45585.svg') }}"></div>
                            <span class="date">13/05/2025</span>
                        </div>
                        <div class="text-review">"Really happy with Easy-Delivery overall. Just have hiccups here and there on delayed shipments…"</div>
                        <div style="display:flex; justify-content:space-between; align-items:center;">
                            Anonymous <span class="place">Réexpédition Portugal</span>
                        </div>
                    </div>
                </div>
                <!-- Duplicate for infinite scroll -->
                <div class="slidee">
                    <div class="slide-sub">
                        <div style="display:flex; justify-content:space-between; align-items:center;">
                            <div class="img-star"><img src="{{ url('/images/stars-gold.2cc45585.svg') }}"></div>
                            <span class="date">13/05/2025</span>
                        </div>
                        <div class="text-review">"Really happy with Easy-Delivery overall. Just have hiccups here and there on delayed shipments…"</div>
                        <div style="display:flex; justify-content:space-between; align-items:center;">
                            Anonymous <span class="place">Réexpédition Portugal</span>
                        </div>
                    </div>
                </div>
                <div class="slidee">
                    <div class="slide-sub">
                        <div style="display:flex; justify-content:space-between; align-items:center;">
                            <div class="img-star"><img src="{{ url('/images/stars-gold.2cc45585.svg') }}"></div>
                            <span class="date">13/05/2025</span>
                        </div>
                        <div class="text-review">"Really happy with Easy-Delivery overall. Just have hiccups here and there on delayed shipments…"</div>
                        <div style="display:flex; justify-content:space-between; align-items:center;">
                            Anonymous <span class="place">Réexpédition Portugal</span>
                        </div>
                    </div>
                </div>
                <div class="slidee">
                    <div class="slide-sub">
                        <div style="display:flex; justify-content:space-between; align-items:center;">
                            <div class="img-star"><img src="{{ url('/images/stars-gold.2cc45585.svg') }}"></div>
                            <span class="date">13/05/2025</span>
                        </div>
                        <div class="text-review">"Really happy with Easy-Delivery overall. Just have hiccups here and there on delayed shipments…"</div>
                        <div style="display:flex; justify-content:space-between; align-items:center;">
                            Anonymous <span class="place">Réexpédition Portugal</span>
                        </div>
                    </div>
                </div>
                <div class="slidee">
                    <div class="slide-sub">
                        <div style="display:flex; justify-content:space-between; align-items:center;">
                            <div class="img-star"><img src="{{ url('/images/stars-gold.2cc45585.svg') }}"></div>
                            <span class="date">13/05/2025</span>
                        </div>
                        <div class="text-review">"Really happy with Easy-Delivery overall. Just have hiccups here and there on delayed shipments…"</div>
                        <div style="display:flex; justify-content:space-between; align-items:center;">
                            Anonymous <span class="place">Réexpédition Portugal</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="modern-footer">
        <div class="footer-cta">
            <div class="cta-content">
                <h2>Ready to get started?</h2>
                <p>Join over 1,000+ businesses growing with us.</p>
            </div>
            <button class="button-left">Contact Us Now</button>
        </div>
        <div class="footer-main">
            <div class="footer-column brand-col">
                <div class="footer-logo-text">BRAND<span>.</span></div>
                <p>Crafting seamless digital experiences with a focus on innovation and user-centric design.</p>
                <div class="social-wrapper">
                    <a href="#" class="social-circle">FB</a>
                    <a href="#" class="social-circle">IG</a>
                    <a href="#" class="social-circle">TW</a>
                </div>
            </div>
            <div class="footer-column">
                <h3>Platform</h3>
                <a href="#">Our Services</a>
                <a href="#">Pricing</a>
                <a href="#">Procedure</a>
                <a href="#">FAQ</a>
            </div>
            <div class="footer-column">
                <h3>Company</h3>
                <a href="#">About Us</a>
                <a href="#">Careers</a>
                <a href="#">News</a>
                <a href="#">Contact</a>
            </div>
            <div class="footer-column">
                <h3>Contact</h3>
                <p>guifoverdiane@gmail.com</p>
                <p>+237 674 38 79 44</p>
                <p>Cameroon, Douala</p>
            </div>
        </div>
        <div class="footer-bottom-bar">
            <p>&copy; 2026 Brand Inc. Built with passion.</p>
            <div class="legal-links">
                <a href="#">Privacy</a>
                <a href="#">Terms</a>
            </div>
        </div>
    </footer>

<script>
    // Hamburger menu
    function toggleNav() {
        const menu = document.getElementById('navMenu');
        const burger = document.getElementById('hamburger');
        menu.classList.toggle('open');
        burger.parentElement.classList.toggle('nav-open');
    }

    // Counter animation
    const counters = document.querySelectorAll(".counters span");
    const container = document.querySelector(".counters");
    let activated = false;

    window.addEventListener("scroll", () => {
        if (pageYOffset > container.offsetTop - container.offsetHeight - 200 && activated === false) {
            counters.forEach(counter => {
                counter.innerText = 0;
                let count = 0;
                function updateCount() {
                    const target = parseInt(counter.dataset.count);
                    if (count < target) {
                        count++;
                        counter.innerText = count;
                        setTimeout(updateCount, 10);
                    } else {
                        counter.innerText = target;
                    }
                }
                updateCount();
                activated = true;
            });
        } else if ((pageYOffset < container.offsetTop - container.offsetHeight - 500 || pageYOffset === 0) && activated === true) {
            counters.forEach(counter => { counter.innerText = 0; });
            activated = false;
        }
    });
</script>
</body>
</html>