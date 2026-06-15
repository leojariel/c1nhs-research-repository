<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Practice</title>

 <style>
  /* Core Accordion Styling */
  .accordion {
   width: 100%;
   max-width: 600px;
   margin: 0 auto;
   font-family: Arial, sans-serif;
  }

  .accordion-item {
   border: 1px solid #ddd;
   border-bottom: none;
  }

  .accordion-item:last-child {
   border-bottom: 1px solid #ddd;
  }

  /* Header Buttons */
  .accordion-header {
   width: 100%;
   background-color: #f7f7f7;
   color: #333;
   text-align: left;
   padding: 15px;
   font-size: 16px;
   border: none;
   outline: none;
   cursor: pointer;
   transition: background-color 0.3s ease;
   position: relative;
  }

  .accordion-header:hover {
   background-color: #e9e9e9;
  }

  /* Indicator Arrow */
  .accordion-header::after {
   content: '\276F';
   /* Right angle quote */
   position: absolute;
   right: 15px;
   top: 50%;
   transform: translateY(-50%);
   transition: transform 0.3s ease;
  }

  /* Active State Styles */
  .accordion-item.active>.accordion-header {
   background-color: #e0f2fe;
   font-weight: bold;
  }

  .accordion-item.active>.accordion-header::after {
   transform: translateY(-50%) rotate(90deg);
   /* Rotate arrow down */
  }

  /* Content Panel (Hidden by default) */
  .accordion-content {
   max-height: 0;
   overflow: hidden;
   transition: max-height 0.3s ease-out;
   background-color: #fff;
  }

  /* Padding inside the content, wrapper to prevent glitchy jumps */
  .accordion-content p,
  .accordion-content .accordion {
   padding: 15px;
  }

  /* Indentation for Nested Accordions */
  .accordion-content .accordion {
   padding: 10px 0 0 15px;
   /* Indent nested layers */
  }
 </style>
</head>

<body>
 <div class="accordion">

  <div class="accordion-item">
   <button class="accordion-header">Front-End Development</button>
   <div class="accordion-content">

    <div class="accordion">
     <div class="accordion-item">
      <button class="accordion-header">HTML & CSS</button>
      <div class="accordion-content">
       <p>Semantic HTML, Flexbox, Grid, and modern CSS layout techniques.</p>
      </div>
     </div>
     <div class="accordion-item">
      <button class="accordion-header">JavaScript</button>
      <div class="accordion-content">
       <p>DOM manipulation, ES6+ features, and asynchronous programming.</p>
      </div>
     </div>
    </div>
   </div>
  </div>

  <div class="accordion-item">
   <button class="accordion-header">Back-End Development</button>
   <div class="accordion-content">
    <p>Server-side programming, databases, APIs, and cloud infrastructure.</p>
   </div>
  </div>

 </div>
</body>

<script>
 document.querySelectorAll('.accordion-header').forEach(header => {
  header.addEventListener('click', function() {
   const currentItem = this.parentElement;
   const content = this.nextElementSibling;

   // Toggle active class on the clicked item
   currentItem.classList.toggle('active');

   if (currentItem.classList.contains('active')) {
    // Open current item
    content.style.maxHeight = content.scrollHeight + "px";

    // Update parent accordion heights if nested
    updateParentHeight(this, content.scrollHeight);
   } else {
    // Close current item
    updateParentHeight(this, -content.scrollHeight);
    content.style.maxHeight = null;
   }
  });
 });

 // Helper function to dynamically adjust parent container heights
 function updateParentHeight(element, heightDifference) {
  let parentContent = element.closest('.accordion-content');

  // Climb up the DOM tree and add/subtract height to all ancestor containers
  while (parentContent) {
   const currentHeight = parseInt(parentContent.style.maxHeight) || 0;
   parentContent.style.maxHeight = (currentHeight + heightDifference) + "px";

   // Move up to the next parent accordion layer
   parentContent = parentContent.parentElement.closest('.accordion-content');
  }
 }
</script>

</html>