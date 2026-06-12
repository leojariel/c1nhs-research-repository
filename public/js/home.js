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
