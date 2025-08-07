<?php
include '../database/PDO_Connection.php';
session_start();
$page_name="products";


$res = $conn->prepare("SELECT * FROM products ORDER BY id");
$res->execute();
$products = $res->fetchAll(PDO::FETCH_ASSOC);

$counter=1;
?>

<!DOCTYPE html>
<html lang="en" dir="rtl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="./style.css" />
    <title>لیست محصولات</title>
  </head>
  <style>
    table tr td:last-child a {
      padding: 0.2rem 0;
      font-size: 0.8rem;
      border-radius: 0.3rem;
      width: 3rem;
      height: 1.8rem;
      transition: 0.3s;
    }
    
    table tr td:last-child a:hover {
      opacity: 0.8;
    }
    
    table tr td:last-child a:nth-child(1) {
      padding:.3rem 1rem;
      background-color: var(--red);
      color: var(--white1);
    }
    table tr td:last-child a:nth-child(2) {
      padding:.3rem 1rem;
      background-color: var(--yellow);
      color: var(--white1);
    }
  </style>
  <body>
    <?php include './sidebar.php' ?>
    <?php include './header.php' ?>
    
    <div class="page_content">
      <a href="./addProduct.php">
        <button class="page-newBtn">
          <p>محصول جدید</p>
          <i class="bx bx-plus-circle"></i>
        </button>
      </a>
      <div class="page_container">
        <table border="0" style="border-collapse: collapse">
          <thead>
            <tr>
              <th>ردیف</th>
              <th>نام</th>
              <th>توضیحات</th>
              <th>قیمت</th>
              <th>مدل</th>
              <th>دسته بندی</th>
              <th>ویژگی ها</th>
              <th>عکس</th>
              <th>زمان انتشار</th>
              <th>عملیات</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($products as $product){ ?>
            <tr>
              <td><?= $counter++ ?></td>
              <td><?= $product['title'] ?></td>
              <td><?= $product['caption'] ?></td>
              <td><?= number_format($product['price']) ?> تومان</td>
              <td><?= $product['model'] ?></td>
              <td><?= $product['category'] ?></td>
              <td>
                <span><?= $product['feature1'] ?></span><br>
                <span><?= $product['feature2'] ?></span><br>
                <span><?= $product['feature3'] ?></span><br>
                <span><?= $product['feature4'] ?></span>
              </td>
              <td><img src="../image/products/<?= $product['image'] ?>" alt=""></td>
              <td><?= $product['create_at'] ?></td>
              <td><a href="./delProduct.php?id=<?= $product['id'] ?>">حذف</a> <a href="./editProduct.php?id=<?= $product['id'] ?>">ویراش</a></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
    
    <script src="./script.js"></script>
  </body>
</html>
