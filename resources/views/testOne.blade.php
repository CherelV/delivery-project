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
    min-height:100vh;
    display:grid;
    place-items:center;

  }

  .slider
  {
    height:250px;
    margin:auto;
    position:relative;
    width:90%;
    display:grid;
    place-items:center;
    overflow : hidden;
  }

  .slide-track
  {
    display: flex;
    width: calc(250px * 18);
    animation: scroll 40s linear infinite;
  }

   .slide
  {
    height: 200px;
    width: 250px;
    display: flex;
    align-items: center;
    padding: 15px;
    perspective: 100px; 
  }

  /*.img
  {
    width:100%;
     transition: transform 1s; 
  }*/
  
  .slide-track:hover
  {
    animation-play-state: paused;
  }
  @keyframes scroll 
  {
    0%{
      transform: translateX(0);
    }
    100%{
      transform: translateX(calc(-250px * 9))
    }
  }

  img:hover
  {
    transform: translateZ(20px);
  } 

  .slider::before,
  .slider::after
  {
    background: linear-gradient(to right, rgba(255,255,255,1) 0%, rgba(255,255,255,0) 100%);
    content: '';
    height:100%;
    position: absolute;
    width: 15%;
    z-index: 2;
  }
  
  .slider::before
  {
    left: 0;
    top: 0;
  }

  .slider::after
  {
    top: 0;
    right: 0;
    transform: rotateZ(180deg);
  } 

  img
 {
  width:100% ;
  height:100%;
  object-fit:cover;
  transition: transform 1s; 
 } 
.img-star
 {
  width:120px;
  height:19.8px;
  object-fit:cover;
 }
.text-review
{
    font-style: italic;
    font-size: 14px;
    line-height: 17px;
    color: #979797;
    padding: 20px 0px;

}

 .slidee
  {
   
   
    width: 400px;
    display: flex;
    flex-direction:column;
   margin:10px 30px;
    perspective: 100px; 
  }

  .slide-sub
   
  { border-radius:10px; 
    border: 2px solid black;
     padding: 10px;
    transition: transform 1s; 
  }
   .slide-sub:hover
  {
    transform: translateZ(20px);
  }
</style>
<body>
    
    <div class="slider">

        <div class="slide-track">

            <div class="slide">
                <img src="{{ url('/images/delivery-man-riding-his-scooter-new-york-city.jpg') }}">
            </div>

            <div class="slide">
                <img src="{{ url('/images/delivery-man-riding-his-scooter-new-york-city.jpg') }}">
            </div>

            <div class="slide">
                <img src="{{ url('/images/black-female.jpg') }}">
            </div>

            <div class="slide">
                <img src="{{ url('/images/close-up-delivery-person-giving-parcel-client.jpg') }}">
            </div>

            <div class="slide">
                <img src="{{ url('/images/close-up-delivery-person-offering-parcel-client.jpg') }}">
            </div>

            <div class="slide">
                <img src="{{ url('/images/close-up-delivery-person-with-parcel.jpg') }}">
            </div>

            <div class="slide">
                <img src="{{ url('/images/michael-starkie-_W7A8J8tyEE-unsplash.jpg') }}">
            </div>

            <div class="slide">
                <img src="{{ url('/images/delivery-man-riding-his-scooter-new-york-city.jpg') }}">
            </div>

            <div class="slide">
                <img src="{{ url('/images/delivery-man-riding-his-scooter-new-york-city.jpg') }}">
            </div>

             <div class="slide">
                <img src="{{ url('/images/delivery-man-riding-his-scooter-new-york-city.jpg') }}">
            </div>

            <div class="slide">
                <img src="{{ url('/images/delivery-man-riding-his-scooter-new-york-city.jpg') }}">
            </div>

            <div class="slide">
                <img src="{{ url('/images/black-female.jpg') }}">
            </div>

            <div class="slide">
                <img src="{{ url('/images/close-up-delivery-person-giving-parcel-client.jpg') }}">
            </div>

            <div class="slide">
                <img src="{{ url('/images/close-up-delivery-person-offering-parcel-client.jpg') }}">
            </div>

            <div class="slide">
                <img src="{{ url('/images/close-up-delivery-person-with-parcel.jpg') }}">
            </div>

            <div class="slide">
                <img src="{{ url('/images/michael-starkie-_W7A8J8tyEE-unsplash.jpg') }}">
            </div>

            <div class="slide">
                <img src="{{ url('/images/delivery-man-riding-his-scooter-new-york-city.jpg') }}">
            </div>

            <div class="slide">
                <img src="{{ url('/images/delivery-man-riding-his-scooter-new-york-city.jpg') }}">
            </div>

        </div>

    </div>
  
    <div class="slider">
        <div class="slide-track">

            <div class="slidee">
                <div class="slide-sub">
                    <div style="display:flex; justify-content: space-between;
                        align-items: center;">
                        <div class="img-star"> <img src="{{ url('/images/stars-gold.2cc45585.svg') }}"> </div>
                        <span class="date">13/05/2025</span>  
                    </div>
                    <div class="text-review">"«Really happy with Easy-Delivery overall. I just have hiccups here and there on delayed shipment after…»"</div>
                    <div  style="display:flex; justify-content: space-between;
                        align-items: center;">
                        Anonymous ANONYMOUS  
                        <span class="place">Réexpédition Portugal</span>   
                    </div>
                </div>
            </div>
            <div class="slidee">
                <div class="slide-sub">
                    <div style="display:flex; justify-content: space-between;
                        align-items: center;">
                        <div class="img-star"> <img src="{{ url('/images/stars-gold.2cc45585.svg') }}"> </div>
                        <span class="date">13/05/2025</span>  
                    </div>
                    <div class="text-review">"«Really happy with Easy-Delivery overall. I just have hiccups here and there on delayed shipment after…»"</div>
                    <div  style="display:flex; justify-content: space-between;
                        align-items: center;">
                        Anonymous ANONYMOUS  
                        <span class="place">Réexpédition Portugal</span>   
                    </div>
                </div>
            </div>
            <div class="slidee">
                <div class="slide-sub">
                    <div style="display:flex; justify-content: space-between;
                        align-items: center;">
                        <div class="img-star"> <img src="{{ url('/images/stars-gold.2cc45585.svg') }}"> </div>
                        <span class="date">13/05/2025</span>  
                    </div>
                    <div class="text-review">"«Really happy with Easy-Delivery overall. I just have hiccups here and there on delayed shipment after…»"</div>
                    <div  style="display:flex; justify-content: space-between;
                        align-items: center;">
                        Anonymous ANONYMOUS  
                        <span class="place">Réexpédition Portugal</span>   
                    </div>
                </div>
            </div>
            <div class="slidee">
                <div class="slide-sub">
                    <div style="display:flex; justify-content: space-between;
                        align-items: center;">
                        <div class="img-star"> <img src="{{ url('/images/stars-gold.2cc45585.svg') }}"> </div>
                        <span class="date">13/05/2025</span>  
                    </div>
                    <div class="text-review">"«Really happy with Easy-Delivery overall. I just have hiccups here and there on delayed shipment after…»"</div>
                    <div  style="display:flex; justify-content: space-between;
                        align-items: center;">
                        Anonymous ANONYMOUS  
                        <span class="place">Réexpédition Portugal</span>   
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>
</html>