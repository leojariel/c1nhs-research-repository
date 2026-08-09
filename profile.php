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
 <form action="" method="POST">
  <div class="profile-modal-wrapper">
   <div class="modal">
    <div class="modal-header">
     <h2>Profile</h2>
    </div>
    <div class="modal-content">
     <h3>Choose your icon:</h3>

     <div class="icon-skin-tone-container">
      <label for="fair-btn" class="tone_toggle">
       <input type="radio" name="tone_toggle" id="fair-btn" value="fair" checked onchange="swichtToneContainer('fair');"> Fair
      </label>
      <label for="tan-btn" class="tone_toggle">
       <input type="radio" name="tone_toggle" id="tan-btn" value="tan" onchange="swichtToneContainer('tan'); "> Tan
      </label>
     </div>

     <?php foreach (['fair', 'tan'] as $tone): ?>
      <div id="<?= $tone ?>-grid" class="icon-grid <?= ($tone === 'fair') ? 'active' : 'hidden' ?>">
       <?php if (!empty($icons_by_tone[$tone])): ?>
        <?php foreach ($icons_by_tone[$tone] as $filename): ?>
         <?php
         $imgPath = "public/img/profile-icon/{$deptFolder}/{$genderFolder}/{$tone}/{$filename}";
         ?>
         <label class="icon-option">
          <input type="radio" name="selected_icon" value="<?= $filename ?>">
          <img width="100" src="<?= $imgPath ?>.jpeg" alt="profile option">
         </label>
        <?php endforeach; ?>
       <?php else: ?>
       <?php endif; ?>
      </div>
     <?php endforeach; ?>

     <div class="field-container">
      <fieldset>
       <div class="field-header">
        <h3>Change your details:</h3>
       </div>
       <div class="profile-full-name-wrapper">
        <label for="full-name">Name:</label>
        <input type="text" class="full-name" id="full-name" value="<?= $full_name; ?>" disabled>
       </div>
       <div class="profile-lrn-wrapper">
        <label for="lrn-code">LRN:</label>
        <input type="text" class="lrn-code" id="lrn-code" value="<?= $lrn; ?>" disabled>
       </div>
      </fieldset>
     </div>

    </div>
   </div>
  </div>
 </form>

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
      <button class="edit-profile-btn"><i class="ti ti-edit"></i> Edit Profile</button>
     </div>

     <div class="profile-details">
      <div class="profile-picture">
       <div class="profile-img">
        <img src="public/img/profile-icon/jhs/male/fair/image1.jpeg" alt="">
       </div>
      </div>
      <div class="user-details">
       <h2 class="student-name"><?= $full_name ?: "Loading..." ?><span class="department-label <?= $isShs ? 'shs-color' : 'jhs-color'; ?>"><?= $isShs ? "SHS - " . $student['strand'] : 'JHS'; ?></span></h2>
       <h3 class="grade_and_section">
        <span class="grade"><?= $grade_level ?: "Loading..." ?> |</span>
        <span class="section"><?= $section_name ?: "Loading..." ?></span>
       </h3>
       <h3 class="lrn">
        <span>LRN: </span>
        <span class="lrn-codes"><?= $lrn ?: "Loading..." ?></span>
       </h3>
      </div>
     </div>

     <div class="bio-section">
      <div class="bio-box">
       <p><?= $bio ?: "Sama-samang Cagsiayin, Disiplina at Edukasyon ang Mithiin!" ?></p>
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

 <script src="public/js/header.js"></script>
 <script src="public/js/profile.js"></script>
</body>

</html>