<?php

require_once './config/db_config.php';

if (isset($_POST['activate-btn']) && $_SERVER['REQUEST_METHOD'] === 'POST') {

 $required_fields = ['lrn', 'password', 'confirm_password'];
 $errors = [];

 foreach ($required_fields as $field) {
  if (!isset($_POST[$field]) || trim($_POST[$field]) === '') {
   $errors[] = "The field $field is required.<br>";
  }
 }

 if (empty($errors)) {
  $lrn = trim($_POST['lrn']);
  $password = $_POST['password'];
  $confirm_password = $_POST['confirm_password'];

  echo $lrn . '<br>';
  echo $password . '<br>';
  echo $confirm_password . '<br>';
 } else {
  foreach ($errors as $error) {
   echo $error;
  }
 }
}
