<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<style>
    .choice-img
    {
        position:relative;
        overflow: hidden;
        width: 300px;
        height:300px;
        border-radius: 42% 56% 72% 28% / 42% 42% 56% 48%;
        background:url('/images/happy-client-with-their-box-delivered (2).jpg');
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
     .choice-sub
     {
        margin-left:160px;
        margin-right:160px;
        display: flex;
        align-items:center;
        justify-content:space-evenly;
     }
     .choice-aea
     {
        text-align:center;

     }
</style>
</head>

<body>
    <div class="choice-all">
        <div class="choice-sub">
            <div>
                <div class="choice-img"></div>
                <p>
                    "Need something delivered? Don't move, we've got you covered! Order now and enjoy fast, reliable delivery straight to your door. It's simple, quick, and all you have to do is relax."
                </p>
                <div>
                    <button>Get Started</button>
                </div>
            </div>
            <div>
                <div class="choice-img"></div>
                <p class="choice-message">
                    "Need something delivered? Don't move, we've got you covered! Order now and enjoy fast, reliable delivery straight to your door. It's simple, quick, and all you have to do is relax."
                </p>
                <div>
                    <button class="choice-button">Get Started</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>