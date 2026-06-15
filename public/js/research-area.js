const accordionHeader = document.querySelectorAll(".accordion-header");

accordionHeader.forEach((header) => {
 header.addEventListener("click", function () {
  const currentItem = this.parentElement;
  const content = this.nextElementSibling;

  currentItem.classList.toggle("active");

  if (currentItem.classList.contains("active")) {
   content.style.opacity = "1";
   content.style.maxHeight = content.scrollHeight + "px";
   updateParentHeight(this, content.scrollHeight);
  } else {
   content.style.opacity = "0";
   content.style.maxHeight = null;
   updateParentHeight(this, -content.scrollHeight);
  }
 });
});

function updateParentHeight(element, heightDifference) {
 let parentContent = element.closest(".accordion-content");

 while (parentContent) {
  const currentItem = parseInt(parentContent.style.maxHeight) || 0;
  parentContent.style.maxHeight = currentItem + heightDifference + "px";

  parentContent = parentContent.parentElement.closest(".accordion-content");
 }
}

// ! view research preview
const viewBtn = document.querySelectorAll(".view-btn");

viewBtn.forEach((btn) => {
 btn.addEventListener("click", () => {});
});
