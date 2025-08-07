<?php
include './database/PDO_Connection.php';
session_start();

$res = $conn->prepare("SELECT * FROM products LIMIT 18");
$res->execute();
$products = $res->fetchAll(PDO::FETCH_ASSOC);

$res = $conn->prepare("SELECT * FROM articles LIMIT 4");
$res->execute();
$articles = $res->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href='https://cdn.boxicons.com/fonts/basic/boxicons.min.css' rel='stylesheet'>
  <!-- Link Swiper's CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <link rel="stylesheet" href="./css/style.css" />
  <title>صفحه اصلی</title>
</head>

<body>
  <?php include './mobileMenu.php' ?>
  <?php include './menu.php' ?>

  <main>
    <div class="main-container">
      <div class="swiper mySwiper">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <img src="./image/slide1.jpg" />
          </div>
          <div class="swiper-slide">
            <img src="./image/slide2.jpg" />
          </div>
          <div class="swiper-slide">
            <img src="./image/slide3.jpg" />
          </div>
          <div class="swiper-slide">
            <img src="./image/slide4.jpg" />
          </div>
        </div>
        <div class="swiper-pagination"></div>
      </div>

      <div class="popular-accessory" id="products">
        <div class="popular-accessory__header">
          <img src="./image/icons8-watch-90.png" alt="" />
          <div>
            <p class="popular-title title">اکسسوری محبوب</p>
            <p class="popular-subtitle subtitle">
              با ساعت و دست بند دل هر کیو به دست بیار !
            </p>
          </div>
        </div>
        <div class="popular-accessory__content" >
          <ul class="accessory-boxs">
            <?php foreach($products as $product){ ?>
            <li class="accessory-box">
              <a href="./product.php?id=<?= $product['id'] ?>">
                <div class="accessory-box__image">
                <img src="./image/products/<?=$product['image'] ?>" alt="" />
                <!-- <div class="accessory-box__btns">
                  <i class="bx bx-heart" style="color: var(--primary)" ></i>
                  <i class="bx bx-cart" style="color: var(--primary)"></i>
                </div> -->
              </div>
              <div class="accessory-box__content">
                <p class="accessory-box__name"><?= $product['title'] ?></p>
                <p class="accessory-box__price"><?= number_format($product['price']) ?> تومان</p>
              </div>
              </a>
            </li>
            <?php } ?>
          </ul>
        </div>
      </div>

      <div class="aboutUs" id="aboutUs">
        <div class="popular-accessory__header">
          <img src="./image/icons8-watch-90.png" alt="" />
          <div>
            <p class="popular-title title">درباره ما</p>
            <p class="popular-subtitle subtitle">
              ما را با سطح و کیفیت بالا بشناسید !
            </p>
          </div>
        </div>
        <ul>
          <li>
            <img src="./image/bracelet.jfif" alt="" />
            <div class="aboutUs-info">
              <i class="bx bx-rocket"></i>
              <p class="aboutUs-title">ارسال سریع و رایگان</p>
              <p class="aboutUs-subtitle">
                با خرید بالای 500 هزار تومان ارسال محصولات شما رایگان میشود
              </p>
            </div>
          </li>

          <li>
            <img src="./image/watch8.jfif" alt="" />
            <div class="aboutUs-info">
              <i class="bx bx-badge-check"></i>
              <p class="aboutUs-title">ضمانت اصل بودن</p>
              <p class="aboutUs-subtitle">
                محصولات دلابت وارداتی هستند و برای خرید از اصل بودن آنها شک
                نکنید
              </p>
            </div>
          </li>

          <li>
            <img src="./image/watch5.jfif" alt="" />
            <div class="aboutUs-info">
              <i class='bx  bx-headphone-mic'  ></i> 
              <p class="aboutUs-title">پشتیبانی انلاین</p>
              <p class="aboutUs-subtitle">
                با خرید محصول تا رسیدن محصول به دستتان میتوانید با پشتیبانی در
                تماس باشید
              </p>
            </div>
          </li>

          <li>
            <img src="./image/ring7.jfif" alt="" />
            <div class="aboutUs-info">
              <i class="bx bxs-credit-card"></i>
              <p class="aboutUs-title">پرداخت امن از درگاه بانکی</p>
              <p class="aboutUs-subtitle">
                تضمین بابت امن بودن و سریع بودن درگاه پرداخت فروشگاه دلایت
              </p>
            </div>
          </li>

          <li>
            <img src="./image/Necklaces4.jfif" alt="" />
            <div class="aboutUs-info">
              <i class='bx  bx-coin'  ></i> 
              <p class="aboutUs-title">تضمین بازگشت وجه</p>
              <p class="aboutUs-subtitle">
                در صورتی که از محصول ناراضی بودید میتوانید از طریق پنل کاربری
                آن را مرجوع کنید
              </p>
            </div>
          </li>
        </ul>
      </div>

      <div class="articles" id="articles">
        <div class="popular-accessory__header">
          <img src="./image/icons8-watch-90.png" alt="" />
          <div>
            <p class="popular-title title">مقاله ها</p>
            <p class="popular-subtitle subtitle">
              مقاله های ما را بخوانید و به دانش خود بیافزایید !
            </p>
          </div>
        </div>
        <div class="article__content" >
          <?php foreach($articles as $article){ ?>
          <div class="article__content-item">
            <img src="./image/articles/<?= $article['image'] ?>" alt="" />
            <p class="article__content-item-title"><?= $article['title'] ?></p>
            <p class="article__content-item-subtitle"><?= substr($article['caption'], 0, 200) ?><div class="article__content-item-footer">
              <p class="article__content-item-date"><?= $article['create_at'] ?></p>
              <div>
                <i class='bx  bx-pen-alt'></i>
                <p>نویسنده : <?= $article['author'] ?></p>
              </div>
            </div>
            <a href="./article.php?id=<?= $article['id'] ?>" class="article__content-item-link">بیشتر بدانید</a>
          </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </main>

 <?php include './footer.php' ?>


  <!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script src="./script.js"></script>
</body>

</html>