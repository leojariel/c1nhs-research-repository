// ! hero section
const images = [
 "https://images.pexels.com/photos/30731144/pexels-photo-30731144.jpeg",
 "https://images.pexels.com/photos/31056502/pexels-photo-31056502.jpeg",
 "https://images.pexels.com/photos/2982449/pexels-photo-2982449.jpeg",
 "https://images.pexels.com/photos/33766834/pexels-photo-33766834.jpeg",
];

let currentIndex = 0;
let slideTimer;
const SLIDE_DURATION = 4000;

const heroElement = document.getElementById("image-slider");
const bulletsContainer = document.querySelector(".bullets-container");

images.forEach((src) => {
 const img = new Image();
 img.src = src;
});

function createBullets() {
 images.forEach((_, index) => {
  const bullet = document.createElement("button");
  bullet.classList.add("bullet");
  if (index === 0) bullet.classList.add("active");

  bullet.addEventListener("click", () => {
   goToSlide(index);
  });

  bulletsContainer.appendChild(bullet);
 });
}

function updateSlider() {
 heroElement.style.backgroundImage = `url('${images[currentIndex]}')`;

 const bullets = document.querySelectorAll(".bullet");
 bullets.forEach((bullet, index) => {
  if (index === currentIndex) {
   bullet.classList.add("active");
  } else {
   bullet.classList.remove("active");
  }
 });
}

function startAutoSlide() {
 slideTimer = setInterval(() => {
  currentIndex = (currentIndex + 1) % images.length;
  updateSlider();
 }, SLIDE_DURATION);
}

function goToSlide(index) {
 clearInterval(slideTimer);
 currentIndex = index;
 updateSlider();
 startAutoSlide();
}

createBullets();
updateSlider();
startAutoSlide();
