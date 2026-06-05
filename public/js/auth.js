const fieldWrapper = document.querySelectorAll(".field-wrapper");
const activateAccBtn = document.querySelectorAll(".activate-acc-nav-btn");
const logInNavBtn = document.querySelectorAll(".log-in-nav-btn");
const forgotPassBtn = document.querySelector(".forgot-pass-btn");

activateAccBtn.forEach((btn) => {
 btn.addEventListener("click", () => {
  cleanUI();

  fieldWrapper[0].style.display = "flex";
 });
});

logInNavBtn.forEach((btn) => {
 btn.addEventListener("click", () => {
  cleanUI();

  fieldWrapper[1].style.display = "flex";
 });
});

forgotPassBtn.addEventListener("click", () => {
 cleanUI();

 fieldWrapper[2].style.display = "flex";
});

function cleanUI() {
 fieldWrapper.forEach((field) => {
  field.style.display = "none";
 });
}

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
