<?php

if (session_status() === PHP_SESSION_NONE) {
 session_start();
}

if (!($_SESSION['loggedin'] ?? false)) {
 header("Location: auth.php");
 exit;
}

require_once './scripts/authentication-api.php';
require_once './scripts/profile-api.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta name="author" content="John Leo Jariel">
 <meta name="description" content="Accessible website for students who wants to find research references.">
 <link rel="stylesheet" href="public/css/profile.css">
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css" />
 <title>C1NHS - Research Repository</title>
</head>

<body>
 <!-- header -->
 <?php include './includes/header.php' ?>

 <!-- main -->
 <main>
  <?php if (!$isStudentFound): ?>
   <section class="profile-section">
    <div class="profile-box error">
     <p>Session Error: No Student Record Found.</p>
    </div>
   </section>
  <?php else: ?>
   <section class="profile-section">
    <div class="profile-box">
     <div class="profile-accessibility">
      <form action="" method="POST">
       <div class="log-out-btn-wrapper">
        <button type="submit" class="logout-btn" name="logout-btn">
         Log Out
        </button>
       </div>
      </form>
      <button class="edit-profile-btn"><i class="ti ti-edit"></i> Edit Profile</button>
     </div>

     <div class="profile-details">
      <div class="profile-picture">
       <div class="profile-img"></div>
      </div>
      <div class="user-details">
       <h2 class="student-name">John Leo Jariel</h2>
       <h3 class="grade_and_section">
        <span class="grade">Grade 12 |</span>
        <span class="section">Lanzones</span>
       </h3>
       <h3 class="lrn">
        <span>LRN: </span>
        <span class="lrn-codes">123456789123</span>
       </h3>
      </div>
     </div>

     <div class="bio-section">
      <div class="bio-box">
       <p>Sama-samang Cagsiayin, Disiplina at Edukasyon ang Mithiin!</p>
      </div>
     </div>

     <div class="contribution-container">
      <div class="graph-header">
       <div class="graph-title">
        Visit log
        <span id="yearBadge"></span>
       </div>
       <div class="legend">
        <span>Less</span>
        <div class="legend-boxes">
         <div class="legend-box"></div>
         <div class="legend-box l1"></div>
         <div class="legend-box l2"></div>
         <div class="legend-box l3"></div>
         <div class="legend-box l4"></div>
        </div>
        <span>More</span>
       </div>
      </div>

      <div class="data-graph">
       <div style="width: 100%; padding-left: 36px;" class="month-scroll-wrapper">
        <div id="monthLabelsContainer" class="month-labels"></div>
       </div>

       <div style="display: flex; align-items: flex-start; width: 100%;">
        <div id="dayLabelsContainer" class="day-labels-column"></div>
        <div class="graph-scroll-wrapper">
         <div id="contributionGrid" class="contribution-grid"></div>
        </div>
       </div>
      </div>
     </div>

     <div id="tooltip" class="tooltip"></div>

     <div class="label-divider">
      <div class="left-line line"></div>
      <h2>GROUP 1</h2>
      <div class="right-line line"></div>
     </div>

     <div class="group-list-wrapper">
      <ul class="group-list">
       <li class="member">
        <div class="profile-p"></div>
        <div class="label">
         <h3>Juan Dela Cruz (You)</h3>
         <h4>Leader</h4>
        </div>
       </li>
       <li class="member">
        <div class="profile-p"></div>
        <div class="label">
         <h3>Student 1</h3>
         <h4>Member</h4>
        </div>
       </li>
       <li class="member">
        <div class="profile-p"></div>
        <div class="label">
         <h3>Student 2</h3>
         <h4>Member</h4>
        </div>
       </li>
      </ul>
     </div>

    </div>
   </section>
  <?php endif; ?>
 </main>

 <script src="public/js/profile.js"></script>
</body>

</html>