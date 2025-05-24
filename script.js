let Products = [
  {
    id: 1,
    name: "کاسیو گرد استیل",
    price: 175000,
    src: "./image/watch.jfif",
    has: true,
    buyCount: 72,
    offer: 0,
  },
  {
    id: 2,
    name: "کاسیو مربعی استیل",
    price: 180000,
    src: "./image/watch3.jfif",
    has: true,
    buyCount: 63,
    offer: 0,
  },
  {
    id: 3,
    name: "کالکشن مشکی",
    price: 190000,
    src: "./image/watch5.jfif",
    has: true,
    buyCount: 75,
    offer: 12,
  },
  {
    id: 4,
    name: "عینک پرادو",
    price: 110000,
    src: "./image/glass1.jfif",
    has: true,
    buyCount: 39,
    offer: 0,
  },
  {
    id: 5,
    name: "دستبند همیشگی",
    price: 199000,
    src: "./image/bracelet1.jfif",
    has: true,
    buyCount: 21,
    offer: 0,
  },
  {
    id: 6,
    name: "گردبند صورتی",
    price: 199000,
    src: "./image/Necklaces1.jfif",
    has: true,
    buyCount: 19,
    offer: 0,
  },
  {
    id: 7,
    name: "نایدو بند حصیری",
    price: 199000,
    src: "./image/watch6.jfif",
    has: true,
    buyCount: 28,
    offer: 0,
  },
  {
    id: 8,
    name: "نایدو طلایی",
    price: 125000,
    src: "./image/watch8.jfif",
    has: true,
    buyCount: 43,
    offer: 0,
  },
  {
    id: 9,
    name: "صفحه شاین",
    price: 198000,
    src: "./image/watch11.jfif",
    has: true,
    buyCount: 27,
    offer: 0,
  },
  {
    id: 10,
    name: "دستبند لاتین",
    price: 120000,
    src: "./image/bracelet.jfif",
    has: true,
    buyCount: 50,
    offer: 0,
  },
  {
    id: 11,
    name: "گردبند حلال ماه",
    price: 148000,
    src: "./image/Necklaces3.jfif",
    has: true,
    buyCount: 58,
    offer: 8,
  },

  {
    id: 12,
    name: "نایدو استیل",
    price: 150000,
    src: "./image/watch6.jfif",
    has: true,
    buyCount: 62,
    offer: 0,
  },
  {
    id: 13,
    name: "انگشتر پروانه",
    price: 99000,
    src: "./image/ring2.jfif",
    has: true,
    buyCount: 35,
    offer: 0,
  },
  {
    id: 14,
    name: "ساعت مینی کلاسیک",
    price: 110000,
    src: "./image/watch10.jfif",
    has: true,
    buyCount: 20,
    offer: 0,
  },
  {
    id: 15,
    name: "انگشتر مینیمال",
    price: 220000,
    src: "./image/ring1.jfif",
    has: false,
    buyCount: 49,
    offer: 0,
  },
  {
    id: 16,
    name: "گردنبند حروف استیل",
    price: 120000,
    src: "./image/Necklaces4.jfif",
    has: true,
    buyCount: 72,
    offer: 0,
  },
  {
    id: 17,
    name: "انگشتر صدف صورتی",
    price: 135000,
    src: "./image/ring2.jfif",
    has: true,
    buyCount: 26,
    offer: 0,
  },
  {
    id: 18,
    name: "انگشتر میکی",
    price: 80000,
    src: "./image/ring3.jfif",
    has: true,
    buyCount: 24,
    offer: 0,
  },
  {
    id: 19,
    name: "پیرسینگ بینی نقره ای",
    price: 95000,
    src: "./image/pirsing.jpeg",
    has: true,
    buyCount: 112,
    offer: 0,
  },
  {
    id: 20,
    name: "انگشتر سال میلادی",
    price: 120000,
    src: "./image/ring7.jfif",
    has: true,
    buyCount: 83,
    offer: 9,
  },
];

