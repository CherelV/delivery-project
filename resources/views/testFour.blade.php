<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    /* .ball
    {
        width:50px;
        height:50px;
        border-radius: 50%;
        background-color:red;
        position:absolute;
        animation-name: bounce;
        animation-duration: 1s;
        animation-timing-function: ease-in-out;
        animation-iteration-count: infinite;
    }

    @keyframes bounce
    {
        0%{
            top:0;
        }
        50%{
            top: 100px;

        }
        100%{
            top:0;
        }
    } */
     .blob
     {
        position:absolute;
        overflow: hidden;
        width: 300px;
        height:300px;
        border-radius: 42% 56% 72% 28% / 42% 42% 56% 48%;
        background:url('/images/red-delivery-car-deliver-express-shipping-fast-delivery-with-arrow-graph-background-3d-rendering.jpg');
        background-size:cover;
        background-position:center;
        animation:morph 3.75s linear infinite;
     }
     @keyframes morph
     {
        0%,
        100%
        {
            border-radius: 42% 56% 72% 28% / 42% 42% 56% 48%;
        }
        33%
        {
            border-radius: 72% 28% 48% 48% / 28% 28% 72% 72%;

        }
        66%
        {
            border-radius: 100% 56% 56% 100% / 100% 100% 56% 56%;
        }
     }
</style>
<body>
   {{-- <div class="ball"></div>  --}}
   <div class="blob"></div>
</body>
</html>