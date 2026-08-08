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
          s.lrn,
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
