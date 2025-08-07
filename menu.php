<?php
  include './database/PDO_Connection.php';

    $result=$conn->prepare("SELECT c.id as id, p.title as title, p.image as image, p.price as price FROM cart c JOIN users u ON  u.num_id = c.user_id JOIN products p ON p.id = c.product_id WHERE c.user_id=? ");
    $result->bindValue(1, isset($_SESSION['num_id'])?$_SESSION['num_id']: 0);
    $result->execute();
    $cart = $result->fetchAll(PDO::FETCH_ASSOC);

    $result=$conn->prepare("SELECT SUM(p.price) as totalPrice FROM cart c JOIN users u ON  u.num_id = c.user_id JOIN products p ON p.id = c.product_id WHERE c.user_id=? ");
    $result->bindValue(1, isset($_SESSION['num_id'])?$_SESSION['num_id']: 0);
    $result->execute();
    $totalPrice = $result->fetchAll(PDO::FETCH_ASSOC);
    foreach($totalPrice as $totalItem){}

    $result=$conn->prepare("SELECT COUNT(p.price) as count FROM cart c JOIN users u ON  u.num_id = c.user_id JOIN products p ON p.id = c.product_id WHERE c.user_id=? ");
    $result->bindValue(1, isset($_SESSION['num_id'])?$_SESSION['num_id']: 0);
    $result->execute();
    $countProduct = $result->fetchAll(PDO::FETCH_ASSOC);
    foreach($countProduct as $countItem){}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
        <nav>
          <i class="bx bx-menu nav-menuIcon"></i>
          <a href="./index.php" class="nav-logo__link">
            <img class="nav-logo logo2" src="./image/logo.png" alt="" />
          </a>
          <div class="nav-right">
            <a href="./index.php">
              <img class="nav-logo" src="./image/logo.png" alt="" /></a>
            <ul class="nav-items">
              <li class="nav-item">
                <a href="./index.php" class="active">خانه</a>
              </li>
              <li class="nav-item"><a href="./index.php#products" class="">محصولات</a>
              </li>
              <li class="nav-item"><a href="./index.php#footer" class="">تماس با ما</a></li>
              <li class="nav-item"><a href="./index.php#aboutUs" class="">درباره ما</a></li>
            </ul>
          </div>
          <div class="nav-left">
            <form method="get" class="nav-searchbar" action="./search.php?searchbar=<?php if(isset($_POST['searchbar'])){echo $_POST['searchbar'];}else{echo '';} ?>">
              <input type="text" name="searchbar" placeholder="به دنبال چه میگردید ؟" />
              <button type="submit" style="margin-bottom: 1rem;"><i class="bx bx-search"></i></button>
            </form>
            <!-- <i class="bx bx-search nav-search"></i> -->
            <a href="./signIn.php">
              <i class="bx bx-user nav-validation"></i>
            </a>
            <div class="basket">
              <i class="bx bx-shopping-bag nav-basket"></i>
              <div class="basketContainer">
                <div class="basketContainer-header">
                  <p>سبد خرید</p>
                  <p>
                    تعداد محصول : <span class="basketContainer-count"><?=$countItem['count'] ?></span>
                  </p>
                </div>
                <?php if($countItem['count']==0){ ?>
                <img class="emptyBasket" src="./image/empty cart.png" alt="" />
                <?php } else { ?>
                <ul class="basketContainer-items">
                  <?php foreach($cart as $item){ ?>
                  <li class="basket-item">
                    <a href="./delCartProduct.php?id=<?= $item['id'] ?>"><i class="bx bx-x"></i></a>
                     <div class="basket-item__info">
                       <p class="basket-item__info-name"><?= $item['title'] ?></p>
                       <p class="basket-item__info-price">
                        <?= number_format($item['price']) ?> <span> تومان </span>
                       </p>
                     </div>
                     <img src="./image/products/<?= $item['image'] ?>" alt="" />
                  </li>
                  <?php } ?>
                </ul>
                <div class="basketContainer-footer">
                  <p style="width: 100% !important;">
                    قیمت کل : &nbsp;
                    <span class="basketContainer-priceAll"> <?= number_format($totalItem['totalPrice']) ?> </span>&nbsp; تومان
                  </p>
                </div>
                <?php } ?>
              </div>
            </div>
          </div>
        </nav>
  </header>
 
</body>
</html>