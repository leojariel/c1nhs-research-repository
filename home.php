<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta name="author" content="John Leo Jariel">
 <meta name="description" content="Accessible website for students who wants to find research references.">
 <link rel="stylesheet" href="public/css/home.css">
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css" />
 <title>C1NHS - Research Repository</title>
</head>

<body>

 <!-- header -->
 <?php include 'includes/header.php' ?>

 <main>
  <!-- hero section -->
  <section class="hero-wrapper">
   <div class="hero" id="image-slider">
    <div class="hero-content">
     <h3>Welcome to</h3>
     <abbr title="Cagsiay I National High School">C.1.N.H.S</abbr>
     <h1>research repository</h1>
     <p>This repository brings together the best Senior High School research projects all in one place, making it easy to find reliable references, spark new ideas, and see how much research actually matters. Built to help you navigate your own academic journey, it's a space to explore past work, get inspired, and see what's possible.</p>
     <a href="research-area.php">Explore now <i class="ti ti-external-link"></i></a>
     <div class="bullets-container"></div>
    </div>
   </div>
   <div class="scroll-indicator">
    <div class="scroll-icon">
     <div class="mouse">
      <div class="wheel"></div>
     </div>
     <span>Scroll</span>
    </div>
   </div>
  </section>

  <!-- why section -->
  <section class="why-section section-to-animate">
   <div class="why-wrapper">
    <div class="box title-wrapper">
     <h2>Why do we need research repository?</h2>
    </div>
    <div class="cards-wrapper">
     <div class="box card">
      <img src="public/img/card-image-1.webp" alt="" width="300">
      <h3>TRUSTED REFERENCES!</h3>
      <p>Excellence relies on solid foundations. Instead of getting lost in random internet searches, this platform serves as a benchmark for academic quality, providing direct access to verified references and localized studies conducted right here in our school community.</p>
     </div>
     <div class="box card">
      <img src="public/img/card-image-2.webp" alt="" width="300">
      <h3>FIND YOUR INSPIRATION!</h3>
      <p>Stuck on choosing a topic? This repository showcases the incredible ingenuity of Cagsiay 1 National High School students. Browsing past Senior High School projects lets you see what’s already been achieved, helping you uncover fresh angles, unique local problems to solve, and ideas you might never have considered.</p>
     </div>
     <div class="box card">
      <img src="public/img/card-image-3.webp" alt="" width="300">
      <h3>RESEARCH WITH REAL IMPACT!</h3>
      <p>At Cagsiay 1 National High School, research isn't just a graduation requirement—it's where we learn to solve real-world challenges. Seeing the impact of past student projects proves how powerful Cagsiayin ideas truly are and reminds us how essential our voices are in driving change.</p>
     </div>
    </div>
   </div>
  </section>

  <!-- pinnacle section -->
  <section class="pinnacle-section section-to-animate">
   <div class="box title">
    <h2>The Pinnacle of Student Research</h2>
   </div>

   <section class="bisr-batch">
    <div class="bisr-wrapper section-to-animate">
     <h2 class="box">BEST IN</h2>
     <div class="box bisr-images">
      <div class="card-image">
       <div class="border-glow-wrapper"></div>
       <img src="public/img/bisr-2023-2024/rosvel.webp" alt="" width="300">
      </div>
      <div class="card-image">
       <div class="border-glow-wrapper"></div>
       <img src="public/img/bisr-2023-2024/roxas.webp" alt="" width="300">
      </div>
     </div>
     <h2 class="box">STUDENT RESEARCH</h2>
     <p class="box">School Year 2023-2024</p>
    </div>
   </section>

   <section class="bisr-batch">
    <div class="bisr-wrapper section-to-animate">
     <h2 class="box">BEST IN</h2>
     <div class="box bisr-images">
      <div class="card-image">
       <div class="border-glow-wrapper"></div>
       <img src="public/img/bisr-2022-2023/batch-2022-2023.webp" alt="" width="300">
      </div>
     </div>
     <h2 class="box">STUDENT RESEARCH</h2>
     <p class="box">School Year 2022-2023</p>
    </div>
   </section>
  </section>

  <section class="mission_goal-section">
   <div class="mission-bg-wrapper">
    <article class="mission-wrapper">
     <h2>Our mission:</h2>
     <p>We understand the transformative power of research. It is through inquiry and exploration that we achieve academic excellence and contribute to societal progress. Our mission is to cultivate a vibrant research culture that inspires and equips our students, faculty, and staff to pursue meaningful scholarly work.</p>
     <p>This repository is a testament to the dedication and ingenuity of our students. It offers a collection of research projects across various disciplines, reflecting the intellectual curiosity and hard work of our academic community.</p>
     <p>We hope that this platform not only showcases the exceptional work being done at our school but also inspires future generations of learners to engage in research. By doing so, they can expand their knowledge, develop critical thinking skills, and make impactful contributions to society.</p>
     <p>Thank you for visiting our Research Repository. We encourage you to explore the innovative and insightful work of our students and join us in our mission to advance knowledge and understanding.</p>
    </article>
   </div>
   <div class="goal-bg-wrapper">
    <article class="goal-wrapper">
     <h2>Our goal:</h2>
     <p>We, at Cagsiay 1 National High School believe that research is an essential tool for personal growth, academic excellence, and societal development.</p>
     <p>To showcase the research outputs of our students, we have created this research repository designed to be a central hub for all the scholarly works produced by our students and a platform for sharing their findings with the wider community.</p>
     <p>We believe that this repository will serve as a valuable resource for students, educators, researchers, and anyone interested in gaining insights into the research being conducted at our school.</p>
     <p>Enjoy exploring this website and discover the wealth of knowledge and ideas that our students have produced.</p>
    </article>
   </div>
  </section>

  <!-- tagline section -->
  <?php include './includes/tagline.php' ?>

  <?php include './includes/footer.php' ?>

 </main>

 <script src="public/js/header.js"></script>
 <script src="public/js/home.js"></script>
</body>

</html>