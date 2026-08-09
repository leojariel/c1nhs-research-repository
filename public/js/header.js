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
     showLogOutModal();
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

 const mainModal = document.createElement("div");
 mainModal.classList.add("modal");

 const modalHeader = document.createElement("div");
 modalHeader.classList.add("modal-header-box");
 const headerTitle = document.createElement("h2");
 headerTitle.classList.add("header-text-title");
 headerTitle.textContent = "Are you sure?";
 modalHeader.appendChild(headerTitle);

 const modalContent = document.createElement("div");
 modalContent.classList.add("modal-content");
 const p = document.createElement("p");
 p.textContent =
  "Note that if you log out, you will input your credentials when you log in again. Before you log out, please take note of your password. Thank you! :))";
 modalContent.appendChild(p);

 const buttonWrapper = document.createElement("div");
 buttonWrapper.classList.add("button-wrapper");
 const createBtn = (...classes) => {
  const btn = document.createElement("button");
  btn.classList.add(...classes);
  return btn;
 };

 const logOutBtnForm = document.createElement("form");
 logOutBtnForm.method = "POST";
 const logOutBtn = createBtn("modal-btn", "logout-btn");
 logOutBtn.type = "submit";
 logOutBtn.name = "logout-btn";
 logOutBtn.textContent = "Confirm";

 logOutBtnForm.append(logOutBtn);

 const cancelBtn = createBtn("modal-btn", "cancel-btn");
 cancelBtn.textContent = "Cancel";
 cancelBtn.type = "button";
 cancelBtn.addEventListener("click", () => {
  wrapper.remove();
 });
 buttonWrapper.append(logOutBtnForm, cancelBtn);

 mainModal.appendChild(modalHeader);
 mainModal.appendChild(modalContent);
 mainModal.appendChild(buttonWrapper);

 wrapper.appendChild(mainModal);

 wrapper.addEventListener("click", (e) => {
  if (e.target === wrapper) {
   wrapper.remove();
  }
 });

 document.body.appendChild(wrapper);
}
