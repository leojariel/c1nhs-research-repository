<?php

require_once './config/db_config.php';

$error_message = '';
$success_message = '';
$active_view = '';

// ! activation logic
if (isset($_POST['activate-btn']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
 $active_view = 'register';

 $required_fields = [
  "lrn" => "LRN",
  "password" => "Password",
  "confirm_password" => "Confirmation"
 ];

 $missing_labels = [];

 foreach ($required_fields as $field => $label) {
  if (!isset($_POST[$field]) || trim($_POST[$field]) === '') {
   $missing_labels[] = $label;
  }
 }

 $error_count = count($missing_labels);

 if ($error_count === count($required_fields)) {
  $error_message = "All fields are required.";
 } else if ($error_count === 2) {
  $error_message = $missing_labels[0] . ' and ' . $missing_labels[1] . ' are required.';
 } else if ($error_count === 1) {
  $error_field_label = $missing_labels[0];

  if ($error_field_label === 'LRN') {
   $error_message = 'LRN is required. Please input your LRN.';
  } else if ($error_field_label === 'Password') {
   $error_message = 'Password is required. Please input your password.';
  } else {
   $error_message = 'Please confirm your password.';
  }
 }

 if ($error_count === 0) {
  $lrn = trim($_POST['lrn']);
  $password = $_POST['password'];
  $confirm_password = $_POST['confirm_password'];

  $password_pattern = '/^(?=.*[0-9])(?=.*[!@#$%^&*()_+\-=\[\]{};\':"\\\\|,.<>\/?]).{8,}$/';

  if (strlen($lrn) < 12) {
   $error_message = 'LRN must be 12 digits.';
  } else if ($password !== $confirm_password) {
   $error_message = 'Password do not match.';
  } else if (!preg_match($password_pattern, $password)) {
   $error_message = 'Password must be at least 8 characters long and contain at least one number and one symbol.';
  } else {

   $stmt = $pdo->prepare("SELECT student_id, is_activated FROM students WHERE lrn = :lrn LIMIT 1");
   $stmt->execute([':lrn' => $lrn]);
   $user = $stmt->fetch(PDO::FETCH_ASSOC);

   if (!$user) {
    $error_message = 'The provided LRN does not exist in our records.';
   } else if ((int)$user['is_activated'] === 1) {
    $error_message = 'This account is already activated. You can log in directly.';
    $active_view = 'login';
   } else {
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $update_stmt = $pdo->prepare(
     "UPDATE students
     SET password = :hashed_password,
     is_activated = 1,
     activated_at = NOW()
     WHERE student_id = :student_id AND is_activated = 0"
    );

    $updated = $update_stmt->execute([
     ':hashed_password' => $hashed_password,
     ':student_id' => $user['student_id']
    ]);

    if ($updated) {
     $success_message = 'Account successfully activated! You may now log in.';
     $active_view = 'login';
    } else {
     $error_message = 'Failed to activate account. Please try again later.';
    }
   }
  }
 }
}


// ! login logic

if (isset($_POST['login_btn']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
 $active_view = 'login';

 $lrn = trim($_POST['lrn']) ?? '';
 $password = $_POST['password'] ?? '';

 if (empty($lrn) || empty($password)) {
  $error_message = 'All fields are required.';
 } else {

  $stmt = $pdo->prepare("SELECT student_id, lrn, password, is_activated FROM students WHERE lrn = :lrn LIMIT 1");
  $stmt->execute(['lrn' => $lrn]);
  $user = $stmt->fetch(PDO::FETCH_ASSOC);

  if (!$user) {
   $error_message = "The provided LRN does not exist in our records.";
  } else if ((int)$user['is_activated'] !== 1) {
   $error_message = "This LRN hasn't been activated yet. Please kindly activate it first.";
   $active_view = 'register';
  } else {
   $id = $user['student_id'];
   $lrn = $user['lrn'];
   $hashed_password = $user['password'];

   if (password_verify($password, $hashed_password)) {
    if (session_status() === PHP_SESSION_NONE) {
     session_start();
    }

    $_SESSION['id'] = $id;
    $_SESSION['lrn'] = $lrn;
    $_SESSION['loggedin'] = true;

    header("Location: home.php");
   } else {
    $error_message = 'Wrong password.';
   }
  }
 }
}

// ! retrieve account
if (isset($_POST['retrieve_btn']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
 $active_view = 'forgot';
 $lrn_retrieve = trim($_POST['lrn_retrieve']) ?? '';

 if (!$lrn_retrieve) {
  $error_message = 'Please kindly input your LRN.';
 } else {
  $stmt = $pdo->prepare("SELECT student_id, lrn, is_activated FROM students WHERE lrn = :lrn LIMIT 1");
  $stmt->execute(['lrn' => $lrn_retrieve]);
  $user = $stmt->fetch(PDO::FETCH_ASSOC);

  if (!$user) {
   $error_message = "The provided LRN does not exist in our records.";
  } else if ((int)$user['is_activated'] !== 1) {
   $error_message = "This account is not yet activated. Activate it first.";
   $active_view = 'register';
  } else {
   if (session_status() === PHP_SESSION_NONE) {
    session_start();
   }

   $_SESSION['reset_lrn'] = $user['lrn'];
   $success_message = 'Account Found! Enter your new password below.';
   $active_view = 'changePass';
  }
 }
}


// ! change password 
if (isset($_POST['change_pass_btn']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
 $active_view = 'changePass';

 if (session_status() === PHP_SESSION_NONE) {
  session_start();
 }

 $reset_lrn = $_SESSION['reset_lrn'] ?? null;
 $new_password = $_POST['new_password'] ?? '';
 $confirm_password = $_POST['confirm_password'] ?? '';

 if (!$reset_lrn) {
  $error_message = 'Session expired. Please search for your LRN again.';
  $active_view = 'forgot';
 } else if (empty($new_password) || empty($confirm_password)) {
  $error_message = 'All fields are required.';
 } else if ($new_password !== $confirm_password) {
  $error_message = 'Password do not match.';
 } else {
  $password_pattern = '/^(?=.*[0-9])(?=.*[!@#$%^&*()_+\-=\[\]{};\':"\\\\|,.<>\/?]).{8,}$/';

  if (!preg_match($password_pattern, $new_password)) {
   $error_message = 'Password must be at least 8 characters long and contain at least one number and one symbol.';
  } else {
   $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

   $update_stmt = $pdo->prepare("UPDATE students SET password = :password WHERE lrn = :lrn");
   $updated = $update_stmt->execute([
    ':password' => $hashed_password,
    ':lrn' => $reset_lrn
   ]);

   if ($updated) {
    unset($_SESSION['reset_lrn']);
    $success_message = 'Password successfully updated! You may now log in.';
    $active_view = 'login';
   } else {
    $error_message = 'Failed to update password. Please try again.';
   }
  }
 }
}

// ! logout
if (isset($_POST['logout-btn']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
 if (session_status() === PHP_SESSION_NONE) {
  session_start();
 }

 $_SESSION = [];

 session_destroy();

 header('location: auth.php');
 exit;
}
