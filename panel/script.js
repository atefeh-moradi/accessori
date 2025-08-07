let sideBarItems = document.querySelectorAll(".sideBar-item div");

sideBarItems.forEach((item) => {
  item.addEventListener("click", () => {
    item.nextElementSibling.classList.toggle("active");
  });
});


let close_sidbar = document.querySelector(".close_sidbar")
let open_sidbar = document.querySelector(".open_sidbar")
let sideBar_container=document.querySelector(".sideBar-container")

close_sidbar.addEventListener("click",()=>{
sideBar_container.classList.remove('active')
})
open_sidbar.addEventListener("click",()=>{
sideBar_container.classList.add('active')
})