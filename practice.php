<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Practice</title>

 <style>
  :root {
   --visible-slides: 1;
  }

  @media (min-width: 600px) {
   :root {
    --visible-slides: 2;
   }
  }

  @media (min-width: 1000px) {
   :root {
    --visible-slides: 3;
   }
  }

  .slider {
   width: 100%;
   max-width: 1200px;
   position: relative;
   overflow: hidden;
   margin: 0 auto;
  }

  .slide-track {
   display: flex;
   width: calc(var(--slides) / var(--visible-slides) * 100%);
   animation: scroll calc(var(--slides) * 2s) linear infinite;
  }

  .slide {
   box-sizing: border-box;
   padding: 10px;
   width: calc(100% / var(--slides));
  }

  .slide img {
   width: 100%;
   height: auto;
   aspect-ratio: 16 / 9;
   border-radius: 15px;
   object-fit: cover;
  }

  .slider:hover .slide-track {
   animation-play-state: paused;
  }

  @keyframes scroll {
   0% {
    transform: translateX(0);
   }

   100% {
    transform: translateX(-50%);
   }
  }
 </style>
</head>

<body>
 <div class="slider" style="--slides: 10;">
  <div class="slide-track">
   <div class="slide"><img src="https://picsum.photos/800/400?random=1" alt=""></div>
   <div class="slide"><img src="https://picsum.photos/800/400?random=2" alt=""></div>
   <div class="slide"><img src="https://picsum.photos/800/400?random=3" alt=""></div>
   <div class="slide"><img src="https://picsum.photos/800/400?random=4" alt=""></div>
   <div class="slide"><img src="https://picsum.photos/800/400?random=5" alt=""></div>

   <div class="slide"><img src="https://picsum.photos/800/400?random=1" alt=""></div>
   <div class="slide"><img src="https://picsum.photos/800/400?random=2" alt=""></div>
   <div class="slide"><img src="https://picsum.photos/800/400?random=3" alt=""></div>
   <div class="slide"><img src="https://picsum.photos/800/400?random=4" alt=""></div>
   <div class="slide"><img src="https://picsum.photos/800/400?random=5" alt=""></div>
  </div>
 </div>
</body>


</html>