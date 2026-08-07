// ! hero section
const images = [
 "public/img/gif/c1nhs-bg-gif.gif",
 "public/img/slides/batch-2023-2024/image1.jpg",
 "public/img/slides/batch-2023-2024/image2.jpg",
 "public/img/slides/batch-2023-2024/image3.jpg",
 "public/img/slides/batch-2023-2024/image4.jpg",
 "public/img/slides/batch-2023-2024/image5.jpg",
 "public/img/slides/batch-2023-2024/image6.jpg",
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

function updateSLider() {
 heroElement.style.backgroundImage = `url(${images[currentIndex]})`;

 const bullet = document.querySelectorAll(".bullet");
 bullet.forEach((bullet, index) => {
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
  updateSLider();
 }, SLIDE_DURATION);
}

function goToSlide(index) {
 clearInterval(slideTimer);
 currentIndex = index;
 updateSLider();
 startAutoSlide();
}

createBullets();
updateSLider();
startAutoSlide();

// ! scroll to animate

const sectionToAnimate = document.querySelectorAll(".section-to-animate");

const options = {
 root: null,
 rootMargin: "0px",
 threshold: 0.1,
};

const observer = new IntersectionObserver((entries, observer) => {
 entries.forEach((entry) => {
  if (entry.isIntersecting) {
   entry.target.classList.add("visible");

   observer.unobserve(entry.target);
  }
 });
}, options);

sectionToAnimate.forEach((section) => {
 observer.observe(section);
});
