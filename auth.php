<?php

if (session_status() === PHP_SESSION_NONE) {
 session_start();
}

if ($_SESSION['loggedin'] ?? false) {
 header("Location: home.php");
 exit;
}

require_once './scripts/authentication-api.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta name="author" content="John Leo Jariel">
 <meta name="description" content="Accessible website for students who wants to find research references.">
 <link rel="stylesheet" href="public/css/auth.css">
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css" />
 <title>C1NHS - Research Repository</title>
</head>

<body>
 <main data-active-view="<?php echo $active_view; ?>">

  <aside id="auth-welcome">
   <div class="auth-wrapper">
    <div class="c1nhs-logo-container">
     <img src="public/img/c1nhs-logo.webp" width="270" alt="">
    </div>

    <div class="header-text">
     <h2>Welcome to</h2>
     <abbr title="Cagsiay I National High School" style="text-decoration: none;">C.1.N.H.S</abbr>
     <h1>research repository</h1>
    </div>

    <div class="footer">
     <small>Copyright &copy; 2026 All rights reserved.</small>
     <small>Cagsiay I National High School</small>
    </div>
   </div>
  </aside>

  <div class="divider-line"></div>

  <fieldset id="fieldSet">

   <?php if (!empty($error_message)): ?>
    <div id="toast-message" class="alert alert-danger">
     <?= htmlspecialchars(ucfirst($error_message), ENT_QUOTES, 'UTF-8'); ?>
    </div>
   <?php endif; ?>

   <?php if (!empty($success_message)): ?>
    <div id="toast-message" class="alert alert-success">
     <?= htmlspecialchars(ucfirst($success_message), ENT_QUOTES, 'UTF-8'); ?>
    </div>
   <?php endif; ?>
   <!-- Register Wrap -->
   <div id="register" class="field-wrapper register-wrapper <?= ($active_view === 'register') ? 'active' : '' ?>">
    <div class="c1nhs-logo-container auth-area">
     <img src="public/img/c1nhs-logo.webp" width="100" alt="">
    </div>
    <div class="field-header">
     <h2>Register</h2>
     <p>Activate your C1NHS account</p>
    </div>

    <form action="#register" method="POST" autocomplete="off">
     <div class="input-fields">

      <div class="c1nhs-username-wrapper">
       <label for="c1nhs-username">Your LRN:</label>
       <div class="username-placeholder-box">
        <div class="prefix-username">C1NHS# -</div>
        <input type="text" name="lrn" id="c1nhs-username" maxlength="12">
       </div>
      </div>

      <div class="password-wrapper">
       <label for="password">Password:</label>
       <div class="show-pass-wrapper">
        <input class="pass-input" type="password" name="password" id="password" minlength="8" maxlength="12">
        <i class="ti toggle-icon ti-eye-closed"></i>
        <div class="show-pass-buttons"></div>
       </div>
      </div>

      <div class="c-password-wrapper">
       <label for="c-password">Confirm password:</label>
       <div class="show-pass-wrapper">
        <input class="pass-input" type="password" name="confirm_password" id="c-password" minlength="8" maxlength="12">
        <i class="ti toggle-icon ti-eye-closed"></i>
       </div>
      </div>

      <p class="help-message">If you need help, click <a href="#">guide</a></p>

      <div class="auth-buttons">
       <button class="activate-submit-btn" name="activate-btn" type="submit">Activate account <i class="ti ti-key"></i></button>
       <button class="log-in-nav-btn" type="button">Log In</button>
      </div>

     </div>
    </form>
   </div>

   <!-- log in wrapper -->
   <div id="login" class="field-wrapper login-wrapper <?= ($active_view === 'login') ? 'active' : '' ?>">
    <div class="c1nhs-logo-container auth-area">
     <img src="public/img/c1nhs-logo.webp" width="100" alt="">
    </div>
    <div class="field-header">
     <h2>Log In</h2>
     <p>Input your registered C1NHS account</p>
    </div>

    <form action="#login" method="POST" autocomplete="off">
     <div class="input-fields">

      <div class="c1nhs-username-wrapper">
       <label for="c1nhs-username">Your LRN:</label>
       <div class="username-placeholder-box">
        <div class="prefix-username">C1NHS# -</div>
        <input type="text" id="c1nhs-username" name="lrn" maxlength="12">
       </div>
      </div>

      <div class="password-wrapper">
       <label for="password">Password:</label>
       <div class="show-pass-wrapper">
        <input class="pass-input" name="password" type="password" id="password">
        <i class="ti toggle-icon ti-eye-closed"></i>
       </div>
      </div>

      <p class="help-message">If you need help, click <a href="#">guide</a></p>

      <div class="auth-buttons">
       <div class="forgot-btn-pass-wrapper">
        <button class="forgot-pass-btn" type="button">Forgot password?</button>
       </div>
       <button class="login-submit-btn" name="login_btn" type="submit">Log in <i class="ti ti-login-2"></i></button>
       <button class="activate-acc-nav-btn" type="button">Activate Account</button>
      </div>

     </div>
    </form>
   </div>

   <!-- forgot password -->
   <div id="forgot" class="field-wrapper forgot-pass-wrapper <?= ($active_view === 'forgot') ? 'active' : '' ?>">
    <div class="c1nhs-logo-container auth-area">
     <img src="public/img/c1nhs-logo.webp" width="100" alt="">
    </div>
    <div class="field-header">
     <h2>Retrieve Account</h2>
     <p>Remember your C1NHS username</p>
    </div>

    <form action="#forgot" method="POST" autocomplete="off">
     <div class="input-fields">

      <div class="c1nhs-username-wrapper">
       <label for="c1nhs-username">Your LRN:</label>
       <div class="username-placeholder-box">
        <div class="prefix-username">C1NHS# -</div>
        <input type="text" name="lrn_retrieve" id="c1nhs-username" maxlength="12" value="<?= $_POST['lrn_retrieve'] ?? ''; ?>">
       </div>
      </div>

      <p class="help-message">If you need help, click <a href="#">guide</a></p>

      <div class="auth-buttons">
       <button class="retrieve-acc-submit-btn" type="submit" name="retrieve_btn">Retrieve account <i class="ti ti-lock-open-2"></i></button>
       <button class="log-in-nav-btn" type="button">Log In</button>
       <button class="activate-acc-nav-btn" type="button">Activate Account</button>
      </div>

     </div>
    </form>
   </div>

   <!-- change password -->
   <div id="changePass" class="field-wrapper change-pass-wrapper <?= ($active_view === 'changePass') ? 'active' : '' ?>">
    <div class="c1nhs-logo-container auth-area">
     <img src="public/img/c1nhs-logo.webp" width="100" alt="">
    </div>
    <div class="field-header">
     <h2>Change your password</h2>
     <p>Input your new password & confirm it</p>
    </div>

    <form action="#changePass" method="POST" autocomplete="off">
     <div class="input-fields">

      <div class="password-wrapper">
       <label for="password">New password:</label>
       <div class="show-pass-wrapper">
        <input class="pass-input" type="password" name="new_password" id="password" minlength="8" maxlength="12">
        <i class="ti toggle-icon ti-eye-closed"></i>
        <div class="show-pass-buttons"></div>
       </div>
      </div>

      <div class="c-password-wrapper">
       <label for="c-password">Confirm password:</label>
       <div class="show-pass-wrapper">
        <input class="pass-input" type="password" name="confirm_password" id="c-password" minlength="8" maxlength="12">
        <i class="ti toggle-icon ti-eye-closed"></i>
       </div>
      </div>

      <p class="help-message">If you need help, click <a href="#">guide</a></p>

      <div class="auth-buttons">
       <button class="change-pass-submit-btn" type="submit" name="change_pass_btn">Change password <i class="ti ti-lock-open-2"></i></button>
       <button class="log-in-nav-btn" type="button">Go back</button>
      </div>

     </div>
    </form>
   </div>


  </fieldset>
 </main>

 <script src="public/js/auth.js"></script>
</body>

</html>