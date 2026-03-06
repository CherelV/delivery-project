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

    }
    *
    {
        margin:0;
        padding:0;
        box-sizing: border-box;
    }

    .title
    {
        text-align:center;
        margin:1em;
    }

    .counters
    {
        padding: 3em 2em;
        background:rgba(63, 27, 224, 1) ;
        color: white;
        text-align:center;
    }
    .counters > div
    {
        max-width: 900px;
        margin:0 auto;
        display:grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 4em 2em;
    }
    .counter
    {
        position: relative;  
    }
    .counter h1
    {
        font-size: 3em;
        margin-bottom:0.5em;
    }
    .counter:not(:last-child)::before
    {
        content:'';
        background: #fff;
        position: absolute;
        width: 2px;
        height: 3em;
        top: 50%;
        transform: translateY(-50%);
        right: -1em
    }
    @media screen and 
    (max-width: 900px) and (min-width: 501px)
    {
        .counters > div {
            grid-template-columns: 1fr 1fr;
        }
        .counter:nth-child(2)::before{
            display:none;
        }
    }
    @media screen and (max-width: 500px)
    {
        .counters > div {
            grid-template-columns: 1fr;
            row-gap: 5em;
        }
        .counter:not(:last-child)::before{
            width: 90%;
            height: 2px;
            top: initial;
            bottom: -3em;
            left: 50%;
            transform: translateX(-50%);
        }
    }
</style>
<body>
    <h1 class="title"> Scroll to activate </h1>
    <div style="min-height: 40em;"></div>

    <div class="counters">
        <div>

            <div class="counter">
                <h1><span data-count="156">0</span></h1>
                <h3>Project completed</h3>
            </div>
            <div class="counter">
                <h1><span data-count="227">0</span></h1>
                <h3>Client Satisfied</h3>
            </div>
            <div class="counter">
                <h1><span data-count="91">0</span>%</h1>
                <h3>Success Rate</h3>
            </div>
            <div class="counter">
                <h1><span data-count="30">0</span>+</h1>
                <h3>Years Experience</h3>
            </div>
            
        </div>
    </div>

    <div style="min-height: 20em;"></div>
</body>
<script>
    const counters = document.querySelectorAll(".counters span");
    const container = document.querySelector(".counters");
// variable which track if the counter has been activated
    let activated= false;
// add scroll to the page
    window.addEventListener("scroll", () =>{

        if(
            pageYOffset > container.offsetTop - container.offsetHeight - 200
            && activated === false
        ) { 
            // select all counters
            counters.forEach(counter => {
                // set counter values to zero
                counter.innerText = 0;
                // set count variable to trackthe count
                let count = 0;
                // update count function

                function updateCount(){
                    //Get counter target number to count to 
                    const target = parseInt(counter.dataset.count);

                    //ass long as the count is below the target number

                    if(count < target){
                        //in crement the count
                        count++;
                        //set the ounter into the count
                        counter.innerText = count;
                        setTimeout(updateCount,  10);     
                    } else {
                        //set the counter text to the target number
                        counter.innerText = target;
                    }
                }

                //run the function innitially
                updateCount();
                //set the activated to true
                activated = true;
            });
            //if the page is scrolled back a ceratin amount or to the top andactivated is true
        } else if(
            pageYOffset < container.offsetTop - container.offsetHeight - 500
            || pageYOffset === 0
            && activated === true
            ) {
                //select all counters
                counters.forEach(counter => {
                    //set counter text back to zero
                    counter.innerText = 0;
                });
                //set activated to false
                activated = false;
            }
    
    });

</script>
{{-- <script>
    const counters = document.querySelectorAll(".counters span");
    const container = document.querySelector(".counters");
    let activated = false;

    window.addEventListener("scroll", () => {
        // Check if the user has scrolled to the counters section
        if (window.scrollY > container.offsetTop - window.innerHeight + 100 && !activated) {
            
            counters.forEach(counter => {
                let count = 0;

                function updateCount() {
                    const target = parseInt(counter.dataset.count);

                    if (count < target) {
                        // Increment the count
                        count++;
                        // Set the counter to the current count
                        counter.innerText = count;
                        // Call the function again after a short delay
                        setTimeout(updateCount, 10);
                    } else {
                        // Ensure the counter displays the final target value
                        counter.innerText = target;
                    }
                }
                
                updateCount();
            });
            // Set activated to true to prevent the animation from re-running
            activated = true;

        // Reset the counter if the user scrolls back to the top
        } else if (window.scrollY === 0 && activated) {
            counters.forEach(counter => {
                counter.innerText = 0;
            });
            // Set activated to false to allow the animation to run again
            activated = false;
        }
    });
</script> --}}

</html>