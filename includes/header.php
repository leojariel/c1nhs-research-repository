<header>
 <div class="header-inner-box">
  <div class="logo-wrapper">
   <img src="public/img/c1nhs-logo.webp" alt="cagsiay 1 national high school logo" width="61">
   <div class="logo-text">
    <h3 class="header">Cagsiay 1 National High School</h3>
    <h4 class="subheader">Research Repository</h4>
   </div>
  </div>

  <nav>
   <ul class="header-nav-items">
    <li class="nav-item">
     <a href="home.php"><i class="ti ti-home"></i> Home</a>
    </li>
    <li class="nav-item">
     <a href="research-area.php"><i class="ti ti-article"></i> Research Area</a>
    </li>
    <li class="nav-item">
     <a href="contact.php"><i class="ti ti-phone"></i> Contact</a>
    </li>
   </ul>
  </nav>

  <div class="accessibility-wrapper">
   <div class="profile-wrapper">
    <i class="ti ti-user-circle"></i>
   </div>

  </div>
 </div>
</header>

<style>
 li {
  list-style: none;
 }

 a {
  text-decoration: none;
 }

 header {
  background: #e7ffc7;
  position: absolute;
  left: 0;
  top: 0;
  width: 100%;
  z-index: 1;
 }

 .header-inner-box {
  display: flex;
  justify-content: space-between;
  align-items: center;

  max-width: 1400px;
  width: 100%;
  margin: 0 auto;
  padding: 1em;
 }

 .logo-wrapper {
  display: flex;
  align-items: center;
  gap: 10px;
 }

 .logo-text .header,
 .logo-text .subheader {
  font-size: 24px;
  font-weight: 700;
  line-height: 0.9em;
  color: #038b3b;
 }

 .logo-text .subheader {
  font-weight: 400;
 }

 .header-nav-items {
  display: inline-flex;
  gap: 25px;
  font-size: 22px;
  font-weight: 600;
 }

 .header-nav-items .nav-item>a {
  padding: 0.5em 0.6em;
  color: #1b4332;
  background-color: hsla(88, 100%, 50%, 0.25);
  /* background: #2d6a4f; */
  border-radius: 10px;
 }

 .profile-wrapper {
  font-size: 46px;
  color: #1b4332;
  cursor: pointer;
 }
</style>