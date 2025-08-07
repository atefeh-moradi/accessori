<?php
  include './database/PDO_Connection.php';
  include "./jdf.php";
  $id = $_GET['id'];
  session_start();

  $result=$conn->prepare("SELECT * FROM products WHERE id=?");
  $result->bindValue(1, $id);
  $result->execute();
  $products = $result->fetchAll(PDO::FETCH_ASSOC);
  foreach($products as $product)

  $result=$conn->prepare("SELECT * FROM products WHERE category=? LIMIT 3");
  $result->bindValue(1, $product['category']);
  $result->execute();
  $recommendProducts = $result->fetchAll(PDO::FETCH_ASSOC);


  if(isset($_POST['addToCart'])){
    if(isset($_SESSION['num_id'])){

      $res=$conn->prepare("SELECT * FROM cart WHERE product_id=? AND user_id=?");
      $res->bindValue(1, $id);
      $res->bindValue(2, $_SESSION['num_id']);
      $res->execute();
      $isInCart = $res->fetchAll(PDO::FETCH_ASSOC);

      if(!$isInCart){
        $res = $conn->prepare("INSERT INTO cart SET product_id=?, user_id=?, create_at=?");
        $res->bindValue(1, $id);
        $res->bindValue(2, $_SESSION['num_id']);
        $res->bindValue(3, jdate('Y/m/d - h:i:s'));
        $res->execute();
        echo "<script>alert('✅ محصول به سبد شما اضافه شد')</script>"; 
      }
      else{
        echo "<script>alert('⛔ محصول از قبل در سبد وجود دارد')</script>"; 
      }
    }
    else{
        echo "<script>alert('⛔ لطفا اول وارد حساب خود شوید')</script>"; 
    }
  }


  if(isset($_POST['subComment'])){
    if(isset($_POST['content'])){
      $res = $conn->prepare("INSERT INTO comments SET product_id=?, user_id=?, content=?, create_at=?");
      $res->bindValue(1, $id);
      $res->bindValue(2, $_SESSION['num_id']);
      $res->bindValue(3, $_POST['content']);
      $res->bindValue(4, jdate('Y/m/d - h:i:s'));
      $res->execute();
      echo "<script>alert('✅ دیدگاه شما بعد تایید ادمین ها نمایش داده میشود')</script>";
    }
    else{
      echo "<script>alert('⛔ متنی برای دیدگاه وجود ندارد')</script>";
    }
  }

  $result=$conn->prepare("SELECT u.username as username, u.rule as rule, c.content as content, c.create_at as create_at 
  FROM comments c 
  JOIN users u ON u.num_id = c.user_id 
  JOIN products p ON p.id = c.product_id 
  WHERE c.status=? AND c.product_id=? ");
  
  $result->bindValue(1, 1);
  $result->bindValue(2, $id);
  $result->execute();
  $comments = $result->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href='https://cdn.boxicons.com/fonts/basic/boxicons.min.css' rel='stylesheet'>
  <link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  />
  <link rel="stylesheet" href="css/style.css" />
  <title>جزئیات محصولp</title>
</head>

  <body>
    <?php include './mobileMenu.php' ?>
    <?php include './menu.php' ?>

    <section class="product-container">
      <!-- Product Details Section -->
      <section class="product-details">
        <div class="product-gallery">
          <div class="main-image">
            <img
              src="./image/products/<?= $product['image'] ?>"
              alt="Product Image"
              id="mainProductImage"
            />
          </div>
        </div>
        <div class="product-info">
          <h1 class="product-title"><?= $product['title'] ?></h1>
          <div class="product-meta">
            <span class="category">دسته بندی : <?= $product['category'] ?></span>
            <span class="sku">مدل : <?= $product['model'] ?></span>
          </div>

          <div class="product-features">
            <h3>ویژگی ها :</h3>
            <ul>
              <li><i class="fas fa-check"></i><?= $product['feature1'] ?></li>
              <li><i class="fas fa-check"></i><?= $product['feature2'] ?></li>
              <li><i class="fas fa-check"></i><?= $product['feature3'] ?></li>
              <li><i class="fas fa-check"></i><?= $product['feature4'] ?></li>
            </ul>
          </div>

          <p class="product-price1">قیمت : <span><?= number_format($product['price']) ?> هزار تومن</span></p>

          <form method="POST" class="product-actions">
            <button type="submit" name="addToCart" class="add-to-cart-btn">
              <i class="fas fa-shopping-cart"></i> اضافه به سبد خرید
            </button>
          </form>

          <div class="product-delivery">
            <div class="delivery-info">
              <i class="fas fa-truck"></i>
              <span>ارسال رایگان برای سفارش‌های بالای 500 هزارتومان</span>
            </div>
            <div class="delivery-info">
              <i class="fas fa-undo"></i>
              <span>سیاست بازگشت کالا ۳۰ روزه</span>
            </div>
          </div>
        </div>
      </section>

      <!-- Suggested Products Section -->
      <section class="suggested-products">
        <h2>محصولات پیشنهاد شده برای شما</h2>
        <div class="product-grid">
          <?php foreach($recommendProducts as $item){ ?>
          <a href="./product.php?id=<?= $item['id']?>" class="product-card">
            <div class="product-image">
              <img src="./image/products/<?= $item['image'] ?>" alt="ساعت مچی" />
            </div>
            <div class="product-info">
              <div class="product-category"><?= $item['category'] ?></div>
              <h3><?= $item['title'] ?></h3>
              <div class="product-price">
                <p>قیمت :</p>
                <span class="current-price"><?= $item['price'] ?> هزار تومان</span>
              </div>
              <form method="POST" class="add-to-cart" style="padding:0;">
                <button type="submit" name="addToCart" style="height: 100%;width: 100%;padding: 1rem;border-redius: 1rem;">
                   <i class="fas fa-shopping-cart"></i> اضافه به سبد خرید
                 </button>
              </form>
            </div>
          </a>
          <?php } ?>
        </div>
      </section>

      <!-- Comments Section -->
      <section class="product-comments">
        <h2>دیدگاه های شما</h2>

        <div class="add-comment" style="margin-bottom: 1rem;">
          <p>دیدگاهی بنویسید</p>
          <form method="POST" id="commentForm">
            <textarea
              name="content"
              placeholder="دیدگاه شما نسبت به این محصول چیست؟"
              required
            ></textarea>
            <input type="submit" name="subComment" class="submit-review" value="ارسال دیدگاه" />
          </form>
        </div>

         <div class="comments-list">
           <?php foreach($comments as $comment){ ?>
            <div class="comments-box">
             <div class="comments-box_header">
                 <p><?= $comment['username'] ?></p>
                 <span>-</span>
                 <p><?php if($comment['rule'] == 0){echo 'کاربر عادی';}elseif($comment['rule'] == 1){echo 'ادمین';}elseif($comment['rule'] == 3){echo 'مالک';} ?></p>
             </div>
             <p class="comments-box-txt"><?= $comment['content'] ?></p>
             <p class="comments-box-price">در تاریخ : <?= $comment['create_at'] ?></p>
            </div>
           <?php } ?>
        </div>


      </section>
    </section>

   <?php include './footer.php' ?>

  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="./script.js"></script>
  </body>
</html>