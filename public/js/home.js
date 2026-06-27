// ! hero section
const images = [
 "public/img/gif/c1nhs-bg-gif.gif",
 "https://scontent.fmnl17-7.fna.fbcdn.net/v/t39.30808-6/482021390_1186245909959174_3959084612813281284_n.jpg?stp=dst-jpg_tt6&cstp=mx2048x1365&ctp=s2048x1365&_nc_cat=108&ccb=1-7&_nc_sid=833d8c&_nc_eui2=AeE7IWqN4mtfRl8JUoZBHHzfFnvO8o5Hq1wWe87yjkerXLLtm6cl1-ThOXXTPyXRMcQ0vD1xTrdMlJAaelIB5P41&_nc_ohc=g-AkfnlgI8wQ7kNvwHDIn4s&_nc_oc=Ado9vL34lu-2m_bpey_HzLQfWchSmcJ7HakEkSVzSwm-lPNKLkQFotRNrKdyoi_1RqY&_nc_zt=23&_nc_ht=scontent.fmnl17-7.fna&_nc_gid=D03NuYH__kYkYTuU8YafAw&_nc_ss=7b2a8&oh=00_Af_eDTBVfS1IunTNwxEYs-q_Uw_tsjwl2EW2j_35-PWLig&oe=6A342622",
 "https://scontent.fmnl17-8.fna.fbcdn.net/v/t39.30808-6/481673874_1186246309959134_7165212206403201743_n.jpg?stp=dst-jpg_tt6&cstp=mx2048x1365&ctp=s2048x1365&_nc_cat=104&ccb=1-7&_nc_sid=833d8c&_nc_eui2=AeHDHlxuuA4yqgy9ojWA0EWq_83HkzDkYP7_zceTMORg_khbhSoYllAV89GbdEzQgLfHDbwXWBQr8a-8cHAYVRt7&_nc_ohc=lRiYjZPSxkAQ7kNvwG2Uv9U&_nc_oc=AdpNYEU5H3B-J7ZPTQjizcsBFLzuPLwBvS4oPSWcziVvNhPshKbtHiVIG3Umr7xfKg0&_nc_zt=23&_nc_ht=scontent.fmnl17-8.fna&_nc_gid=wEObx3Q-g6Ga63Dktf4BrQ&_nc_ss=7b2a8&oh=00_Af-SmBMBvqbSbIoG6IM62lqdSdcp_XHByjLo0UgJ7xOpQg&oe=6A343E31",
 "https://scontent.fmnl17-4.fna.fbcdn.net/v/t39.30808-6/481461194_1186246029959162_1181608289803095855_n.jpg?stp=dst-jpg_tt6&cstp=mx2048x1365&ctp=s2048x1365&_nc_cat=105&ccb=1-7&_nc_sid=833d8c&_nc_eui2=AeFsDb1MqzwTFz6YZbHlFUqKN7nYXTVWnUM3udhdNVadQ26VMoB2PluktxvP9N6cSUCmjGYkO6S9xpoDGRmPdQfx&_nc_ohc=hVG6YmA7_UwQ7kNvwG73RVo&_nc_oc=Ado08kXG2RTWbR_H3eMFC-8wJCIPxvQpwU9J6iQgI0D8XTCXRphQhqwqW9IdSHBowyQ&_nc_zt=23&_nc_ht=scontent.fmnl17-4.fna&_nc_gid=O_Kq85cHlurjeQYBKRv9Bg&_nc_ss=7b2a8&oh=00_Af8b6FX6418perNFBNZWIXP5P45j6a-jK6PS3wQehauQZg&oe=6A343F79",
 "https://scontent.fmnl17-3.fna.fbcdn.net/v/t39.30808-6/481462367_1186246236625808_5955746917729375955_n.jpg?stp=dst-jpg_tt6&cstp=mx2048x1365&ctp=s2048x1365&_nc_cat=103&ccb=1-7&_nc_sid=833d8c&_nc_eui2=AeEMj_7AscHzYWDu6KzRIUwbA24_z_6G7WcDbj_P_obtZ6_vaIHTsKbtU2vyHQ-QR3aWV4cOwiRTPMxIzLO4559U&_nc_ohc=V2K5cjHOwGgQ7kNvwEMUyAz&_nc_oc=AdpVWyaaiQlbt4S8SRsIxrqGunFoy0SdMB0EWOd63kUNJGF8oeH38s0apnINcAWPj_k&_nc_zt=23&_nc_ht=scontent.fmnl17-3.fna&_nc_gid=9OomcKkDVu8S9Z639D7-nQ&_nc_ss=7b2a8&oh=00_Af81AgBTcQWsAAM6ZYcmq-aSxBksudElNuf2-CQlU9DMwg&oe=6A343069",
 "https://scontent.fmnl17-2.fna.fbcdn.net/v/t39.30808-6/482212742_1186246056625826_246040254106357618_n.jpg?stp=dst-jpg_tt6&cstp=mx2048x1365&ctp=s2048x1365&_nc_cat=107&ccb=1-7&_nc_sid=833d8c&_nc_eui2=AeHEozU4E2BYVnzb4Dmo3qTt0uSYyGhx297S5JjIaHHb3riPiANirwR_jt65D0FwB70sQ1PzReVjqSmwAGsoxGID&_nc_ohc=bDkeCAnEumYQ7kNvwGuD2Xi&_nc_oc=AdqQDogGRwHjT79oRSbHOjdm4vuaVaudhD2qdXCZwsXEcpsbPTdEvcNB8TUrayDkXb4&_nc_zt=23&_nc_ht=scontent.fmnl17-2.fna&_nc_gid=bzSXtS5rWKnkVg7F-ZGcqA&_nc_ss=7b2a8&oh=00_Af-JkjIYzb0q6h0wRb4aMxD5N-AVt0A2lAr2zg4mUEgumg&oe=6A34321F",
 "https://scontent.fmnl17-3.fna.fbcdn.net/v/t39.30808-6/482198989_1186246303292468_6209177708862715252_n.jpg?stp=dst-jpg_tt6&cstp=mx2048x1365&ctp=s2048x1365&_nc_cat=103&ccb=1-7&_nc_sid=833d8c&_nc_eui2=AeGENOskm6xiPBulzuSfDV7SSIJWVZEERWpIglZVkQRFaokxa_XMrOYDkFotuo6JAaajpc1iDoDB48n6zN18j0P1&_nc_ohc=McPjoCe4zWMQ7kNvwEPmXJV&_nc_oc=Adp1GSMlvbmi72p4VQve_FlnMfNmxvz_w4XpWBqL1009SXiNWs5PgUfWbMnL449d66Q&_nc_zt=23&_nc_ht=scontent.fmnl17-3.fna&_nc_gid=v0g41NTayxlQPs93vsOVJg&_nc_ss=7b2a8&oh=00_Af_XxeiCG5VDCrRN0n44Da5yj-_yfljs3COjU_SfB2iafQ&oe=6A343DCB",
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
