<?php
include '../database/PDO_Connection.php';
include "../jdf.php";
session_start();

$page_name="products";

if(isset($_POST['subBtn'])){
    $title = $_POST['title'];
    $image = $_FILES['image']['name'];
    $category = $_POST['category'];
    $model = $_POST['model'];
    $price = $_POST['price'];
    $feature1 = $_POST['feature1'];
    $feature2 = $_POST['feature2'];
    $feature3 = $_POST['feature3'];
    $feature4 = $_POST['feature4'];
    $caption = $_POST['caption'];
    $createAt = jdate('Y/m/d - h:i:s');

  
    if($title && $image && $category && $model && $price && $feature1 && $feature2 && $feature3 && $feature4 && $caption){
      $res = $conn->prepare("INSERT INTO products SET title=?, image=?, category=?, model=?, price=?, feature1=?, feature2=?, feature3=?, feature4=?, caption=?, create_at=?");
      $res->bindValue(1, $title);
      $res->bindValue(2, $image);
      $res->bindValue(3, $category);
      $res->bindValue(4, $model);
      $res->bindValue(5, $price);
      $res->bindValue(6, $feature1);
      $res->bindValue(7, $feature2);
      $res->bindValue(8, $feature3);
      $res->bindValue(9, $feature4);
      $res->bindValue(10, $caption);
      $res->bindValue(11, $createAt);
      $res->execute();  
      move_uploaded_file($_FILES["image"]["tmp_name"], "../image/products/".$_FILES['image']['name']);
      echo "<script>alert('محصول اضافه شد')</script>"; 
      echo "<script>location = './listProduct.php' </script>";
      // header("location : ./listProducts.php");
    }
    else{
      echo "<script>alert('همه فیلد ها را پر کنید')</script>"; 
    }
}

?>


<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="./style.css" />
  <title>اضافه کردن محصول</title>
</head>
<body>
  <?php include './sidebar.php' ?>
  <?php include './header.php' ?>

  <div class="page_content">
    <div class="content_container">
      <a href="./addProduct.php">
          <button class="page-newBtn">
            <p>محصول جدید</p>
            <i class="bx bx-plus-circle"></i>
          </button>
        </a>
      <form method="POSt" class="added" enctype="multipart/form-data">
      <div class="form-container">
          <div class="formItem">
          <label for="title">نام :</label>
          <input type="text" name="title" id="title" placeholder="نام یا موضوعی برای محصول" />
        </div>

        <div class="formItem">
          <label for="image">لینک عکس :</label>
          <input type="file" name="image" id="image" />
        </div>

        <div class="formItem">
          <label for="category">دسته بندی :</label>
          <input type="text" name="category" id="category" placeholder="دسته بندی محصول" />
        </div>

        <div class="formItem">
          <label for="category">مدل :</label>
          <input type="text" name="model" id="category" placeholder="مدل محصول" />
        </div>

        <div class="formItem">
          <label for="price">قیمت :</label>
          <input type="text" name="price" id="price" placeholder="مثال : 125000" />
        </div>

        <div class="formItem">
          <label for="feature1">ویژگی 1 :</label>
          <input type="text" name="feature1" id="feature1" placeholder="مثال : 12" />
        </div>
        <div class="formItem">
          <label for="feature2">ویژگی 2 :</label>
          <input type="text" name="feature2" id="feature2" placeholder="مثال : 12" />
        </div>
        <div class="formItem">
          <label for="feature3">ویژگی 3 :</label>
          <input type="text" name="feature3" id="feature3" placeholder="مثال : 12" />
        </div>
        <div class="formItem">
          <label for="feature4">ویژگی 4 :</label>
          <input type="text" name="feature4" id="feature4" placeholder="مثال : 12" />
        </div>

        <div class="formItem">
          <label for="caption">توضیحات :</label>
          <input type="text" name="caption" id="caption" placeholder="توضیحی درباره محصول فروشگاه..."></input>
        </div>
      </div>

        <input type="submit" name="subBtn" value="اضافه کردن" class="subForm" />
      </form>
    </div>
  </div>

  <script src="./script.js"></script>
</body>

</html>