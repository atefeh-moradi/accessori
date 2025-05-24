let sideBarItems = document.querySelectorAll(".sideBar-item div");

sideBarItems.forEach((item) => {
  item.addEventListener("click", () => {
    item.nextElementSibling.classList.toggle("active");
  });
});
