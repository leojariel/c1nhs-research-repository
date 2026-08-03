<?php

require_once './config/db_config.php';

$error_message = '';

if (isset($_POST['activate-btn']) && $_SERVER['REQUEST_METHOD'] === 'POST') {

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
 }
}
