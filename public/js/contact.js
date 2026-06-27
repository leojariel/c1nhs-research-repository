const sectionToAnimate = document.querySelectorAll(".section-to-animate");

const options = {
 root: null,
 treshold: 0.5,
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
