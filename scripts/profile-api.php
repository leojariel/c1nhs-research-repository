<?php

if (session_status() === PHP_SESSION_NONE) {
 session_start();
}

$student_id = $_SESSION['id'] ?? '';
$isStudentFound = true;
$isShs = false;


if (!empty($student_id)) {
 $sql = "SELECT 
          s.first_name,
          s.last_name,
          s.gender,
          s.lrn,
          s.profile_icon,
          s.bio,
          sec.grade_level,
          sec.section_name,
          sec.department,
          sec.strand
         FROM students s
         LEFT JOIN sections sec ON s.section_id = sec.section_id
         WHERE s.student_id = :student_id";

 $stmt = $pdo->prepare($sql);
 $stmt->execute([':student_id' => $student_id]);
 $student = $stmt->fetch(PDO::FETCH_ASSOC);

 if (!$student) {
  $isStudentFound = false;
 } else {
  $full_name = htmlspecialchars($student['first_name'] . " " . $student['last_name']) ?? '';
  $bio = !empty($student['bio']) ? htmlspecialchars($student['bio']) : 'No bio provided.';
  $grade_level = "Grade " . htmlspecialchars($student['grade_level']);
  $section_name = htmlspecialchars($student['section_name']);
  $lrn = htmlspecialchars($student['lrn']);

  if ($student['department'] === 'SHS' && !empty($student['strand'])) {
   $isShs = true;
  } else {
   $isShs = false;
  }
 }
} else {
 $isStudentFound = false;
}

if (!empty($student_id) && $isStudentFound) {
 $deptFolder = strtolower($student['department']);
 $genderFolder = ($student['gender'] === 'M') ? 'male' : 'female';

 $icon_sql = "SELECT
              filename,
              skin_tone
             FROM profile_icons
             WHERE department = ?
             AND gender  = ?";
 $icon_stmt = $pdo->prepare($icon_sql);
 $icon_stmt->execute([$student['department'], $student['gender']]);
 $all_icons = $icon_stmt->fetchAll(PDO::FETCH_ASSOC);

 if (!empty($all_icons)) {
  $icons_by_tone = [
   'fair' => [],
   'tan' => []
  ];

  foreach ($all_icons as $icon) {
   $icons_by_tone[$icon['skin_tone']][] = $icon['filename'];
  }
 }
}

// ! save profile logic
if (isset($_POST['save_profile_btn']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
 if (session_status() === PHP_SESSION_NONE) {
  session_start();
 }

 $student_id = $_SESSION['id'] ?? null;

 if ($student_id) {

  $selected_path = !empty($_POST['selected_icon']) ? trim($_POST['selected_icon']) : null;
  $bio = isset($_POST['bio']) ? $_POST['bio'] : '';

  $update_stmt = $pdo->prepare("UPDATE students SET profile_icon = :profile_icon, bio = :bio WHERE student_id = :student_id");
  $update_stmt->execute([':profile_icon' => $selected_path, ':bio' => $bio, ':student_id' => $student_id]);

  header('location: profile.php');
  exit;
 }
}
