<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Practice</title>

 <style>
  .parallax-container {
   position: relative;
   width: 100%;
   height: 50vh;
   overflow: hidden;
   /* Hides the image if it scales or moves past the boundaries */
  }

  .parallax-img {
   position: absolute;
   top: 0;
   left: 0;
   width: 100%;
   height: 100%;
   background-position: center;
   background-size: cover;
   /* This matches your snippet's starting state */
   transform: translate3d(0px, 0px, 0px);
   will-change: transform;
  }

  .content-overlay {
   position: absolute;
   top: 50%;
   left: 50%;
   transform: translate(-50%, -50%);
   color: white;
  }

  /* The section that slides over the top */
  .below-section {
   position: relative;
   z-index: 2;
   /* Sits on top of the parallax container */
   background: #ffffff;
   min-height: 100vh;
   padding: 50px;
  }
 </style>
</head>

<body>
 <div class="parallax-container">
  <div class="parallax-img" style="background-image: url('https://picsum.photos/1920/1080');"></div>
  <div class="content-overlay">
   <h1>Centered Header Text</h1>
  </div>
 </div>

 <div class="below-section">
  <h2>This section overlaps the image</h2>
  <p>Scroll down to see the magic happen.</p>
 </div>
</body>

<script>
 window.addEventListener('scroll', () => {
  const scrolled = window.scrollY;
  const parallaxImg = document.querySelector('.parallax-img');

  // 0.5 means the image moves at half the speed of the scroll.
  // Adjust this multiplier to change how fast/slow it stays centered.
  const yPos = scrolled * 0.5;

  // Dynamically update the translate3d just like the element you found!
  parallaxImg.style.transform = `translate3d(0px, ${yPos}px, 0px)`;
 });
</script>

</html>