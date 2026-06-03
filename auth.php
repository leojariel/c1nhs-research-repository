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
 <main>
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

  <fieldset>
   <div class="field-wrapper">
    <div class="field-header">
     <h2>Register</h2>
     <p>Activate your C1NHS account</p>
    </div>

    <form action="" method="POST">
     <div class="input-fields">

      <div class="c1nhs-username-wrapper">
       <label for="c1nhs-username">C1NHS Username:</label>
       <div class="username-placeholder-box">
        <div class="prefix-username">C1NHS# -</div>
        <input type="text" id="c1nhs-username" required>
       </div>
      </div>

      <div class="grade-lvl-wrapper">
       <label for="grade-lvl">Grade lvl.</label>
       <select id="grade-lvl" required>
        <option value="">Select</option>
        <optgroup label="SHS">
         <option value="12">12</option>
         <option value="11">11</option>
        </optgroup>
        <optgroup label="JHS">
         <option value="10">10</option>
         <option value="9">9</option>
         <option value="8">8</option>
         <option value="7">7</option>
        </optgroup>
       </select>
      </div>

      <div class="password-wrapper">
       <label for="password">Password:</label>
       <input type="password" id="password" required>
      </div>

      <div class="c-password-wrapper">
       <label for="c-password">Confirm password:</label>
       <input type="password" id="c-password" required>
      </div>

      <p class="help-message">If you need help, click <a href="#">guide</a></p>

      <div class="auth-buttons">
       <button class="activate-acc-btn" type="submit">Activate account <i class="ti ti-key"></i></button>
       <button class="log-in-nav-btn" type="button">Log In</button>
      </div>

     </div>
    </form>
   </div>
  </fieldset>
 </main>
</body>

</html>