//slider
var swiper = new Swiper(".mySwiper", {
  autoplay: true,
  spaceBetween: 30,
  effect: "fade",
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
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
let basketContainerImg = document.querySelector(".basketContainer img");
let basketContainerItems = document.querySelector(".basketContainer-items");
let basketContainerFooter = document.querySelector(".basketContainer-footer");
let priceAll = document.querySelector(".basketContainer-priceAll");
let basketContainerCount = document.querySelector(".basketContainer-count");

let basket = [];

function addToBasket(ID) {
  basketContainerCount.innerHTML = basket.length + 1;

  // if (basket.length < 0) {
  //   basketContainerImg.style.display = "block";
  //   basketContainerItems.style.display = "none";
  //   basketContainerFooter.style.display = "none";
  // } else {
  //   basketContainerImg.style.display = "none";
  //   basketContainerItems.style.display = "block";
  //   basketContainerFooter.style.display = "flex";
  // }

  let mainProduct = Products.find((product) => {
    return product.id === ID;
  });

  let newProduct = {
    id: mainProduct.id,
    name: mainProduct.name,
    price: mainProduct.price,
    src: mainProduct.src,
    has: mainProduct.has,
    count: 1,
  };
  console.log(newProduct);
  basket.push(newProduct);
  basketProductGenerator(basket);
  sumTotalProduct(basket);
}

function basketProductGenerator(basket) {
  basketContainerItems.innerHTML = "";
  basket.forEach((product) => {
    basketContainerItems.insertAdjacentHTML(
      "beforeend",
      `<li class="basket-item">
            <i class="bx bx-x" onclick="deleteFromBasket(${product.id})"></i>
            <div class="basket-item__info">
              <p class="basket-item__info-name">${product.name}</p>
              <p class="basket-item__info-price">
               ${product.price.toLocaleString()} <span> تومان </span>
              </p>
            </div>
            <div class="basket-item__quantity">
              <button class="basket-item__quantity-plus">+</button>
              <span class="basket-item__quantity-num">${product.count}</span>
              <button class="basket-item__quantity-minus">-</button>
            </div>
            <img src="${product.src}" alt="" />
          </li>`
    );
  });
}

//if empty basket show emptyImg
setInterval(() => {
  if (basket.length < 1) {
    basketContainerImg.style.display = "block";
    basketContainerItems.style.display = "none";
    basketContainerFooter.style.display = "none";
  } else {
    basketContainerImg.style.display = "none";
    basketContainerItems.style.display = "block";
    basketContainerFooter.style.display = "flex";
  }
}, 1);

navBasket.addEventListener("click", () => {
  basketContainer.classList.toggle("active");
});

//product item generature
let accessoryBoxs = document.querySelector(".accessory-boxs");

Products.forEach((product) => {
  accessoryBoxs.insertAdjacentHTML(
    "beforeend",
    `
  <li class="accessory-box">
          <div class="accessory-box__image">
            <img src="${product.src}" alt="" />
            <div class="accessory-box__btns">
              <i class="bx bx-heart" style="color: var(--primary)" ></i>
              <!-- <i class='bx bxs-heart' style='color:var(--primaryLight)' ></i> -->
              <i
                class="bx bx-cart-alt"
                style="color: var(--primary)"
                onclick=(addToBasket(${product.id}))></i>
              <!-- <i class='bx bxs-cart-alt' style='color:var(--primaryLight)' ></i> -->
            </div>
          </div>
          <div class="accessory-box__content">
            <p class="accessory-box__name">${product.name}</p>
            <p class="accessory-box__price">${product.price.toLocaleString()} تومان</p>
          </div>
      </li>`
  );
});

//delete product from basket
function deleteFromBasket(ID) {
  basketContainerCount.innerHTML = basket.length - 1;
  let productDeleted = basket.findIndex((p) => {
    return p.id === ID;
  });
  basket.splice(productDeleted, 1);
  basketProductGenerator(basket);
  sumTotalProduct(basket);
}

//sum price of product
let basketContainerPriceAll = document.querySelector(
  ".basketContainer-priceAll"
);

function sumTotalProduct(basket) {
  let sum = 0;

  basket.forEach((product) => {
    sum += product.count * product.price;
  });

  basketContainerPriceAll.innerHTML = sum.toLocaleString();
}

//filter product
// let filterProductContainer = document.querySelector(".filter-product__items");
// Products.forEach((product) => {
//   filterProductContainer.insertAdjacentHTML(
//     "beforeend",
//     `<li class="accessory-box">
//           <div class="accessory-box__image">
//             <img src="${product.src}" alt="" />
//             <div class="accessory-box__btns">
//               <i class="bx bx-heart" style="color: var(--primary)" ></i>
//               <!-- <i class='bx bxs-heart' style='color:var(--primaryLight)' ></i> -->
//               <i
//                 class="bx bx-cart-alt"
//                 style="color: var(--primary)"
//                 onclick=(addToBasket(${product.id}))></i>
//               <!-- <i class='bx bxs-cart-alt' style='color:var(--primaryLight)' ></i> -->
//             </div>
//           </div>
//           <div class="accessory-box__content">
//             <p class="accessory-box__name">${product.name}</p>
//             <p class="accessory-box__price">${product.price.toLocaleString()} تومان</p>
//           </div>
//       </li>`
//   );
// });

//filter product
let productItemsContainer = document.querySelector(".filter-product__items");
let productItems = document.querySelectorAll(".filter-product__item");

productItemsContainer.addEventListener("click", (e) => {
  productItems.forEach((item) => item.classList.remove("active"));
  e.target.classList.add("active");
});


var swiper = new Swiper(".mySwiper2", {
  loop:true,
  slidesPerView: 1,
  breakpoints: {
    400: {
      slidesPerView: 2,
      spaceBetween: 10,
    },
    600: {
      slidesPerView: 3,
      spaceBetween: 10,
    },
    800: {
      slidesPerView: 4,
      spaceBetween: 10,
    },
    1024: {
      slidesPerView: 5,
      spaceBetween: 10,
    },
  },
});