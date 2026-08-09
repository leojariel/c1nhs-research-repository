// ! header burger toggle
const burgerWrapper = document.querySelector(".burger-button");
const burgerButton = burgerWrapper.querySelector(".ti");
const subNavbar = document.querySelector(".sub-navbar");

burgerButton.addEventListener("click", () => {
 subNavbar.classList.toggle("open");

 const isBurger = burgerButton.classList.contains("ti-menu-2");

 if (isBurger) {
  burgerButton.classList.remove("ti-menu-2");
  burgerButton.classList.add("ti-square-x");
 } else {
  burgerButton.classList.remove("ti-square-x");
  burgerButton.classList.add("ti-menu-2");
 }
});

// ! header navbar hiding logic
const header = document.querySelector("header");
let lastScrollY = window.scrollY;
const treshold = 10;

window.addEventListener("scroll", () => {
 const currentScrollY = window.scrollY;

 if (Math.abs(currentScrollY - lastScrollY) < treshold) {
  return;
 }

 if (currentScrollY > lastScrollY && currentScrollY > 100) {
  header.classList.add("hidden");
 } else if (currentScrollY < lastScrollY) {
  header.classList.remove("hidden");
 }

 lastScrollY = currentScrollY;
});

// ! profile dropdown
const profileBtn = {
 goToProfileBtn: document.querySelector(".profile-btn"),
 logOutBtn: document.querySelector(".logout-btn"),
};

Object.entries(profileBtn).forEach(([key, element]) => {
 if (element) {
  element.addEventListener("click", () => {
   switch (key) {
    case "goToProfileBtn":
     location.href = "profile.php";
     break;
    case "logOutBtn":
     console.log("yow");
     break;
    default:
     console.log("no way");
   }
  });
 }
});

function showLogOutModal() {
 const wrapper = document.createElement("div");
 wrapper.classList.add("confirm-logout-wrapper");

 document.body.appendChild(wrapper);
}

showLogOutModal();
