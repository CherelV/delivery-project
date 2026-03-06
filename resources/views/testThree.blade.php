<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body
    {
        min-height:100dvh; 
        display: flex;
        align-items: center;
        justify-content:center;
        padding:2%;

    }
    .box
    {
        background-color: #0071ff;
    }
    .grid-container
    {
        display: grid;
        grid-auto-columns: 1fr;
        grid-auto-rows: 1fr;
        gap: 1em;
        grid-template-areas:
        /* "box-1 box-1 box-2 box-3"
        "box-1 box-1 box-4 box-5" */
        "box-1 box-2 box-2"
        "box-1 box-3 box-4"
        "box-5 box-5 box-6"

    }
    /* @media(max-width: 56em){
        .grid-container{
            grid-template-areas:
            "box-1 box-1 box-2"
            "box-1 box-1 box-3"
            "box-4 box-5 box-3"
            }
    }
        @media(max-width: 42em){
            .grid-container{ 
                grid-template-areas:
                "box-1 box-2"
                "box-3 box-2"
                "box-3 box-4"
                "box-5 box-4"
                }
        } */
</style>
<body>

    <div class="grid-container">
        <div class="box" style="grid-area: box-1" >1</div>
        <div class="box" style="grid-area: box-2" >2</div>
        <div class="box" style="grid-area: box-3" >3</div>
        <div class="box" style="grid-area: box-4" >4</div>
        <div class="box" style="grid-area: box-5" >5</div>
        <div class="box" style="grid-area: box-6" >6</div>
    </div>
</body>
</html>