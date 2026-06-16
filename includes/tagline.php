<section class="tagline-section">
 <div class="tagline-wrapper">
  <img src="public/img/c1nhs-bg.jpg" alt="">
  <h2>“Sama-samang Cagsiayin, <span class="h-color">Disiplina at Edukasyon ang Mithiin!<span>“</h2>
 </div>

 <style>
  /* ! tagline section */
  .tagline-section {
   padding: 8em 2em;
  }

  .tagline-section .tagline-wrapper {
   max-width: min(100%, 1200px);
   height: 350px;
   margin: 0 auto;
   border-radius: 15px;
   overflow: hidden;
   position: relative;

   display: flex;
   justify-content: center;
   align-items: center;
  }

  .tagline-section .tagline-wrapper img {
   position: absolute;
   z-index: -1;
   width: 100%;
   height: 100%;
   object-fit: cover;
   object-position: center;
   filter: brightness(35%);
  }

  .tagline-section .tagline-wrapper h2 {
   display: inline-block;
   max-width: 980px;
   width: 90%;
   text-align: left;
   font-size: clamp(24px, 3vw, 48px);
   font-weight: 600;
   font-style: italic;
   color: #00ff69;
   padding-left: 1em;
   border-left: 5px solid;
   /* background: red; */
  }

  .tagline-section .tagline-wrapper .h-color {
   color: white;
  }

  .tagline-section .tagline-wrapper::before {
   content: "";
   position: absolute;
   inset: 0;
   background: linear-gradient(to right, #00ff69, #038b3b);
   opacity: 20%;
   z-index: 1;
  }
 </style>
</section>