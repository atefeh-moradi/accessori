var swiper = new Swiper(".mySwiper", {
  autoplay: true,
  effect: "fade",
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
});


var swiper = new Swiper(".weblogSwiper", {
  slidesPerView: 4,
  autoplay: true,
  spaceBetween: 30,
  pagination: {
    el: ".swiper-pagination",
    type: "fraction",
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  breakpoints: {
    350: {
      slidesPerView: 1,
      spaceBetween: 10,
    },
    450: {
      slidesPerView: 1,
      spaceBetween: 10,
    },
    600: {
      slidesPerView: 2,
      spaceBetween: 10,
    },
    800: {
      slidesPerView: 2,
      spaceBetween: 10,
    },
    1024: {
      slidesPerView: 3,
      spaceBetween: 10,
    },
    1200: {
      slidesPerView: 4,
      spaceBetween: 10,
    },
  },
});


//menu mobile
let navMenuIcon = document.querySelector(".nav-menuIcon");
let mobileMenu = document.querySelector(".mobile-menu");
navMenuIcon.addEventListener("click", () => {
  mobileMenu.classList.toggle("active");
});

//basket
let basketContainer = document.querySelector(".basketContainer");
let navBasket = document.querySelector(".nav-basket");

navBasket.addEventListener("click", () => {
  basketContainer.classList.toggle("active");
});