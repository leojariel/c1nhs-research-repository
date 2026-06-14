<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Practice</title>

 <style>
  .parent-container {
   display: flex;
   gap: 20px;
   justify-content: center;
   margin: 100px 0;
   /* Giving it some space to allow for scrolling */
  }

  /* 1. Initial Hidden State */
  .box {
   width: 150px;
   height: 150px;
   background-color: #3498db;
   color: white;
   display: flex;
   align-items: center;
   justify-content: center;

   /* Start shifted down and invisible */
   opacity: 0;
   transform: translateY(50px);

   /* Smooth transition configuration */
   transition: transform 0.6s ease-out, opacity 0.6s ease-out;
  }

  /* 2. Staggered Delays */
  .box:nth-child(1) {
   transition-delay: 0s;
  }

  .box:nth-child(2) {
   transition-delay: 0.2s;
  }

  .box:nth-child(3) {
   transition-delay: 0.4s;
  }

  .box:nth-child(4) {
   transition-delay: 0.6s;
  }

  /* 3. Triggered State */
  /* When the parent gets '.visible', animate all internal boxes */
  .parent-container.visible .box {
   opacity: 1;
   transform: translateY(0);
  }
 </style>
</head>

<body>
 <div style="height: 100vh;"></div>
 <div class="parent-container">
  <div class="box">Box 1</div>
  <div class="box">Box 2</div>
  <div class="box">Box 3</div>
  <div class="box">Box 4</div>
 </div>
</body>

<script>
 // Target the parent container
 const parentContainer = document.querySelector('.parent-container');

 const options = {
  root: null, // Uses the browser viewport
  rootMargin: '0px',
  threshold: 0.3 // Triggers when 30% of the parent is visible
 };

 const observer = new IntersectionObserver((entries, observer) => {
  entries.forEach(entry => {
   if (entry.isIntersecting) {
    // Add the class to trigger the CSS transitions
    entry.target.classList.add('visible');

    // Stop observing so the animation only happens once
    observer.unobserve(entry.target);
   }
  });
 }, options);

 // Start watching the parent
 observer.observe(parentContainer);
</script>

</html>