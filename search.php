<?php
  include './database/PDO_Connection.php';

  $searchbar = $_GET['searchbar'];

  $result=$conn->prepare("SELECT * FROM products");
  $result->execute();
  $products = $result->fetchAll(PDO::FETCH_ASSOC);

  $result=$conn->prepare("SELECT * FROM products WHERE title LIKE '%$searchbar%'");
  $result->execute();
  $searchProducts = $result->fetchAll(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html lang="en" dir="rtl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.boxicons.com/fonts/basic/boxicons.min.css"
      rel="stylesheet"
    />
    <!-- Link Swiper's CSS -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    />
    <link rel="stylesheet" href="./css/style.css" />
    <title>جستجو</title>
  </head>

  <body>
    <?php include './mobileMenu.php' ?>
    <?php include './menu.php' ?>

    <main>
      <div class="search_container">
        <div class="search">
          <form method="get" action="./search.php?searchbar=<?php if(isset($_POST['searchbar'])){echo $_POST['searchbar'];}else{echo '';} ?>" class="search_container_input">
            <input type="text" name="searchbar" value="<?php if(isset($_GET['searchbar'])){echo $_GET['searchbar'];}else{echo '';} ?>" placeholder="جستجو بر اساس نام محصول..." />
            <button><i class="bx bx-search"></i></button>
          </form>

          <div class="popular-accessory" id="popular">
            <div class="popular-accessory__header">
              <img src="./image/icons8-watch-90.png" alt="" />
              <div>
                <p class="popular-title title">نتیجه جستجو</p>
                <p class="popular-subtitle subtitle">
                  محصول مورد علاقه خود را اینجا پیدا کنید!
                </p>
              </div>
            </div>
            <div class="popular-accessory__content">
              <ul class="accessory-boxs">
                <?php if($searchbar){foreach($searchProducts as $item){ ?>
                  <li class="accessory-box">
                    <div class="accessory-box__image">
                      <a href="./product.php?id=<?= $item['id'] ?>">
                        <img src="./image/products/<?= $item['image'] ?>" alt="" />
                      </a>
                      <!-- <div class="accessory-box__btns">
                        <i class="bx bx-heart" style="color: var(--primary)"></i>
                        <i class="bx bx-cart"  style="color: var(--primary)"></i>
                      </div> -->
                    </div>
                    <div class="accessory-box__content">
                      <p class="accessory-box__name"><?= $item['title'] ?></p>
                      <p class="accessory-box__price"><?= $item['price'] ?> تومان</p>
                    </div>
                  </li>
                <?php }} else{ ?>
                <?php foreach($products as $product){ ?>
                  <li class="accessory-box">
                    <div class="accessory-box__image">
                       <a href="./product.php?id=<?= $product['id'] ?>">
                        <img src="./image/products/<?= $product['image'] ?>" alt="" />
                      </a>
                      <div class="accessory-box__btns">
                        <i class="bx bx-heart" style="color: var(--primary)"></i>
                        <!-- <i class='bx bxs-heart' style='color:var(--primaryLight)' ></i> -->
                        <i class="bx bx-cart" style="color: var(--primary)"></i>
                        <!-- <i class='bx bxs-cart-alt' style='color:var(--primaryLight)' ></i> -->
                      </div>
                    </div>
                    <div class="accessory-box__content">
                      <p class="accessory-box__name"><?= $product['title'] ?></p>
                      <p class="accessory-box__price"><?= $product['price'] ?> تومان</p>
                    </div>
                  </li>
                <?php }} ?>
              </ul>
            </div>
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
