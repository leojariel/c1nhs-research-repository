document.addEventListener("DOMContentLoaded", () => {
 const wrappers = {
  register: document.querySelector(".register-wrapper"),
  login: document.querySelector(".login-wrapper"),
  forgot: document.querySelector(".forgot-pass-wrapper"),
  changePass: document.querySelector(".change-pass-wrapper"),
 };

 function switchView(targetKey) {
  if (!wrappers[targetKey]) targetKey = "register";

  Object.keys(wrappers).forEach((key) => {
   if (key === targetKey) {
    wrappers[key].classList.add("active");
   } else wrappers[key].classList.remove("active");
  });

  if (window.location.hash !== `#${targetKey}`) {
   history.replaceState(null, null, `#${targetKey}`);
  }
 }

 document.querySelectorAll(".log-in-nav-btn").forEach((btn) => {
  btn.addEventListener("click", () => switchView("login"));
 });

 document.querySelectorAll(".activate-acc-nav-btn").forEach((btn) => {
  btn.addEventListener("click", () => switchView("register"));
 });

 document.querySelectorAll(".forgot-pass-btn").forEach((btn) => {
  btn.addEventListener("click", () => switchView("forgot"));
 });

 function syncViewWithHash() {
  const mainElement = document.querySelector("main");
  const phpActiveView = mainElement ? mainElement.dataset.activeView : null;

  const hash = window.location.hash.replace("#", "");

  if (phpActiveView && wrappers[phpActiveView]) {
   switchView(phpActiveView);
  } else if (hash && wrappers[hash]) {
   switchView(hash);
  } else {
   switchView("register");
  }
 }

 syncViewWithHash();

 window.addEventListener("hashchange", () => {
  const hash = window.location.hash.replace("#", "");
  switchView(hash);
 });
});

const showPassWrapper = document.querySelectorAll(".show-pass-wrapper");

showPassWrapper.forEach((wrapper) => {
 const input = wrapper.querySelector(".pass-input");
 const icon = wrapper.querySelector(".toggle-icon");

 icon.addEventListener("click", () => {
  const isPassword = input.type === "password";

  input.type = isPassword ? "text" : "password";

  icon.classList.toggle("ti-eye-closed", !isPassword);
  icon.classList.toggle("ti-eye", isPassword);
 });
});

document.addEventListener("DOMContentLoaded", () => {
 const toast = document.getElementById("toast-message");

 if (toast) {
  // 1. Wait 3 seconds (3000ms), then trigger fade out transition
  setTimeout(() => {
   toast.classList.add("move-up");

   // 2. Remove the element from the page completely after the 0.5s fade finishes
   setTimeout(() => {
    toast.style.display = "none";
   }, 500);
  }, 5000); // 3 seconds timeout
 }
});
