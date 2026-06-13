<header>
 <div class="header-inner-box">
  <div class="logo-wrapper">
   <img src="public/img/c1nhs-logo.webp" alt="cagsiay 1 national high school logo">
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
   <div class="burger-button">
    <i class="ti ti-menu-2"></i>
   </div>
  </div>
 </div>

 <div class="sub-navbar">
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
    <li class="nav-item">
     <a href="profile.php"><i class="ti ti-user-circle"></i> Profile</a>
    </li>
   </ul>
  </nav>
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
  background: rgba(231, 255, 199, 0.65);
  backdrop-filter: blur(12px);
  -webkit-backdrop-filter: blur(12px);
  position: fixed;
  left: 0;
  top: 0;
  width: 100%;
  z-index: 999;
  transition: transform 0.5s ease;
 }

 header.hidden {
  transform: translateY(-100%);
 }

 .header-inner-box {
  display: flex;
  justify-content: space-between;
  align-items: center;
  gap: 15px;

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

 .logo-wrapper img {
  width: 60px;
  height: auto;
 }


 .logo-text .header,
 .logo-text .subheader {
  font-size: clamp(14px, 2vw, 24px);
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
  font-size: clamp(16px, 2vw, 22px);
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

 .burger-button {
  display: none;
  font-size: 26px;
  color: #1b4332;
 }

 .sub-navbar {
  display: none;
 }

 @media (width <=1025px) {

  .header-nav-items,
  .profile-wrapper {
   display: none;
  }

  .sub-navbar {
   padding: 2em;
   border-top: 1px solid #5d5d5d;
  }

  .sub-navbar.open {
   display: block;
  }

  .sub-navbar .header-nav-items {
   display: flex;
   flex-direction: column;
  }

  .sub-navbar .nav-item>a {
   padding: 0;
   background: none;
   display: inline-block;
   -webkit-user-select: none;
   /* Safari */
   -ms-user-select: none;
   /* IE 10 and Old Edge */
   user-select: none;
  }

  .sub-navbar .nav-item>a:hover {
   opacity: 0.8;
  }

  .logo-wrapper img {
   width: 30px;
  }

  .burger-button {
   display: block;
   cursor: pointer;
  }
 }
</style>