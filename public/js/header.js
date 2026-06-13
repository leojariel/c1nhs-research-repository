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

 if (
  currentScrollY > lastScrollY &&
  currentScrollY > window.innerHeight - 100
 ) {
  header.classList.add("hidden");
 } else if (currentScrollY < lastScrollY) {
  header.classList.remove("hidden");
 }

 lastScrollY = currentScrollY;
});
